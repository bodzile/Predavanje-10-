<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;

class ForecastController extends Controller
{

    public function index(CityModel $city)
    {
        $forecasts=$city->forecasts;

        return view("5-day-forecast",compact("forecasts"));        
    }
}
