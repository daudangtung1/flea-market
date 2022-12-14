<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i <= 30; $i++) {
            DB::table('products')->insert([
                'name' => 'prod_' . $i,
                'price' => 50000,
            ]);
        }
    }
}
