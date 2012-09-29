<?php

class TriangularIterator implements Iterator {
    private $position = 1;
    private $sum = 0;

    public function __construct($i = 1) {
        $this->position = $i;
        $sum = $this->position * ($this->position + 1) / 2;
    }

    public function rewind() {
        $this->position = 1;
    }

    public function current() {
        $this->sum =  $this->sum + $this->position;
        return $this->sum;
    }

    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return true;
    }
  
}

function factor($n) {
    $bound = floor(sqrt($n))+1;
    $factors = array();
    for ($i = 2; $i <= $n / $i; $i++) {
        while ($n % $i == 0) {
            $factors[] = $i;
            $n = $n / $i;
        }
    }
    if ($n > 1) $factors[] = $n;

    return $factors;
}


$i = new TriangularIterator();
foreach($i as $k => $v) {
    if($k > 100000) {
        exit();  
    }
    $factors = factor($v);
    $d = array_reduce(array_count_values($factors), function($r, $v) {
        return ($v+1)*$r;
    }, 1);
    if ($d > 500) {
        echo "T({$k}) = {$v} " . json_encode($factors) . " d({$v}) = $d" . "\n";
        exit();
    }
    
}

