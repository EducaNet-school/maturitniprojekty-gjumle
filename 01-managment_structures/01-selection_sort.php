<?php

echo "Original array: ";
$arr = array(6, 5, 8, 2, 16, 42, 15, 10, 20, 4);
for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i] . " ";
}

echo "Sorted array: ";

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
    for ($i = 0; $i < count($arr); $i++) {
        echo $arr[$i] . " ";
    }
}

// Tests
$sorted_arr = selection_sort($arr);
print_r($sorted_arr);