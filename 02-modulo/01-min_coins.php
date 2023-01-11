<?php

function getMinMoneyCombination($amount) {
    $denominations = array(1, 2, 5, 10, 20, 50, 100, 200, 500, 1000);
    $minCombination = array();
    $coins = array();
    // Initialize the minimum number of coins needed
    // for all amounts to infinity
    for ($i = 0; $i <= $amount; $i++) {
        $minCombination[$i] = PHP_INT_MAX;
    }
    for ($i = 0; $i <= $amount; $i++) {
        $coins[$i] = array();
    }
    // Base case for amount 0
    $minCombination[0] = 0;
    $coins[0][0] = 0;
    // Compute the minimum number of coins needed
    // for all amounts from 1 to amount
    for ($i = 1; $i <= $amount; $i++) {
        for ($j = 0; $j < count($denominations); $j++) {
            if ($denominations[$j] <= $i) {
                $res = $minCombination[$i - $denominations[$j]];
                // if the current coin denomination + the number of coins needed to make the remaining amount 
                // is less than the current minimum number of coins needed
                if ($res != PHP_INT_MAX && $res + 1 < $minCombination[$i]) {
                    // update the minimum number of coins needed
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
