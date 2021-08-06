<?php

namespace App\Policies;

use App\User;
use App\Comments;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the comments.
     *
     * @param  \App\User  $user
     * @param  \App\Comments  $comments
     * @return mixed
     */
    public function view(User $user, Comments $comments)
    {
        //
    }

    /**
     * Determine whether the user can create comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the comments.
     *
     * @param  \App\User  $user
     * @param  \App\Comments  $comments
     * @return mixed
     */
    public function update(User $user, Comments $comments)
    {
       dd($user->id == $comments->user_id);
        // return $user->id == $comments->user_id;
    }

    /**
     * Determine whether the user can delete the comments.
     *
     * @param  \App\User  $user
     * @param  \App\Comments  $comments
     * @return mixed
     */
    public function delete(User $user, Comments $comments)
    {
        //
    }

    /**
     * Determine whether the user can restore the comments.
     *
     * @param  \App\User  $user
     * @param  \App\Comments  $comments
     * @return mixed
     */
    public function restore(User $user, Comments $comments)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the comments.
     *
     * @param  \App\User  $user
     * @param  \App\Comments  $comments
     * @return mixed
     */
    public function forceDelete(User $user, Comments $comments)
    {
        //
    }
}
