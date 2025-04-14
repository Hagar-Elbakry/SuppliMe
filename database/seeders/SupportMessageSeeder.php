<?php

namespace Database\Seeders;

use App\Models\SupportMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupportMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SupportMessage::create([
            'message' => "I Have a Problem With Reset My Password",
            'user_id' => 2
        ]);
    }
}
