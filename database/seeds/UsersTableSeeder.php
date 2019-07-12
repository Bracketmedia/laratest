<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => User::ROL_SYSADMIN,
            'email'     => User::ROL_SYSADMIN.'@laratest.com',
            'password'     => bcrypt(User::ROL_SYSADMIN),
            'email_verified_at' => now(),
            'remember_token' => str_random(10),
        ]);
        $user->assignRole(User::ROL_SYSADMIN);

        $user = User::create([
            'name'      => User::ROL_ADMIN,
            'email'     => User::ROL_ADMIN.'@laratest.com',
            'password'     => bcrypt(User::ROL_ADMIN),
            'email_verified_at' => now(),
            'remember_token' => str_random(10),
        ]);
        $user->assignRole(User::ROL_ADMIN);

        $user = User::create([
            'name'      => User::ROL_USER,
            'email'     => User::ROL_USER.'@laratest.com',
            'password'     => bcrypt(User::ROL_USER),
            'email_verified_at' => now(),
            'remember_token' => str_random(10),
        ]);
        $user->assignRole(User::ROL_USER);
    }
}
