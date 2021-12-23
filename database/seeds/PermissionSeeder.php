<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug', 'admin')->first();
        $regularUser = Role::where('slug', 'regular-user')->first();
        
        //Permissions to create, edit and delete dogs
        $createDog = new Permission();
        $createDog->name = 'Create Dog';
        $createDog->slug = 'create-dog';
        $createDog->save();
        $createDog->roles()->attach($regularUser);

        $editDog = new Permission();
        $editDog->name = 'Edit Dog';
        $editDog->slug = 'edit-dog';
        $editDog->save();
        $editDog->roles()->attach($regularUser);

        $deleteDog = new Permission();
        $deleteDog->name = 'Delete Dog';
        $deleteDog->slug = 'delete-dog';
        $deleteDog->save();
        $deleteDog->roles()->attach($regularUser);
        $deleteDog->roles()->attach($admin);

        //Permissions to create and block users
        $createUser = new Permission();
        $createUser->name = 'Create User';
        $createUser->slug = 'create-user';
        $createUser->save();
        $createUser->roles()->attach($admin);

        $blockUser = new Permission();
        $blockUser->name = 'Block User';
        $blockUser->slug = 'block-user';
        $blockUser->save();
        $blockUser->roles()->attach($admin);

        //Permissions to create, edit and delete breeds
        $createBreed = new Permission();
        $createBreed->name = 'Create Breed';
        $createBreed->slug = 'create-breed';
        $createBreed->save();
        $createBreed->roles()->attach($admin);

        $editBreed = new Permission();
        $editBreed->name = 'Edit Breed';
        $editBreed->slug = 'edit-breed';
        $editBreed->save();
        $editBreed->roles()->attach($admin);

        $deleteBreed = new Permission();
        $deleteBreed->name = 'Delete Breed';
        $deleteBreed->slug = 'delete-breed';
        $deleteBreed->save();
        $deleteBreed->roles()->attach($admin);
    }
}
