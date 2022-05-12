<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class PostFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->words(3, true)),
            'content' => $this->faker->text,
            //'preview_image' => $this->faker->image('public/storage/image', 840, 630, null, false),
            'category_id' => Category::query()->inRandomOrder()->value('id'),
        ];
    }
}
