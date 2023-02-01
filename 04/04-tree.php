<?php

class User {
    protected $name;
    protected $money = 100;
    protected $users;

    public function __construct($name, $users) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getInfo() {
        return 'Type: ' . get_class($this) . ', name: ' . $this->name . ', money: ' . $this->money . ' ';
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
