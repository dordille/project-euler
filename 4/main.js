

function digits(n) {
  return 1+Math.floor(Math.log(n)/Math.log(10));
}

function intToArray(n) {
  var array = [];
  var t = 10;
  for (var i = 0; i < digits(n); i++) {
    var d = (n % t) / t;
    array.unshift(d*10);
    n = n - d*t;
    t = t * 10;
  }

  return array;
}

function isPdrome(n) {
  var array = intToArray(n);
  for (var i = 0; i < Math.floor(array.length / 2); i++) {
    if (array[i] != array[array.length-i-1]) return false;
  }

  return true;
}

for (var i = 999; i > 900; i--) {
  for (var j = 999; j > 900; j--) {
    if (isPdrome(i*j)) {
      console.log(i*j);
      process.env.exit(0);
    }
  }
}

console.log(isPdrome(123321));