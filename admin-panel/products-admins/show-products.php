<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['username'])) {
  echo "<script> window.location.href='" . ADMINURL . "/admins/login-admins.php'; </script>";
}
//Display Order
$display_products = $connect->query("SELECT * FROM products");
$display_products->execute();
$Allproducts = $display_products->fetchAll(PDO::FETCH_OBJ);
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Foods</h5>
        <a href="create-products.php" class="btn btn-primary mb-4 text-center float-right">Create Products</a>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Image</th>
              <th scope="col">Description</th>
              <th scope="col">Price</th>
              <th scope="col">Type</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($Allproducts as $product) : ?>
              <tr>
                <th scope="row"><?php echo $product->id; ?></th>
                <td><?php echo $product->name; ?></td>
                <td><img src="../../images/<?php echo $product->image; ?>" style="width: 60px; height: 60px;"></td>
                <td><?php echo $product->description; ?></td>
                <td><?php echo $product->price; ?>$</td>
                <td><?php echo $product->type; ?></td>
                <td><a href="delete-products.php?id=<?php echo $product->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php require "../layouts/footer.php"; ?>