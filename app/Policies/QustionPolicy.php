<?php

namespace App\Policies;

use App\User;
use App\Qustion;
use Illuminate\Auth\Access\HandlesAuthorization;

class QustionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any qustions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the qustion.
     *
     * @param  \App\User  $user
     * @param  \App\Qustion  $qustion
     * @return mixed
     */
    public function view(User $user, Qustion $qustion)
    {
        //
    }

    /**
     * Determine whether the user can create qustions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the qustion.
     *
     * @param  \App\User  $user
     * @param  \App\Qustion  $qustion
     * @return mixed
     */
    public function update(User $user, Qustion $qustion)
    {
        return $user->id == $qustion->user_id;
    }

    /**
     * Determine whether the user can delete the qustion.
     *
     * @param  \App\User  $user
     * @param  \App\Qustion  $qustion
     * @return mixed
     */
    public function delete(User $user, Qustion $qustion)
    {
        return $user->id == $qustion->user_id && $qustion->answers_count < 1; //bisa delete jika answer kurang dari 1
    }

    /**
     * Determine whether the user can restore the qustion.
     *
     * @param  \App\User  $user
     * @param  \App\Qustion  $qustion
     * @return mixed
     */
    public function restore(User $user, Qustion $qustion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the qustion.
     *
     * @param  \App\User  $user
     * @param  \App\Qustion  $qustion
     * @return mixed
     */
    public function forceDelete(User $user, Qustion $qustion)
    {
        //
    }
}
