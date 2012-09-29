<?php

function factorial($n) {
    $p = 1;
    while ($n > 1) {
        $p = bcmul($n, $p);$n--;
    }
    return $p;
}

echo array_sum(str_split(factorial(100)))."\n";