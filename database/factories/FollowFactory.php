<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follow>
 */
class FollowFactory extends Factory
{
    protected $model = Follow::class;

    public function definition()
    {
        return [
            'follower_id' => \App\Models\User::factory(),
            'followed_id' => \App\Models\User::factory(),
        ];
    }
}
