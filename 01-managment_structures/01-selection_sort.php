<?php

function selection_sort($arr) {
    for ($i = 0; $i < count($arr); $i++) {
        $min = $i;
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$j] < $arr[$min]) {
                $min = $j;
            }
        }
        if ($min != $i) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $temp;
        }
    }
    return $arr;
}

// Tests
$arr = array(6, 5, 8, 2, 16, 42, 15, 10, 20, 4);
$sorted_arr = selection_sort($arr);
echo print_r($arr);
echo print_r($sorted_arr);