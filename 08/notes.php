<?php

class Students
{
    private $id;
    private $name;
    private $note;

    public function __construct($id, $name, $note = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->note = $note;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function generateStudents($count)
    {
        $students = [];
        for ($i = 1; $i <= $count; $i++) {
            $students[] = new Students($i, 'Student ' . $i);
        }
        return $students;
    }

    public static function writeNote($students)
    {
        foreach ($students as $student) {
            if ($student->getId() % 3 === 0 && $student->getId() % 5 !== 0) {
                $student->note = 'EDUCA';
            } elseif ($student->getId() % 2 === 0) {
                $student->note = 'NET';
            } elseif ($student->getId() % 3 === 0 && $student->getId() % 5 === 0) {
                $student->note = 'EDUCANET';
            } else {
                $student->note = 'N/A';
            }
        }
    }

    public static function renderStudentsInTable()
    {
        $students = Students::generateStudents(15);
        Students::writeNote($students);
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Name</th><th>Note</th></tr>';
        foreach ($students as $student) {
            echo '<tr>';
            echo '<td>' . $student->id . '</td>';
            echo '<td>' . $student->name . '</td>';
            echo '<td>' . $student->note . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}

Students::renderStudentsInTable();
