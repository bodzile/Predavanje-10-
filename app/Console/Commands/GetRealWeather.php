<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real-weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command gets real weather from api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $key="13e352e92ec44fed80a145531251902";
        $city="Belgrade";
        $url="http://api.weatherapi.com/v1/current.json?key=$key&q=$city";
        $response=Http::withoutVerifying()->get($url);

        $result=json_decode($response->body(),true);
        dd($result["current"]["temp_c"]);
    }
}
