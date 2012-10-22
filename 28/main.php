<?php
/**
 * $s - Spiral number $s by $s
 */

$i = 2;
$sum = 1;
while ($i <= 1001) {
    $sum += (($i - 1) * ($i - 1) * 4) + $i * 10;
    $i += 2;
}
echo $sum."\n";