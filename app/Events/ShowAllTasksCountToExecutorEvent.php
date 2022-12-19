<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ShowAllTasksCountToExecutorEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $id;
    public $notSelectedTaskCountforexecutor;
    public function __construct($id,$notSelectedTaskCountforexecutor)
    {
        $this->id=$id;
        $this->notSelectedTaskCountforexecutor=$notSelectedTaskCountforexecutor;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('showAllTaskCountforexecutor_chanal.' . $this->id);
    }
    public function broadcastAs()
    {
        return  'showAllTaskCountforexecutor';
    }
}
