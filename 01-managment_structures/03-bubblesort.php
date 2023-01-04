<?php

echo "Original array: ";
$arr = array(6, 5, 8, 2, 16, 42, 15, 10, 20, 4);
for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i] . " ";
}

echo "Sorted array: ";

function bubble_sort($arr) {
    for ($i = 0; $i < count($arr); $i++) {
        $swapped = false;
        for ($j = 0; $j < count($arr) - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
                $swapped = true;
            }
        }
        if ($swapped == false) {
            break;
        }
    }
    for ($i = 0; $i < count($arr); $i++) {
        echo $arr[$i] . " ";
    }
} 

// Tests
$sorted_arr = bubble_sort($arr);
print_r($sorted_arr);