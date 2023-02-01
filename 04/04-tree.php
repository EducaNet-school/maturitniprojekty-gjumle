<?php

class User {
    protected $name;
    protected $money = 100;
    protected $users;

    public function __construct($name, $users = null) {
        $this->name = $name;
    }

    public function getUser() {
        return $this->name . ', ' . $this->money . ' ';
    }

    public function printStructure() {
        // Print all users below user
    }

}

class Manager extends User {
    protected $money = 500;

    public function __construct($name, $users) {
        parent::__construct($name, $users);
    }
}

$user = new User ('Petr');
echo $user->getUser();