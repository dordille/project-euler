<?php

function sumPrimesBelow($n) {
  $nums = range(0, $n);

  $bound = sqrt($n);
  $i = 2;
  $sum = 0;
  while ($i < $bound) {
    echo $i."\n";
    if (!is_null($nums[$i])) {
      $sum += $i;
      for ($j = 2*$i; $j < $n; $j+=$i) {
        $nums[$j] = null;
      }
    }
    $i++;
  }
  while ($i < $n) {
    if (!is_null($nums[$i])) {
      $sum += $i;
    }
    $i++;
  }

  return $sum;
}

echo sumPrimesBelow(2000000)."\n";

