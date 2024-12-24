<?php

namespace App\Http\Controllers;

use App\Models\CityTemperatureModel;
use Illuminate\Http\Request;

class CityTemperatureController extends Controller
{
    
    public function addCity(Request $request)
    {
        $request->validate([
            "city" => "required|unique:city_temperatures",
            "temperature" => "required|numeric"
        ]);

        CityTemperatureModel::create([
            "city" => $request->get("city"),
            "temperature" => $request->get("temperature")
        ]);

        return redirect()->back();
    }

}