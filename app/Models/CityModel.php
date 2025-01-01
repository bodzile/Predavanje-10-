<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $table="cities";
    protected $fillable=[
        "name"
    ];

    public function cityTemperature()
    {
        return $this->belongsTo(CityTemperatureModel::class);
    }

    public function forecasts()
    {
        return $this->hasMany(ForecastModel::class,"city_id","id")->orderBy("date","asc");
    }

}
