<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastModel extends Model
{
    protected $table="forecasts";

    protected $fillable=[
        "temperature","city_id","date","weather_type","probability"
    ];

    public $timestamps=false;

    public function city()
    {
        return $this->hasOne(CityModel::class,"id","city_id");
    }
}
