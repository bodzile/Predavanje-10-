<?php

namespace Database\Seeders;

use App\Models\CityModel;
use App\Models\ForecastModel;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('forecasts')->truncate();
        $cities=CityModel::all();
        $weathers=[
            "sunny","rainy","snowy"
        ];

        for($i=0;$i<count($cities);$i++)
        {
            for($j=0;$j<5;$j++)
            {
                $probability=null;
                $weather_type=$weathers[rand(0,2)];
                if($weather_type=="rainy" || $weather_type=="snowy")
                {
                    $probability=rand(0,100);
                }
                ForecastModel::create([
                    "city_id" => $cities[$i]->id,
                    "temperature" => rand(15,30),
                    "date" => Carbon::now()->addDays(rand(1,30)),
                    "weather_type" => $weather_type,
                    "probability" => $probability
                ]);
            }
        }
    }
}
