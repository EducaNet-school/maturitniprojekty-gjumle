<?php

$arr = [12, 58, 14, 6, 2, [14, 5, [6, 10]]];

function arrInArr($arr) {
    foreach ($arr as $item) {
        if (gettype($item) == 'array') {
            echo arrInArr($item);
        } else {
            echo $item . " ";
        }
    }
}

function countArr($arr) {
    // Count all values in arr
}

arrInArr($arr);
