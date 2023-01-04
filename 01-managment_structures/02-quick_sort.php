<?php

function quick_sort($arr) {
    $pivot = $arr[0];
    $left_arr = array();
    $righ_arr = array_slice($arr, $pivot);
}

// Tests
$arr = array(5, 3, 18, 2, 16, 22, 8, 12);
echo quick_sort($arr);
