<?php
// define Shape class
class Shape {
    protected $area;
    protected $perimeter;

    public function getArea() {
        return $this->area;
    }

    public function getPerimeter() {
        return $this->perimeter;
    }
}

// define Rectangle class
class Rectangle extends Shape {
    protected $length;
    protected $width;

    public function __construct($length = 0, $width = 0) {
        $this->length = $length;
        $this->width = $width;
        $this->calculateArea();
        $this->calculatePerimeter();
    }

    public function setLength($length) {
        $this->length = $length;
        $this->calculateArea();
        $this->calculatePerimeter();
    }

    public function setWidth($width) {
        $this->width = $width;
        $this->calculateArea();
        $this->calculatePerimeter();
    }

    private function calculateArea() {
        $this->area = $this->length * $this->width;
    }

    private function calculatePerimeter() {
        $this->perimeter = 2 * ($this->length + $this->width);
    }

    public function getLength() {
        return $this->length;
    }

    public function getWidth() {
        return $this->width;
    }
}

// define Square class
class Square extends Rectangle {
    public function __construct($side = 0) {
        parent::__construct($side, $side);
    }

    public function setLength($length) {
        parent::setLength($length);
        parent::setWidth($length);
    }

    public function setWidth($width) {
        parent::setWidth($width);
        parent::setLength($width);
    }

    public function getSide() {
        return $this->getLength();
    }
}

// define Triangle class
class Triangle extends Shape {
    protected $side1;
    protected $side2;
    protected $side3;

    public function __construct($side1 = 0, $side2 = 0, $side3 = 0) {
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
        $this->calculateArea();
        $this->calculatePerimeter();
    }

    public function setSide1($side1) {
        $this->side1 = $side1;
        $this->calculateArea();
        $this->calculatePerimeter();
    }

    public function setSide2($side2) {
        $this->side2 = $side2;
        $this->calculateArea();
        $this->calculatePerimeter();
    }

    public function setSide3($side3) {
        $this->side3 = $side3;
        $this->calculateArea();
        $this->calculatePerimeter();
    }

    private function calculateArea() {
        $s = ($this->side1 + $this->side2 + $this->side3) / 2;
        $this->area = sqrt($s * ($s - $this->side1) * ($s - $this->side2) * ($s - $this->side3));
    }

    private function calculatePerimeter() {
        $this->perimeter = $this->side1 + $this->side2 + $this->side3;
    }

    public function isValid() {
        if (($this->side1 + $this->side2 > $this->side3) && ($this->side1 + $this->side3 > $this->side2) && ($this->side2 + $this->side3 > $this->side1)) {
            return true;
            }
            return false;
        }
        
    public function getSide1() {
        return $this->side1;
    }
    
    public function getSide2() {
        return $this->side2;
    }
    
    public function getSide3() {
        return $this->side3;
    }
}
    
// define geometric calculator class
class GeometricCalculator {
    public static function calculateRectangle($length, $width) {
        $rectangle = new Rectangle($length, $width);
        return array(
            'area' => $rectangle->getArea(),
            'perimeter' => $rectangle->getPerimeter(),
            'length' => $rectangle->getLength(),
            'width' => $rectangle->getWidth()
            );
    }

    public static function calculateSquare($side) {
        $square = new Square($side);
        return array(
            'area' => $square->getArea(),
            'perimeter' => $square->getPerimeter(),
            'side' => $square->getSide()
            );
    }

    public static function calculateTriangle($side1, $side2, $side3) {
        $triangle = new Triangle($side1, $side2, $side3);
        if ($triangle->isValid()) {
            return array(
                'area' => $triangle->getArea(),
                'perimeter' => $triangle->getPerimeter(),
                'side1' => $triangle->getSide1(),
                'side2' => $triangle->getSide2(),
                'side3' => $triangle->getSide3()
                );
        } else {
            return 'Invalid triangle. Please check that the sum of any two sides is greater than the third side.';
            }
    }
}

?>

<!--HTML form to select a shape and enter dimensions-->
<html>
    <form method="post">
    <label for="shape">Select a shape:</label>
    <select name="shape" id="shape">
        <option value="rectangle">Rectangle</option>
        <option value="square">Square</option>
        <option value="triangle">Triangle</option>
    </select>
    <br>
    
    <div id="rectangle" class="shape-form" style="display:none">
        <label for="length">Length:</label>
        <input type="number" name="length" id="length">
        <br>
        <label for="width">Width:</label>
        <input type="number" name="width" id="width">
    </div>

    <div id="square" class="shape-form" style="display:none">
        <label for="side">Side:</label>
        <input type="number" name="side" id="side">
    </div>

    <div id="triangle" class="shape-form" style="display:none">
        <label for="side1">Side 1:</label>
        <input type="number" name="side1" id="side1">
        <br>
        <label for="side2">Side 2:</label>
        <input type="number" name="side2" id="side2">
        <br>
        <label for="side3">Side 3:</label>
        <input type="number" name="side3" id="side3">
    </div>

    <br>
    <input type="submit" name="submit" value="Calculate">
    </form>
    <script>
        // JavaScript to show/hide form fields based on selected shape
        var shape = document.getElementById("shape");
        var rectangle = document.getElementById("rectangle");
        var square = document.getElementById("square");
        var triangle = document.getElementById("triangle");

        shape.addEventListener("change", function() {
        if (shape.value === "rectangle") {
            rectangle.style.display = "block";
            square.style.display = "none";
            triangle.style.display = "none";
        } else if (shape.value === "square") {
            rectangle.style.display = "none";
            square.style.display = "block";
            triangle.style.display = "none";
        } else if (shape.value === "triangle") {
            rectangle.style.display = "none";
            square.style.display = "none";
            triangle.style.display = "block";
        }
        });
    </script>
</html>

<?php

// Handle form submission
if (isset($_POST['submit'])) {
    $shape = $_POST['shape'];
    if ($shape === 'rectangle') {
        $length = $_POST['length'];
        $width = $_POST['width'];
        $result = GeometricCalculator::calculateRectangle($length, $width);
        echo '<h2>Rectangle Results:</h2>';
        echo '<p>Area: ' . $result['area'] . '</p>';
        echo '<p>Perimeter: ' . $result['perimeter'] . '</p>';
        echo '<p>Length: ' . $result['length'] . '</p>';
        echo '<p>Width: ' . $result['width'] . '</p>';
    } else if ($shape === 'square') {
        $side = $_POST['side'];
        $result = GeometricCalculator::calculateSquare($side);
        echo '<h2>Square Results:</h2>';
        echo '<p>Area: ' . $result['area'] . '</p>';
        echo '<p>Perimeter: ' . $result['perimeter'] . '</p>';
        echo '<p>Side: ' . $result['side'] . '</p>';
    } else if ($shape === 'triangle') {
        $side1 = $_POST['side1'];
        $side2 = $_POST['side2'];
        $side3 = $_POST['side3'];
        $result = GeometricCalculator::calculateTriangle($side1, $side2, $side3);
        if (is_string($result)) {
            echo '<h2>Triangle Results:</h2>';
            echo '<p>' . $result . '</p>';
        } else {
            echo '<h2>Triangle Results:</h2>';
            echo '<p>Area: ' . $result['area'] . '</p>';
            echo '<p>Perimeter: ' . $result['perimeter'] . '</p>';
            echo '<p>Side 1: ' . $result['side1'] . '</p>';
            echo '<p>Side 2: ' . $result['side2'] . '</p>';
            echo '<p>Side 3: ' . $result['side3'] . '</p>';
        }
    }
}

?>

