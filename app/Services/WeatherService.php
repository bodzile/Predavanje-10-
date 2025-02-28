<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService{

    public function getForecast($city)
    {
        $response=Http::withoutVerifying()->get(env("WEATHER_API_URL") . "v1/forecast.json",[
            "key" => env("WEATHER_API_KEY"),
            "q" => $city,
            "aqi" => "no",
            "days" => 14
            
        ]);

        return $response->json();
    }

    public function getAstronomy($city)
    {
        $response=Http::withoutVerifying()->get(env("WEATHER_API_URL") . "v1/astronomy.json",[
            "key" => env("WEATHER_API_KEY"),
            "q" => $city,
            "aqi" => "no"
        ]);

        return $response->json();
    }

}