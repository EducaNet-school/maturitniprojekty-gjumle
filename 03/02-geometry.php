<?php

class Shape {
  protected $name;

  public function __construct($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getArea() {
    return 0;
  }

  public function getPerimeter() {
    return 0;
  }
}

class Rectangle extends Shape {
  protected $length;
  protected $width;

  public function __construct($name, $length, $width) {
    parent::__construct($name);
    $this->length = $length;
    $this->width = $width;
  }

  public function getLength() {
    return $this->length;
  }

  public function setLength($length) {
    $this->length = $length;
  }

  public function getWidth() {
    return $this->width;
  }

  public function setWidth($width) {
    $this->width = $width;
  }

  public function getArea() {
    return $this->length * $this->width;
  }

  public function getPerimeter() {
    return 2 * ($this->length + $this->width);
  }
}

class Square extends Rectangle {
  public function __construct($name, $side) {
    parent::__construct($name, $side, $side);
  }
}

class Triangle extends Shape {
  protected $side1;
  protected $side2;
  protected $side3;

  public function __construct($name, $side1, $side2, $side3) {
    parent::__construct($name);
    $this->side1 = $side1;
    $this->side2 = $side2;
    $this->side3 = $side3;
  }

  public function getSide1() {
    return $this->side1;
  }

  public function setSide1($side1) {
    $this->side1 = $side1;
  }

  public function getSide2() {
    return $this->side2;
  }

  public function setSide2($side2) {
    $this->side2 = $side2;
  }

  public function getSide3() {
    return $this->side3;
  }

  public function setSide3($side3) {
    $this->side3 = $side3;
  }

  public function getArea() {
    $s = ($this->side1 + $this->side2 + $this->side3) / 2;
    return sqrt($s * ($s - $this->side1) * ($s - $this->side2) * ($s - $this->side3));
  }

  public function getPerimeter() {
    return $this->side1 + $this->side2 + $this->side3;
  }

  public function isValid() {
    if ($this->side1 <= 0 || $this->side2 <= 0 || $this->side3 <= 0) {
      return false;
    }
    $sides = array($this->side1, $this->side2, $this->side3);
    sort($sides);
    if ($sides[0] + $sides[1] <= $sides[2]) {
      return false;
    }
    return true;
  }
}
