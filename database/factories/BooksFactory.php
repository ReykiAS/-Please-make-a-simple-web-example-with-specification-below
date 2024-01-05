<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $Books = Books::class;
    private static $counter = 1;
    public function definition()
    {
        return [
            'title' => $this -> faker -> text(),
            'category_id' => $this->faker->numberBetween(1, 3000),
            'author_id' => $this->faker->numberBetween(1, 1000),
            'rating_id'  => $this->numberIncrement(),
            'voter' => $this->faker->numberBetween(1, 500),

                
        
        ];
    }
    private function numberIncrement()
    {
        return self::$counter++;
    }
   /*  private function numberIncrement2()
    {
        return self::$counter1++;
    } */
}
