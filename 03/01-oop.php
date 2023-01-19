<?php

class Car {
    protected $type;
    protected $brand;
    
    public function __construct($type, $brand) {
        $this->type = $type;
        $this->brand = $brand;
    }

    public function returnCar() {
        return 'Car type: ' . $this->type . ', Brand: ' . $this->brand;
    }
}

class Truck extends Car {
    private $load;

    public function __construct($brand, $load) {
        parent::__construct($type = 'truck', $brand);
        $this->load = $load;
    }

    public function returnTruck() {
        $ret = parent::returnCar();
        $ret .= ', Load: ' . $this->load . ' t';
        $ret .= '<br>';
        return $ret;
    }
}

class Electric extends Car {
    private $batteryCapacity;

    public function __construct($brand, $batteryCapacity) {
        parent::__construct($type = 'electric', $brand);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function returnElectric() {
        $ret = parent::returnCar();
        $ret .= ', Battery capacity: ' . $this->batteryCapacity . ' Km';
        $ret .= '<br>';
        return $ret;
    }
}

// Task 1
echo '<h1>Task 1</h1>';
$cars = array(
    new Car ('personal', 'm-b'),
    new Car ('personal', 'ford'),
    new Truck ('ford', 50),
    new Electric ('tesla', 1500)
);

foreach ($cars as $car) {
    if ($car instanceof Truck) {
        echo $car->returnTruck();
    } elseif ($car instanceof Electric) {
        echo $car->returnElectric();
    } else {
        echo $car->returnCar();
        echo '<br>';
    }
}
