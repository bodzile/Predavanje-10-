<?php

namespace App\Http;

class ForecastHelper
{
    const WEATHER_TYPE=[
        "sunny" => "<i class='fa-solid fa-sun fa-lg'></i>",
        "rainy" => "<i class='fa-solid fa-cloud-rain fa-lg'></i>",
        "snowy" => "<i class='fa-solid fa-snowflake fa-lg'></i>",
        "cloudy" => "<i class='fa-solid fa-cloud fa-lg'></i>"
    ];

    public static function getColorByTemperature($temperature)
    {
        if($temperature <= 0)
            $color="lightblue";
        else if($temperature >= 1 && $temperature <= 15)
            $color="blue";
        else if($temperature >15 && $temperature <= 25)
            $color="green";
        else
            $color="red";

        return $color;
    }

    public static function getProbabilityText($weather_type,$probability)
    {
        if($weather_type != "sunny")
            $probability="($probability%)";
        else
            $probability="";

        return $probability;
    }

    public static function getWeatherIconTag($weather_type)
    {
        return $icon=match($weather_type){
            "sunny" => "<i class='fa-solid fa-sun fa-lg'></i>",
            "rainy" => "<i class='fa-solid fa-cloud-rain fa-lg'></i>",
            "snowy" => "<i class='fa-solid fa-snowflake fa-lg'></i>",
            "cloudy" => "<i class='fa-solid fa-cloud fa-lg'></i>",
            default => "<i class='fa-solid fa-sun fa-lg'></i>"
        };

        //return self::WEATHER_TYPE[$weather_type];
    }

    public static function getWeatherIconTagByCityId($foreacasts)
    {
        
    }
}