<?php

namespace App\Listeners;

use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\User;


class SendNewUserNotification
{
  

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admin = User::whereHas('role', function($query)
        {
            $query->where('role', 'Admin');
        })->get();

        Notification::send($admin, new NewUserNotification($event->user)); //
    }
}
