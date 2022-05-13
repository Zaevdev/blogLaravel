<?php

namespace Database\Seeders;

use App\Models\{Category, Post, Tag};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Category::factory(10)->create();

        Tag::factory(10)->create();

        Post::factory(10)->create()->each(function ($post) {
            $post->tags()->attach(Tag::all()->random(3));
        });
    }
}
