<?php

namespace Database\Seeders;

use App\Models\CityModel;
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
        $cities=CityModel::all();

        foreach($cities as $city)
        {
            $weather=CityTemperatureModel::where(["city_id" => $city->id])->first();
            if($weather instanceof CityTemperatureModel)
            {
                $this->command->error("Grad: $city vec postoji");
                continue;
            }
            CityTemperatureModel::create([
                "city_id" => $city->id,
                "temperature" => rand(15,25)
            ]);
        }
    }
}
