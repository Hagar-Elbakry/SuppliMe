<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notification::create([
            'user_id' => 2 ,
            'message' => 'Your order has been shipped.',
            'created_at' => now()->subDays(1),
            'updated_at' => now()->subDays(1)
        ]);

        Notification::create([
            'user_id' => 2 ,
            'message' => 'Your order has been delivered.',
        ]);
    }
}
