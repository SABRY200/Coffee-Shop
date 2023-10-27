<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php
if (!isset($_SESSION['user_id'])) {
	echo "<script> window.location.href='" . APPURL . "'; </script>";
}
$orders = $connect->query("SELECT * FROM orders WHERE user_id='$_SESSION[user_id]'");
$orders->execute();
$All_orders = $orders->fetchAll(PDO::FETCH_OBJ);
?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Your Orders</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Home</a></span> <span>Your Orders</span></p>
				</div>

			</div>
		</div>
	</div>
</section>




<section class="ftco-section ftco-cart">
    <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <?php if(count($All_orders) > 0) : ?>
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>State</th>
                                        <th>Street Address</th>
                                        <th>City</th>
                                        <th>ZIP Code</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Total Price</th>
                                        <th>Write Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($All_orders as $order) : ?>
                                        <tr class="text-center">
                                            <td class="price"><?php echo $order->first_name; ?></td>
                                            <td class="price"><?php echo $order->last_name; ?></td>
                                            <td class="price"><?php echo $order->state; ?></td>
                                            <td class="price"><?php echo $order->street_address; ?></td>
                                            <td class="price"><?php echo $order->city; ?></td>
                                            <td class="price"><?php echo $order->zip_code; ?></td>
                                            <td class="price"><?php echo $order->phone; ?></td>
                                            <td class="price"><?php echo $order->status; ?></td>
                                            <td class="price"><?php echo $order->total_price; ?></td>
                                            <?php if($order->status == "Delivered") : ?>
                                                <td class="price"><a class="btn btn-primary btn-outline-primary" href="<?php echo APPURL; ?>/reviews/write-review.php">Write Review</a></td>
                                            <?php endif; ?>
                                        </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p>You Do Not Have Any Order For Now</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    </div>
</section>

<?php require "../includes/footer.php"; ?>