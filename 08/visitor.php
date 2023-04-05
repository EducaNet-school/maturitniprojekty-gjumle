<?php

class Visitor {
    private $age;
    private $money;

    public function __construct($age, $money) {
        $this->age = $age;
        $this->money = $money;
    }

    public function getAge() {
        return $this->age;
    }

    public function getMoney() {
        return $this->money;
    }

    public function setMoney($money) {
        $this->money = $money;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function toString() {
        return "Visitor age: {$this->age}, money: {$this->money}";
    }
}