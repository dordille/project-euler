<?php

$input = file_get_contents($argv[1]);
$lines = explode("\n", $input);
$triangle = array();
foreach ($lines as $line) {
    $triangle[] = explode(" ", $line);
}

for ($i = (count($triangle) - 1); $i > 0; $i--) {
    for ($k=0; $k < count($triangle[$i-1]); $k++) {
        $triangle[$i-1][$k] = $triangle[$i-1][$k] + max($triangle[$i][$k], $triangle[$i][$k+1]);
    }
}
var_dump($triangle[0][0]);