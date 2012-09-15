function isPrime(i, known) {
  if (i == 1) return false;
  return known.some(function(prime) {
    return i % prime != 0;
  });
}

function factors(i) {
  var factors = [];
  var known = [2];
  var n = 1;
  while (n <= i) {
    if (isPrime(n, known)) {
      known.push(n);
      if (i % n == 0) {
        factors.push(n);
        i = i / n;
      } 
    }
    n+=2;
  }

  return factors;
}

function maxFactor(i) {
  return Math.max.apply(Math, factors(i));
}

console.log(factors(990099));