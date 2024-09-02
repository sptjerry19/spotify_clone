<?php

namespace Database\Factories;

use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    protected $model = Song::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'duration' => $this->faker->numberBetween(120, 600), // Thời lượng ngẫu nhiên từ 2 phút đến 10 phút
            'album_id' => \App\Models\Album::factory(),
            'artist_id' => \App\Models\Artist::factory(),
        ];
    }
}
