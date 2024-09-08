<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $electronicsCategory = Category::where('name', 'Electronics')->first();
        $booksCategory = Category::where('name', 'Books')->first();

        $products = [
            [
                'name' => 'Smartphone',
                'description' => 'A high-end smartphone with great features.',
                'price' => 699.99,
                'category_id' => $electronicsCategory->id,
            ],
            [
                'name' => 'Laptop',
                'description' => 'A powerful laptop for work and gaming.',
                'price' => 999.99,
                'category_id' => $electronicsCategory->id,
            ],
            [
                'name' => 'Novel',
                'description' => 'A bestselling fiction novel.',
                'price' => 14.99,
                'category_id' => $booksCategory->id,
            ],
            [
                'name' => 'Science Textbook',
                'description' => 'An advanced science textbook for students.',
                'price' => 39.99,
                'category_id' => $booksCategory->id,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
