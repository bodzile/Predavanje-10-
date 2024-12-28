<?php

namespace App\Http\Controllers;

use App\Models\CityTemperatureModel;
use Illuminate\Http\Request;

class CityTemperatureController extends Controller
{
    public function index()
    {
        $weather=CityTemperatureModel::all();
        return view("weather-cast",compact("weather"));
    }

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

    public function allCities()
    {
        $cities=CityTemperatureModel::all();

        return view("all-cities",compact("cities"));
    }

    public function deleteCity(Request $request,CityTemperatureModel $city)
    {
        $city->delete();

        return redirect()->back();
    }

    public function editCity(Request $request,CityTemperatureModel $cityObject)
    {
        return view("edit-city",compact("cityObject"));
    }

    public function saveUpdatedCity(Request $request,CityTemperatureModel $cityObject)
    {
        $request->validate([
            "city" => "required",
            "temperature" => "required|numeric"
        ]);

        $cityObject->city=$request->get("city");
        $cityObject->temperature=$request->get("temperature");
        $cityObject->save();

        return redirect(route("city.allCities"));
    }

    

}
