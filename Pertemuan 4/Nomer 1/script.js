// untuk prompt agar bekerja pada node js
const prompt = require('prompt-sync')();

let a = 0
let b = 1
let temp
const input = parseInt(prompt("Jumlah suku Fibonacci: "))

console.log(a)

for (let i = 1; i < input; i++) {
    console.log(b);  
    temp = b;
    b = a + b;
    a = temp;
  }
