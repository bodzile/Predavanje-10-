<?php

namespace Database\Seeders;

use App\Models\CityModel;
use App\Models\ForecastModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities=CityModel::all();

        $range = range(-40, 40);

        for($i=0;$i<count($cities);$i++)
        {
            $random = collect($range)->shuffle()->slice(0, 5);
            $int= rand(1262055681,1262055681);
            $date=date("Y-m-d H:i:s",$int);
            for($j=0;$j<5;$j++)
            {
                ForecastModel::create([
                    "city_id" => $cities[$i]->id,
                    "temperature" => $random[$j],
                    "date" => $date
                ]);
            }
        }
    }
}
