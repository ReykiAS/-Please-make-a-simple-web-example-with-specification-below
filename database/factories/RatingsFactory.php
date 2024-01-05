<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RatingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
     protected $Ratings = Ratings::class;
    private static $counter = 1;
    public function definition()
    {
        if (self::$counter > 100000) {
            self::$counter = 1;
        }
        return [
            'rating' => $this->faker->numberBetween(1, 10),
            'books_id' => $this->numberIncrement(),
            
        ];
    }
    private function numberIncrement()
    {
        return self::$counter++;
    }
}
