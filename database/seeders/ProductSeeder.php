<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::truncate();

        $products = [
            [
                'name' => 'Roti Manis',
                'description' => 'Roti manis lembut dengan rasa klasik.',
                'price' => 2000,
                'image' => 'https://images.unsplash.com/photo-1549611016-3a70d82b5040?q=80&w=500&auto=format&fit=crop',
                'category' => 'cake',
                'is_available' => true,
            ],
            [
                'name' => 'Roti Manis (Premium)',
                'description' => 'Roti manis premium dengan bahan berkualitas tinggi.',
                'price' => 6000,
                'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=500&auto=format&fit=crop',
                'category' => 'cake',
                'is_available' => true,
            ],
            [
                'name' => 'Bolen',
                'description' => 'Bolen lezat dengan tekstur kenyal.',
                'price' => 3500,
                'image' => 'https://images.unsplash.com/photo-1621303837174-89787a7d4729?q=80&w=500&auto=format&fit=crop',
                'category' => 'snack',
                'is_available' => true,
            ],
            [
                'name' => 'Pizza Mini',
                'description' => 'Mini pizza dengan topping pilihan.',
                'price' => 3000,
                'image' => 'https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?q=80&w=500&auto=format&fit=crop',
                'category' => 'pizza',
                'is_available' => true,
            ],
            [
                'name' => 'Bolu Slice',
                'description' => 'Bolu slice manis.',
                'price' => 3000,
                'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?q=80&w=500&auto=format&fit=crop',
                'category' => 'snack',
                'is_available' => true,
            ],
            [
                'name' => 'Pisang Coklat',
                'description' => 'Pisang dilapisi coklat.',
                'price' => 3000,
                'image' => 'https://images.unsplash.com/photo-1629222033719-74d6c4a6358c?q=80&w=500&auto=format&fit=crop',
                'category' => 'snack',
                'is_available' => true,
            ],
            [
                'name' => 'Donat',
                'description' => 'Donat klasik.',
                'price' => 2000,
                'image' => 'https://images.unsplash.com/photo-1551024601-bec78ead704b?q=80&w=500&auto=format&fit=crop',
                'category' => 'donut',
                'is_available' => true,
            ],
            [
                'name' => 'Bolu Kukus Mekar',
                'description' => 'Bolu kukus mekar dengan rasa lembut.',
                'price' => 3000,
                'image' => 'https://images.unsplash.com/photo-1614707267160-252194639d67?q=80&w=500&auto=format&fit=crop',
                'category' => 'snack',
                'is_available' => true,
            ],
            [
                'name' => 'Donat Red Velvet',
                'description' => 'Donat red velvet dengan warna khas.',
                'price' => 5000,
                'image' => 'https://images.unsplash.com/photo-1600788910144-6332158097f4?q=80&w=500&auto=format&fit=crop',
                'category' => 'donut',
                'is_available' => true,
            ],
            [
                'name' => 'Bolu Pisang',
                'description' => 'Bolu pisang manis.',
                'price' => 80000,
                'image' => 'https://images.unsplash.com/photo-1596464716127-f2a82d6cfde8?q=80&w=500&auto=format&fit=crop',
                'category' => 'cake',
                'is_available' => true,
            ],
            [
                'name' => 'Bolu Jadul',
                'description' => 'Bolu jadul tradisional.',
                'price' => 50000,
                'image' => 'https://images.unsplash.com/photo-1558961363-fa8fdf82da35?q=80&w=500&auto=format&fit=crop',
                'category' => 'cake',
                'is_available' => true,
            ],
            [
                'name' => 'Brownies',
                'description' => 'Brownies coklat kaya rasa.',
                'price' => 60000,
                'image' => 'https://images.unsplash.com/photo-1606313564200-e75d5e30475c?q=80&w=500&auto=format&fit=crop',
                'category' => 'dessert',
                'is_available' => true,
            ],
            [
                'name' => 'Cake Birthday',
                'description' => 'Cake ulang tahun spesial.',
                'price' => 100000,
                'image' => 'https://images.unsplash.com/photo-1562777717-dc6984f65a63?q=80&w=500&auto=format&fit=crop',
                'category' => 'cake',
                'is_available' => true,
            ],
            [
                'name' => 'Snack Box',
                'description' => 'Berbagai snack dalam satu kotak.',
                'price' => 15000,
                'image' => 'https://images.unsplash.com/photo-1612203852022-0545f9c7b6e8?q=80&w=500&auto=format&fit=crop',
                'category' => 'snack',
                'is_available' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
