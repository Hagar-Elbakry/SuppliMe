<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Fruits',
            'image'=>'./images/categories/fruits.png',
        ]);

        Category::create([
            'name' => 'Vegetables',
            'image'=>'./images/categories/vegetables.png',
        ]);

        Category::create([
            'name' => 'Drinks',
            'image'=>'./images/categories/drinks.png',
        ]);

        Category::create([
            'name' => 'Dry fruit',
            'image'=>'./images/categories/dryfruit.png',
        ]);

        Category::create([
            'name' => 'Oil',
            'image'=>'./images/categories/oil.png',
        ]);

        Category::create([
            'name' => 'Bakery Items',
            'image'=>'./images/categories/bakeryitems.png',
        ]);

        Category::create([
            'name' => 'Milk Shake',
            'image'=>'./images/categories/milkshake.png',
        ]);

        Category::create([
            'name' => 'Detergents',
            'image'=>'./images/categories/detergents.png',
        ]);

        Category::create([
            'name' => 'Milk & Eggs',
            'image'=>'./images/categories/milkandeggs.png',
        ]);
    }
}
