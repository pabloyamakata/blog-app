<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $blogger = Role::create(['name' => 'blogger']);

        Permission::create(['name' => 'admin.index',
                            'description' => 'See dashboard'])->syncRoles([$admin, $blogger]);

        Permission::create(['name' => 'admin.users.index',
                            'description' => 'See users'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.users.edit',
                            'description' => 'Assign roles'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.categories.index',
                            'description' => 'See categories'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.create',
                            'description' => 'Create categories'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.edit',
                            'description' => 'Edit categories'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.categories.destroy',
                            'description' => 'Delete categories'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.tags.index',
                            'description' => 'See tags'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.create',
                            'description' => 'Create tags'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.edit',
                            'description' => 'Edit tags'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.tags.destroy',
                            'description' => 'Delete tags'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.posts.index',
                            'description' => 'See posts'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.create',
                            'description' => 'Create posts'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.edit',
                            'description' => 'Edit posts'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.destroy',
                            'description' => 'Delete posts'])->syncRoles([$admin, $blogger]);

        Permission::create(['name' => 'admin.roles.index',
                            'description' => 'See roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.create',
                            'description' => 'Create roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.edit',
                            'description' => 'Edit roles'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.roles.destroy',
                            'description' => 'Delete roles'])->syncRoles([$admin]);
    }
}
