<?php

namespace App\Listeners;

use App\Events\NewCustomerHaasregisred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdminViaSlack
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    // public function __construct()
    // {

    // }

    /**
     * Handle the event.
     *
     * @param  NewCustomerHaasregisred  $event
     * @return void
     */
    public function handle(NewCustomerHaasregisred $event)
    {
        //dump("Notify  admin ". $event->customer);
    }
}