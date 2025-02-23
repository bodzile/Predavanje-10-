<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetSingleUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-single-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url="https://reqres.in/api/users/2";
        $response=Http::withoutVerifying()->get($url);
        $jsonResponse=$response->body();

        $result=json_decode($jsonResponse,true);
        dd($result["data"]);
    }
}
