<?php

namespace App\Http\Controllers;

use App\Models\CityModel;
use App\Models\UserCitiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favourite(Request $request,CityModel $city)
    {
        $user=Auth::user();

        if($user==null)
        {
            return redirect()->back()->with("error","Morate se ulogovati");
        }

        $query=UserCitiesModel::where(["user_id" => $user->id, "city_id" => $city->id])->get();
        if(count($query)==0)
        {
            UserCitiesModel::create([
                "user_id" => $user->id,
                "city_id" => $city->id
            ]);
            return redirect()->back();
        }
        else
        {
            return redirect()->back()->with("error","Vec ste dodali ovaj grad u favourites");
        }
    }

    public function deleteFavourite(Request $request,CityModel $city)
    {
        $userCity=UserCitiesModel::where(["user_id" => Auth::user()->id, "city_id" => $city->id])->first();
        if(!$userCity)
        {
            return redirect()->back()->with("error","Grad se nalazi u listi favorites");
        }

        $userCity->delete();
        return redirect()->back();
    }
}
