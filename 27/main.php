<?php

require __DIR__.'/../lib/php/prime.php';

class Problem27 {

  function __construct() {
    $this->sieve = new SieveOfErathosthenes(100000);
  }

  function solve() {
    $max = 0;
    $product = 0;
    for ($a = -1000; $a < 1000; $a++) {
      foreach ($this->sieve as $b) {
        if ($b >= 1000) break;
        $n = 0;
        while ($this->sieve->isPrime($n*$n + $a*$n + $b)) $n++;
        if ($n > $max) {
          $product = $a * $b;
          $max = $n;
          echo "$a, $b  $n \n";
        }
      }
    }

    return $product;
  }
}

$p = new Problem27();
echo $p->solve() . "\n";