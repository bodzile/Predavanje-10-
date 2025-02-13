<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\ForecastModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{

    public function search(Request $request)
    {
        $cityName=$request->get("city");

        $cities=CityModel::with("forecastToday")->where("name","like","%$cityName%")->get();
        
        if(count($cities) == 0)
        {
            return redirect()->back()->with("error","Ne postoji grad");
        }

        if(Auth::check())
        {
            $userFavourites=Auth::user()->cityFavourites;
            $userFavourites=$userFavourites->pluck("city_id")->toArray();
        }
        else
        {
            $userFavourites=[];
        }
        
        
        return view("search-result",compact("cities","userFavourites"));
    }

}
