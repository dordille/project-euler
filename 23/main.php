<?php

require __DIR__.'/../lib/php/prime.php';


$sieve = new SieveOfErathosthenes(28123);


$abundants = array();
$twoabundantsieve = range(0, 28123);
for ($i = 1; $i <= 28123; $i++) {
  if ($sieve->properDivisorsSum($i) > $i) {
    $abundants[] = $i;
    foreach ($abundants as $abundant) {
      unset($twoabundantsieve[$abundant+$i]);
    }
  }   
}
var_dump($abundants);
echo array_sum($twoabundantsieve);