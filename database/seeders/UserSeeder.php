<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'gender' => 'admin',
            'address' => 'admin',
            'password' => bcrypt('admin'),
            'role_id' => '2',
        ]);

        DB::table('users')->insert([
            'name' => 'member',
            'email' => 'member@member.com',
            'gender' => 'member',
            'address' => 'member',
            'password' => bcrypt('member'),
            'role_id' => '1',
        ]);
    }
}
