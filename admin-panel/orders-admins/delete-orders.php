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
    $deleteAll = $connect->query("DELETE FROM orders WHERE id = '$id'");
    $deleteAll->execute();
    header("location: show-orders.php");
}
?>