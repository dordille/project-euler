<?php

function factorial($n) {
    if ($n == 0) return 1;
    return $n * factorial($n-1);
}

$factorials = array();
foreach(range(0, 9) as $i) {
    $factorials[$i] = factorial($i);
}

// 2540160 maximum number represented by sum of single digit factorials where number of sums is
// less than or equal to digits

$total = 0;
for ($n = 10; $n <= 2540160; $n++) {
    $digits = str_split($n);
    $sum = 0;
    foreach ($digits as $digit)
        $sum += $factorials[$digit];
    if ($sum == $n)
        $total += $n;
}

echo $total . "\n";
