<?php

function selection_sort($arr) {
    $arr_len = count($arr);
    $min = $arr[0];
    for ($i = 0; $i < $arr_len; $i++) {
        if ($min > $arr[$i]) {
            $min = $arr[$i];
        }
    }
}

// Tests
$arr = array(6, 5, 8, 2, 16, 42, 15, 10, 20, 4);
echo selection_sort($arr);