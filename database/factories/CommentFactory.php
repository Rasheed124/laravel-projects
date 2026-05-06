<?php
namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body'    => $this->faker->paragraph(),
            'user_id' => User::pluck('id')->random(), // Assign to a random existing user
            'post_id' => Post::pluck('id')->random(), // Assign to a random existing post
        ];
    }
}
