<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
	// redirect them to your desired location
	header('location: http://localhost/coffee-blend');
	exit;
}

if (!isset($_SESSION['user_id'])) {
	echo "<script> window.location.href='" . APPURL . "'; </script>";
}


if (isset($_POST['submit'])) {
	if (
		empty($_POST['first_name']) or empty($_POST['last_name']) or empty($_POST['state'])
		or empty($_POST['street_address']) or empty($_POST['city']) or empty($_POST['zip_code'])
		or empty($_POST['email_address']) or empty($_POST['phone'])
	) {
		echo "<script>alert('One Or More Input Is Empty')</script>";
	} else {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$state = $_POST['state'];
		$street_address = $_POST['street_address'];
		$city = $_POST['city'];
		$zip_code = $_POST['zip_code'];
		$phone = $_POST['phone'];
		$user_id = $_SESSION['user_id'];
		$status = "Pending";
		$total_price = $_SESSION['total_price'];

		$place_orders = $connect->prepare("INSERT INTO orders (first_name,last_name,state,street_address,city,zip_code,phone,user_id,status,total_price) 
		VALUES (:first_name,:last_name,:state,:street_address,:city,:zip_code,:phone,:user_id,:status,:total_price)");
		$place_orders->execute([
			':first_name' => $first_name,
			':last_name' => $last_name,
			':state' => $state,
			':street_address' => $street_address,
			':city' => $city,
			':zip_code' => $zip_code,
			':phone' => $phone,
			':user_id' => $user_id,
			':status' => $status,
			':total_price' => $total_price,
		]);

		header("location: pay.php");
	}
}





?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Checkout</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checout</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<form action="checkout.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					<div class="row align-items-end">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstname">Firt Name</label>
								<input type="text" name="first_name" class="form-control" placeholder="Firt Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="lastname">Last Name</label>
								<input type="text" name="last_name" class="form-control" placeholder="Last Name">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="country">State / Country</label>
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="state" id="" class="form-control">
										<option value="france">France</option>
										<option value="italy">Italy</option>
										<option value="philippines">Philippines</option>
										<option value="south korea">South Korea</option>
										<option value="hongkong">Hongkong</option>
										<option value="japan">Japan</option>
									</select>
								</div>
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="streetaddress">Street Address</label>
								<input type="text" name="street_address" class="form-control" placeholder="House number and street name">
							</div>
						</div>
						<!-- <div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
							</div>
						</div> -->
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="towncity">Town / City</label>
								<input type="text" name="city" class="form-control" placeholder="Town / City">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="postcodezip">Postcode / ZIP *</label>
								<input type="text" name="zip_code" class="form-control" placeholder="Postcode / ZIP *">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="text" name="phone" class="form-control" placeholder="Phone">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="emailaddress">Email Address</label>
								<input type="text" name="email_address" class="form-control" placeholder="Email Address">
							</div>
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<div class="form-group mt-4">
								<div class="radio">
									<button type="submit" name="submit" class="btn btn-primary py-3 px-4">Place an order En Pay</button>
								</div>
							</div>
						</div>
					</div>
				</form><!-- END -->


				<!-- 
	          <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$20.60</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>$17.60</span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-6">
	          		<div class="cart-detail ftco-bg-dark p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
								</div>
	          	</div>
	          </div> -->
			</div> <!-- .col-md-8 -->


		</div>

	</div>
	</div>
</section> <!-- .section -->
<?php require "../includes/footer.php"; ?>