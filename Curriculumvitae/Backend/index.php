<?php
require 'includes/header.php';

if (isset($_SESSION['userID']) && isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['priviledge'])) {
    echo '<p class="alert alert-info"><b>User: ' .$sessionFirstname. ' ' .$sessionLastname. '</b></p>';
}

if (isset($_GET['error'])) {
    $error = $_GET['error'];

    echo '  
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="alert alert-danger d-flex justify-content-center col-md-6" role="alert">             
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                if ($error == 'wrongpass') {
                    echo'<p>Incorrect password</p>';
                } elseif ($error == 'password_strength') {
                    echo '  <p>New password must be at least 8 characters in length and
                                must contain at least one number, one upper case letter,
                                one lower case letter and one special character.
                            </p>';
                } elseif ($error == 'wrong_current_password') {
                    echo '<p>The current password is incorrect, please try again.</p>';
                } elseif ($error == 'same_password') {
                    echo'<p>The new password is the same as the current password for the user</p>';
                } elseif ($error == 'new_passwords_do_not_match') {
                    echo'<p>The new passwords do not match.</p>';
                } elseif ($error == 'sql_select-statement') {
                    echo'<p>Error in SQL Select statement.</p>';
                } elseif ($error == 'sql_insert-statement') {
                    echo'<p>Error in SQL Insert statement.</p>';
                } elseif ($error == 'wrongemail') {
                    echo '<div>Incorrect email address</div>';
                } elseif ($error == 'password_strength') {
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

} elseif (isset($_GET['success'])) {
    $success = $_GET['success'];

    echo '
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="alert alert-success d-flex justify-content-center col-md-4" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
                if ($success == 'password_changed') {
                    echo '<div>Your password has been updated to a new one.</div>';
                } else if ($success == 'logged_in') {
                    echo '<div>You are logged in</div>';
                } else if ($success == 'account_registered') {
                    echo '<div>You have created a new user account.</div>';
                }
    echo'   </div>
        </div>
    </div>';

    } 

if (isset($_SESSION['userID']) && isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['priviledge'])) {
    
    if ($page == 'reservation') {
        include('privateReservation.php');
    } elseif ($page == 'changepass') {
        include('change-password.php');
    } elseif ($page == 'ownsettings') {
        include('personalSettings.php');
    } elseif ($page == 'register') {
        include('registerUser.php');
    } elseif ($page == 'lessonBooking') {
        include('lessonBooking.html');
    } elseif ($page == 'addBooking') {
        include('addBooking.html');
    }
} 

if ($page == 'login') {
    include('login.php');
}

require 'includes/footer.php';
?>



