<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(20)->create();

        foreach($posts as $post) {
            Image::factory()->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);

            // Fills post_tag intermediate table. More info here:
            // https://laravel.com/docs/9.x/eloquent-relationships#updating-many-to-many-relationships
            $post->tags()->attach([rand(1, 3), rand(4, 6)]);
        }
    }
}
