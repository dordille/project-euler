<?php

$input = file_get_contents($argv[1]);
$names = str_getcsv($input);
sort($names);
$sum = 0;
foreach ($names as $key => $name) {
  $score = ($key + 1) * array_reduce(str_split($name), function($r, $c) {
    return $r + ord($c) - 64;
  }, 0);
  $sum += $score;
}

var_dump($sum);