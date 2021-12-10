<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ["Member", "Admin"];
        for ($i = 0; $i < count($roles); ++$i) {
            DB::table('roles')->insert([
                'role' => $roles[$i],
            ]);
        }
    }
}
