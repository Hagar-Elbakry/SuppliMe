<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GovernoratesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Governorate::create([
            'name' => 'Cairo',
            'shipping_cost' => 40,
        ]);

        Governorate::create([
            'name' => 'Giza',
            'shipping_cost' => 35,
        ]);

        Governorate::create([
            'name' => 'Alexandria',
            'shipping_cost' => 45,
        ]);

        Governorate::create([
            'name' => 'Dakahlia',
            'shipping_cost' => 50,
        ]);

        Governorate::create([
            'name' => 'Red Sea',
            'shipping_cost' => 70,
        ]);

        Governorate::create([
            'name' => 'Beheira',
            'shipping_cost' => 55,
        ]);

        Governorate::create([
            'name' => 'Fayoum',
            'shipping_cost' => 45,
        ]);

        Governorate::create([
            'name' => 'Gharbia',
            'shipping_cost' => 50,
        ]);

        Governorate::create([
            'name' => 'Ismailia',
            'shipping_cost' => 45,
        ]);

        Governorate::create([
            'name' => 'Menofia',
            'shipping_cost' => 50,
        ]);

        Governorate::create([
            'name' => 'Minya',
            'shipping_cost' => 60,
        ]);

        Governorate::create([
            'name' => 'Qaliubiya',
            'shipping_cost' => 40,
        ]);

        Governorate::create([
            'name' => 'New Valley',
            'shipping_cost' => 80,
        ]);

        Governorate::create([
            'name' => 'Suez',
            'shipping_cost' => 50,
        ]);

        Governorate::create([
            'name' => 'Aswan',
            'shipping_cost' => 85,
        ]);

        Governorate::create([
            'name' => 'Assiut',
            'shipping_cost' => 70,
        ]);

        Governorate::create([
            'name' => 'Beni Suef',
            'shipping_cost' => 55,
        ]);

        Governorate::create([
            'name' => 'Port Said',
            'shipping_cost' => 50,
        ]);

        Governorate::create([
            'name' => 'Damietta',
            'shipping_cost' => 55,
        ]);

        Governorate::create([
            'name' => 'Sharkia',
            'shipping_cost' => 50,
        ]);

        Governorate::create([
            'name' => 'South Sinai',
            'shipping_cost' => 90,
        ]);

        Governorate::create([
            'name' => 'Kafr El Sheikh',
            'shipping_cost' => 55,
        ]);

        Governorate::create([
            'name' => 'Matrouh',
            'shipping_cost' => 95,
        ]);

        Governorate::create([
            'name' => 'Luxor',
            'shipping_cost' => 85,
        ]);

        Governorate::create([
            'name' => 'Qena',
            'shipping_cost' => 75,
        ]);

        Governorate::create([
            'name' => 'North Sinai',
            'shipping_cost' => 90,
        ]);

        Governorate::create([
            'name' => 'Sohag',
            'shipping_cost' => 70,
        ]);
    }
}
