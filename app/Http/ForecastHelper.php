<?php

namespace App\Http;

class ForecastHelper
{
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
}