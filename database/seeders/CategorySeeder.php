<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            'Television',
            'Smartphone',
            'Laptop'
        ];

        for ($i = 0; $i < count($category); ++$i) {
            DB::table('categories')->insert([
                'name' => $category[$i],
            ]);
        }
    }
}
