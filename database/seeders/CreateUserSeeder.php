<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email=$this->command->getOutput()->ask("Enter email: ");
        $name=$this->command->getOutput()->ask("Enter name: ");
        $password=$this->command->getOutput()->ask("Enter password");

        if($email===null)
        {
            $this->command->error("You didn't enter email");
            return;
        }
        if($name===null)
        {
            $this->command->error("You didn't enter name");
            return;
        }
        if($password===null)
        {
            $this->command->error("You didn't enter password");
            return;
        }

        $user=User::where(["email" => $email])->first();
        if($user!=null)
        {
            $this->command->error("User with this email already exist");
            return;
        }

        User::create([
            "email" => $email,
            "name" => $name,
            "password" => Hash::make($password)
        ]);

        $this->command->info("Added user with following parameters:\nName: $name \nEmail: $email \npassword: $password");
    }
}
