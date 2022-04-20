<?php
require_once 'includes/header.php';
?>

<div class="container mt-5 shadow-lg p-3 mb-5 bg-body rounded">
    <h1 class="my-3">Register an account</h1>
    <form action="includes/registerUser-inc.php" method="post">
        <div class="row">
            <div class="form-floating col-md-4 my-1 gx-1">
                <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="name@example.com" required>
                <label for="floatingEmail">Email address</label>
            </div>
            <div class="form-floating col-md-3 my-1 gx-1">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating col-md-3 my-1 gx-1">
                <input type="password" class="form-control" name="confirmPassword" id="floatingPassword" placeholder="Confirm password" required>
                <label for="floatingPassword">Confirm password</label>
            </div>  
        </div>
        <div class="row">
            <div class="form-floating col-md-2 my-1 gx-1">
                <input type="text" class="form-control" name="firstname" id="floatingFirstname" placeholder="First name" required>
                <label for="floatingFirstname">First Name</label>
            </div>
            <div class="form-floating col-md-3 my-1 gx-1">
                <input type="text" class="form-control" name="lastname" id="floatingLastname" placeholder="Last name" required>
                <label for="floatingLastname">Last Name</label>
            </div>
            <div class="form-floating col-md-3 my-1 gx-1">
                <input type="text" class="form-control" name="phone" id="floatingPhone" pattern="[0-9]{10}" placeholder="Phone (0501234567)" required>
                <label for="floatingPhone">Phone (0501234567)</label>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-3 my-1">
            <select class="form-select" aria-label="Default select example" name="permissions">
                <option value="user">Regular User</option>
                <option value="admin">Administrator</option>
            </select>
            </div>
            <div class="col-md-3 my-1">
                <input type="date" class="form-control" name="registerDate" id="registrationDate"/ required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary m-2 w-25" name="submitRegister">Register</button>
    </form>
</div>
<?php 
    if(isset($_GET['error'])) {
        $error = $_GET['error'];
        echo '
        <div class="container">
            <div class="row justify-content-center">
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
    } else {
        $error='';
    }
?>

<?php
require_once 'includes/footer.php';
?>

