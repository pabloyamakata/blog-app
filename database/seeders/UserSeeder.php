<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Pablo Yamakata',
            'email' => 'pablo.yamakata@gmail.com',
            'password' => 'blog'
        ])->assignRole('admin');

        User::factory(19)->create();
    }
}
