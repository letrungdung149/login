<?php

namespace App\Listeners;

use App\Events\PostcastProcessed;
use Illuminate\Support\Facades\Log;

class SendPostcastNotification
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
     * @param  \App\Events\PostcastProcessed  $event
     * @return void
     */
    public function handle(PostcastProcessed $event)
    {
        Log::info('hello');
    }
}
