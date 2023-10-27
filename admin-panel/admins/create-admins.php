<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['username'])) {
  echo "<script> window.location.href='" . ADMINURL . "/admins/login-admins.php'; </script>";
}
if (isset($_POST['submit'])) {
  if (empty($_POST['username']) or empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('One Or More Input Is Empty')</script>";
  } else {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $create_admins = $connect->prepare("INSERT INTO admins (username, email, password) 
    VALUES (:username, :email, :password)");
    $create_admins->execute([
      ':username' => $username,
      ':email' => $email,
      ':password' => $password,
    ]);

    header("LOCATION: admins.php");
  }
}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Admins</h5>
        <form method="POST" action="create-admins.php" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="username" id="form2Example1" class="form-control" placeholder="username" />
          </div>
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
          </div>
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
          </div>
          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create Admin</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require "../layouts/footer.php"; ?>