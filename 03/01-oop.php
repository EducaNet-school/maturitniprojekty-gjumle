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
        $ret .= ' Load: ' . $this->load;
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
        $ret .= ' Battery capacity: ' . $this->batteryCapacity;
        return $ret;
    }
}

$car1 = new Car('personal', 'm-b');
$car2 = new Truck('ford', 50);
$car3 = new Electric('tesla', 1500);
echo $car1->returnCar();
echo $car2->returnTruck();
echo $car3->returnElectric();