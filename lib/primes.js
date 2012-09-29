var primes = [2, 3];
module.exports.find = function(n) {
  if (n <= primes.length)
    return primes[n-1];
  var i = primes[primes.length - 1] + 2;
  var j, i;
  var prime;
  while ((n - primes.length) > 0) {
    var bound = Math.sqrt(i);
    for (j in primes) {
      if (i % primes[j] == 0) {
        break;
      }
      if (primes[j] > bound) {
        j = primes.length - 1;
        break;
      }
    }
    if (j == primes.length-1) {
      primes.push(i);
      n--;
    }
    i += 2;
  }
  
  return primes[primes.length-1];
}
module.exports.primes = primes;
