<?php
namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word(); // Generates single words like "Laravel", "PHP", "Design"

        return [
            'name'       => ucfirst($name),
            'slug'       => str($name)->slug(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
