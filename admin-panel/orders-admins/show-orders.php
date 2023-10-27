<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['username'])) {
  echo "<script> window.location.href='" . ADMINURL . "/admins/login-admins.php'; </script>";
}
//Display Order
$display_orders = $connect->query("SELECT * FROM orders");
$display_orders->execute();
$Allorders = $display_orders->fetchAll(PDO::FETCH_OBJ);
//Count order
$count_order = $connect->query("SELECT COUNT(*) AS countorder FROM orders");
$count_order->execute();
$count_orders = $count_order->fetch(PDO::FETCH_OBJ);

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Orders</h5>

        <table class="table">
        <?php if($count_orders->countorder == 0) : ?>
          <p>Order Is Ended</p>
        <?php else : ?>
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">City</th>
              <th scope="col">State</th>
              <th scope="col">Zip Code</th>
              <th scope="col">Phone</th>
              <th scope="col">Street Address</th>
              <th scope="col">Total Price</th>
              <th scope="col">Status</th>
              <th scope="col">Change Status</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
              <?php foreach($Allorders as $order) : ?>
                <tr>
                  <th scope="row"><?php echo $order->id; ?></th>
                  <td><?php echo $order->first_name; ?></td>
                  <td><?php echo $order->last_name; ?></td>
                  <td><?php echo $order->city; ?></td>
                  <td><?php echo $order->state; ?></td>
                  <td><?php echo $order->zip_code; ?></td>
                  <td><?php echo $order->phone; ?></td>
                  <td><?php echo $order->street_address; ?></td>
                  <td><?php echo $order->total_price; ?>$</td>
                  <td><?php echo $order->status; ?></td>
                  <td><a href="change-status.php?id=<?php echo $order->id; ?>" class="btn btn-warning text-white text-center ">Change Status</a></td>
                  <td><a href="delete-orders.php?id=<?php echo $order->id; ?>" class="btn btn-danger text-white text-center ">Delete</a></td>
                </tr>
              <?php endforeach; ?>
        <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php require "../layouts/footer.php"; ?>