<?php

// Define classes
class Rectangle {
  private $name;
  private $length;
  private $width;

  public function __construct($name, $length, $width) {
    $this->name = $name;
    $this->length = $length;
    $this->width = $width;
  }

  public function getName() {
    return $this->name;
  }

  public function getArea() {
    return $this->length * $this->width;
  }

  public function setLength($length) {
    $this->length = $length;
  }

  public function setWidth($width) {
    $this->width = $width;
  }
}

class Square extends Rectangle {
  public function __construct($name, $side) {
    parent::__construct($name, $side, $side);
  }

  public function setSide($side) {
    parent::setLength($side);
    parent::setWidth($side);
  }
}

class Triangle {
  private $name;
  private $side1;
  private $side2;
  private $side3;

  public function __construct($name, $side1, $side2, $side3) {
    $this->name = $name;
    $this->side1 = $side1;
    $this->side2 = $side2;
    $this->side3 = $side3;
  }

  public function getName() {
    return $this->name;
  }

  public function getArea() {
    $s = ($this->side1 + $this->side2 + $this->side3) / 2;
    return sqrt($s * ($s - $this->side1) * ($s - $this->side2) * ($s - $this->side3));
  }

  public function isValid() {
    return ($this->side1 + $this->side2 > $this->side3) && ($this->side2 + $this->side3 > $this->side1) && ($this->side1 + $this->side3 > $this->side2);
  }

  public function setSide1($side1) {
    $this->side1 = $side1;
  }

  public function setSide2($side2) {
    $this->side2 = $side2;
  }

  public function setSide3($side3) {
    $this->side3 = $side3;
  }
}

// Define shapes
$shapes = array(
  new Rectangle('Rectangle 1', 10, 5),
  new Square('Square 1', 8),
  new Triangle('Triangle 1', 3, 4, 5)
);

// Process form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $selectedShape = $_POST['shape'];
  $shape = $shapes[$selectedShape];

  switch ($shape->getName()) {
    case 'Rectangle 1':
      $length = $_POST['length'];
      $width = $_POST['width'];
      $shape->setLength($length);
      $shape->setWidth($width);
      break;
    case 'Square 1':
      $side = $_POST['side'];
      $shape->setSide($side);
      break;
    case 'Triangle 1':
      $side1 = $_POST['side1'];
      $side2 = $_POST['side2'];
      $side3 = $_POST['side3'];

      $triangle = new Triangle('Triangle', $side1, $side2, $side3);

      if ($triangle->isValid()) {
        $shape->setSide1($side1);
        $shape->setSide2($side2);
        $shape->setSide3($side3);
      } else {
        echo "Error: Invalid triangle dimensions. Please enter valid dimensions.";
      }
      break;
  }
}

?>

<!-- HTML form -->
<!DOCTYPE html>
<html>
<head>
  <title>Geometric Calculator</title>
</head>
<body>
  <h1>Geometric Calculator</h1>
  <form method="POST">
    <label for="shape">Select a shape:</label>
    <select id="shape" name="shape">
      <option value="0">Rectangle</option>
      <option value="1">Square</option>
      <option value="2">Triangle</option>
    </select>

    <div id="rectangle">
      <label for="length">Length:</label>
      <input type="number" id="length" name="length" value="<?php echo $shapes[0]->getLength(); ?>">

      <label for="width">Width:</label>
      <input type="number" id="width" name="width" value="<?php echo $shapes[0]->getWidth(); ?>">
    </div>

    <div id="square">
      <label for="side">Side:</label>
      <input type="number" id="side" name="side" value="<?php echo $shapes[1]->getLength(); ?>">
    </div>

    <div id="triangle">
      <label for="side1">Side 1:</label>
      <input type="number" id="side1" name="side1" value="<?php echo $shapes[2]->getSide1(); ?>">

      <label for="side2">Side 2:</label>
      <input type="number" id="side2" name="side2" value="<?php echo $shapes[2]->getSide2(); ?>">

      <label for="side3">Side 3:</label>
      <input type="number" id="side3" name="side3" value="<?php echo $shapes[2]->getSide3(); ?>">
    </div>

    <input type="submit" value="Calculate">
  </form>

  <h2>Results</h2>
  <?php
  foreach ($shapes as $shape) {
    echo "<p>" . $shape->getName() . " - Area: " . $shape->getArea() . "</p>";
  }
  ?>
</body>
</html>
