/*

What is the HTML DOM?
The HTML DOM is a standard object model and programming interface for HTML. It defines:

The HTML elements as objects
The properties of all HTML elements
The methods to access all HTML elements
The events for all HTML elements
In other words: The HTML DOM is a standard for how to get, change, add, or delete HTML elements.



HTML DOM methods are actions you can perform (on HTML Elements).

HTML DOM properties are values (of HTML Elements) that you can set or change.

The DOM Programming Interface
The HTML DOM can be accessed with JavaScript (and with other programming languages).

In the DOM, all HTML elements are defined as objects.

The programming interface is the properties and methods of each object.

A property is a value that you can get or set (like changing the content of an HTML element).

A method is an action you can do (like add or deleting an HTML element).


Seuraava esimerkki muuttaa elementin sisältöä (- ) seuraavasti:innerHTML<p>id="demo"

example: document.getElementById("demo").innerHTML = "Hello World!";


In the example above, getElementById is a method, while innerHTML is a property.

The getElementById Method
The most common way to access an HTML element is to use the id of the element.

In the example above the getElementById method used id="demo" to find the element.

The easiest way to get the content of an element is by using the innerHTML property.

The innerHTML property is useful for getting or replacing the content of HTML elements.




The document object represents your web page.

If you want to access any element in an HTML page, you always start with accessing the document object.

Below are some examples of how you can use the document object to access and manipulate HTML.


 HTML-elementtien etsiminen
 Method	                                Description
document.getElementById(id)	          //Find an element by element id
document.getElementsByTagName(name)	  //Find elements by tag name
document.getElementsByClassName(name)	//Find elements by class name

 HTML-elementtien muuttaminen
 Property 	                              Description

element.innerHTML =  new htmlcontent	    //Change the inner HTML of an element
element.attribute = new value	            //Change the attribute value of an HTML element
element.style.property = new style	      //Change the style of an HTML element


 Method	                                  Description
element.setAttribute(attribute, value)	  //Change the attribute value of an HTML element

 Elementtien lisääminen ja poistaminen
 Method	                            Description
document.createElement(element)	      // Create an HTML element
document.removeChild(element)	        // Remove an HTML element
document.appendChild(element)	        // Add an HTML element
document.replaceChild(new, old)	      // Replace an HTML element
document.write(text)	                // Write into the HTML output stream

 Tapahtumien käsittelijöiden lisääminen
 Method	                                                    Description
 document.getElementById(id).onclick = function(){code}	   // Adding event handler code to an onclick event

 This example finds the element with id="intro":
 const element = document.getElementById("intro");



 If the element is found, the method will return the element as an object (in element).
 If the element is not found, element will contain null.
 
 This example finds all <p> elements:
const element = document.getElementsByTagName("p");

If you want to find all HTML elements with the same class name, use getElementsByClassName().
This example returns a list of all elements with class="intro".

Example
const x = document.getElementsByClassName("intro");
/*

<body>

<h2>JavaScript HTML DOM</h2>
<p>Finding HTML Elements Using <b>document.forms</b>.</p>

<form id="frm1" action="/action_page.php">
  First name: <input type="text" name="fname" value="Donald"><br>
  Last name: <input type="text" name="lname" value="Duck"><br><br>
  <input type="submit" value="Submit">
</form> 

<p>These are the values of each element in the form:</p>

<p id="demo"></p>

<script>
const x = document.forms["frm1"];
let text = "";
for (let i = 0; i < x.length ;i++) {
  text += x.elements[i].value + "<br>";
}
document.getElementById("demo").innerHTML = text;
</script>

</body>



 Example explained:
 
 The HTML document above contains an <h1> element with id="id01"
 We use the HTML DOM to get the element with id="id01"
 A JavaScript changes the content (innerHTML) of that element to "New Heading"



<body>

<h1 id="id01">Old Heading</h1>

<script>
const element = document.getElementById("id01");
element.innerHTML = "New Heading";
</script>

</body>


Example explained:

The HTML document above contains an <img> element with id="myImage"
We use the HTML DOM to get the element with id="myImage"
A JavaScript changes the src attribute of that element from "smiley.gif" to "landscape.jpg"


<body>

<h2>JavaScript HTML DOM</h2>
<img id="image" src="smiley.gif" width="160" height="120">

<script>
document.getElementById("image").src = "landscape.jpg";
</script>

<p>The original image was smiley.gif, but the script changed it to landscape.jpg</p>

</body>

STYLEE

To change the style of an HTML element, use this syntax:

document.getElementById(id).style.property = new style
The following example changes the style of a <p> element:

Example
<html>
<body>

<p id="p2">Hello World!</p>

<script>
document.getElementById("p2").style.color = "blue";
</script>

</body>
</html>


----------------------------------------EVENTS-------------------------------

<body>

<h2>JavaScript HTML Events</h2>
<p>Click the button to display the date.</p>

<button onclick="displayDate()">The time is?</button>

<script>
function displayDate() {
  document.getElementById("demo").innerHTML = Date();
}
</script>

<p id="demo"></p>

</body>


<body>

<div onmouseover="mOver(this)" onmouseout="mOut(this)" 
style="background-color:#D94A38;width:120px;height:20px;padding:40px;">
Mouse Over Me</div>

<script>
function mOver(obj) {
  obj.innerHTML = "Thank You"
}

function mOut(obj) {
  obj.innerHTML = "Mouse Over Me"
}
</script>

</body>

Syntax
element.addEventListener(event, function, useCapture);

The first parameter is the type of the event (like "click" or "mousedown" or any other HTML DOM Event.)

The second parameter is the function we want to call when the event occurs.

The third parameter is a boolean value specifying whether to use event bubbling or event capturing. This parameter is optional.

<body>

<h2>JavaScript addEventListener()</h2>

<p>This example uses the addEventListener() method to add many events on the same button.</p>

<button id="myBtn">Try it</button>

<p id="demo"></p>

<script>
var x = document.getElementById("myBtn");
x.addEventListener("mouseover", myFunction);
x.addEventListener("click", mySecondFunction);
x.addEventListener("mouseout", myThirdFunction);

function myFunction() {
  document.getElementById("demo").innerHTML += "Moused over!<br>";
}

function mySecondFunction() {
  document.getElementById("demo").innerHTML += "Clicked!<br>";
}

function myThirdFunction() {
  document.getElementById("demo").innerHTML += "Moused out!<br>";
}
</script>

</body>



<body>

<h2>JavaScript addEventListener()</h2>

<p>This example demonstrates how to pass parameter values when using the addEventListener() method.</p>

<p>Click the button to perform a calculation.</p>

<button id="myBtn">Try it</button>

<p id="demo"></p>

<script>
let p1 = 5;
let p2 = 7;
document.getElementById("myBtn").addEventListener("click", function() {
  myFunction(p1, p2);
});

function myFunction(a, b) {
  document.getElementById("demo").innerHTML = a * b;
}
</script>

</body>

<style>
#myDIV {
  background-color: coral;
  border: 1px solid;
  padding: 50px;
  color: white;
  font-size: 20px;
}
</style>
</head>
<body>

<h2>JavaScript removeEventListener()</h2>

<div id="myDIV">
  <p>This div element has an onmousemove event handler that displays a random number every time you move your mouse inside this orange field.</p>
  <p>Click the button to remove the div's event handler.</p>
  <button onclick="removeHandler()" id="myBtn">Remove</button>
</div>

<p id="demo"></p>

<script>
document.getElementById("myDIV").addEventListener("mousemove", myFunction);

function myFunction() {
  document.getElementById("demo").innerHTML = Math.random();
}

function removeHandler() {
  document.getElementById("myDIV").removeEventListener("mousemove", myFunction);
}
</script>

</body>


NODE RELATIONSHIP

<html>

  <head>
    <title>DOM Tutorial</title>
  </head>

  <body>
    <h1>DOM Lesson one</h1>
    <p>Hello world!</p>
  </body>

</html>

From the HTML above you can read:

<html> is the root node
<html> has no parents
<html> is the parent of <head> and <body>
<head> is the first child of <html>
<body> is the last child of <html>
and:

<head> has one child: <title>
<title> has one child (a text node): "DOM Tutorial"
<body> has two children: <h1> and <p>
<h1> has one child: "DOM Lesson one"
<p> has one child: "Hello world!"
<h1> and <p> are siblings





*/