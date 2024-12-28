<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastModel extends Model
{
    protected $table="forecasts";

    protected $fillable=[
        "temperature","city_id","date"
    ];

    public $timestamps=false;
}
