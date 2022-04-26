<?php
require 'includes/header.php';

if (isset($_GET['error'])) {
    //One way of coding:
    $error = $_GET['error'];

    if ($error == 'wrongemail'){
    ?>  <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="alert alert-danger d-flex justify-content-center col-md-4" role="alert">              
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>Incorrect email address</div>
                </div>
            </div>
        </div>
    <?php

    } elseif ($error == 'wrongpass') {
    ?> <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="alert alert-danger d-flex justify-content-center col-md-4" role="alert">             
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>Incorrect password</div>    
                </div>
            </div>
        </div>
    <?php
    }

    if ($page == 'register') {
        //Second way of coding:
        echo '
        <div class="container">
        <div class="row d-flex justify-content-center mt-5">
                <div class="alert alert-danger d-flex align-items-center col-md-4 shadow-lg" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                    if ($error == 'password_strength') {
                        echo 'Password should be at least 8 characters in length. 
                        Should include at least one upper case letter, one number,  
                        and one special character.';
                    } elseif ($error == 'passwords_do_not_match') {
                        echo ' Oops! Password did not match! Try again.';
                    } elseif ($error == 'email_already_taken') {
                        echo ' Sorry, an email address is already in use. Please use another email address.';
                    } elseif ($error == 'invalid_firstname_or_lastname') {
                        echo ' Use only uppercase and lowercase letters in the first name and last name.';
                    }
        echo '  </div>
            </div>
        </div>';
    }
    
} else {
    if (!isset($_GET['page'])) {
        if (isset($_SESSION['userID']) && isset($_SESSION['priviledge']) && isset($_GET['success']) == 'logged_in') {
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
        if (isset($_SESSION['userID'])){
            echo '<p class="alert alert-info"><b>User: ' .$sessionFirstname. ' ' .$sessionLastname. '</b></p>';
        }
        

        if($page == 'home') include('home-page.php');
        else if($page == 'login') include('login.php'); 
        else if($page == 'changepassword') include('change-password.php'); 
        else if($page == 'omatTiedot') include('omatTiedot.php');//KESKEN
        else if($page == 'register') include('registerUser.php');
    }
}

require 'includes/footer.php';
?>