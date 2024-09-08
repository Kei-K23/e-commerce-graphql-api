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
        $categories = [
            ['name' => 'Electronics', 'description' => 'Devices and gadgets'],
            ['name' => 'Books', 'description' => 'Printed and digital books'],
            ['name' => 'Clothing', 'description' => 'Men and Women Apparel'],
            ['name' => 'Furniture', 'description' => 'Home and office furniture'],
            ['name' => 'Groceries', 'description' => 'Daily essentials and groceries'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
