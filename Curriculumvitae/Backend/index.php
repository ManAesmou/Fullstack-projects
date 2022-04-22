<?php
require_once 'includes/header.php';

!empty($_SESSION['userID']) ? $sessionId = $_SESSION['userID'] : $sessionId = '';
!empty($_SESSION['firstname']) ? $sessionFirstname = $_SESSION['firstname'] : $sessionFirstname = '';
!empty($_SESSION['lastname']) ? $sessionLastname = $_SESSION['lastname'] : $sessionLastname = '';
!empty($_SESSION['priviledge']) ? $sessionpriviledge = $_SESSION['priviledge'] : $sessionpriviledge = '';
isset($_GET['page']) ? $page = $_GET['page'] : $page = '';


if (isset($_GET['error'])) {
    //One way of coding:
    $error = $_GET['error'];
    ?>  <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="alert alert-danger d-flex justify-content-center col-md-4" role="alert">
    <?php

    if ($error == 'wrongemail'){
    ?>              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>Incorrect email address</div>
                </div>
            </div>
        </div>
    <?php

    } elseif ($error == 'wrongpass') {
    ?>              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>Incorrect password</div>    
                </div>
            </div>
        </div>
    <?php
    }
    
} else {
    if (!isset($_GET['page'])) {
        //Second way of coding:
        if (isset($sessionId) && $sessionpriviledge && isset($_GET['success']) == 'logged_in') {
            echo '
        <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="alert alert-success d-flex justify-content-center col-md-4" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>You are logged in</div>
                </div>
            </div>
        </div>';
        } else {
            echo '
        <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="alert alert-danger d-flex justify-content-center col-md-4" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>Access denied!</div>
                </div>
            </div>
        </div>';
        }
    } else {
        echo '<p class="alert alert-info"><b>User: ' .$sessionFirstname. ' ' .$sessionLastname. '</b></p>';

        if($page == 'home') include('home-page.php');
        else if($page == 'changepassword') include('change-password.php'); 
        else if($page == 'omatTiedot') include('omatTiedot.php');//KESKEN
        else if($page == 'users') include('users.php');
    }
}

?>