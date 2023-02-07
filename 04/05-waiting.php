<?php

class Patient {
    private $id;
    private $arrival;
    private $vaccination;
    private $age;
    private static $order = 0;

    public function __construct($vaccination = null, $age = null) {
        $this->vaccination = $vaccination;
        $this->age = $age;
        self::$order++;
        $this->id = self::$order;
    }

    public function arrival() {
        $this->arrival = date('Y-m-d h:i:s');
    }

    public function getOrder($id = null) {
        return $this->order;
    }
}

$patient = new Patient (1, 15);

$patient->arrival();
var_dump($patient);
