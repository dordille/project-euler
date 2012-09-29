<?php

require __DIR__.'/../lib/php/prime.php';


$sieve = new SieveOfErathosthenes(1000);

$cyclic = array();
foreach($sieve as $p) {
    if (10 % $p == 0) continue;
    $t = 0; $r = 1; $n = '';
    do {
        $t++;
        $x = $r * 10;
        $d = floor($x / $p);
        $r = $x % $p;
        $n.= $d;
    } while( $r != 1);
    if ($t == ($p - 1)) {
        $cyclic[$p] = $n;
    }
}

$max_length = 0;
$max_index = 0;
foreach($cyclic as $i => $cycle) {
    if (strlen($cycle) > $max_length) {
        $max_index = $i;
        $max_length = strlen($cycle);
    }
}
echo $max_index."\n";
