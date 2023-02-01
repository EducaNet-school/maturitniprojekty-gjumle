<?php

$arr = [12, 58, 14, 6, 2, [14, 5, [6, 10]]];
$count = 0;

function arrInArr($arr) {
    global $count;
    foreach ($arr as $item) {
        if (gettype($item) == 'array') {
            arrInArr($item);
        } else {
            echo $item . " + ";
            $count = $count + $item;
        }
    }
}

arrInArr($arr);
echo '= ' . $count;