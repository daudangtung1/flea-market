<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'admin',
            'last_name' => '1',
            'email' => 'admin@mail.test',
            'password' => bcrypt('11111111'),
            'role' => 0,
            // 'notification_status' => 0,
        ]);

        for ($i = 0; $i <= 10; $i++) {
            DB::table('users')->insert([
                'first_name' => 'first',
                'last_name' => 'last_' . $i,
                'email' => 'email_' . $i . '@mail.test',
                'password' => bcrypt('11111111'),
                'role' => rand(1, 2),
                // 'notification_status' => rand(0, 1),
            ]);
        }
    }
}
