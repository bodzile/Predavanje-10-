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
        return view("admin.edit-city",compact("cityObject"));
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
