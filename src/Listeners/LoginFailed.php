<?php

namespace Nksquare\AuthLog\Listeners;

use Carbon\Carbon;
use Nksquare\AuthLog\AuthLog;
use Illuminate\Support\Arr;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginFailed
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $authLog = AuthLog::make();
        $authLog->activity = 'login';
        $authLog->status = 'failure';
        $authLog->guard = $event->guard;
        $authLog->credentials = Arr::only($event->credentials,config('authlog.credentials.'.$event->guard,'email'));

        $authLog->save();
        if($event->user)
        {
            $authLog->authenticable()->associate($event->user);
        }
    }
}
