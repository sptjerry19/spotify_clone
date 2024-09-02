<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    protected $model = Artist::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'genre' => $this->faker->word,
            'bio' => $this->faker->paragraph,
        ];
    }
}
