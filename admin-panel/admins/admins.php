<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['username'])) {
  echo "<script> window.location.href='" . ADMINURL . "/admins/login-admins.php'; </script>";
}
$display_admins = $connect->query("SELECT * FROM admins");
$display_admins->execute();
$admins = $display_admins->fetchAll(PDO::FETCH_OBJ);
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Admins</h5>
        <a href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Created At</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($admins as $admin) : ?>
              <tr>
                <th scope="row"><?php echo $admin->id; ?></th>
                <td><?php echo $admin->username; ?></td>
                <td><?php echo $admin->email; ?></td>
                <td><?php echo $admin->created_at; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require "../layouts/footer.php"; ?>