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
    protected $type = 'truck';

    public function __construct($brand, $load) {
        parrent::__construct($type, $brand);
        $this->load = $load;
    }
}

class Electric extends Car {
    private $batteryCapacity;
    protected $type = 'electric';

    public function __construct($brand, $batteryCapacity) {
        parrent::__construct($type, $brand);
        $this->batteryCapacity = $batteryCapacity;
    }
}

$car1 = new Car('personal', 'm-b');
$car2 = new Truck('ford', 15);
echo $car1->returnCar();
echo $car2->returnCar();