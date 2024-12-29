<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityTemperatureModel extends Model
{
    protected $table="city_temperatures";

    protected $fillable=[
        "city_id","temperature"
    ];
}
