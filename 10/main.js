var primes = require('../lib/primes');

function sumPrimesBelows(n) {
  var i, prime, sum = 0;
  i = 1;
  while ((prime = primes.find(i)) < n) {
    console.log(prime);
    sum = sum + prime;
    i++;
  }
  
  return sum;
}

function sumPrimesBelow(n) {
  var nums = [];
  for (var i=0; i < n; i++) {
    nums.push(i);
  }
  var bound = Math.sqrt(n);
  var i = 2;
  while (i < bound) {
    console.log(i);
    if (nums[i]) {
      for (var j = i+i; j < n; j+=i) {
        delete nums[j];
      }
    }
    i++;
  }
}

var sum = sumPrimesBelow(2000000).reduce(function(a, b) {
  return a+b;
});

console.log(sum);