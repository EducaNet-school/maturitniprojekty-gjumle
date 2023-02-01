<?php

function fact($n) {
    return ($n == 0) ? 1 : $n * fact($n - 1);
}

echo fact(5);