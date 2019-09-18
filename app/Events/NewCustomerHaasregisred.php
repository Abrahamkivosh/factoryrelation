<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCustomerHaasregisred implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


     /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     *public $connection = 'database';

     */


    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     *
     * public $queue = 'listeners';
     */


    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public $delay = 10;




    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $customer ;
    public function __construct($customer)
    {
        $this->customer = $customer ;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
