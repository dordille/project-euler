<?php

$total = 0;
for ($i = 2; $i < (354294); $i++) {
    $digits = str_split($i);
    $sum = array_reduce($digits, function($sum, $d) {
        return $sum + pow($d, 5);
    }, 0);
    if ($sum == $i) {
        $total += $sum;
    }
}

echo $total . "\n";
