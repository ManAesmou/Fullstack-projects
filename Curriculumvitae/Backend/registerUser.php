
<div class="container mt-5 shadow-lg p-3 mb-5 bg-body rounded">
    <h1 class="my-3">Register an account</h1>
    <form action="includes/dbManagement.php" method="post">
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
            <div class="col-md-3 my-2">
            <label for="permissions" class="form-label">Access rights</label>
            <select class="form-select" id="permissions" aria-label="Default select example" name="permissions">
                <option value="user">Regular User</option>
                <option value="admin">Administrator</option>
            </select>
            </div>
            <div class="col-md-3 my-2">
                <label for="registrationDate" class="form-label">Date of registration</label>
                <input type="date" class="form-control" name="registerDate" id="registrationDate" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary m-2 w-25" name="submitRegister">Register</button>
    </form>
</div>