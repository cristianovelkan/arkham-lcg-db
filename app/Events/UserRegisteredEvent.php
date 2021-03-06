<?php

namespace App\Events;

class UserRegisteredEvent extends Event
{
    public $url;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($url, $user)
    {
        $this->url = $url;
        $this->user = $user;
    }
}
