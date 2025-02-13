<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\CityTemperatureModel;
use Illuminate\Http\Request;

class CityTemperatureController extends Controller
{
    public function index()
    {
        $weathers=CityTemperatureModel::with("city")->get();
        return view("weather-cast",compact("weathers"));
    }

    public function addCityEntry()
    {
        $cities=CityModel::all();
        return view("admin.add-city",compact("cities"));
    }

    public function addCity(Request $request)
    {
        $request->validate([
            "city" => "required|numeric|min:1",
            "temperature" => "required|numeric"
        ]);

        CityTemperatureModel::create([
            "city_id" => $request->get("city"),
            "temperature" => $request->get("temperature")
        ]);

        return redirect()->back();
    }

    public function allCities()
    {
        $cities=CityTemperatureModel::all();

        return view("admin.all-cities",compact("cities"));
    }

    public function deleteCity(Request $request,CityTemperatureModel $city)
    {
        $city->delete();

        return redirect()->back();
    }

    public function editCity(Request $request,CityTemperatureModel $cityObject)
    {
        $cities=CityModel::all();
        return view("admin.edit-city",compact("cityObject","cities"));
    }

    public function saveUpdatedCity(Request $request,CityTemperatureModel $cityObject)
    {
        $request->validate([
            "city_id" => "required|numeric|min:1",
            "temperature" => "required|numeric"
        ]);

        $cityObject->city_id=$request->get("city_id");
        $cityObject->temperature=$request->get("temperature");
        $cityObject->save();

        return redirect(route("city.allCities"));
    }

    

}
