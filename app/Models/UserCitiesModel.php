<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserCitiesModel extends Model
{
    protected $table="user_cities";

    protected $fillable=[
        "user_id","city_id"
    ];

    public function city()
    {
        return $this->hasOne(CityModel::class,"id","city_id");
    }

    
}
