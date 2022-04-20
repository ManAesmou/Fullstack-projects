<?php
require_once 'includes/header.php';
?>

<div class="container mt-5 shadow-lg p-3 mb-5 bg-body rounded">
    <h1 class="my-3">Register an account</h1>
    <form action="includes/register-inc.php" method="post">
        <div class="row">
            <div class="form-floating col-md-4 my-1 gx-1">
                <input type="email" class="form-control" name="email" id="floatingEmail" placeholder="name@example.com">
                <label for="floatingEmail">Email address</label>
            </div>
            <div class="form-floating col-md-3 my-1 gx-1">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating col-md-3 my-1 gx-1">
                <input type="password" class="form-control" name="confirmPassword" id="floatingPassword" placeholder="Confirm password">
                <label for="floatingPassword">Confirm password</label>
            </div>  
        </div>
        <div class="row">
            <div class="form-floating col-lg-2 my-1 gx-1">
                <input type="text" class="form-control" name="firstname" id="floatingFirstname" placeholder="Firstname">
                <label for="floatingFirstname">Firstname</label>
            </div>
            <div class="form-floating col-lg-3 my-1 gx-1">
                <input type="text" class="form-control" name="lastname" id="floatingLastname" placeholder="Lastname">
                <label for="floatingLastname">Lastname</label>
            </div>
            <div class="form-floating col-lg-3 my-1 gx-1">
                <input type="text" class="form-control" name="phone" id="floatingPhone" pattern="[0-9]{10}" placeholder="Phone (0501234567)">
                <label for="floatingPhone">Phone (0501234567)</label>
            </div>  
        </div>
        <div class="row">
            <div class="form-check m-2">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckAdministrator">
                <label class="form-check-label" for="flexCheckAdministrator">Administrator</label>
            </div>
            <label for="startDate">Start</label>
            <input id="startDate" class="form-control" type="date"/>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">REGISTRER</button>
    </form>
</div>

<?php
require_once 'includes/footer.php';
?>

