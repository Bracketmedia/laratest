<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Create the admin, sysadmin and user roles
     * @return void
     */
    public function run()
    {
        \App\Role::create([
            'id' => 1,
            'name' => 'sysadmin',
            'description' => 'System Administrator',
        ]);

        \App\Role::create([
            'id' => 2,
            'name' => 'admin',
            'description' => 'Administrator',
        ]);

        \App\Role::create([
            'id' => 3,
            'name' => 'user',
            'description' => 'User',
        ]);
    }
}

