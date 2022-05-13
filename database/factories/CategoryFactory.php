<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class CategoryFactory extends Factory
{
    #[ArrayShape(['title' => "string"])]
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->word()),
        ];
    }
}