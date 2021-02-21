<?php

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
        $roles = ['Пользователь', 'Преподаватель', 'Администратор'];

        DB::table('roles')->insert([
            'name_role' => $roles[0],
            'created_at' => now()
        ]);

        DB::table('roles')->insert([
            'name_role' => $roles[1],
            'created_at' => now()
        ]);

        DB::table('roles')->insert([
            'name_role' => $roles[2],
            'created_at' => now()
        ]);
    }
}
