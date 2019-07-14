<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Sysadmin';
        $user->email = 'Sysadmin@sysadmin.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->roles()->attach(Role::where('name','sysadmin')->first());
        
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'Admin@admin.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->roles()->attach(Role::where('name','admin')->first());
    }
}
