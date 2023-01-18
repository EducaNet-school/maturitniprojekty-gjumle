<?php

class Point {
    protected $x;
    protected $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function returnPoint() {
        return '[' . $this->x . ';' . $this->y . ']';
    }
}

class Triangle extends Point {
    private $v1;
    private $v2;
    private $v3;

    public function __construct($v1, $v2, $v3) {
        parent::__construct();
    }
}