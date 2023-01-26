<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /** Create roles and permissions, run this just once */
        $adminRole = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'blog.edit']);

        $adminRole->givePermissionTo($permission);

        $writerRole = Role::create(['name' => 'writer']);
        $writerRole->givePermissionTo($permission);


        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /** Create blogs */
        //\App\Models\Blog::factory(500)->create();
    }
}
