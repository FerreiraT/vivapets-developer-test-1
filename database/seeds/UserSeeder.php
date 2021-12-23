<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'tiagoferreiradev@gmail.com';
        $user->password = Hash::make('admin123');
        $user->status = 1;
        $user->save();

        $role = Role::where('slug', 'admin')->first();

        $user->roles()->attach($role);
    }
}
