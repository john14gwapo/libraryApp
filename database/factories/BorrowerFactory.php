<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrower>
 */
class BorrowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'studentid' => $this->faker->randomElement(['20200043','20200045','20200065','20200054','20200043','20200075','20200035','20200024','20200013','20200095']),
            'name' => $this->faker->name(),
            'course' => $this->faker->randomElement(['BSIT','BSHM','BSED-English','BSED-Science','BEED']),
            'yearandsection' => $this->faker->randomElement(['1-A','2-A','3-A','4-A','1-B','2-B','3-B','4-B','1-C','2-C','3-C','4-C','1-D','2-D','3-D','4-D']),
            'nameofthebook' => $this->faker->title(),
            'authorofthebook' =>$this->faker->randomElement(['zeus','peter','mikoto','hyper']),
            'image' => $this->faker->image(),
            'published' => $this->faker->date(),
        ];
    }
}
