<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $Author = Author::class;
    private static $counter = 1;
    public function definition()
    {
        return [
            'authorName' => $this->faker->name,
        ];
    }
}
