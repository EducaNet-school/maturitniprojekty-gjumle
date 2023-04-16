<?php

function printAnimalsInString(array $animals, $string) {
    foreach ($animals as $animal) {
        if (strpos($string, $animal) !== false) {
            echo $animal . " is in the string" . PHP_EOL . '<br>';
        }
    }
}

$animals = ['cat', 'dog', 'bird', 'fish'];
$string = 'I have a cat and a dog';

printAnimalsInString($animals, $string);