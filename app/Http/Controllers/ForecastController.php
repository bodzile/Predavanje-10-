<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForecastController extends Controller
{

    public function index($city)
    {
        $cities=[
            "beograd" => [22,24,25,20,18],
            "barajevo" => [20,24,22,22,25]  
        ];

        $city=strtolower($city);

        if(array_key_exists($city,$cities))
        {
            $allCities=$cities[$city];
            return view("5-day-forecast",compact(["city","allCities"]));
        }
        else
        {
            dd("Grad ne postoji");
        }
    }
}
