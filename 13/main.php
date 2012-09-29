<?php
$input = file_get_contents($argv[1]);
$nums = explode("\n", $input);
$sum = 0;
foreach($nums as $num) {
    $sum += $num;
}
echo $sum;

