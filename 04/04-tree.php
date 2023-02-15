<?php

class Subordinate {
    public $name;
    public $salary;
    public $subordinates = array();

    function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    function addSubordinate($subordinate) {
        array_push($this->subordinates, $subordinate);
    }

    function renderTree() {
        $output = '<ul>';
        $output .= '<li>' . $this->name . ' ($' . $this->salary . ')' . '</li>';

        if (count($this->subordinates) > 0) {
            $output .= '<ul>';
            foreach ($this->subordinates as $subordinate) {
                $output .= $subordinate->renderTree();
            }
            $output .= '</ul>';
        }

        $output .= '</ul>';
        return $output;
    }
}

// Example usage:
$ceo = new Subordinate('John Doe', 1000000);
$manager1 = new Subordinate('Jane Smith', 500000);
$manager2 = new Subordinate('Bob Johnson', 500000);
$developer1 = new Subordinate('Alice Lee', 200000);
$developer2 = new Subordinate('David Kim', 200000);

$manager1->addSubordinate($developer1);
$manager2->addSubordinate($developer2);
$ceo->addSubordinate($manager1);
$ceo->addSubordinate($manager2);

echo $ceo->renderTree();
