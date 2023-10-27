<?php require "../config/config.php"; ?>
<?php require "layouts/header.php"; ?>
<?php
if (!isset($_SESSION['username'])) {
  echo "<script> window.location.href='" . ADMINURL . "/admins/login-admins.php'; </script>";
}
//Display Product
$display_products = $connect->query("SELECT COUNT(*) AS count_products FROM products");
$display_products->execute();
$Allproducts = $display_products->fetch(PDO::FETCH_OBJ);
//Display Order
$display_orders = $connect->query("SELECT COUNT(*) AS count_orders FROM orders");
$display_orders->execute();
$Allorders = $display_orders->fetch(PDO::FETCH_OBJ);
//Display Booking
$display_bookings = $connect->query("SELECT COUNT(*) AS count_bookings FROM bookings");
$display_bookings->execute();
$Allbookings = $display_bookings->fetch(PDO::FETCH_OBJ);
//Display Admins
$display_admins = $connect->query("SELECT COUNT(*) AS count_admins FROM admins");
$display_admins->execute();
$Alladmins = $display_admins->fetch(PDO::FETCH_OBJ);
//Display Reviews
$display_reviews = $connect->query("SELECT COUNT(*) AS count_reviews FROM reviews");
$display_reviews->execute();
$Allreviews = $display_reviews->fetch(PDO::FETCH_OBJ);
?>

<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Products</h5>
        <p class="card-text"><?php echo $Allproducts->count_products; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Orders</h5>
        <p class="card-text"><?php echo $Allorders->count_orders; ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Bookings</h5>

        <p class="card-text"><?php echo $Allbookings->count_bookings; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admins</h5>
        <p class="card-text"><?php echo $Alladmins->count_admins; ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reviews</h5>

        <p class="card-text"><?php echo $Allreviews->count_reviews; ?></p>

      </div>
    </div>
  </div>
</div>
<?php require "layouts/footer.php"; ?>