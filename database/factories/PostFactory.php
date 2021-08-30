<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::orderByRaw('RAND()')->first();
        return [
            'user_id' => $user, //User::factory(),
            'title' => $this->faker->realText(25, 3),
            'body' => $this->faker->realText(100, 3),
            'published' => $this->faker->numberBetween(0, 1),
        ];
    }
}
