<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<!--Including HTML-->
  <?php include "header.html" ?>
  <p>Morjesta pöytään!</p>
  <?php include "footer.html" ?>

  <br>
  <br>

<!--Including PHP-->
  <?php 
    // $title = "My first post!";
    // $author = "Ismo";
    // $wordCount = 300;
    // include "article-header.php";

    include "useful-tools.php";
    sayHello("Ismo <br>");
    echo $feetInMile;
  ?>

<br><br>

<!--Classes and objects!-->
<?php 
  class Book{
    var $title;
    var $author;
    var $pages;

        //Constructors
    function __construct($aTitle, $aAuthor, $aPages) {
      $this->title = $aTitle;
      $this->author = $aAuthor;
      $this->pages = $aPages;
    }
  }

    //yksi tapa luoda objekteja.
  // $book1 = new Book("Ismo");
  // $book1->title = "Harry Potter";
  // $book1->author = "JK Rowling";
  // $book1->pages = 400;

  // $book2 = new Book("Osmo");
  // $book2->title = "Lord Of the Rings";
  // $book2->author = "Tolkien";
  // $book2->pages = 700;

  // echo $book2->title;

  //Parempi ja lyhyempi tapa luoda objekteja.
  $book1 = new Book("Harry Potter", "JK Rowling", 400);
  $book2 = new Book("Lord Of the Rings", "Tolkien", 700);

  echo $book1->title
?>


<br><br>
<!--Object functions-->
<?php 
  class Student {
    var $name;
    var $major;
    var $gpa;

    function __construct($name, $major, $gpa) {
      $this->name = $name;
      $this->major = $major;
      $this->gpa = $gpa;
    }

    function hasHonors() {
      if ($this->gpa >= 3.5) {
        return "true";
      }
      return "false";
    }
  }

  $student1 = new Student("Ismo", "Tietojenkäsittely", 2.8);
  $student2 = new Student("Osmo", "Tietojenkäsittely", 4.8);

  echo $student2->hasHonors();
?>

<br><br>

<!--GETTERS AND SETTERS-->
<?php 
  class Movie {
    public $title;
    private $rating;

    function __construct($title, $rating) {
      $this->title = $title;
      $this->setRating($rating);
    }

    function getRating() {
      return $this->rating;
    }
    function setRating($rating) {
      if ($rating == "G" || $rating == "PG" || $rating == "PG-13" || $rating == "R" || $rating == "NR") {
      $this->rating = $rating;
    } else {
      $this->rating = "NR";
    }
  }
}

  $avengers = new Movie("Avengers", "PG-13");
  // different ratings for movies: G, PG, PG-13, R, NR
      
      $avengers->setRating("PG");
  echo $avengers->getRating();

?>

<br><br>

<!--Inheritance-->
<?php 
  class Chef
  {
      public function makeChicken()
      {
          echo "The chef makes chicken <br>";
      }
      public function makeSalad()
      {
          echo "The chef makes salad <br>";
      }
      public function makeSpecialDish()
      {
          echo "The chef makes bbg ribs <br>";
      }
  }

  class ItalianChef extends Chef {
  function makePasta() {
    echo "The chef makes Pasta <br>";
  }
  //Overriding the funciton:
  function makeSpecialDish()
  {
    echo "The chef makes chicken parm";
  }
  }

  $chef = new Chef();
  $chef->makeChicken();

  $italianChef = new ItalianChef();
  $italianChef->makeChicken();
  $italianChef->makePasta();



?>




</body>
</html>