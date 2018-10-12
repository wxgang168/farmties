<?php

namespace App\Listeners;

use App\Events\NewUser as NewUserEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\NewUserWelcome as WelcomeMail;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewUser  $event
     * @return void
     */
    public function handle(NewUserEvent $event)
    {
        //app('log')->info($event->user);
        Mail::to($event->user->email)->queue(new WelcomeMail($event->user));
    }
}
