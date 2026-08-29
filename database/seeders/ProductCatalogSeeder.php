<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductSubSubCategory;
use Illuminate\Database\Seeder;

class ProductCatalogSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = [
            'Commercial Equipment' => [
                'short_description' => 'Fitness equipment built for professional gyms, hotels and clubs.',
                'sub_categories' => [
                    'Cardio Equipment' => [
                        'short_description' => 'Treadmills, exercise bikes, cross trainers and other cardio machines.',
                        'sub_sub_categories' => ['Treadmills', 'Exercise Bikes', 'Cross Trainers'],
                    ],
                    'Strength Equipment' => [
                        'short_description' => 'Multi-station, cable, selectorized and plate-loaded machines.',
                        'sub_sub_categories' => ['Multi-Station Machines', 'Cable Machines', 'Plate-Loaded Machines'],
                    ],
                    'Free Weights' => [
                        'short_description' => 'Dumbbells, barbells, weight plates and essential training accessories.',
                        'sub_sub_categories' => ['Dumbbells', 'Barbells', 'Weight Plates'],
                    ],
                    'Functional Training' => [
                        'short_description' => 'Functional trainers, rigs, racks and equipment for versatile workouts.',
                        'sub_sub_categories' => ['Functional Trainers', 'Rigs', 'Racks'],
                    ],
                ],
            ],
            'Home Equipment' => [
                'short_description' => 'Practical fitness equipment designed for home workout spaces.',
                'sub_categories' => [
                    'Home Cardio' => [
                        'short_description' => 'Treadmills, bikes, cross trainers and compact cardio machines.',
                        'sub_sub_categories' => ['Compact Treadmills', 'Home Bikes'],
                    ],
                    'Home Strength' => [
                        'short_description' => 'Multi-functional and space-efficient strength training equipment.',
                        'sub_sub_categories' => ['All-in-One Trainers', 'Adjustable Benches'],
                    ],
                    'Free Weights' => [
                        'short_description' => 'Dumbbells, plates, benches and essential home workout accessories.',
                        'sub_sub_categories' => ['Dumbbell Sets', 'Weight Benches'],
                    ],
                    'Compact Fitness' => [
                        'short_description' => 'Practical equipment designed for smaller home workout spaces.',
                        'sub_sub_categories' => ['Foldable Equipment', 'Resistance Bands'],
                    ],
                ],
            ],
        ];

        foreach ($catalog as $categoryName => $categoryData) {
            $category = ProductCategory::create([
                'category_name'      => $categoryName,
                'slug'                => ProductCategory::generateUniqueSlug($categoryName),
                'short_description'  => $categoryData['short_description'],
                'status'              => true,
            ]);

            foreach ($categoryData['sub_categories'] as $subName => $subData) {
                $subCategory = ProductSubCategory::create([
                    'category_id'        => $category->id,
                    'name'                => $subName,
                    'slug'                => ProductSubCategory::generateUniqueSlug($subName),
                    'short_description'  => $subData['short_description'],
                    'status'              => true,
                ]);

                foreach ($subData['sub_sub_categories'] as $subSubName) {
                    ProductSubSubCategory::create([
                        'category_id'     => $category->id,
                        'sub_category_id' => $subCategory->id,
                        'name'             => $subSubName,
                        'slug'             => ProductSubSubCategory::generateUniqueSlug($subSubName),
                        'status'           => true,
                    ]);
                }
            }
        }
    }
}