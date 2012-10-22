<?php

$nums = array();
for ($a = 2; $a <= 100; $a++) {
    for ($b = 2; $b <= 100; $b++) {
        $nums[bcpow($a, $b)] = true;
    }
}
echo count($nums)."\n";