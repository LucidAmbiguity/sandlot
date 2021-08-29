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
    public function run()
    {
        $this->call(PermissionsDemoSeeder::class);
        User::factory(5)->create();
        $this->call(PostSeeder::class);
    }
}
