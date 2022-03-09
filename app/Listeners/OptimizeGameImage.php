<?php

namespace App\Listeners;

use App\Events\GameSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeGameImage implements ShouldQueue
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
     * @param  \App\Events\GameSaved  $event
     * @return void
     */
    public function handle(GameSaved $event)
    {
        $image = Image::make(Storage::get($event->game->image))
            ->widen(600)
            ->limitColors(255)
            ->encode();

        Storage::put($event->game->image, (string) $image);
    }
}
