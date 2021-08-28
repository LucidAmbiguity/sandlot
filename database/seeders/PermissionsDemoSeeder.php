<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit_posts']);
        Permission::create(['name' => 'delete_posts']);
        Permission::create(['name' => 'publish_posts']);
        Permission::create(['name' => 'unpublish_posts']);
        Permission::create(['name' => 'read_posts']);
        Permission::create(['name' => 'comment_posts']);
        Permission::create(['name' => 'manage-roles']);


        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit_posts');
        $role1->givePermissionTo('delete_posts');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish_posts');
        $role2->givePermissionTo('unpublish_posts');

        $role3 = Role::create(['name' => 'Super-Admin']);

        $role4 = Role::create(['name' => 'member']);
        $role4->givePermissionTo('read_posts');
        $role4->givePermissionTo('comment_posts');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
            'username' => 'User',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
            'username' => 'Admin',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
            'username' => 'SuperAdmin',
        ]);
        $user->assignRole($role3);
        $user->givePermissionTo('edit_posts');  //test line

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Member User',
            'email' => 'member@example.com',
            'username' => 'Member',
        ]);
        $user->assignRole($role4);
    }
}
