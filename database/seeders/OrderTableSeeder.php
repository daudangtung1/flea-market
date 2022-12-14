<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i <= 10; $i++) {
            DB::table('orders')->insert([
                'user_id' => rand(1, 5),
                'product_id' => rand(0, 20)
            ]);
        }
    }
}
