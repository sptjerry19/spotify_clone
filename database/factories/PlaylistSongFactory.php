<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlaylistSong>
 */
class PlaylistSongFactory extends Factory
{
    protected $model = PlaylistSong::class;

    public function definition()
    {
        return [
            'playlist_id' => \App\Models\Playlist::factory(),
            'song_id' => \App\Models\Song::factory(),
        ];
    }
}
