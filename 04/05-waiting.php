<?php

class Patient {
    private $name;
    private $age;
    private $vaccinated;

    public function __construct($name, $age, $vaccinated) {
        $this->name = $name;
        $this->age = $age;
        $this->vaccinated = $vaccinated;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function isVaccinated() {
        return $this->vaccinated;
    }
}

class WaitingRoom {
    private $queue;

    public function __construct() {
        $this->queue = array();
    }

    public function addPatient(Patient $patient) {
        array_push($this->queue, $patient);
    }

    public function getNextPatient() {
        $nextPatient = null;

        foreach ($this->queue as $patient) {
            if ($nextPatient == null || $patient->getAge() < $nextPatient->getAge()) {
                $nextPatient = $patient;
            }
        }

        if ($nextPatient != null && $nextPatient->getAge() < 5) {
            return $nextPatient;
        }

        $vaccinatedPatient = null;
        foreach ($this->queue as $patient) {
            if ($nextPatient == null || (!$nextPatient->isVaccinated() && $patient->isVaccinated())) {
                $vaccinatedPatient = $patient;
            }
        }

        if ($vaccinatedPatient !== null) {
            return $vaccinatedPatient;
        } else {
            return $nextPatient;
        }
        
    }

    public function removePatient(Patient $patient) {
        $key = array_search($patient, $this->queue, true);
        if ($key !== false) {
            unset($this->queue[$key]);
        }
    }

    public static function renderPatientQueue(WaitingRoom $waitingRoom) {
        $patient = $waitingRoom->getNextPatient();
        while ($patient != null) {
            echo '<tr>';
            echo '<td>' . $patient->getName() . '</td>';
            echo '<td>' . $patient->getAge() . '</td>';
            echo '<td>' . ($patient->isVaccinated() ? 'Yes' : 'No') . '</td>';
            echo '</tr>';

            $waitingRoom->removePatient($patient);
            $patient = $waitingRoom->getNextPatient();
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Waiting Room</title>
</head>
<body>
    <?php

    // Create a waiting room object
    $waitingRoom = new WaitingRoom();

    // Add some patients to the waiting room
    $waitingRoom->addPatient(new Patient('John Doe', 30, true));
    $waitingRoom->addPatient(new Patient('Jane Doe', 25, false));
    $waitingRoom->addPatient(new Patient('Baby Doe', 2, true));
    $waitingRoom->addPatient(new Patient('Bob Smith', 40, false));
    $waitingRoom->addPatient(new Patient('Sara Johnson', 20, true));
    ?>

    <h1>Waiting Room Queue</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Vaccinated</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Render the patient queue
            WaitingRoom::renderPatientQueue($waitingRoom);
            ?>
        </tbody>
    </table>
</body>
</html>

