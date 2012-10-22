<?php

function getCanidates($n) {
    $digits = str_split($n);
    $canidates = array();
    foreach ($digits as $digit) {
        foreach (range(1,9) as $i) {
            $canidates[] = (int)($digit.$i);
        }
    }

    return $canidates;
}
$numerator = $denominator = 1;
foreach (range(11, 99) as $n) {
    if ($n % 10 == 0) continue;
    $canidates = getCanidates($n);
    $digits = str_split($n);
    foreach($canidates as $canidate) {
        if ($canidate == $n) continue;
        $cdigits = str_split($canidate);
        foreach ($digits as $d => $digit) {
            foreach ($cdigits as $c => $cdigit) {
                if ($cdigit == $digit) {
                    $dd = $d? $digits[0] : $digits[1];
                    $cd = $c? $cdigits[0] : $cdigits[1];
                    if ($dd / $cd == $n / $canidate) {
                        $numerator = $numerator * $dd;
                        $denominator = $denominator * $cd;
                    }
                }
            }
        }
    }
}

echo "$numerator / $denominator \n";