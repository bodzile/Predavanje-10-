<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user';

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
        $url="https://reqres.in/api/users";
        $response=Http::withoutVerifying()->post($url,[
            "name" => "Bogi",
            "job" => "developer"
        ]);

        dd($response->json());
    }
}
