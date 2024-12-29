<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityTemperatureModel extends Model
{
    protected $table="city_temperatures";

    protected $fillable=[
        "city_id","temperature"
    ];

    public function city()
    {
        return $this->hasOne(CityModel::class,"id","city_id");
    }
}
