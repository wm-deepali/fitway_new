<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StateSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('data/india_states_cities.json');

        if (!File::exists($path)) {
            $this->command->error("Data file not found: {$path}");
            return;
        }

        $states = json_decode(File::get($path), true);

        foreach ($states as $state) {
            State::updateOrCreate(
                ['code' => $state['code']],
                [
                    'name'   => $state['name'],
                    'status' => 1,
                ]
            );
        }

        $this->command->info('Seeded ' . count($states) . ' states/UTs.');
    }
}