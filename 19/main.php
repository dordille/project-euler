<?php

$begin = new DateTime( '1901-01-01' );
$end = new DateTime('2000-12-31');
while ($begin->format('N') != '7') {
    $begin = $begin->add(new DateInterval('P1D'));
}
$d = 0;
$period = new DatePeriod($begin, new DateInterval("P7D"), $end);
foreach ($period as $date) {
    if ($date->format('d') == 1) $d++;
}
echo $d."\n";
