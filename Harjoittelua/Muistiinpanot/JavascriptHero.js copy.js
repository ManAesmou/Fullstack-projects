//POISTA TÄMÄ: https://www.jshero.net/en/koans/function.html

//ASENNA VISUALSTUDIOCODE:
//APUOHJELMAT: Essential Extension Pack + FSK Extension Pack

//hyvä peli :D https://silentteacher.toxicode.fr/

//Aloitin katsomaan JavaScript Programming - Full Course.
//Jäin kohtaan 6:55:02

//https://github.com/ViklaSail/hosting-parsons-on-github-template
//Pakollisia tehtäväharjoituksia. (Pekka)

/* MAZE 10 level:
while (notDone()) {
  moveForward();
  if (isPathLeft()) {
    if (isPathRight()) {
      if (isPathForward()) {
        turnRight();
      } else {
        turnLeft();
      }
    } else {
      turnLeft();
    }
  } else {
    if (isPathRight()) {
      turnRight();
    }
  }
}
*/

/*
1. Variables

Declare a variable firstname and initialize it with the value 'Lata'.
*/

var firstname ='Lata';


/*
2. What is x?

Which value does x have after execution of the following code?
let x = 'Geeta';
*/

'Geeta'


/*
3. Several variables

Declare a variable flower and assign it the value 'rose'. Declare a second variable tree and assign it the value 'maple'.
*/

let flower = "rose";
let tree = "maple";


/*
4. Reassignment

Which value does x have after execution of the following code?
let x = 'Tic';
x = 'Tac';
x = 'Toe';
*/

'Toe'


/*
5. Assign variables

Which value does x have after execution of the following code?
let x = 'Laurel';
let y = 'Hardy';
let z = y;
y = x;
x = z;
*/

'Hardy'


/*
6. Functions

Define a function hello that returns 'Hello world!'.
*/

function hello() {
    return 'Hello world!';
  }


/*
7. Multiple functions

Define two functions. The first function a should return 'Hello a!' and the second function b should return 'Hello b!'.
*/

function a() {
    return 'Hello a!';
}
function b() {
    return 'Hello b!';
}


/*
8. Function calls

1. Define a function greet returning the value 'Haydo!'.
2. Declare a variable salutation. Call the function greet and assign the result of //the call to the variable salutation.
*/

function greet() {
    return 'Haydo!';
  }

  let salutation = greet();


/*
9. What is x?

Which value does x have after execution of the following code?
function hello() {
  return 'Hi!';
}

let x = hello();
*/

'Hi!' 


/*
10. Parameters

Write a function echo that also returns the passed parameter. echo('Greta') should return 'Greta' and echo('CO2') should return 'CO2'
*/

function echo (x) {
    return x;
  }
  echo ('Greta');


/*
11. What is x?

Which value does x have after execution of the following code?

function reply(phrase) {
  return phrase;
}

let x = reply('How do you do?');
*/

'How do you do?'


/*
12. Strings

Write a function greet having one parameter and returning 'Hello <parameter>!'.

Example: greet('Ada') should return 'Hello Ada!' and greet('Grace') should return 'Hello Grace!'.
*/

function greet(name) {
    return 'Hello ' + name + '!';
}


/*13. What is x?
Which value does x have after execution of the following code?
function whereIs(name) {
  return 'Where is ' + name + '?';
}

let x = whereIs('Jacky');
*/

'Where is Jacky?'


/*
14. What is x?
Which value does x have after execution of the following code?
function hi(name) {
  return 'Hi ' + name + '!';
}

let h1 = hi('Selva');
let h2 = hi('Pola');
let x = h1 + ' ' + h2;
*/

'Hi Selva! Hi Pola!'


/*
15. Logging
Write a function log that logs 'Hello Console!'. If you are working with a desktop browser, open the developer tools to see the output there as well.
*/

function log() {
    return console.log('Hello Console!');
  }


/*
16. Logging variables
Write a function log, that takes a parameter and logs this parameter.

Example: log('Ken Thompson') should log 'Ken Thompson'.
*/

function log(name) {
  return console.log(name);
}


/*
17. Logging and Strings 
Write a function shout that takes a string and returns this string duplicated. In addition, the return should be logged.

Example: shout('Fire') should return 'FireFire' and should log 'FireFire'.
*/

function shout(word) {
  let result = word + word;
  console.log(result);
  return result;
}



/*
18. Silent Teacher
Which value does x have after execution of the following code?

function double(name) {
  return name + ' and ' + name;
}

let x = double('Roy');
*/

'Roy and Roy'


/*
19. String: length KERTOO MERKKIEN PITUUDEN
Write a function length that takes a string and returns the number of characters of the string.

Example: length('sun') should return 3.
*/

let boy = 'Ismo'

function length (boy) {
  let nimenPituus = boy.length;
  return nimenPituus;
}


/*
20. String: toUpperCase() MUUTTAA ISOIKSI KIRJAIMIKSI
Write a function toCase that takes a string and returns that string in lowercase and uppercase with - as delimiter.

Example: toCase('Mthatha') should return 'mthatha-MTHATHA'.
*/

let nimi = 'Mthatha';

function toCase(nimi) {
    return nimi.toLowerCase() + '-'+ nimi.toUpperCase();
}


/*
21. String: charAt() PALAUTTAA SEN INDEXIN KIRJAIMEN/NUMERON
Write a function shortcut that takes two strings and returns the initial letters of theses strings.

Example: shortcut('Amnesty', 'International') should return 'AI'.
*/

function shortcut(word1, word2) {
  return word1.charAt(0) + word2.charAt(0);
}


/*
22. String: trim() POISTAA YLIMÄÄRÄISET VÄLIT
Write a function firstChar, which returns the first character that is not a space when a string is passed.

Example: firstChar(' Rosa Parks ') should return 'R'.
*/

function firstChar(word1) {
    return word1.trim().charAt(0)
}


/*
23. String: indexOf() KERTOO, MISSÄ KOHTAA KYSEISET MERKIT OVAT INDEXISSÄ.
Write a function indexOfIgnoreCase taking two strings and determining the first occurrence of the second string in the first string. The function should be case insensitive.

Example: indexOfIgnoreCase('bit','it') and indexOfIgnoreCase('bit','IT') should return 1.
*/

function indexOfIgnoreCase(s1, s2) {
  let s1Lower = s1.toLowerCase(); //muuttaa muuttujan pienikirjaimiseksi.
  let s2Lower = s2.toLowerCase();
  return s1Lower.indexOf(s2Lower); //Tämä näyttää myös isot ja pienet merkit muuttujassa.
}


/*
24. String: indexOf() with from index TÄSSÄ MÄÄRITELLÄÄN TOISELLA PARAMETRILLÄ ALOITUS INDEXI.
Write a function secondIndexOf, taking two strings and determining the second occurrence of the second string in the first string. If the search string does not occur twice, -1 should be returned.

Example: secondIndexOf('White Rabbit', 'it') should return 10.
*/

function  secondIndexOf(s1, s2) {
  let firstIndex = s1.indexOf(s2);
  return s1.indexOf(s2, firstIndex + 1);
}


/*
25. String: substr() TÄMÄ OTTAA TALTEEN HALUTUT MERKIT
Write a function firstWord, taking a string and returning the first word in that string. The first word are all characters up to the first space.

Example: firstWord('see and stop') should return 'see'.
*/

function firstWord (string1) {
  let firstIndex = string1.indexOf(' '); //Tämä määrittää ensimmäisen välin aloitukseksi.
  return string1.substr(0, firstIndex); //Tämä palauttaa ottaen talteen indexin 0 ja firstIndex väliltä. 
}


/*
26. String: replace(tästä, tähän) TÄMÄ KORVAA MERKIT. ENSIMMÄINEN VASTAAVA VAIN KORVATAAN.
Write a function normalize, that replaces '-' with '/' in a date string.

Example: normalize('20-05-2017') should return '20/05/2017'.
*/

function normalize(date) {
  let newDate = date.replaceAll('-', '/') //Tämä muuttaa kaikki merkit.
  return newDate;
}


/*
27. Numbers
Write a function add that takes two numbers and returns their sum.

Example: add(1, 2) should return 3.
*/

function add(num1, num2) {
  let sum = num1 + num2;
  return sum;
}


/*
28. Increment
Which value does x have after execution of the following code?
let x = 3;
x++;
x = x * 2;
x--;
*/



/*
29. Fahrenheit
Write a function toFahrenheit that converts a temperature from Celsius to Fahrenheit.

Example: toFahrenheit(0) should return 32.
*/

function toFahrenheit(celsius) {
  return 1.8 * celsius + 32;
}


/*
30. Modulo
Write a function onesDigit that takes a natural number and returns the ones digit of that number.

Example: onesDigit(2674) should return 4.
*/

function onesDigit(input) {
  return input % 10;
}


/*
31. Parentheses
Write a function mean that takes 2 numbers and returns their mean value.

Example: mean(1, 2) should return 1.5.
*/

function mean(num1, num2) {
  return (num1 + num2) / 2;
}


/*
32. Math
Write a function hypotenuse that calculates the length of the hypotenuse of a right triangle. The length of the two legs is passed to the function. Tip: In a right triangle the Pythagorean theorem is valid. If a and b are the lengths of the two legs and c is the length of the hypotenuse, the following is true: a² + b² = c². Since 3² + 4² = 5² applies, hypotenuse(3, 4) should return 5.
*/

function hypotenuse(a, b) {
  let cSquare = Math.pow(a, 2) + Math.pow(b, 2);
  return Math.sqrt(cSquare);
}


/*
33. min and max
Write a function midrange, that calculates the midrange of 3 numbers. The midrange is the mean of the smallest and largest number.

Example: midrange(3, 9, 1) should return (9+1)/2 = 5.
*/

function midrange(a, b, c) {
  let min = Math.min(a, b, c);
  let max = Math.max(a, b, c);
  return (min + max) / 2;
}


/*
34. Math.PI
Besides functions Math offers some mathematical constants. Math.PI gives π (roughly 3.14) and Math.E gives Euler's number e (roughly 2.71).

Write a function area that calculates the area of a circle. The function is given the radius of the circle.

Example: area(1) should return π and area(2) should return 4 * π.
*/

function area(myRadius) {
  return (myRadius * myRadius * Math.PI);
}


/*
35. Rounding
Math.round() rounds a number to the nearest integer, Math.floor() rounds a number downwards to the nearest integer and Math.ceil() rounds a number upwards to the nearest integer. Therefore, the variables a to d all get the value 5.

Write a function round100 that rounds a number to the nearest hundred.

Example: round100(1749) should return 1700 and round100(856.12) should return 900.
*/

function round100(num) {
  return Math.round(num/100)*100;
}


/*
36. Random numbers
Write a function dice that returns like a dice a random number between 1 and 6.
*/

function dice() {
  return Math.round(Math.random()* 5) + 1;
}


/*
37. parseInt
/*
Write a function add that takes a string with a summation task and returns its result as a number. Two natural numbers should be added. The summation task is a string of the form '102+17'.

Example: add('102+17') should return 119.
*/

function add(s) {
  let summand1 = parseInt(s, 10);
  let indexPlus = s.indexOf('+');
  let sAfterPlus = s.substr(indexPlus + 1);
  let summand2 = parseInt(sAfterPlus, 10);
  return summand1 + summand2;
}


/*
38. Boolean
JavaScript has three Boolean operators: && (and), || (or) and ! (not). && links two Boolean values.

Write a function nand that takes two Boolean values. If both values are true, the result should be false. In the other cases the return should be true.

I.e.: The call nand(true, true) should return false. The calls nand(true, false), nand(false, true) and nand(false, false) should return true.
*/

function nand(a, b) {
  let and = a && b;
  return !and;
}


/*
39. NOR
Write a function nor that takes two Boolean values. If both values are false, the result should be true. In the other cases the return should be false.

I.e.: The call nor(false, false) should return true. The calls nor(true, false), nor(false, true) and nor(true, true) should return false.
*/

function nor(a, b) {
  let or = a || b;
  return !or;
}


/*
40. XOR
Write a function xor that takes two Boolean values. If both values are different, the result should be true. If both values are the same, the result should be false.

I.e.: The calls xor(true, false) and xor(false, true) should return true. The calls xor(true, true) and xor(false, false) should return false.
*/

function xor(a, b) {
  let xor = !a != !b;
  return xor;
}


/*
41. Strict equality
Write a function equals that checks two values for strict equality.

Example: equals(1, 1) should return true and equals(1, 2) should return false.
*/


function equals(num1, num2) {
  let equals = num1 === num2;
  return equals
}


//function equals(a, b) {
//  return a === b;
//}

/*
42. Three identical values
Write a function equals that checks 3 values for strict equality. The function should only return true if all 3 values are equal.

Example: equals(1, 1, 1) should return true and equals(1, 2, 1) should return false.
*/

function equals(a, b, c) {
  let equal = a === b && b === c;
  return equal;
}


/*
43. Even numbers
Write a function isEven that checks if a passed number is even. If the given number is even, true should be returned, otherwise false.

Example: isEven(2) should return true and isEven(3) should return false.
*/

function isEven(num) {
  let boolean = true
  if (num % 2 === 0) {
    boolean = true;
  } else {
    boolean = false;
  }
  return boolean
}


/*
44. Strict inequality
Write a function unequal that checks 3 values for strict inequality. The function should return true if all three parameters are strict unequal. Otherwise false.

Example: unequal(1, 2, 3) should return true and unequal(1, 1, 2) should return false.
*/

function unequal(a, b ,c) {
  let boolean = a !== b && b !== c && c !== a
  return boolean
}


/*
45. Compare numbers
Write a function isThreeDigit that checks if a number is greater than or equal to 100 and less than 1000.

Example: isThreeDigit(500) should return true and isThreeDigit(50) should return false.
*/

function isThreeDigit(num) {
  let check = num >= 100 && num < 1000
  return check
}


/*
46. if
Write a function equals that checks two values for strict equality. If the two values are equal, the string 'EQUAL' should be returned. If they are unequal, you should get 'UNEQUAL'.

Example: equals(1, 1) should return 'EQUAL' and equals(1, 2) should return 'UNEQUAL'.
*/

function equals(a, b) {
  if (a === b) {
    return 'EQUAL'
  } else {
    return 'UNEQUAL'
  }
}


/*
47. Two returns
Write a function repdigit that determines whether a two-digit decimal is a repdigit or not. If the decimal is a repdigit, 'Repdigit!' should be returned, otherwise 'No Repdigit!'.

Example: repdigit(22) should return 'Repdigit!' and repdigit(23) should return 'No Repdigit!'.
*/

function repdigit(num) {
  let ones = num % 10;
  let tens = Math.floor(num / 10);
  if (ones === tens) {
    return 'Repdigit!';
  }
  return 'No Repdigit!';
}


/*
48. if...else
Write a function addWithSurcharge that adds two amounts with surcharge. For each amount less than or equal to 10, the surcharge is 1. For each amount greater than 10, the surcharge is 2.

Example: addWithSurcharge(5, 15) should return 23.
*/

function addWithSurcharge(a, b) {
  let surcharge = 0
  if (a <= 10) {
    surcharge += 1;
  } else {
    surcharge += 2;
  }
  if (b <= 10) {
    surcharge += 1;
  } else {
    surcharge += 2; 
  }
  return a + b + surcharge
}


/*
49. else if
Write a function addWithSurcharge that adds two amounts with surcharge. For each amount less than or equal to 10, the surcharge is 1. For each amount greater than 10 and less than or equal to 20, the surcharge is 2. For each amount greater than 20, the surcharge is 3.

Example: addWithSurcharge(10, 30) should return 44.
*/

function addWithSurcharge(a, b) {
  let surcharge = 0
  if (a <= 10) {
    surcharge += 1;
  } else if (a <= 20) {
    surcharge += 2;
  } else {
    surcharge += 3;
  }

  if (b <= 10) {
    surcharge += 1;
  } else if (b <= 20) {
    surcharge += 2;
  } else {
    surcharge += 3;
  }

  return a + b + surcharge;
}


/*
50. Arrays
Write a function toArray that takes 2 values and returns these values in an array.

Example: toArray(5, 9) should return the array [5, 9].
*/

function toArray(a, b) {
  let array = array + [a, b];
  return array
}


/*
51. Get array elements
Write a function getFirstElement that takes an array and returns the first element of the array.

Example: getFirstElement([1, 2]) should return 1.
*/

function getFirstElement(firstOfArray) {
  let firstIndexOfArray = firstOfArray[0];
  return firstIndexOfArray;
} 


/*
52. Set array elements
Write a function setFirstElement that takes an array and an arbitrary variable. The variable should be inserted as the first element in the array. The array should be returned.

Example: setFirstElement([1, 2], 3) should return [3, 2].
*/

function setFirstElement(array, firstElement) {
  array[0] = firstElement;
  return array;
}


/*
53. Array: length
Write a function getLastElement that takes an array and returns the last element of the array.

Example: getLastElement([1, 2]) should return 2.
*/

function getLastElement(array) {
  let arrayLastElement = array.length -1;
  return array[arrayLastElement] 
}


/*
54. Sorting arrays
Write a function sort that takes an array filled with 3 numbers and returns these 3 numbers sorted in ascending order as an array.

Example: sort([2, 3, 1]) should return [1, 2, 3].
*/

function sort(array) {
  let arraySorted = array.sort()
  return arraySorted
}


/*
55. Array: shift() and push()
Write a function rotate that rotates the elements of an array. All elements should be moved one position to the left. The 0th element should be placed at the end of the array. The rotated array should be returned.

Example: rotate(['a', 'b', 'c']) should return ['b', 'c', 'a'].
*/

function rotate(array) {
  let firstElement = array.shift();
  array.push(firstElement);
  return array
}


/*
56. Array: indexOf()
Write a function add that adds an element to the end of an array. However, the element should only be added if it is not already in the array.

Example: add([1, 2], 3) should return [1, 2, 3] and add([1, 2], 2) should return [1, 2].
*/

function add(array, arrayItem) {
  if (array.indexOf(arrayItem) === -1) {
      array.push(arrayItem);
  }
  return array
}


/*
57. Array: concat()
Write a function concatUp that concatenate two arrays. The longer array should be appended to the shorter array. If both arrays are equally long, the second array should be appended to the first array.

Example: concatUp([1, 2], [3]) should return [3, 1, 2] and concatUp([5, 7], [6, 8]) should return [5, 7, 6, 8].
*/

function concatUp(array1, array2) {
  let newArray = []
  if (array1.length > array2.length) {
    newArray = array2.concat(array1);
  } else {
    newArray = array1.concat(array2);
  }
  return newArray
}


/*
58. Array: slice()
Write a function halve that copies the first half of an array. With an odd number of array elements, the middle element should belong to the first half.

Example: halve([1, 2, 3, 4]) should return [1, 2].
*/

function halve(array) {
  let halfArray = array.slice(0, (array.length +1) / 2)
  return halfArray
}


/*
59. Array: join()
Write a function list that takes an array of words and returns a string by concatenating the words in the array, separated by commas and - the last word - by an 'and'. An empty array should return an empty string.

Example: list(['Huey', 'Dewey', 'Louie']) should return 'Huey, Dewey and Louie'.
*/

function list(arrayWords) {
  if (arrayWords.lenght  === 0) {
    return "";
  } else if (arrayWords.lenght === 1) {
    return arrayWords[0];
  }

  let wordsExLast = words.slice(0, words.length - 1);
  let lastWord = words[words.length - 1];
  return wordsExLast.join(', ') + ' and ' + lastWord;
}  


/*
60. Array of arrays
Write a function flat that flattens a two-dimensional array with 3 entries.

Example: flat(loshu) should return [4, 9, 2, 3, 5, 7, 8, 1, 6]. Thereby loshu is the magic square from the example above.
*/

function flat(myArray) {
  let newArray=[];   
    for (let i=0; i<myArray.length; i++){
      for (let j=0; j<myArray[i].length; j++){
      newArray.push(myArray[i][j]);
     }
    }
    return newArray
  }


/*
61. Comments
Write a function median that takes an array of ascending numbers and returns the median of that numbers.

Example: median([1, 2, 10]) should return 2 and median([1, 2, 10, 100]) should return 6.
*/

function median(arr1) {
  var concat = arr1;
  concat = concat.sort(function (a, b) { return a - b });

     var length = concat.length;
  
        if (length % 2 == 1) {
            return concat[(length / 2) - .5];
        } else {  
            return (concat[length / 2] 
                + concat[(length / 2) - 1]) / 2;
        }
}


/*
62. undefined
Write a function hello having one parameter and returning 'Hello <parameter>!'. If hello is called without an argument, 'Hello world!' should be returned.

Example: hello('Nala') should return 'Hello Nala!'.
*/

function hello(x) {
  if (x !== undefined) {
    return "Hello " + x + "!";
  } else {
    return "Hello world!";
  }
}


/*
63. null
Write a function cutComment that takes one line of JavaScript and returns a possible line comment trimmed. If the line contains no line comment, null should be returned. For simplicity, we assume that the code does not contain the comment characters within a string.

Example: cutCommt('let foo; // bar') should return 'bar'.
*/

const cutComment = string => {
  let onlyComment = string.indexOf('//');
    if (string.indexOf('/') < 1) {
     return null;
  }
    return string.substr(onlyComment+2).trim();
  }


/*
64. for loop
Write a function addTo that accepts a number as a parameter and adds all natural numbers smaller or equal than the parameter. The result is to be returned.

Example: addTo(3) should return 1+2+3 = 6.
*/

function addTo(x) {
  let sum = 0
    for (let i = 0; i <= x; i++) {
      sum = sum + i;
    }
    return sum
}


/*
65. Factorial
Write a function factorial that calculates the factorial of a positive integer.

Example: factorial(3) should return 6.
*/

function factorial(x) {
  let sum = 1;
  for (let i = 1; i <= x; i++) {
    sum = sum * i
  }
  return sum;
}


/*
66. Loops and arrays
Write a function mean that accepts an array filled with numbers and returns the arithmetic mean of those numbers.

Example: mean([1, 2, 3]) should return (1+2+3)/3 = 2.
*/

function mean(array) {
  let sum = 0;

  for (let i = 0; i < array.lenght; i++) {
    sum += array[i];
  }
  return sum / array.length;
}

//Oikein
/*
function mean(data) {

  let sum = 0;

  for (let i = 0; i < data.length; i ++) {
    sum = sum + data[i];
  }

  return sum / data.length;
};
*/


/*
67. while loop
Write a function spaces that takes a natural number n and returns a string of n spaces.

Example: spaces(1) should return ' '.
*/

function spaces(num) {
  let mySpaces = '';

  while (num-- > 0)
    mySpaces += ' ';

  return mySpaces;
}


/*
68. do...while loop
Write a function lcm that takes two natural numbers and calculates their least common multiple (lcm). The lcm of two natural numbers a und b is the smallest natural number that is divisible by a and b.

Example: lcm(4, 6) should return 12.
*/

let lcm = (num1, num2) => {

  let lar = Math.max(num1, num2);
  let small = Math.min(num1, num2);
  
  
  let i = lar;
  while(i % small !== 0){
    i += lar;
  }
  
  return i;
}


/*
69. gcd
Write a function gcd that takes two natural numbers and calculates their gcd.

Example: gcd(6, 15) should return 3.
*/

function gcd(num1, num2) {
  if ((typeof num1 !== 'number') || (typeof num2 !== 'number')) 
    return false;
  num1 = Math.abs(num1);
  num2 = Math.abs(num2);
  while(num2) {
    var t = num2;
    num2 = num1 % num2;
    num1 = t;
  }
  return num1;
}


/*
70. break and continue
break and continue can be used in all loops (for, while, do...while).

Write a function isPrime that checks whether a passed number is prime. In case of a prime number it should return true, otherwise false.

Example: isPrime(7) should return true and isPrime(8) should return false.
*/

function isPrime(num) {
  if (num === 1) {
    return false;
  } else if(num === 2) {
    return true;
  } else {
    for(var i = 2; i < num; i++) {
      if(num % i === 0) {
        return false;
      }
    }
    return true;  
  }
}


/*
71. Nested loops
Write a function sum that calculates the sum of all elements of a two-dimensional array.

Example: sum([[1, 2], [3]]) should return 6.
*/

function sum(arr) {
  let summa = 0;
  for(let len = 0; len < arr.length; len++){
     summa += Array.isArray(arr[len]) ? sum(arr[len]):
     arr[len];
  }
  return summa;
}

console.log(sum([4, [4 , 6]]))


/*
72. The arguments object
Write a function max that calculates the maximum of an arbitrary number of numbers.

Example: max(1, 2) should return 2 and max(2, 3, 1) should return 3.
*/

function max() {
  let max = -Infinity;
  for (i = 0; i < arguments.length; i++) {
    if (arguments[i] > max) {
      max = arguments[i];
    }
  }
  return max;
}

console.log(max(1, 23, 53, 43, 23,));


/*
73. NaN
Write a function parseFirstInt that takes a string and returns the first integer present in the string. If the string does not contain an integer, you should get NaN.

Example: parseFirstInt('No. 10') should return 10 and parseFirstInt('Babylon') should return NaN.
*/

function parseFirstInt(str) {
  if (Number.isNaN(str) === true) {
      return NaN;
  } else {
      let searchFrom = str.search(/[-+]?[0-9]+/g);
      let searched = str.substr(searchFrom);
      return parseInt(searched, 10);
  };
}


/*
74. String: split()
Write a function add that takes a string with a summation task and returns its result as a number. A finite number of natural numbers should be added. The summation task is a string of the form '1+19+...+281'.

Example: add('7+12+100') should return 119.
*/

function add(str){
  let strArr = str.split("+");
  let sum = strArr.reduce(function(total, num) {
    return parseFloat(total) + parseFloat(num);
  })
  return sum;
}

console.log(add('6+9+6+4'))

/*
75. Functions call functions
Write a function sum that takes an array of numbers and returns the sum of these numbers. Write a function mean that takes an array of numbers and returns the average of these numbers. The mean function should use the sum function.
*/

let sum = function(array) {
  var total = 0;
  for (var i=0; i<array.length; i++) {
    total += array[i];
  }
  return total;
};


let mean = function(array) {
  var arraySum = sum(array);
  return arraySum / array.length;
};


/*
76. Recursion
Write a function reverse that reverses the order of the characters in a string. The function should be recursive.

Example: reverse('live') should return 'evil'.
*/

function reverse(str) {
  if (str === "")
    return "";
  else
    return reverse(str.substr(1)) + str.charAt(0);
}


/*
77. Roman numerals I
Write a function arabic that converts a Roman number (up to 1000) into an Arabic.

Example: arabic('CDLXXXIII') should return 483.
*/

function arabic(romanNumber){
  romanNumber = romanNumber.toUpperCase();
  const romanNumList = ["CM","M","CD","D","XC","C","XL","L","IX","X","IV","V","I"];
  const corresp = [900,1000,400,500,90,100,40,50,9,10,4,5,1];
  let index =  0, num = 0;
  for(let rn in romanNumList){
    index = romanNumber.indexOf(romanNumList[rn]);
    while(index != -1){
      num += parseInt(corresp[rn]);
      romanNumber = romanNumber.replace(romanNumList[rn],"-");
      index = romanNumber.indexOf(romanNumList[rn]);
    }
  }
  return num;
}


/*78. Roman numerals II
Write a function roman that converts an Arabic number (up to 1000) into a Roman numeral.

Example: roman(483) should return 'CDLXXXIII'.
*/

function roman(number){
  let roman = "";
  const romanNumList = {M:1000,CM:900, D:500,CD:400, C:100, XC:90,L:50, XV: 40, X:10, IX:9, V:5, IV:4, I:1};
  let a;
  if(number < 1 || number > 3999)
    return "Enter a number between 1 and 3999";
  else{
    for(let key in romanNumList){
        a = Math.floor(number / romanNumList[key]);
        if(a >= 0){
            for(let i = 0; i < a; i++){
              roman += key;
            }
          }
        number = number % romanNumList[key];
    }
  }

  return roman;
}

/*
79. Project Euler
Write a function sumMultiples taking a natural number n and returning the sum of all multiples of 3 and of 5 that are truly less than n.

Example: All multiples of 3 and 5 less than 20 are 3, 5, 6, 9, 10, 12, 15 and 18. Their sum is 78. sumMultiples(20) should return 78.
*/

function sumMultiples(number) {
    let sum = 0;
    for(let i=1; i<number; i++) {
        if(i % 3 === 0 || i % 5 === 0){
            sum += i;
        }
    }
    return sum;
}

/*
80. To be continued ...
Write a function digitsum that calculates the digit sum of an integer. The digit sum of an integer is the sum of all its digits.

Example: digitsum(192) should return 12.
*/

function digitsum(n) {
    let sum = 0;
    while (n) {
        digit = n % 10;
        sum += digit;
        n = (n - digit) / 10;
    }
    return sum;
}