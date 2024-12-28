<?php

namespace Database\Seeders;

use App\Models\CityTemperatureModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city=$this->command->ask("Enter city: ");
        $temperature=$this->command->ask("Enter temperature: ");

        if($city!=null && $temperature!=null)
        {
            CityTemperatureModel::create([
                "city" => $city,
                "temperature" => $temperature
            ]);
        }
        else
        {
            $this->command->error("You must enter all data");
        }
    }
}
