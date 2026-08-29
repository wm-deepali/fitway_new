<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductSubSubCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use ZipArchive;

class ImportOldProducts extends Command
{
    /**
     * php artisan products:import-old
     * php artisan products:import-old --dry-run
     * php artisan products:import-old --fresh
     * php artisan products:import-old --skip-images
     * php artisan products:import-old --sql-file=/absolute/path/products.sql --images-zip=/absolute/path/products.zip
     *
     * Default expectations (matches how the files were dropped in):
     *   - SQL dump:   public/products.sql   (a phpMyAdmin dump that CREATEs/INSERTs into a table called `products`)
     *   - Images zip: public/products.zip   (flat — filenames match the product_image column, e.g. 171715704774.png)
     *   - Live images live at: public/products/<filename>
     */
    protected $signature = 'products:import-old
        {--dry-run : Only report matches/mismatches, insert nothing}
        {--fresh : Drop and re-import the old_products staging table even if it already exists}
        {--skip-images : Skip extracting products.zip}
        {--sql-file= : Path to the old products SQL dump (default: public/products.sql)}
        {--images-zip= : Path to the zip of old product images (default: public/products.zip)}';

    protected $description = 'Stage products.sql into old_products and products.zip into public/products, then import into the live products table, remapping category/sub-category/sub-sub-category IDs by name.';

    /**
     * Old category_id => name  (from product_categories.sql)
     */
    protected array $oldCategories = [
        11 => 'Commercial Equipments',
        14 => 'HOME EQUIPMENTS',
        15 => 'Outdoor Equipment',
    ];

    /**
     * Old subcategory_id => name  (from product_sub_categories.sql)
     */
    protected array $oldSubCategories = [
        10 => 'Treadmills',
        50 => 'Cross Trainers',
        51 => 'Exercise Bikes',
        52 => 'Cardio',
        54 => 'Strength',
    ];

    /**
     * Old minisubcat_id => name  (from product_mini_sub_categories.sql)
     * Row 24 (category_id 16) is orphaned in the source data — no matching
     * category exists, so it will always be reported as unmatched.
     */
    protected array $oldMiniSubCategories = [
        6  => 'Treadmills',
        7  => 'Cross Trainers',
        10 => 'Rowing Machine',
        11 => 'Stair Climber',
        14 => 'Spin Bikes',
        15 => 'Recumbent Bike',
        18 => 'Air Bike',
        19 => 'U IWON Series',
        20 => 'Galaxy Series',
        21 => 'Plate Loaded Y Series',
        22 => 'Plate Loaded M Series',
        23 => 'Plate Loaded D Series',
        24 => 'Test mini sub category', // orphaned old category_id 16 — will not match
    ];

    protected array $unmatched = [];

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');
        $sqlPath = $this->option('sql-file') ?: public_path('products.sql');
        $zipPath = $this->option('images-zip') ?: public_path('products.zip');

        if (! $this->prepareStagingTable($sqlPath)) {
            return self::FAILURE;
        }

        if (! $this->option('skip-images')) {
            $this->extractImages($zipPath);
        }

        // Build name => id lookup maps from the LIVE tables, case-insensitive & trimmed.
        $liveCategories = ProductCategory::pluck('id', 'category_name')
            ->mapWithKeys(fn ($id, $name) => [$this->norm($name) => $id]);

        $liveSubCategories = ProductSubCategory::pluck('id', 'name')
            ->mapWithKeys(fn ($id, $name) => [$this->norm($name) => $id]);

        $liveSubSubCategories = ProductSubSubCategory::pluck('id', 'name')
            ->mapWithKeys(fn ($id, $name) => [$this->norm($name) => $id]);

        $rows = DB::table('old_products')->orderBy('id')->get();
        $this->info("Found {$rows->count()} rows in old_products.");

        $imported = 0;
        $skipped = 0;
        $missingImages = 0;

        foreach ($rows as $row) {
            $categoryName = $this->oldCategories[$row->category_id] ?? null;
            $subCategoryName = $row->subcategory_id ? ($this->oldSubCategories[$row->subcategory_id] ?? null) : null;
            $subSubCategoryName = $row->minisubcat_id ? ($this->oldMiniSubCategories[(int) $row->minisubcat_id] ?? null) : null;

            $newCategoryId = $categoryName ? ($liveCategories[$this->norm($categoryName)] ?? null) : null;
            $newSubCategoryId = $subCategoryName ? ($liveSubCategories[$this->norm($subCategoryName)] ?? null) : null;
            $newSubSubCategoryId = $subSubCategoryName ? ($liveSubSubCategories[$this->norm($subSubCategoryName)] ?? null) : null;

            // Category is required on the new products table — skip if it can't be resolved.
            if (! $newCategoryId) {
                $skipped++;
                $this->unmatched[] = [
                    'old_id' => $row->id,
                    'product_name' => $row->product_name,
                    'reason' => "category '{$categoryName}' (old id {$row->category_id}) not found in product_categories",
                ];
                continue;
            }

            // Sub-category / sub-sub-category are optional — log but don't block the import.
            if ($row->subcategory_id && ! $newSubCategoryId) {
                $this->unmatched[] = [
                    'old_id' => $row->id,
                    'product_name' => $row->product_name,
                    'reason' => "sub-category '{$subCategoryName}' (old id {$row->subcategory_id}) not found in product_sub_categories — imported without it",
                ];
            }

            if ($row->minisubcat_id && ! $newSubSubCategoryId) {
                $this->unmatched[] = [
                    'old_id' => $row->id,
                    'product_name' => $row->product_name,
                    'reason' => "sub-sub-category '{$subSubCategoryName}' (old id {$row->minisubcat_id}) not found in product_sub_sub_categories — imported without it",
                ];
            }

            $imageFilename = trim((string) $row->product_image);

            if ($imageFilename !== '' && ! is_file(public_path('products/' . $imageFilename))) {
                $missingImages++;
                $this->unmatched[] = [
                    'old_id' => $row->id,
                    'product_name' => $row->product_name,
                    'reason' => "image '{$imageFilename}' not found in public/products after extracting products.zip",
                ];
            }

            if ($dryRun) {
                $imported++;
                continue;
            }

            $name = trim($row->product_name);

            Product::create([
                'category_id' => $newCategoryId,
                'sub_cat_id' => $newSubCategoryId,
                'sub_sub_cat_id' => $newSubSubCategoryId,
                'name' => $name,
                'slug' => Product::generateUniqueSlug($name),
                'mrp' => $row->previous_price,
                'discount_type' => null,
                'discount_value' => null,
                'offered_price' => $row->new_price,
                'purchase_price' => null,
                'description' => $row->description,
                'image' => $imageFilename,
                'status' => strtolower(trim($row->status)) === 'active',
                'meta_title' => $row->meta_title,
                'meta_description' => $row->meta_description,
            ]);

            $imported++;
        }

        $this->newLine();
        $this->info(($dryRun ? '[DRY RUN] ' : '') . "Processed: {$imported} importable, {$skipped} skipped (no category match), {$missingImages} with missing image files.");

        if (! empty($this->unmatched)) {
            $this->newLine();
            $this->warn('Unmatched / partial matches / missing images (' . count($this->unmatched) . '):');
            $this->table(['old_id', 'product_name', 'reason'], $this->unmatched);
        }

        return self::SUCCESS;
    }

    /**
     * Load products.sql into a staging table called `old_products`, never touching
     * the live `products` table — even though the dump itself creates/inserts
     * into a table also named `products`.
     *
     * Uses mysqli::multi_query() so MySQL's own parser handles comments, quoted
     * strings, and semicolons — a hand-rolled PHP splitter is too fragile for a
     * real phpMyAdmin dump (comment lines with no trailing `;` glue onto the next
     * statement and easily get misclassified).
     */
    protected function prepareStagingTable(string $sqlPath): bool
    {
        $exists = DB::getSchemaBuilder()->hasTable('old_products');

        if ($exists && ! $this->option('fresh')) {
            $this->info('`old_products` already exists — skipping SQL import (pass --fresh to re-import from products.sql).');
            return true;
        }

        if (! is_file($sqlPath)) {
            $this->error("SQL dump not found at: {$sqlPath}");
            return false;
        }

        if ($exists) {
            DB::statement('DROP TABLE `old_products`');
        }

        $this->info("Importing old_products from {$sqlPath} ...");

        $sql = file_get_contents($sqlPath);

        // Retarget every CREATE/INSERT/ALTER/DROP against `products` to `old_products`,
        // so this dump can never collide with or overwrite the live products table.
        $sql = preg_replace(
            '/\b(CREATE TABLE(?: IF NOT EXISTS)?|INSERT INTO|ALTER TABLE|DROP TABLE(?: IF EXISTS)?)\s+`products`/i',
            '$1 `old_products`',
            $sql
        );

        // Staging table doesn't need to match the original dump's engine.
        $sql = str_replace('ENGINE=MyISAM', 'ENGINE=InnoDB', $sql);

        $config = DB::connection()->getConfig();

        $mysqli = mysqli_init();
        $connected = @$mysqli->real_connect(
            $config['host'] ?? '127.0.0.1',
            $config['username'] ?? null,
            $config['password'] ?? null,
            $config['database'] ?? null,
            isset($config['port']) ? (int) $config['port'] : 3306
        );

        if (! $connected) {
            $this->error('Could not open a mysqli connection to import the dump: ' . mysqli_connect_error());
            return false;
        }

        $mysqli->set_charset($config['charset'] ?? 'utf8mb4');

        $ok = $mysqli->multi_query($sql);

        if (! $ok) {
            $this->error('Failed to import SQL dump: ' . $mysqli->error);
            $mysqli->close();
            return false;
        }

        // multi_query() only reports the FIRST statement's outcome above —
        // we must step through every result set to actually run/flush the rest
        // and catch any error that happens partway through.
        $failure = null;

        do {
            if ($result = $mysqli->store_result()) {
                $result->free();
            }

            if ($mysqli->errno) {
                $failure = $mysqli->error;
                break;
            }
        } while ($mysqli->more_results() && $mysqli->next_result());

        $mysqli->close();

        if ($failure) {
            $this->error('Failed to import SQL dump: ' . $failure);
            return false;
        }

        if (! DB::getSchemaBuilder()->hasTable('old_products')) {
            $this->error('SQL dump ran without error but `old_products` still does not exist — check that products.sql actually contains a CREATE TABLE `products` statement.');
            return false;
        }

        $count = DB::table('old_products')->count();
        $this->info("Staged {$count} rows into old_products.");

        return true;
    }

    /**
     * Extract products.zip (flat, filenames matching product_image) into public/products,
     * without overwriting anything already there.
     */
    protected function extractImages(string $zipPath): void
    {
        if (! is_file($zipPath)) {
            $this->warn("Images zip not found at: {$zipPath} — skipping image extraction.");
            return;
        }

        $destination = public_path('products');

        if (! is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        $zip = new ZipArchive();

        if ($zip->open($zipPath) !== true) {
            $this->warn("Could not open zip at: {$zipPath} — skipping image extraction.");
            return;
        }

        $extracted = 0;
        $skippedExisting = 0;

        for ($i = 0; $i < $zip->numFiles; $i++) {
            $name = $zip->getNameIndex($i);
            $filename = basename($name);

            if ($filename === '' || Str::startsWith($name, '__MACOSX')) {
                continue;
            }

            $targetPath = $destination . DIRECTORY_SEPARATOR . $filename;

            if (is_file($targetPath)) {
                $skippedExisting++;
                continue;
            }

            $stream = $zip->getStream($name);
            if ($stream === false) {
                continue;
            }

            file_put_contents($targetPath, stream_get_contents($stream));
            fclose($stream);
            $extracted++;
        }

        $zip->close();

        $this->info("Images: {$extracted} extracted to public/products, {$skippedExisting} already existed and were left untouched.");
    }

    protected function norm(?string $value): string
    {
        return Str::of($value ?? '')->trim()->lower()->squish()->toString();
    }
}