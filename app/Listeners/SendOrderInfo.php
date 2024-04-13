<?php

namespace App\Listeners;

use App\Events\MovieTicket;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderInfo
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
     * @param  \App\Events\MovieTicket  $event
     * @return void
     */
    public function handle(MovieTicket $event)
    {
        dd($event);
        dd('testing');
    }
}
