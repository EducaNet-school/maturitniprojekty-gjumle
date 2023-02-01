<?php

class User {
    protected $name;
    protected $money = 100;
    protected $users;

    public function __construct($name, $users = null) {
        $this->name = $name;
    }

    public function getUser() {
        return $this->name . ', ' . $this->money . ' ';
    }

}

class Manager extends User {
    protected $money = 500;

    public function __construct($name, $users = null) {
        parent::__construct($name, $users);
    }
}

$users = array(new User ('Petr'), new User ('Pepa'), new User ('David'), new Manager ('Daniel'));

foreach ($users as $user) {
    echo $user->getUser();
    echo '<br>';
}
