<?php

$lst = range(0, 9);
echo json_encode($lst)."\n";
$p = 1;
while ($lst = nextLex($lst)) {
    $p++;
    if ($p == 1000000)break;
}
echo json_encode($lst)."\n";

function array_swap($array, $i, $j) {
    $t = $array[$i];
    $array[$i] = $array[$j];
    $array[$j] = $t;

    return $array;
}

function nextLex($lst) {
    $n = count($lst);
    $i = $n - 2;
    while (($i >= 0) && ($lst[$i] > $lst[$i+1]))
        --$i;

    if ($i < 0) return false;

    $k = $n - 1;
    while ($lst[$i] > $lst[$k])
        --$k;
    $lst = array_swap($lst, $i, $k);

    $k = 0;
    for ($j = $i + 1; $j < ceil(($n + $i) / 2); $j++, $k++) {
        $lst = array_swap($lst, $j, $n-$k-1);
    }

    return $lst;
}
