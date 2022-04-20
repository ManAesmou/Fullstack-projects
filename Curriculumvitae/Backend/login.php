<?php
require_once 'includes/header.php';
?>
<div class="container mt-5">
  <div class="d-flex justify-content-center">
    <div class="card shadow-lg bg-body rounded" style="width: 18rem;">
      <img src="/Curriculumvitae/Backend/Login.png" class="card-img-top" alt="...">
      <div class="card-body">
        <form action="/Curriculumvitae/Backend/includes/login-inc.php" method="POST">
          <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Enter email address" required>
            <div class="alert alert-danger d-flex align-items-center visually-hidden" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
              <div class="visually-hidden">The email address isn't connected to an account.</div>
              <div class="visually-hidden">The email address is incorrect.</div>
            </div>
          <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" name="inputPassword" class="form-control" id="inputPassword" placeholder="Enter password" required>
            <div class="alert alert-danger d-flex align-items-center visually-hidden" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
              <div>
              The password is incorrect.
              </div>
            </div>
          </div>
          <div class="form-text">We'll never share your email with anyone else. Don't have an account? <a href="/Curriculumvitae/Backend/signup.php">Sing up</a> </div>
          </div>
          <button type="submit" class="btn btn-primary w-100" name="submitLogin">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
require_once 'includes/footer.php';
?>