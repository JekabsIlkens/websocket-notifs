<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;
use App\Events\NewNotifications;

class NotificationsService
{
    public function createCustomKey(string $customKey): void
    {
        $datetime = Carbon::now()->toDateTimeString();

        Redis::connection('notifications')->lpush('notifications', json_encode([
            'key' => $customKey,
            'datetime' => $datetime,
        ]));

        event(new NewNotifications($customKey, $datetime));
    }

    public function createRandomKey(): void
    {
        $randomKey = bin2hex(random_bytes(16));
        $datetime = Carbon::now()->toDateTimeString();

        Redis::connection('notifications')->lpush('notifications', json_encode([
            'key' => $randomKey,
            'datetime' => $datetime,
        ]));

        event(new NewNotifications($randomKey, $datetime));
    }
}
