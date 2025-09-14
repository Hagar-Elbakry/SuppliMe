<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        User::create([
//            "name"=> "Hagar" ,
//            "email"=> "hagar@gmail.com",
//            "password"=> bcrypt("hagar123"),
//            "role"=> "admin",
//            "salary" => 50000 ,
//        ]);
        User::create([
            "name"=> "Menna" ,
            "email"=> "menna@gmail.com",
            "password"=> bcrypt("menna123"),
            "role"=> "user",
        ]);
        User::create([
            "name"=> "Seif" ,
            "email"=> "seif@gmail.com",
            "password"=> bcrypt("seif123"),
            "role"=> "delivery",
            "salary" => 40000 ,
        ]);
    }
}
