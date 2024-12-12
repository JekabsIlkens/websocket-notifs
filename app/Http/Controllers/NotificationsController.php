<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewNotifications;
use Carbon\Carbon;

class NotificationsController
{
    public function index() 
    {
        return view('notifications.index');
    }

    public function create() 
    {
        return view('notifications.create');
    }

    public function store(Request $request) 
    {
        if($request->input('key'))
        {
            event(new NewNotifications(
                $request->input('key'),
                Carbon::now()->toDateTimeString()
            ));

            return redirect()->route('notifications.create');
        }

        event(new NewNotifications(
            bin2hex(random_bytes(16)),
            Carbon::now()->toDateTimeString()
        ));

        return response()->noContent();
    }
}
