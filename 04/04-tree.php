<?php

class Employee {
    private $name;
    private $salary;
    private $subordinates = array();

    public function __construct($name, $salary, $subordinates = null) {
        $this->name = $name;
        $this->salary = $salary;
        $this->subordinates = $subordinates;
    }

    public function getSubordinates() {
        $subordinates = $this->subordinates;
        echo '<ul>';
        echo '<li>' . $this->name . '</li>';
        foreach ($subordinates as $subordinate) {
            if ($subordinates < 0) {
                echo '<ul>';
                $this->getSubordinates();
            } else {
                echo '<li>' . $subordinate . '</li>';
            }
        }
        echo '</ul>';
    }
}

$users = array(new Employee ('Petr', 200), new Employee ('Pepa', 300), new Employee ('David', 200), new Employee ('Daniel', 200, array('Petr', 'Simon')));
foreach ($users as $user) {
    $user->getSubordinates();
}
