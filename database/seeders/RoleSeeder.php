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

        Permission::create(['name' => 'admin.index'])->syncRoles([$admin, $blogger]);

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$admin, $blogger]);

        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$admin, $blogger]);

        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$admin, $blogger]);
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$admin, $blogger]);
    }
}
