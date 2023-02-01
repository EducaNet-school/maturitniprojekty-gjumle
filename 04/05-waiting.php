<?php

class Wait {

    public function arrival() {
        $this->in = time();
    }

}

class Patient {
    private $name;
    private $in;
    private $order;
    private $age;

    public function __construct($name, $in, $order, $age) {
        $this->name;
        $this->in;
        $this->order = $order;
        $this->age = $age;
    }
}

