<?php

$nums = array(
    0 => '',
    1 => 'one',
    2 => 'two',
    3 => 'three',
    4 => 'four',
    5 => 'five',
    6 => 'six',
    7 => 'seven',
    8 => 'eight',
    9 => 'nine',
    10 => 'ten',
    11 => 'eleven',
    12 => 'twelve',
    13 => 'thirteen',
    14 => 'fourteen',
    15 => 'fifteen',
    16 => 'sixteen',
    17 => 'seventeen',
    18 => 'eighteen',
    19 => 'nineteen',
    20 => 'twenty',
    30 => 'thirty',
    40 => 'forty',
    50 => 'fifty',
    60 => 'sixty',
    70 => 'seventy',
    80 => 'eighty',
    90 => 'ninety',
    1000 => 'one thousand'
);
$ct = 0;
for ($i = 1; $i <= 1000; $i++) {
    $h = floor($i / 100);
    $t = floor(($i - $h*100) / 10);
    $o = floor(($i - $h*100 - $t*10));

    $s = '';
    if (isset($nums[$i])) {
        $s = $nums[$i];
    } else {
        if ($h > 0) {
            $s.= $nums[$h] . " hundred";
            if ($t || $o) $s.= " and ";
        }
        if (isset($nums[$t*10+$o])) {
            $s.= $nums[$t*10+$o];
        } else if ($t || $o) {
            if (isset($nums[$t*10])) $s.= $nums[$t*10];
            if ($o) $s.= ' ' .$nums[$o];
        }
        
    }
    

    echo $s;
    $ct += strlen(str_replace(' ','',$s));
    echo "\n";
}
echo $ct . "\n";