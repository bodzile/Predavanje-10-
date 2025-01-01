<?php

namespace App\Http;

class CityHelper
{
    public static function getSelectedIfCityIsOld($city_id,$old_city_id)
    {
        if($city_id==$old_city_id)
        {
            return "selected";
        }
        else
        {
            return "";
        }
    }
}