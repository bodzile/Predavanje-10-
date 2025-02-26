<?php

namespace App\Http\Controllers;

use App\Console\Commands\AddRealForecast;
use App\Models\CityModel;
use App\Models\ForecastModel;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{

    public function search(Request $request)
    {
        $cityName=$request->get("city");

        $cities=CityModel::with("forecastToday")->where("name","like","%$cityName%")->get();

        //Artisan::call("weather:add-real-forecast",["city" => $cityName]);
        
        if(count($cities) == 0)
        {
            $com=new AddRealForecast();
            
            if($com->handle($cityName))
            {
                $cities=CityModel::with("forecastToday")->where("name","like","%$cityName%")->get();
                //dd($cities);
            }
            else
            {
                return redirect("/");
            }
        }

        $userFavourites=[];
        if(Auth::check())
        {
            $userFavourites=Auth::user()->cityFavourites;
            $userFavourites=$userFavourites->pluck("city_id")->toArray();
        }
        
        return view("search-result",compact("cities","userFavourites"));
    }

}
