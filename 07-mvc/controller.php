<?php

require_once 'model.php';

class user_controller
{

    public function __construct()
    {
        $model = new user_model('John', 'john@gmial.com');
        include 'view.php';
    }
}

new user_controller();
