<?php

function getMinMoneyCombination($amount) {
    $denominations = array(1, 2, 5, 10, 20, 50, 100, 200, 500, 1000);
    $minCombination = array();

    for ($i = 0; $i <= $amount; $i++) {
        $minCombination[$i] = PHP_INT_MAX;
    }
    $coins = array();
    for ($i = 0; $i <= $amount; $i++) {
        $coins[$i] = array();
    }

    $minCombination[0] = 0;
    $coins[0][0] = 0;
    for ($i = 1; $i <= $amount; $i++) {
        for ($j = 0; $j < count($denominations); $j++) {
            if ($denominations[$j] <= $i) {
                $res = $minCombination[$i - $denominations[$j]];
                if ($res != PHP_INT_MAX && $res + 1 < $minCombination[$i]) {
                    $minCombination[$i] = $res + 1;
                    $coins[$i] = $coins[$i - $denominations[$j]];
                    array_push($coins[$i], $denominations[$j]);
                }
            }
        }
    }
    return "Output: " . implode(",", $coins[$amount]);
}


echo getMinMoneyCombination(1254);

