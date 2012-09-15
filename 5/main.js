var primes = [2];

function isPrime(n, primes) {
  return primes.some(function(prime) {
    return n % prime != 0;
  });
}

function factor(n) {
  var factors = [];
  // First loop through known primes
  var i = 0;
  var prime = 2;
  var bound = Math.sqrt(n);
  var orig = n;
  while (i < primes.length && prime <= n) {
    prime = primes[i];
    if (n % prime) i++;
    else {
      factors.push(prime);
      n = n / prime;
    }
  }
  
  if (prime == 2) prime++;
  while (prime <= n && prime <= orig) {
    if (isPrime(prime, primes)) {
      primes.push(prime);
      while (n % prime == 0) {
        factors.push(prime);
        n = n / prime;
      } 
    }
    prime+=2;
  }

  if (factors.length < 1) factors.push(orig);

  return factors;
}

function smallestDivisibleSequence(n) {
  var maxCardinality = {};
  for (var i=n; i > 1; i--) {
    var cardinality = {};
    factor(i).forEach(function(factor) {
      cardinality[factor] = cardinality[factor] || 0;
      cardinality[factor]++;
    });
    for (var j in cardinality) {
      maxCardinality[j] = Math.max(maxCardinality[j] || 0, cardinality[j]);
    } 
  }
  var product = 1;
  for (var i in maxCardinality) {
    product *= Math.pow(i, maxCardinality[i]);
  }

  return product;
}
console.log(smallestDivisibleSequence(20));



