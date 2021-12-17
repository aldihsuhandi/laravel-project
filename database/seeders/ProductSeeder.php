<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = ["Television", "Smartphone", "Laptop"];
        $img = [
            "image/product/television.jpeg",
            "image/product/smartphone.png",
            "image/product/laptop.jpg",
        ];
        for ($i = 0; $i <= 30; $i++) {
            $idx = rand(0, 2);
            DB::table('products')->insert([
                'name' => $category[$idx] . " - " . $i,
                'category_id' => $idx + 1,
                'description' => "This is a " . $category[$idx],
                'image' => $img[$idx],
                'price' => rand(1000, 2000),
            ]);
        }
    }
}
