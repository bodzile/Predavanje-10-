<?php

namespace Database\Seeders;

use App\Models\CityTemperatureModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityTemperaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prognoza=[
            "Budimpesta" => 3,
            "Skopje" => 7,
            "Sarajevo" => 5,
        ];

        foreach($prognoza as $city => $temperature)
        {
            CityTemperatureModel::create([
                "city" => $city,
                "temperature" => $temperature
            ]);
        }

    }
}
