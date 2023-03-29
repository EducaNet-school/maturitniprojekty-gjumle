<?php

require_once 'model.php';

class user_controller
{

    public function user()
    {
        $model = new user_model('Jake', 'jake@gmail.com');
        include 'view.php';
    }

    public function user2()
    {
        $model = new user_model('Jeff', 'jeff@gmail.com');
        include 'view.php';
    }
}

$controller = new user_controller();

if (isset($_GET['user'])) {
    $action = $_GET['action'];
} else {
    $action = 'view';
}

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo '404';
}