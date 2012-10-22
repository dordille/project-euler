<?php

function isPalindrome($s) {
    $rev = strrev($s);
    return ($s == $rev && $rev[0] != '0');
}

$sum = 0;
for ($n = 1; $n < 1000000; $n++) {
    if (isPalindrome($n) && isPalindrome(decbin($n)))
        $sum+=$n;
}

echo $sum.PHP_EOL;