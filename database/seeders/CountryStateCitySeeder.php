<?php

namespace Database\Seeders;

use App\Models\Region\City;
use App\Models\Region\Country;
use App\Models\Region\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryStateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Country::count() > 0) {
            $this->command->info('Countries already seeded. Skipping CountryStateCitySeeder.');
            return;
        }    

        $jsonPath = database_path('data/countries_states_cities.json');

        $jsonData = file_get_contents($jsonPath);
        $data = json_decode($jsonData, true);

        if (!$data) {
            $this->command->error("Invalid JSON data or file not found: {$jsonPath}");
            return;
        }

        foreach ($data as $countryData) {
            $country = Country::create([
                'name' => $countryData['name'],
                'alpha2Code' => $countryData['iso2'],
                'alpha3Code' => $countryData['iso3'],
                'dialCode' => $countryData['phonecode'],
                'currency' => $countryData['currency'],
                'currencySymbol' => $countryData['currency_symbol'],
            ]);

            foreach ($countryData['states'] as $stateData) {
                $state = State::create([
                    'name'       => $stateData['name'],
                    'code'       => $stateData['state_code'],
                    'latitude'       => $stateData['latitude'],
                    'longitude'       => $stateData['longitude'],
                    'type'       => $stateData['type'],
                    'country_id' => $country->id,
                ]);

                foreach ($stateData['cities'] as $cityData) {
                    City::create([
                        'name'     => $cityData['name'],
                        'latitude'     => $cityData['latitude'],
                        'longitude'     => $cityData['longitude'],
                        'state_id' => $state->id,
                    ]);
                }
            }
        }
        $this->command->info('Countries, states, and cities seeded successfully!');
    }
}
