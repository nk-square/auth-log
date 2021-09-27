<?php

namespace Nksquare\AuthLog\Listeners;

use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Nksquare\AuthLog\AuthLog;

class LoginSuccess
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
        $authLog->status = 'success';
        $authLog->guard = $event->guard;
        $authLog->save();
        $authLog->authenticable()->associate($event->user)->save();
    }
}
