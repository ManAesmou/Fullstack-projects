<?php
if(empty($_POST)) {
  header('location: bookLesson.html');
} else {
    $name = $email = $gender = $comment = $website = "";

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = test_input($_POST["fullname"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $instructor = test_input($_POST["instructor"]);
        $gender = test_input($_POST["gender"]);
        $lessontopic = test_input($_POST["lessontopic"]);
        $belt = test_input($_POST["belt"]);
    }


    if (empty($_POST['fullname'])) {
        header('location: bookLesson.html?error=empty_field&fullname');
    } else {
        if (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $fullname)) {
            header('location: bookLesson.html?error=only_letters_and_white_space_allowed&fullname');
        }
    }

    if (empty($_POST['email'])) {
        header('location: bookLesson.html?error=empty_field&email');
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('location: bookLesson.html?error=email_is_not_a_valid_email_address&email');
        }
    }




  
  var_dump($fullname);
  var_dump($email);
  var_dump($phone);
  var_dump($instructor);
  var_dump($gender);
  var_dump($lessontopic);
  var_dump($belt);
  
  }
  ?>

<div class="container mt-3">
  <h2>Kirjaudu sisään</h2>
  <form action="login.php" method="post">
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Kirjoita email" name="email" required>
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Salasana" name="pwd" reruired>
    </div>
    
    <button type="submit" class="btn btn-primary">Kirjaudu</button>
  </form>




















<?php
    //tarkistetaan nimi, osoite ja kpl (eivät tyhjiä)
    // if(empty($_POST['nimi']))
    // {
    //     $error=true;
    //     $nimi='error';
    // }else $nimi=$_POST['nimi'];

    // if(empty($_POST['osoite']))
    // {
    //     $error=true;
    //     $osoite='error';
    // }else $osoite=$_POST['osoite'];

    // if(empty($_POST['maara']))
    // {
    //     $error=true;
    //     $maara='error';
    // }else $maara=$_POST['maara'];

    //kaikki kentät tarkistettu -> jos tuli error, mennään index.php:lle takaisin
    //muuten näytetään sivu
    //if($error) header("location: index.php?error=true&koko=$koko&color=$color&email=$email&nimi=$nimi&osoite=$osoite&maara=$maara");
?>