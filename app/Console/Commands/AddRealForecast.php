<?php

namespace App\Console\Commands;

use App\Models\CityModel;
use App\Models\ForecastModel;
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
        $response=Http::withoutVerifying()->get(env("WEATHER_API_URL") . "v1/forecast.json",[
            "key" => env("WEATHER_API_KEY"),
            "q" => $city,
            "aqi" => "no",
            "days" => 14
            
        ]);

        if(!$response->successful())
        {
            return false;
        }

        $jsonResponse=$response->json();
        $cityObject=CityModel::create([
            "name" => $city
        ]);

        foreach($jsonResponse["forecast"]["forecastday"] as $forecastDay )
        {
            $weather_type="sunny";
            $probability=null;
            if($forecastDay["day"]["daily_will_it_rain"] == 1)
            {
                $weather_type="rainy";
                $probability=$forecastDay["day"]["daily_chance_of_rain"];
            }
            if($forecastDay["day"]["daily_will_it_snow"] == 1)
            {
                $weather_type="snowy";
                $probability=$forecastDay["day"]["daily_chance_of_snow"];
            }
            
            ForecastModel::create([
                "date" => $forecastDay["date"],
                "temperature" => $forecastDay["day"]["avgtemp_c"],
                "city_id" => $cityObject->id,
                "weather_type" => $weather_type,
                "probability" => $probability
            ]);
        }

        return true;
        //dd("uspesno");

    }
}
