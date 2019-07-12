<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view_systempanel']);
        Permission::create(['name' => 'view_adminpanel']);
        Permission::create(['name' => 'view_home']);
        Permission::create(['name' => 'crud_users']);
        Permission::create(['name' => 'crud_comments']);
        Permission::create(['name' => 'crud_comments_edit']);
        Permission::create(['name' => 'crud_comments_destroy']);
        Permission::create(['name' => 'json_users']);
    }
}
