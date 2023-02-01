<?php

class Car {
    protected $brand;
    
    public function __construct($brand) {
        $this->brand = $brand;
    }

    public function returnCar() {
        return 'Car type: ' . get_class($this) . ', Brand: ' . $this->brand . ' ';
    }
}

class Truck extends Car {
    private $load;

    public function __construct($brand, $load) {
        parent::__construct($brand, $load);
        $this->load = $load;
    }

    public function returnCar() {
        return  'Car type: ' . get_class($this) . ', Brand: ' . $this->brand . ', Load: ' . $this->load . ' t ';
    }
}

class Electric extends Car {
    private $batteryCapacity;

    public function __construct($brand, $batteryCapacity) {
        parent::__construct($brand, $batteryCapacity);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function returnCar() {
        return 'Car type: ' . get_class($this) . ', Brand: ' . $this->brand . ', Battery capacity: ' . $this->batteryCapacity . ' Km ';
    }
}

// Task 1
echo '<h1>Task 1</h1>';
$cars = array(
    new Car ('m-b'),
    new Car ('ford'),
    new Truck ('ford', 50),
    new Electric ('tesla', 1500)
);

foreach ($cars as $car) {
    echo $car->returnCar();
}
