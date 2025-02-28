<?php

namespace App\Console\Commands;

use App\Models\CityModel;
use App\Models\ForecastModel;
use App\Services\WeatherService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class AddRealForecast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:add-real-forecast';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Adds new forecast and city in database if it's not in database";

    /**
     * Execute the console command.
     */
    public function handle(string $city)
    {
        
        $weatherService=new WeatherService();
        $jsonResponse=$weatherService->getForecast($city);

        if(isset($jsonResponse["error"]))
        {
            return false;
        }

        
        $cityObject=CityModel::create([
            "name" => $city
        ]);

        foreach($jsonResponse["forecast"]["forecastday"] as $forecastDayArray )
        {
            $forecastDay=$forecastDayArray["day"];
            $weather_type="sunny";
            $probability=null;

            if($forecastDay["daily_will_it_rain"] == 1)
            {
                $weather_type="rainy";
                $probability=$forecastDay["daily_chance_of_rain"];
            }
            if($forecastDay["daily_will_it_snow"] == 1)
            {
                $weather_type="snowy";
                $probability=$forecastDay["daily_chance_of_snow"];
            }
            
            ForecastModel::create([
                "date" => $forecastDayArray["date"],
                "temperature" => $forecastDay["avgtemp_c"],
                "city_id" => $cityObject->id,
                "weather_type" => $weather_type,
                "probability" => $probability
            ]);
        }

        return true;
    }
}
