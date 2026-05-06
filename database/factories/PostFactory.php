<?php
namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'user_id'      => \App\Models\User::factory(),
            'category_id'  => \App\Models\Category::factory(), // Assumes Category model exists
            'title'        => $title,
            'slug'         => \Illuminate\Support\Str::slug($title),
            'excerpt'      => $this->faker->paragraph(2),
            'content'      => $this->faker->paragraphs(5, true),
            'likes'        => rand(0, 1000),
            'is_featured'  => $this->faker->boolean(20), // 20% chance to be featured
            'status'       => 'published',
            'published_at' => now(),
        ];
    }
}
