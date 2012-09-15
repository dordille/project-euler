var sum = 0;
var seq = [3, 2, 1, 3, 1, 2, 3];
var k = 0;
var i = 0;
while (i < 1000) {
  sum += i;
  i += seq[k];
  k++;
  if (k == seq.length) 
    k = 0;
}
console.log(sum);