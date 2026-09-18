<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    public function run()
    {
        $path = database_path('data/india_states_cities.json');

        if (!File::exists($path)) {
            $this->command->error("Data file not found: {$path}");
            return;
        }

        $states = json_decode(File::get($path), true);

        // Preload states keyed by code to avoid a query per city
        $stateMap = State::pluck('id', 'code');

        $totalCities = 0;

        foreach ($states as $state) {
            $stateId = $stateMap->get($state['code']);

            if (!$stateId) {
                $this->command->warn("State not found for code {$state['code']}, skipping its cities. Run StateSeeder first.");
                continue;
            }

            foreach ($state['cities'] as $cityName) {
                City::updateOrCreate(
                    [
                        'state_id' => $stateId,
                        'name'     => $cityName,
                    ],
                    [
                        'status' => 1,
                    ]
                );
                $totalCities++;
            }
        }

        $this->command->info("Seeded {$totalCities} cities.");
    }
}