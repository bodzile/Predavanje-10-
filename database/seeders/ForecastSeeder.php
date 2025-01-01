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

        for($i=0;$i<count($cities);$i++)
        {
            for($j=0;$j<5;$j++)
            {
                if($j==0)
                {
                    //samo prva iteracija
                    $temperature=rand(-30,60);
                }
                else
                {
                    $temperature=rand($temperature-5,$temperature+5);
                }

                $weather_type=$this->getWeatherType($temperature);
                $probability=null;
                
                if($weather_type=="rainy" || $weather_type=="snowy" || $weather_type=="cloudy")
                {
                    $probability=rand(0,100);
                }

                ForecastModel::create([
                    "city_id" => $cities[$i]->id,
                    "temperature" => $temperature,
                    "date" => Carbon::now()->addDays($j), //da bi dobili od danas pa narednih 5 dana
                    "weather_type" => $weather_type,
                    "probability" => $probability
                ]);
            }
        }
    }

    private function getWeatherType($temperature)
    {
        $allowed_weathers=[];
        if($temperature < 1)
        {
            $allowed_weathers=["sunny","snowy","cloudy"];
        }
        else if($temperature <= 1 && $temperature > -10)
        {
            $allowed_weathers=["sunny","rainy","snowy","cloudy"];
        }
        else if($temperature <= 15 && $temperature > 1)
        {
            $allowed_weathers=["sunny","rainy","cloudy"];
        }
        else if($temperature > 15)
        {
            $allowed_weathers=["sunny","rainy"];
        }

        //biramo random vreme iz allowed weathers 
        $random_weather=$allowed_weathers[rand(0,count($allowed_weathers)-1)];

        return $random_weather;
    }
}
