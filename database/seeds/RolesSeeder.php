<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
 
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => User::ROL_SYSADMIN]);
        $role->givePermissionTo(Permission::all());
        $role->revokePermissionTo('crud_comments_edit');

        $role = Role::create(['name' => User::ROL_ADMIN]);
        $role->givePermissionTo('view_adminpanel');
        $role->givePermissionTo('view_home');
        $role->givePermissionTo('crud_users');
        $role->givePermissionTo('crud_comments');
        $role->givePermissionTo('crud_comments_edit');

        $role = Role::create(['name' => User::ROL_USER]);
        $role->givePermissionTo('view_home');
        $role->givePermissionTo('crud_comments');

        $role = Role::create(['name' => User::ROL_APIREST]);
        $role->givePermissionTo('json_users');
    }
}
