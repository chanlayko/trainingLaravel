<?php

namespace App\Listeners;

use App\Mail\PostStored;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreateListener
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
    public function handle(PostCreateEvent $event)
    {
        Mail::to('chan@gmail.com')->send(new PostStored($event->$post));
        
    }
}
