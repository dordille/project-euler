<?php

require __DIR__.'/../lib/php/prime.php';

function rotationsOf($n) {
    $rotations = array();
    for ($i = 1; $i < strlen($n); $i++)
        $rotations[] = substr($n, $i) . substr($n, 0, $i);

    return $rotations;
}

$sieve = new SieveOfErathosthenes(1000000);

$circulars = array();
foreach ($sieve as $prime) {
    $rotations = rotationsOf($prime);
    $isCircular = true;
    foreach ($rotations as $rotation) {
        if(!$sieve->isPrime($rotation)) {
            $isCircular = false;
            break;
        }
    }
    if($isCircular) $circulars[] = $prime;
}

echo count($circulars)."\n";