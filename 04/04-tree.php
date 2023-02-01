<?php

class User {
    protected $name;
    protected $money = 100;

    public function __construct($name) {
        $this->name = $name;
    }

    public function returnMoney() {
        return 'Type: ' . get_class($this) . ' name: ' . $this->name . ' money: ' . $this->money;
    }

}

class Manager extends User {
    protected $money = 500;

    public function __construct($name) {
        parent::__construct($name);
    }

} 