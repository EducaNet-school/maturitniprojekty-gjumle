<?php

class user_model
{
    public $user;
    public $email;

    public function __construct($user, $email)
    {
        $this->user = $user;
        $this->email = $email;
    }
}
