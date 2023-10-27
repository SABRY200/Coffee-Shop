<?php require "../../config/config.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

if (!isset($_SESSION['username'])) {
	echo "<script> window.location.href='" . ADMINURL . "'; </script>";
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $deleteAll = $connect->query("DELETE FROM bookings WHERE id = '$id'");
    $deleteAll->execute();
    header("location: show-bookings.php");
}
?>