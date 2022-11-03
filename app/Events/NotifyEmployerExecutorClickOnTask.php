<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotifyEmployerExecutorClickOnTask implements ShouldBroadcast

 {
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $id;
    public $clickontask;
    public function __construct($id,$clickontask)
    {
        $this->id=$id;
        $this->clickontask=$clickontask;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return  new Channel('notifyemployerexecutorclickontask.' .$this->id);
    }

    public function broadcastAs()
    {
        return  'notifyemployerfornewclick';
    }
}
