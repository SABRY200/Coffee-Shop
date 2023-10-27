<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php
// if (!isset($_SESSION['user_id'])) {
// 	echo "<script> window.location.href='" . APPURL . "'; </script>";
// }
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	//Product
	$product = $connect->query("SELECT * FROM products WHERE id='$id'");
	$product->execute();
	$single_product = $product->fetch(PDO::FETCH_OBJ);

	//Related Products
	$related_products = $connect->query("SELECT * FROM products WHERE type='$single_product->type' AND id != '$single_product->id'");
	$related_products->execute();
	$All_related_products = $related_products->fetchAll(PDO::FETCH_OBJ);

	//Add To Cart
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$image = $_POST['image'];
		$price = $_POST['price'];
		$pro_id = $_POST['pro_id'];
		$description = $_POST['description'];
		$quantity = $_POST['quantity'];
		$user_id = $_SESSION['user_id'];

		$Add_Cart = $connect->prepare("INSERT INTO cart (name,image,price,pro_id,description,quantity,user_id) 
		VALUES (:name,:image,:price,:pro_id,:description,:quantity,:user_id)");
		$Add_Cart->execute([
			':name' => $name,
			':image' => $image,
			':price' => $price,
			':pro_id' => $pro_id,
			':description' => $description,
			':quantity' => $quantity,
			':user_id' => $user_id,
		]);
		echo "<script>alert('Added To Cart Successfully');</script>";
	}

	//Validate Cart
	if(isset($_SESSION['user_id'])){
		$validatecart = $connect->query("SELECT * FROM cart WHERE pro_id='$id' AND user_id='$_SESSION[user_id]'");
		$validatecart->execute();
		$rowCount = $validatecart->rowCount();
	}
}else{
	header("location: ".APPURL."/404.php");
}






?>

<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Product Detail</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Home</a></span> <span>Product Detail</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="<?php echo APPURL; ?>/images/menu-2.jpg" class="image-popup"><img src="<?php echo APPURL; ?>/images/<?php echo $single_product->image; ?>" class="img-fluid" alt="Colorlib Template"></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3><?php echo $single_product->name; ?></h3>
				<p class="price"><span>$<?php echo $single_product->price; ?></span></p>
				<p><?php echo $single_product->description; ?></p>
				<form action="product-single.php?id=<?php echo $id; ?>" method="post">
					<div class="row mt-4">
						<!-- <div class="col-md-6">
							<div class="form-group d-flex">
								<div class="select-wrap">
									<div class="icon"><span class="ion-ios-arrow-down"></span></div>
									<select name="" id="" class="form-control">
										<option value="small">Small</option>
										<option value="medium">Medium</option>
										<option value="large">Large</option>
										<option value="extra large">Extra Large</option>
									</select>
								</div>
							</div>
						</div> -->
						<div class="w-100"></div>
						<div class="input-group col-md-6 d-flex mb-3">
							<span class="input-group-btn mr-2">
								<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
									<i class="icon-minus"></i>
								</button>
							</span>
							<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
							<span class="input-group-btn ml-2">
								<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
									<i class="icon-plus"></i>
								</button>
							</span>
						</div>
					</div>
					<input type="hidden" name="name" value="<?php echo $single_product->name; ?>">
					<input type="hidden" name="image" value="<?php echo $single_product->image; ?>">
					<input type="hidden" name="price" value="<?php echo $single_product->price; ?>">
					<input type="hidden" name="pro_id" value="<?php echo $single_product->id; ?>">
					<input type="hidden" name="description" value="<?php echo $single_product->description; ?>">
					<?php if(isset($_SESSION['user_id'])) : ?>
						<?php if($rowCount > 0) : ?>
							<button  type="submit" name="submit" class="btn btn-primary py-3 px-5" disabled>Added to Cart</button>
						<?php else : ?>
							<button  type="submit" name="submit" class="btn btn-primary btn-outline-primary py-3 px-5">Add to Cart</button>
						<?php endif; ?>
					<?php else : ?>
						<p>Login To Add Product To Cart</p>
					<?php endif; ?>
				</form>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section ftco-animate text-center">
				<span class="subheading">Discover</span>
				<h2 class="mb-4">Related products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
			</div>
		</div>
		<div class="row">
			<?php foreach ($All_related_products as $product) : ?>
				<div class="col-md-3">
					<div class="menu-entry">
						<a href="<?php echo APPURL; ?>/products/product-single.php?id=<?php echo $product->id; ?>" class="img" style="background-image: url(<?php echo APPURL; ?>/images/<?php echo $product->image; ?>);"></a>
						<div class="text text-center pt-4">
							<h3><a href="#"><?php echo $product->name; ?></a></h3>
							<p><?php echo $product->description; ?></p>
							<p class="price"><span>$<?php echo $product->price; ?></span></p>
							<p><a href="<?php echo APPURL; ?>/products/product-single.php?id=<?php echo $product->id; ?>" class="btn btn-primary btn-outline-primary">Show</a></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php require "../includes/footer.php"; ?>