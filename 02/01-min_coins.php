<?php

function min_coins($amount) {
    $coins = array(1, 2, 5, 10, 20, 50, 100, 200, 500);
    $combination = array();
    for ($i = count($coins) - 1; $i >= 0; $i--) {
        while ($amount >= $coins[$i]) {
            $amount -= $coins[$i];
            array_push($combination, $coins[$i]);
        }
    }
    $output = "<ul>";
    foreach ($combination as $coin) {
        $output .= "<li>$coin</li>";
    }
    $output .= "</ul>";
    return $output;
}

echo min_coins(1254);
