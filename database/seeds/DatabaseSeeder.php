<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'dev@exe4u.com',
            'password' => bcrypt('asdf4321')
        ]);
        
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'sysRsrvAdmin'
        ]);
        
        DB::table('user_roles')->insert([
            'id' => 1,
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
