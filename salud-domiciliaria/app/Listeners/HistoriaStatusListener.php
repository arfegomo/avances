<?php

namespace App\Listeners;

use App\Events\HistoriaChangedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HistoriaStatusListener
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
     * @param  \App\Events\HistoriaChangedEvent  $event
     * @return void
     */
    public function handle(HistoriaChangedEvent $event)
    {
        //
    }
}
