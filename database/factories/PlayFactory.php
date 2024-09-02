<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Play>
 */
class PlayFactory extends Factory
{
    protected $model = Play::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'song_id' => \App\Models\Song::factory(),
            'played_at' => $this->faker->dateTime,
        ];
    }
}
