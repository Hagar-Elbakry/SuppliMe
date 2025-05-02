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
            'is_featured' => true
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
            'is_featured' => true
        ]);

        Product::create([
            'name' => 'kiwi',
            'image' => './images/products/kiwi.png',
            'price' => 10,
            'weight' => 20,
            'stock_quantity' => 30,
            'description' => 'A small, oval fruit with fuzzy brown skin and vibrant green (or golden) flesh, dotted with tiny black seeds. Sweet-tart flavor with high vitamin C, fiber, and antioxidants. Eaten fresh, in salads, smoothies, or as garnish.',
            'category_id' => 1,
            'is_featured' => true
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
            'is_featured' => true
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
            'is_featured' => true
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

        Product::create([
            'name' => 'Apple Juice',
            'image' => './images/products/applejuice.png',
            'price' => 20,
            'weight' => 10,
            'stock_quantity' => 20,
            'description' => 'A sweet, refreshing juice made from pressed apples, available in clear (filtered) or cloudy (unfiltered) varieties. Naturally high in sugars and vitamin C, with a balanced sweet-tart flavor profile. Commonly consumed as a beverage, used in cooking, or as a mixer in cocktails.',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Orange Juice',
            'image' => './images/products/orangejuice.png',
            'price' => 20,
            'weight' => 10,
            'stock_quantity' => 20,
            'description' => 'A tangy, sweet, and vitamin-rich juice extracted from pressed oranges, available in various forms (fresh, concentrated, or fortified). Known for its high vitamin C content and refreshing taste, widely consumed as a breakfast staple or health drink.',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Mango Juice',
            'image' => './images/products/mangojuice.png',
            'price' => 20,
            'weight' => 10,
            'stock_quantity' => 20,
            'description' => 'A rich, tropical juice made from pureed or pressed mango pulp, known for its vibrant orange color, creamy texture, and sweet, fruity flavor with subtle tartness. A popular thirst-quencher and immunity booster, high in vitamins A and C.',
            'category_id' => 3,
            'is_featured' => true
        ]);


        Product::create([
            'name' => 'Pineapple Juice',
            'image' => './images/products/pineapplejuice.png',
            'price' => 20,
            'weight' => 10,
            'stock_quantity' => 20,
            'description' => 'A tropical, sweet-tart juice extracted from pressed pineapples, known for its vibrant golden color and refreshing flavor. Naturally contains bromelain (a digestive enzyme) and is rich in vitamin C. Enjoyed as a standalone drink, mixer, or culinary ingredient.',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Diet Cola',
            'image' => './images/products/dietcola.png',
            'price' => 20,
            'weight' => 10,
            'stock_quantity' => 20,
            'description' => 'A sugar-free, low-calorie carbonated cola beverage that mimics the classic cola flavor using artificial sweeteners. Designed for calorie-conscious consumers and diabetics, offering the same fizzy satisfaction as regular cola without sugar.',
            'category_id' => 3,
            'is_featured' => true
        ]);

        Product::create([
            'name' => 'Cocktail Juice',
            'image' => './images/products/cocktailjuice.png',
            'price' => 20,
            'weight' => 10,
            'stock_quantity' => 20,
            'description' => 'A vibrant blend of multiple fruit juices (typically tropical or citrus-based) designed specifically for cocktail mixing or standalone consumption. Offers balanced sweetness and acidity to complement spirits while delivering authentic fruit flavors.',
            'category_id' => 3,
        ]);
        Product::create([
            'name' => 'Almonds',
            'image' => './images/products/Almonds.png',
            'price' => 200,
            'weight' => 100,
            'stock_quantity' => 20,
            'description' => 'Premium quality almonds, rich in healthy fats, protein, and vitamin E. Perfect for snacking, baking, or adding to your favorite recipes.',
            'category_id' => 4,
        ]);
        Product::create([
            'name' => 'Pistachios',
            'image' => './images/products/pistachios.png',
            'price' => 300,
            'weight' => 100,
            'stock_quantity' => 50,
            'description' => 'Delicious and nutritious pistachios, packed with antioxidants, fiber, and essential minerals. Ideal as a tasty snack or a healthy topping.',
            'category_id' => 4,
        ]);
        Product::create([
            'name' => 'Raisins',
            'image' => './images/products/raisins.png',
            'price' => 150,
            'weight' => 80,
            'stock_quantity' => 150,
            'description' => 'Sweet and juicy raisins, made from dried grapes, offering a natural source of energy, iron, and potassium. Great for snacking or mixing into cereals and desserts.',
            'category_id' => 4,
        ]);
        Product::create([
            'name' => 'Cashews',
            'image' => './images/products/cashews.png',
            'price' => 150,
            'weight' => 80,
            'stock_quantity' => 150,
            'description' => 'Creamy and buttery cashews, loaded with heart-healthy monounsaturated fats and magnesium. Enjoy them roasted or raw as a delightful snack.',
            'category_id' => 4,
        ]);
        Product::create([
            'name' => 'Figs',
            'image' => './images/products/figs.png',
            'price' => 400,
            'weight' => 100,
            'stock_quantity' => 150,
            'description' => 'Naturally sweet dried figs, rich in fiber, calcium, and antioxidants. Perfect for a healthy snack or as an ingredient in salads and baked goods.',
            'category_id' => 4,
        ]);
        Product::create([
            'name' => 'Walnuts',
            'image' => './images/products/walnuts.png',
            'price' => 150,
            'weight' => 80,
            'stock_quantity' => 150,
            'description' => 'Crunchy walnuts, a great source of omega-3 fatty acids and antioxidants. Excellent for snacking, salads, or adding a nutty flavor to your dishes.',
            'category_id' => 4,
        ]);
        Product::create([
            'name' => 'Crystal Corn Oil',
            'image' => './images/products/CrystalCornOil.png',
            'price' => 100,
            'weight' => 100,
            'stock_quantity' => 200,
            'description' => 'High-quality corn oil, perfect for frying, baking, and salad dressings. Known for its light texture and rich flavor, it’s a versatile addition to any kitchen.',
            'category_id' => 5,
        ]);
        Product::create([
            'name' => 'Gandour Corn Oil',
            'image' => './images/products/GandourCornOil.png',
            'price' => 150,
            'weight' => 80,
            'stock_quantity' => 150,
            'description' => 'Premium corn oil from Gandour, ideal for cooking and deep-frying. Packed with essential fatty acids, it enhances the taste of your favorite dishes with a smooth finish.',
            'category_id' => 5,
        ]);
        Product::create([
            'name' => 'Noor Corn Oil',
            'image' => './images/products/NoorCornOil.png',
            'price' => 150,
            'weight' => 80,
            'stock_quantity' => 200,
            'description' => 'Pure and natural Noor corn oil, great for everyday cooking. Its neutral taste and high smoke point make it suitable for stir-frying, grilling, and more.',
            'category_id' => 5,
        ]);
        Product::create([
            'name' => 'Alfa Corn Oil',
            'image' => './images/products/AlfaCornOil.png',
            'price' => 300,
            'weight' => 100,
            'stock_quantity' => 50,
            'description' => 'Alfa corn oil, a healthy choice for cooking and sautéing. Rich in vitamin E and antioxidants, it’s perfect for maintaining a balanced diet.',
            'category_id' => 5,
        ]);
        Product::create([
            'name' => 'Sunflower Oil',
            'image' => './images/products/SunflowerOil.png',
            'price' => 400,
            'weight' => 200,
            'stock_quantity' => 70,
            'description' => 'Pure sunflower oil, excellent for light cooking and dressings. High in vitamin E and low in saturated fats, it’s a heart-healthy option for your culinary needs.',
            'category_id' => 5,
        ]);
        Product::create([
            'name' => 'Toast',
            'image' => './images/products/Toast.png',
            'price' => 80,
            'weight' => 100,
            'stock_quantity' => 420,
            'description' => ' Crispy and golden toast, perfect for breakfast or a quick snack. Pair it with your favorite spread for a delicious start to the day.',
            'category_id' => 6,
        ]);
        Product::create([
            'name' => 'Cake',
            'image' => './images/products/Cake.png',
            'price' => 150,
            'weight' => 80,
            'stock_quantity' => 100,
            'description' => 'Moist and flavorful cake, baked to perfection. Ideal for celebrations or a sweet treat with tea or coffee.',
            'category_id' => 6,
        ]);
        Product::create([
            'name' => 'Sweet Dinner Rolls',
            'image' => './images/products/SweetDinnerRolls.png',
            'price' => 450,
            'weight' => 100,
            'stock_quantity' => 150,
            'description' => 'Soft and sweet dinner rolls, great for any meal. Enjoy them fresh or use them as a base for sandwiches and sliders.',
            'category_id' => 6,
        ]);
        Product::create([
            'name' => 'Donuts',
            'image' => './images/products/Donuts.png',
            'price' => 150,
            'weight' => 80,
            'stock_quantity' => 100,
            'description' => 'Fluffy and assorted donuts with delightful toppings. A perfect indulgence for any time of the day, available in a variety of flavors.',
            'category_id' => 6,
        ]);
        Product::create([
            'name' => 'Cookies',
            'image' => './images/products/Cookies.png',
            'price' => 200,
            'weight' => 120,
            'stock_quantity' => 100,
            'description' => 'Chewy and delicious cookies packed with chocolate chips. Perfect for snacking or sharing with family and friends.',
            'category_id' => 6,
        ]);
        Product::create([
            'name' => 'Strawberry Milkshake',
            'image' => './images/products/StrawberryMilkshake.png',
            'price' => 150,
            'weight' => 100,
            'stock_quantity' => 50,
            'description' => 'A refreshing strawberry milkshake, blended with fresh strawberries and creamy milk. Perfect for a fruity and cool treat on any day.',
            'category_id' => 7,
        ]);
        Product::create([
            'name' => 'Blueberry Milkshake',
            'image' => './images/products/BlueberryMilkshake.png',
            'price' => 110,
            'weight' => 100,
            'stock_quantity' => 70,
            'description' => 'A rich and smooth blueberry milkshake, packed with the natural goodness of blueberries. Ideal for a healthy and delicious indulgence.',
            'category_id' => 7,
        ]);
        Product::create([
            'name' => 'Lotus Milkshake',
            'image' => './images/products/LotusMilkshake.png',
            'price' => 150,
            'weight' => 100,
            'stock_quantity' => 150,
            'description' => 'A decadent Lotus milkshake, infused with the unique flavor of Lotus biscuits. A perfect blend of creaminess and crunch for dessert lovers.',
            'category_id' => 7,
        ]);
        Product::create([
            'name' => 'Mango Milkshake',
            'image' => './images/products/MangoMilkshake.png',
            'price' => 150,
            'weight' => 80,
            'stock_quantity' => 150,
            'description' => 'A tropical mango milkshake, made with ripe mangoes and a creamy base. Great for a refreshing and exotic drink experience.',
            'category_id' => 7,
        ]);
        Product::create([
            'name' => 'Vanilla Milkshake',
            'image' => './images/products/VanillaMilkshake.png',
            'price' => 150,
            'weight' => 80,
            'stock_quantity' => 150,
            'description' => 'A classic vanilla milkshake, smooth and creamy with a rich vanilla flavor. Perfect as a timeless treat or paired with your favorite snacks.',
            'category_id' => 7,
        ]);
        
        
    }
}
