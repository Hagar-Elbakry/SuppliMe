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
            'description' => 'Edible, juicy plant products, typically sweet or tart, rich in vitamins, fiber, and antioxidants.',
            'image'=>'./images/categories/fruits.png',
        ]);

        Category::create([
            'name' => 'Vegetables',
            'description' => 'Edible plant parts, often savory, packed with nutrients like vitamins, minerals, and fiber.',
            'image'=>'./images/categories/vegetables.png',
        ]);

        Category::create([
            'name' => 'Drinks',
            'description' => 'Liquid beverages for hydration or enjoyment, ranging from water and juices to sodas, teas, coffees, and alcoholic options.',
            'image'=>'./images/categories/drinks.png',
            'color' => 'fre-veg'
        ]);

        Category::create([
            'name' => 'Dry fruit',
            'description' => 'Dehydrated fruits or nuts, nutrient-dense with concentrated flavors, often used in snacks or cooking',
            'image'=>'./images/categories/dryfruit.png',
        ]);

        Category::create([
            'name' => 'Oil',
            'description' => 'Liquid fat used for cooking, frying, or dressing, derived from plants (e.g., olive, sunflower) or animals',
            'image'=>'./images/categories/oil.png',
        ]);

        Category::create([
            'name' => 'Bakery Items',
            'description' => 'Freshly prepared or packaged edible goods made from flour, sugar, and other ingredients, typically baked in an oven. They are often enjoyed as breakfast, snacks, or desserts',
            'image'=>'./images/categories/bakeryitems.png',
            'color' => 'fre-fru'
        ]);

        Category::create([
            'name' => 'Milk Shake',
            'description' => 'Creamy beverages made by blending milk, ice cream, and flavorings like chocolate, vanilla, or fruit, often topped with whipped cream.',
            'image'=>'./images/categories/milkshake.png',
            'color' => 'fre-veg'
        ]);

        Category::create([
            'name' => 'Detergents',
            'description' => 'Cleaning agents, typically synthetic, used for laundry, dishwashing, or surface cleaning, designed to remove dirt and stains.',
            'image'=>'./images/categories/detergents.png',
            'color' => 'fre-fru'
        ]);

        Category::create([
            'name' => 'Milk & Eggs',
            'description' => 'Nutrient-rich liquid produced by mammals, commonly cow’s milk, used for drinking, cooking, or making dairy products',
            'image'=>'./images/categories/milkandeggs.png',
        ]);
    }
}
