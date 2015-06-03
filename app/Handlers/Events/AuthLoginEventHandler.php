<?php

namespace app\Handlers\Events;

use App\Events\Event;
use App\User;

class AuthLoginEventHandler
{
    /**
     * Create the event handler.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param User $user
     * @param  $remember
     */
    public function handle(User $user, $remember)
    {
        dd('login fired and handled by class with User instance and remember variable');
    }
}
