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
        event(new NewNotifications(
            rand(1, 999), 
            $request->input('message'), 
            Carbon::now()->toDateTimeString()
        ));

        return redirect()->route('notifications.create');
    }
}
