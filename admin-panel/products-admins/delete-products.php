<?php require "../../config/config.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

// if(!isset($_SERVER['HTTP_REFERER'])){
// 	// redirect them to your desired location
// 	header('location: http://localhost/coffee-blend');
// 	exit;
// }
if (!isset($_SESSION['username'])) {
	echo "<script> window.location.href='" . ADMINURL . "'; </script>";
}
if(isset($_GET['id'])){
    $id = $_GET['id'];

    //Delete With Image
    $select_product = $connect->query("SELECT * FROM products WHERE id = '$id'");
    $select_product->execute();
    $product_image = $select_product->fetch(PDO::FETCH_OBJ);
    unlink("image/".$product_image->image."");

    //Delete
    $delete_product = $connect->query("DELETE FROM products WHERE id = '$id'");
    $delete_product->execute();
    header("location: show-products.php");
}
?>