<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        $games = Array('gta','the witcher','elden ring','nier:automata','fall guys');
        $key = array_rand($games);
        return [
            'name' => $games[$key],
            'price' => $this->faker->numberBetween($min = 200, $max = 9000),
            'description' => Str::random(10),
            'genre' => Str::random(10),
            'developer' => $this->faker->name,
        ];
    }
}