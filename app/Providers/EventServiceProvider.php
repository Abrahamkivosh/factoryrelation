<?php

namespace App\Providers;

use App\Events\NewCustomerHaasregisred;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use App\Listeners\WelcomeNewCustomerListerner;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class =>[
            SendEmailVerificationNotification::class,
        ],

         NewCustomerHaasregisred::class => [
            WelcomeNewCustomerListerner::class,
            \App\Listeners\RegisterCustomerToNewsLetter::class,
            \App\Listeners\NotifyAdminViaSlack::class,
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

        //
    }
}
