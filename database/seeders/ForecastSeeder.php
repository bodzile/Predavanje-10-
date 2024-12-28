<?php

namespace Database\Seeders;

use App\Models\CityModel;
use App\Models\ForecastModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('forecasts')->truncate();
        $cities=CityModel::all();

        $range = range(-40, 40);

        for($i=0;$i<count($cities);$i++)
        {
            $random = collect($range)->shuffle()->slice(0, 5);
            for($j=0;$j<5;$j++)
            {
                $int= rand(126242352,9936242352);
                $date=date("Y-m-d H:i:s",$int);
                ForecastModel::create([
                    "city_id" => $cities[$i]->id,
                    "temperature" => $random[$j],
                    "date" => $date
                ]);
            }
        }
    }
}
