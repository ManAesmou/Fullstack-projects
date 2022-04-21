<?php
session_start(); 
header('Cache-control: no-cache, no-store, must-revalidate');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="author" content="Ismo Manninen">
    <meta name="keywords" content="Ismo Manninen">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/416b989c77.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Manninen Login</title>
  </head>
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
  </svg>
    
<header>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark" className="justify-content-end">
    <div class="container-fluid">
    <?php if(isset($_SESSION['userID'])) {
      echo '<div class="dropdown p-4">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fa-solid fa-user-large"></i>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="/Curriculumvitae/Backend/personalInfo.php">Manage profile settings</a></li>';
          if(isset($_SESSION['userID']) && $_SESSION['userID'] =='1') echo '<li><a class="dropdown-item" href="/Curriculumvitae/Backend/registerUser.php">Register user</a></li>';
        else echo ''; echo '
        <li><a class="dropdown-item" href="/Curriculumvitae/Backend/change-password.php">Change password</a></li>
        <li><a class="dropdown-item" href="/Curriculumvitae/Backend/logout.php">Log out</a></li>
      </ul>
    </div>';
    } else {
      echo '<a class="navbar-brand" href="/Curriculumvitae/Backend/login.php"><img src="./logo.png"></a>';
    }
      ?>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
          <?php if(isset($_SESSION['userID'])) echo '<a class="nav-link" href="/Curriculumvitae/Backend/home-page.php">Home page</a>';
              else echo '<a class="nav-link" href="/Curriculumvitae/index.html">Home</a>';
            ?>
          </li>
          <li class="nav-item">
          <?php if(isset($_SESSION['userID'])) echo '<a class="nav-link" href="/Curriculumvitae/Frontend/index.html">Memory game</a>';
              else echo '<a class="nav-link" href="/Curriculumvitae/competition.html">Competition</a>';
            ?>
          </li>
          <li class="nav-item">
          <?php if(isset($_SESSION['userID'])) echo '';
              else echo '<a class="nav-link" href="/Curriculumvitae/travel.html">Travel</a>';
            ?>
          </li>
          <?php 
            ?>
          <li class="nav-item">
          <?php if(isset($_SESSION['userID'])) echo '';
              else echo '<a class="nav-link" href="/Curriculumvitae/bookLesson.html">Lesson</a>';
            ?>
          </li>
          <li class="nav-item">
            <?php if(isset($_SESSION['userID'])) echo '';
              else echo '<a class="nav-link" href="/Curriculumvitae/Backend/login.php">Login</a>';
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<body>