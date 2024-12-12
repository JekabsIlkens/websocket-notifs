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

    public string $key;
    public string $datetime;

    public function __construct(string $key, string $datetime)
    {
        $this->key = $key;
        $this->datetime = $datetime;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('new-notifications');
    }

    public function broadcastWith()
    {
        return [
            'data' => [
                'key' => $this->key,
                'datetime' => $this->datetime,
            ],
        ];
    }
}
