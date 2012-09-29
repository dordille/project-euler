<?php

class SieveOfErathosthenes Implements IteratorAggregate {

    private $sieve;

    public function __construct($size) {
        $this->size = $size;
        $this->sieve = range(0, $size);
        $this->initialize();
    }

    private function initialize() {
        unset($this->sieve[0]);
        unset($this->sieve[1]);
        for ($i = 2; $i <= floor(sqrt($this->size)); $i++) {
            if (isset($this->sieve[$i])) {
                for ($k = $i*2; $k <= $this->size; $k+=$i) {
                    unset($this->sieve[$k]);
                }
            }
        }
    }

    public function getIterator() {
        return new ArrayIterator($this->sieve);
    }

    public function getFactors($n) {
        if ($n > $this->size) {
            throw new Exception("{$n} > than {$this->size}");
        }
        $bound = $n / 2;
        $factors = array();
        foreach ($this->sieve as $prime) {
            while ($n % $prime == 0) {
                $factors[] = $prime;
                $n/= $prime;
            }
            if ($prime > $bound) break;
        }

        return $factors;
    }

    public function properDivisorsSum($i) {
    $divisors = divisors($this->getFactors($i));
    return array_reduce($divisors, function($sum, $d) use ($i) {
        if ($d != $i) $sum += $d;
        return $sum;
    }, 0);
}

}

function divisors($primes) {
    return _divisors(array_count_values($primes));
}

function reduce($array, $function, $initial) {
    foreach ($array as $k => $v) {
        $initial = $function($initial, $v, $k);
    }
    return $initial;
}

function _divisors($primes) {
    return array_map(function($map) {
        return reduce($map, function($product, $exponent, $base) {
            return $product * pow($base, $exponent);
        }, 1);
    }, cart($primes));
}

function cart($left, $rest = array()) {
    if (count($left) == 0) {
        return array($rest);
    }
    $arrs = array();
    $nleft = $left;
    $base = key($nleft);
    $exponent = current($nleft);
    unset($nleft[$base]);
    foreach (range(0, $exponent) as $i) {
        $rec = cart($nleft, $rest + array($base => $i));
        $arrs =  array_merge($arrs, $rec);
    };
    
    return $arrs;
}