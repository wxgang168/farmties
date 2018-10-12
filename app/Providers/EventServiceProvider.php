<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NewUser' => [
            'App\Listeners\SendWelcomeEmail',
        ],
        'App\Events\OrderEvents' => [
            'App\Listeners\NewOrder',
            'App\Listeners\MadePayment',
            'App\Listeners\VerifiedPayment',
            'App\Listeners\StockSold',
            'App\Listeners\PaymentDeposited',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
