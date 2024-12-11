<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewNotifications implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $number;
    public string $message;
    public string $datetime;

    public function __construct(int $number, string $message, string $datetime)
    {
        $this->number = $number;
        $this->message = $message;
        $this->datetime = $datetime;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('new-notifications');
    }

    public function broadcastWith()
    {
        return ['data' => [
            'number' => $this->number,
            'message' => $this->message,
            'datetime' => $this->datetime,
        ]];
    }
}
