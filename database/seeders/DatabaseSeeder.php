<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed Artists
        Artist::factory(10)->create();

        // Seed Albums
        Album::factory(20)->create();

        // Seed Songs
        Song::factory(50)->create();

        // Seed Playlists
        Playlist::factory(10)->create();

        // Seed Users (if using auth)
        User::factory(5)->create();
    }
}
