<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'title' => $this->faker->title(),
            'author' =>$this->faker->randomElement(['zeus','peter','mikoto','hyper']),
            'image' => $this->faker->image(),
            'published' => $this->faker->date(),
        ];
    }
}
