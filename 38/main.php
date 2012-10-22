<?php

/*$start = '987654321';

function array_swap($array, $i, $j) {
    $t = $array[$i];
    $array[$i] = $array[$j];
    $array[$j] = $t;

    return $array;
}

function nextPD($p) {
    $p = str_split($p);
    $count = count($p);
    $i = $count - 2;
    while (($i >= 0) && $p[$i+1] > $p[$i])
        --$i;

    if ($i < 0) return false;

    $k = $i + 1;
    $max = 0;
    $maxi = 0;
    while ($k < $count) {
        if ($p[$k] > $max && $p[$k] < $p[$i]) {
            $maxi = $k;
            $max = $p[$k];
        }
        ++$k;
    }
    $p = array_swap($p, $i, $maxi);

    $left = array_slice($p, 0, $i+1);
    $right = array_slice($p, $i+1);
    rsort($right);

    return join($left).join($right);
}

$lex = array();
while( $start ) {
    echo $start.PHP_EOL;
    $start = nextPD($start);
}*/

$pandigits = array(
    '49' => 1,
    '50' => 1,
    '51' => 1,
    '52' => 1,
    '53' => 1,
    '54' => 1,
    '55' => 1,
    '56' => 1,
    '57' => 1,
);

$isPD = function($n, $size) use ($pandigits) {
    if (strlen($n) != 9) return false;
    $digits = array_filter(count_chars($n), function($i) { return $i; });
    return ($digits == $pandigits);
};



for ($n = 1; $n < 10000; $n++) {
    for ($i = 2; $i <= 9; $i++) {
        $num = '';
        for ($k = 1; $k <= $i; $k++) {
            $num .= ($n * $k);
        }
        if (strlen($num) > 9) break;
        if ($isPD($num, 9))
            echo "$n, $k $num \n";
    }
    //exit();
}
