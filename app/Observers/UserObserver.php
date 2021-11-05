<?php

namespace App\Observers;

use App\Mail\UpdateProfileConfirmationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    /**
     * Handle the review "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {

    }

    /**
     * Handle the review "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        if ($user->wasChanged('is_blocked_cnt') &&
            $user->is_blocked_cnt >= User::MAX_BLOCKED_ATTEMPTS
            && !$user->is_admin)
        {
            $user->is_blocked = true;
            $user->saveWithoutEvents();
        } elseif($user->isDirty()) {
            Mail::to($user->email)
                ->send(new UpdateProfileConfirmationMail(
                    $user->full_name
                ));
        }


    }

    /**
     * Handle the review "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the review "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the review "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }

    /**
     * @param \App\Models\User  $user
     */
    public function updating(User $user){
//        $user->is_blocked_cnt++;
    }
}
