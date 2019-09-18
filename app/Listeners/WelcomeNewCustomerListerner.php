<?php

namespace App\Listeners;

use App\Mail\welcomeNewUser;
use Illuminate\Support\Facades\Mail;
use App\Events\NewCustomerHaasregisred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeNewCustomerListerner implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  NewCustomerHaasregisred  $event
     * @return void
     */
    public function handle(NewCustomerHaasregisred $event)
    {
        sleep(10);
        Mail::to($event->customer)->send(new welcomeNewUser());

    }
}
