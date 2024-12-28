<?php

namespace Database\Seeders;

use App\Models\CityModel;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount=$this->command->ask("How many cities you want to add?",100);
        $faker=Factory::create();

        $this->command->getOutput()->progressStart($amount);
        for($i=0;$i<$amount;$i++)
        {
            $city=$faker->city();
            $cityObject=CityModel::where(["name" => $city])->first();
            if($cityObject) continue;

            CityModel::create([
                "name" => $city
            ]);

            $this->command->getOutput()->progressAdvance(1);
        }
        $this->command->info("Seeding Successfull");
    }
}
