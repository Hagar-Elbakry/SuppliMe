<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Watermelon',
            'image' => './images/products/watermelon.png',
            'price' => 20,
            'weight' => 500,
            'stock_quantity' => 5,
            'description' => 'A large, juicy fruit with a green rind and sweet red (or yellow) flesh, rich in hydration, vitamins A & C, and antioxidants. Typically consumed fresh, in salads, or as juice.',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'banana',
            'image' => './images/products/banana.png',
            'price' => 10,
            'weight' => 100,
            'stock_quantity' => 10,
            'description' => 'A curved, yellow tropical fruit with soft, sweet flesh rich in potassium, fiber, and vitamins B6 & C. Commonly eaten fresh, in smoothies, or as a cooking ingredient.',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'guava',
            'image' => './images/products/guava.png',
            'price' => 15,
            'weight' => 50,
            'stock_quantity' => 20,
            'description' => 'A tropical fruit with green or yellow skin and pink/white flesh, known for its sweet-tart flavor and aromatic fragrance. High in vitamin C, fiber, and antioxidants. Consumed fresh, juiced, or in jams and desserts.',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'kiwi',
            'image' => './images/products/kiwi.png',
            'price' => 10,
            'weight' => 20,
            'stock_quantity' => 30,
            'description' => 'A small, oval fruit with fuzzy brown skin and vibrant green (or golden) flesh, dotted with tiny black seeds. Sweet-tart flavor with high vitamin C, fiber, and antioxidants. Eaten fresh, in salads, smoothies, or as garnish.',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'plum',
            'image' => './images/products/plum.png',
            'price' => 10,
            'weight' => 20,
            'stock_quantity' => 30,
            'description' => 'A small, round fruit with smooth skin in shades of red, purple, yellow, or green. Juicy, sweet-tart flesh with a single hard pit. Rich in vitamins A, C, and fiber. Consumed fresh, dried (prunes), or in jams and desserts.',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'pomegranate',
            'image' => './images/products/pomegranate.png',
            'price' => 10,
            'weight' => 20,
            'stock_quantity' => 30,
            'description' => 'A round, thick-skinned fruit with a vibrant red exterior containing hundreds of juicy arils (seed sacs). Known for its sweet-tart flavor and exceptional antioxidant properties. High in vitamin C, K, and fiber. Commonly consumed fresh, juiced, or as a garnish.',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Cabbage',
            'image' => './images/products/cabbage.png',
            'price' => 20,
            'weight' => 500,
            'stock_quantity' => 5,
            'description' => 'A leafy green, red, or white biennial vegetable with tightly packed layers of leaves. Crisp texture with a mildly peppery flavor when raw, becoming sweeter when cooked. Rich in vitamins C, K, and fiber. Used raw in salads, fermented (sauerkraut/kimchi), or cooked in soups/stir-fries.',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Cucumber',
            'image' => './images/products/cucumber.png',
            'price' => 20,
            'weight' => 500,
            'stock_quantity' => 5,
            'description' => 'A long, cylindrical fruit (botanically) with dark green skin, crisp flesh, and high water content. Mild, refreshing flavor. Commonly eaten raw in salads, pickled, or as a hydrating snack. Rich in vitamin K, potassium, and antioxidants.',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Eggplant',
            'image' => './images/products/eggplant.png',
            'price' => 20,
            'weight' => 500,
            'stock_quantity' => 5,
            'description' => 'A glossy, purple-skinned vegetable (botanically a berry) with spongy, cream-colored flesh. Mild, slightly bitter flavor that becomes rich and creamy when cooked. Used in global cuisines (e.g., baba ganoush, ratatouille, stir-fries). High in fiber, antioxidants (nasunin), and low in calories.',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Green Bells Peppers',
            'image' => './images/products/greenbellpeppers.png',
            'price' => 20,
            'weight' => 500,
            'stock_quantity' => 5,
            'description' => 'A crisp, mildly bitter pepper with a hollow interior and glossy green skin. Technically an unripe version of colored bell peppers, offering a grassier flavor. Versatile in raw and cooked dishes. Excellent source of vitamin C (higher than oranges) and fiber.',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Onion',
            'image' => './images/products/onion.png',
            'price' => 20,
            'weight' => 500,
            'stock_quantity' => 5,
            'description' => 'A bulbous root vegetable with papery outer skin and layered, juicy flesh. Pungent when raw, sweet and savory when cooked. Essential flavor base for global cuisines. Contains sulfur compounds (allicin) with proven health benefits.',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Tomato',
            'image' => './images/products/tomato.png',
            'price' => 20,
            'weight' => 500,
            'stock_quantity' => 5,
            'description' => 'A glossy, fleshy berry with thin skin, juicy pulp, and edible seeds. Ranges from sweet to tangy in flavor. Versatile ingredient used raw or cooked in virtually all global cuisines. Rich in lycopene (antioxidant) and vitamin C.',
            'category_id' => 2,
        ]);

    }
}
