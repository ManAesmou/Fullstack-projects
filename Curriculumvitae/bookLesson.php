<?php
require_once '../Curriculumvitae/Backend/includes/header.php';
?>

<?php
if(empty($_POST)) {
  header('location: bookLesson.html');
} else {

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
        $instructor = test_input($_POST["instructor"]);
        $lessontopic = test_input($_POST["lessontopic"]);
        $accept = test_input($_POST["accept"]);
    }
    
    
    if (isset($_POST["phone"])) {
      $phone = test_input($_POST["phone"]);
      str_pad($phone, 10, "0",STR_PAD_LEFT);
    } else {
      $phone = "";
    }

    if (isset($_POST["gender"])) {
        $gender = test_input($_POST["gender"]);
    } else {
      $gender = "";
    }

    if (isset($_POST["belt"])) {
      $belt = test_input($_POST["belt"]);
    } else {
      $belt = "";
    }
    if (isset($_POST["marketing"])) {
      $marketing = test_input($_POST["marketing"]);
    } else {
      $marketing = ""; 
    }

    if (empty($fullname) || empty($email) || empty($phone) || empty($instructor) || empty($lessontopic)) {
        header("Location: ../register.php?error=emptyfields&fullname=$fullname");
        exit();
    } else {
        if (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $fullname)) {
            header('location: bookLesson.html?error=only_letters_and_white_space_allowed&fullname=' .$fullname);
        }
    }

    if (empty($_POST['email'])) {
        header('location: bookLesson.html?error=empty_field&email');
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('location: bookLesson.html?error=email_is_not_a_valid_email_address&email');
        }
    }

      require './Backend/includes/database.php';
      
          $sql = "SELECT * FROM yksityistunnit WHERE nimi = ? AND email = ?";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: bookLesson.html?error=sqlerror&select-statement");
              exit();
          } else {
              mysqli_stmt_bind_param($stmt, "ss", $fullname, $email);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_store_result($stmt);
              $rowCount = mysqli_stmt_num_rows($stmt);

              if ($rowCount > 0) {
                  header("Location: bookedLesson.html?error=already_booked_a_lesson");
                  exit();
              } else {
                  $sql = "INSERT INTO yksityistunnit (nimi, email, puhelin, oppituntiaihe, ohjaaja, sukupuoliID, vyoarvo, tietohyvaksyminen, markkinointi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                  $stmt = mysqli_stmt_init($conn);
                  if (!mysqli_stmt_prepare($stmt, $sql)) {
                      header("Location: bookLesson.html?error=sqlerror&insert-statement");
                      exit();
                  } else {
                      mysqli_stmt_bind_param($stmt, "sssssisii", $fullname, $email, $phone, $lessontopic, $instructor, $gender, $belt, $accept, $marketing);
                      mysqli_stmt_execute($stmt);
                      header("Location: bookLesson.html?succes=lesson_reservation_saved");
                      exit();
                  }
              }
          }
      }
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
?>




















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

<?php
require_once '../Curriculumvitae/Backend/includes/footer.php';
?>