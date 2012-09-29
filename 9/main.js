
function triple(m, n) {
  return [ m*m - n*n, 2*m*n, m*m + n*n];
}

function sum(a, b) {
  return a + b;
}

function product(a, b) {
  return a * b;
}

function findTripleSum(value) {
  var m = 2;
  while(true) {
    var trip = [0, 0, 0];
    for (var n = 1; n < m; n++) {
      trip = triple(m, n);
      if (trip.reduce(sum) == value)
        return trip;
    }
    m++;
  }
    
}

console.log(findTripleSum(1000).reduce(product, 1))