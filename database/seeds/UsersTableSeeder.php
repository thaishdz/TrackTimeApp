<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'google';
        $user->email = 'googleSan@gmail.com';
        $user->username = 'google.googleSan';
        $user->password = bcrypt('secret');
        $user->token = str_random(25);
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->username = 'admin.admin';
        $user->password = bcrypt('secret');
        $user->token = str_random(25);
        $user->save();
        $user->roles()->attach($role_admin);

    }
}
