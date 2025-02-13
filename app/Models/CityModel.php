<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function forecastToday()
    {
        return $this->hasOne(ForecastModel::class,"city_id","id")
            ->whereDate("date",Carbon::now());
    }

}
