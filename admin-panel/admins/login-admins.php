<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (isset($_SESSION['username'])) {
  echo "<script> window.location.href='" . ADMINURL . "'; </script>";
}
if (isset($_POST['submit'])) {
  if (empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('One Or More Input Is Empty')</script>";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_users = $connect->query("SELECT * FROM admins WHERE email = '$email'");
    $login_users->execute();
    $fetch = $login_users->fetch(PDO::FETCH_ASSOC);

    if ($login_users->rowCount() > 0) {
      if (password_verify($password, $fetch['password'])) {
        $_SESSION['username'] = $fetch['username'];
        $_SESSION['email'] = $fetch['email'];
        $_SESSION['admin_id'] = $fetch['id'];
        echo "<script> window.location.href='" . ADMINURL . "'; </script>";
      } else {
        echo "<script>alert('One Or More Input Is Empty')</script>";
      }
    } else {
      echo "<script>alert('One Or More Input Is Empty')</script>";
    }
  }
}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mt-5">Login</h5>
        <form method="POST" class="p-auto" action="login-admins.php">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
          </div>
          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
          </div>
          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require "../layouts/footer.php"; ?>