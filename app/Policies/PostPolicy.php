<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    public function create(user $user)

    /**
 * Determine if the given user can create posts.
 *
 * This policy checks if the user has the 'create_post' permission.
 *
 * @param  \App\Models\User  $user
 * @return bool
 */
    {
        return $user->hasPermission('create_post');
    }

    public function update(User $user, Post $post)
    {
        if ($user->id === $post->user_id && $user->hasPermission('edit_own_post')) return true;
        return $user->hasPermission('edit_any_post');
    }

    public function delete(User $user, Post $post)
    {
        if ($user->id === $post->user_id && $user->hasPermission('delete_own_post')) return true;
        return $user->hasPermission('delete_any_post');
    }
}