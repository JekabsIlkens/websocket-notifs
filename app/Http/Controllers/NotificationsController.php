<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotificationsService;

class NotificationsController
{
    protected $notificationsService;

    public function __construct(NotificationsService $notificationsService)
    {
        $this->notificationsService = $notificationsService;
    }

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
        $key = $request->input('key');

        if($key)
        {
            $this->notificationsService->createCustomKey($key);

            return redirect()->route('notifications.create');
        }

        $this->notificationsService->createRandomKey();

        return response()->noContent();
    }
}
