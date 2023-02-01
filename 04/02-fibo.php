<?php

function fibo($n) {
    if ($n == 1) {
        return 0;
    } elseif ($n == 2) {
        return 1;
    } else {
        return fibo($n - 2) + fibo($n - 1);
    }
}

function printFibo($n) {
    for ($i = 1; $i <= $n; $i++) {
        echo fibo($i) . ' ';
    }
}

printFibo(6);
