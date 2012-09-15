function fib_even1(max) {
  var sum = 0;
  var last = 1;
  var cur = 1;
  var even = 2;
  while (even < max) {
    sum += even;
    last = cur + even;
    cur = even + last;
    even = last + cur;
  }
  return sum;
}

console.log(fib_even1(4000000));