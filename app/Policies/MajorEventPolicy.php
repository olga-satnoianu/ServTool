<?php

namespace App\Policies;

use App\Models\MajorEvent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MajorEventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User|null  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User|null  $user
     * @param  \App\Models\MajorEvent  $majorEvent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MajorEvent $majorEvent)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User|null  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User|null  $user
     * @param  \App\Models\MajorEvent  $majorEvent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MajorEvent $majorEvent)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User|null  $user
     * @param  \App\Models\MajorEvent  $majorEvent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MajorEvent $majorEvent)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MajorEvent  $majorEvent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, MajorEvent $majorEvent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MajorEvent  $majorEvent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, MajorEvent $majorEvent)
    {
        //
    }
}
