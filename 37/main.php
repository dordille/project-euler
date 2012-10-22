<?php

require __DIR__.'/../lib/php/prime.php';

function truncations($n) {
    $truncs = array();
    for ($i = 1; $i < strlen($n); $i++) {
        $truncs[] = substr($n, 0, $i);
    }
    for ($i = 1; $i < strlen($n); $i++) {
        $truncs[] = substr($n, $i);
    }

    return $truncs;
}

$sieve = new SieveOfErathosthenes(1000000);

foreach ($sieve as $p) {
    if ($p < 10) continue;
    $is = true;
    foreach (truncations($p) as $t) {
        if (!$sieve->isPrime($t)) {
            $is = false;
            break;
        }
    }
    if ($is) {
        $truncables[] = $p;
        if (count($truncables) >= 11) break;
    }
}
echo array_sum($truncables).PHP_EOL;
