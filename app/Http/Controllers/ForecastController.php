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

    public function forecastEntry()
    {
        $cities=CityModel::all();

        return view("admin.forecast",compact("cities"));
    }


    public function addForecast(Request $request)
    {
        $request->validate([
            "temperature" => "required|numeric",
            "city_id" => "required",
            "weather_type" => "required",
            "date" => "required"
        ]);

        ForecastModel::create([
            "temperature" => $request->get("temperature"),
            "city_id" => $request->get("city_id"),
            "weather_type" => $request->get("weather_type"),
            "probability" => $request->get("probability"),
            "date" => $request->get("date")
        ]);

        return redirect()->back();
    }

}
