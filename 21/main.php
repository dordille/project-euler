<?php

require __DIR__.'/../lib/php/prime.php';


$sieve = new SieveOfErathosthenes(10000);

$sums = array();
for ($i = 1; $i <= 10000; $i++) {
    $sums[$i] = $sieve->properDivisorsSum($i);
}
$amicable_sum = 0;
foreach ($sums as $n => $sum) {
    if (isset($sums[$sum]) && $n == $sums[$sum] && $n != $sum) {
        $amicable_sum+=$sum;
    }
}
echo $amicable_sum."\n";

