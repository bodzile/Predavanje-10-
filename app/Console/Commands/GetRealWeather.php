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
    protected $signature = 'weather:get-real-weather {city}';

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

        $response=Http::withoutVerifying()->get(env("WEATHER_API_URL") . "v1/forecast.json",[
            "key" => env("WEATHER_API_KEY"),
            "q" => $this->argument("city"),
            "aqi" => "no",
            "days" => 1
        ]);

        $jsonResponse=$response->json();
        if(isset($jsonResponse["error"]))
        {
            $this->output->error($jsonResponse["error"]["message"]);
            die();
        }

        dd($jsonResponse);
    }
}
