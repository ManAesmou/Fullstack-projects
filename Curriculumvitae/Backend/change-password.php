
<div class="container mt-4 shadow-lg p-3 mb-5 bg-body rounded">
    <h1 class="my-3">Change password</h1>
    <form action="includes/dbManagement.php" method="post">
        <div class="row">
            <div class="form-floating col-md-3 my-1 gx-1">
                <input type="password" class="form-control" name="currentPassword" id="floatingCurrentPassword" placeholder="Current password" required>
                <label for="floatingCurrentPassword">Current password</label>
            </div>
            <div class="form-floating col-md-3 my-1 gx-1">
                <input type="password" class="form-control" name="newPassword" id="floatingNewPassword" placeholder="New password" required>
                <label for="floatingNewPassword">New password</label>
            </div>
            <div class="form-floating col-md-4 my-1 gx-1">
                <input type="password" class="form-control" name="confirmNewPassword" id="floatingConfirmNewPassword" placeholder="Confirm new password" required>
                <label for="floatingConfirmNewPassword">Confirm new password</label>
            </div>  
        </div>
        <button type="submit" class="btn btn-primary m-2 mt-3 w-25" name="submitChangePassword">Submit</button>
    </form>
</div>