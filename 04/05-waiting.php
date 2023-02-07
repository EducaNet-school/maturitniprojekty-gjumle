<?php

class Patient {
    private $id;
    private $in;
    private $order;
    private $age;
    private static $no = 0;

    public function __construct($in = null, $order = null, $age = null) {
        $this->in;
        $this->order = $order;
        $this->age = $age;
        self::$no++;
        $this->id = self::$no;
    }

    public function arrival() {
        $this->in = date('Y-m-d h:i:s');
    }
}

$patient = new Patient ();

$patient->arrival();
var_dump($patient);
