<?php
namespace Database\Seeders;

use App\Enums\Role;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name'     => 'Admin User',
            'username' => 'admin',
            'email'    => 'admin@blognest.com',
            'password' => Hash::make('password123'),
            'country'  => 'Nigeria',
            'city'     => 'Lagos',
            'role'     => Role::Admin,
        ]);

        $authors = User::factory(10)->create();

        $categories = Category::factory(5)->create();

        $tags = Tag::factory(15)->create();

        $posts = Post::factory(30)->create()->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        Comment::factory(50)->create();
    }
}
