<?php require "../config/config.php"; ?>
<?php require "../includes/header.php"; ?>
<?php
if (!isset($_SESSION['user_id'])) {
	echo "<script> window.location.href='" . APPURL . "'; </script>";
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];

    $delete_product = $connect->query("DELETE FROM cart WHERE id='$id'");
    $delete_product->execute();
    header("LOCATION: cart.php");


}