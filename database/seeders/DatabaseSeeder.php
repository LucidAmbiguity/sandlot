<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Spatie\Permission\PermissionRegistrar;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {
    //     app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    //     // $superUser = User::factory()->create([
    //     //     'name' => 'Rufus Barksalot',
    //     //     'email' => 'jrutty70+rufus@gmail.com',
    //     //     'email_verified_at' => now(),
    //     //     'password' => bcrypt('barkbark'), // password
    //     // ]);
    //     $admin = User::factory()->create([
    //         'name' => 'Rufus Barksalot',
    //         'email' => 'jrutty70+rufus@gmail.com',
    //         'email_verified_at' => now(),
    //         'password' => bcrypt('barkbark'), // password
    //     ]);
    //     $worker = User::factory()->create([
    //         'name' => 'Charlie Moans',
    //         'email' => 'jrutty70+charlie@gmail.com',
    //         'email_verified_at' => now(),
    //         'password' => bcrypt('woofwoof'), // password
    //     ]);

    //     Role::create(['name' => 'super-admin']);
    //     $adminRole = Role::create(['name' => 'admin']);
    //     Role::create(['name' => 'supervisor']);
    //     Role::create(['name' => 'worker']);
    //     Role::create(['name' => 'user']);
    //     Role::create(['name' => 'guest']);

    //     $permissions = [];
    //     $permissions[] = Permission::create(['name' => 'manage-roles']);
    //     $permissions[] = Permission::create(['name' => 'manage-permissions']);
    //     $permissions[] = Permission::create(['name' => 'manage-users']);
    //     $permissions[] = Permission::create(['name' => 'manage-posts']);


    //     $permissions[] = Permission::create(['name' => 'create-user']);
    //     $permissions[] = Permission::create(['name' => 'read-user']);
    //     $permissions[] = Permission::create(['name' => 'edit-user']);
    //     $permissions[] = Permission::create(['name' => 'delete-user']);

    //     $permissions[] = Permission::create(['name' => 'create-post']);
    //     $permissions[] = Permission::create(['name' => 'read-post']);
    //     $permissions[] = Permission::create(['name' => 'edit-post']);
    //     $permissions[] = Permission::create(['name' => 'delete-post']);

    //     // foreach ($permissions as $permission) {
    //     //     $admin->givePermissionTo($permission);
    //     // }
    //     $adminRole->givePermissionTo($permissions);
    //     // $superUser->assignRole('super-admin');
    //     $admin->assignRole('admin');
    //     $worker->assignRole('worker');
    //     print_r($admin->getAllPermissions()->pluck('name'));
    // }
}
