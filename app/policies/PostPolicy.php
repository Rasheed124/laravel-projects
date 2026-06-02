<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    // Admin override filter
    public function before(User $user, string $ability): ?bool
    {
        if ($user->role === 'admin') { // Adjust property naming match to your user schemas ('is_admin', etc.)
            return true;
        }
        return null;
    }

    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    public function restore(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }
}