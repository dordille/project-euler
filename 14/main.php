<?php

class Hailstone {

    private $cache = array(1 => array(1));
    private $lengths = array(1 => 1);

    public function sequence($n) {
        if (isset($this->cache[$n]))
            return $this->cache[$n];
        $s = array($n);
        $n = ($n & 1)?  3 * $n + 1 : $n / 2;
        $this->cache[$n] = $this->sequence($n);
        $s = array_merge($s, $this->cache[$n]);

        return $s;
    }

    public function length($n) {
        if (isset($this->lengths[$n]))
            return $this->lengths[$n];
        $n = ($n & 1)?  3 * $n + 1 : $n / 2;
        $this->lengths[$n] = $this->length($n);
        
        return $this->lengths[$n] + 1;
    }

}




$h = new Hailstone();
$max = 1;
$max_num = 1;
for ($i = 1000000; $i > ; $i--) {
    $l = $h->length($i);
    if ($l > $max) {
        $max = $l;
        $max_num = $i;
    }
}
echo $max_num;
