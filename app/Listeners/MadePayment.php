<?php

namespace App\Listeners;

use App\Events\OrderEvents;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\PaymentConfirmation;

class MadePayment
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
     * @param  OrderEvents  $event
     * @return void
     */
    public function handle(OrderEvents $event)
    {
        Mail::to($event->order->owner->email)->queue(new PaymentConfirmation($event->order));
    }
}
