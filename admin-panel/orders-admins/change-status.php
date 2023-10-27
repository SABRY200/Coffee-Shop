<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['username'])) {
    echo "<script> window.location.href='" . ADMINURL . "'; </script>";
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    if (isset($_POST['submit'])) {
        if (empty($_POST['change_status'])) {
            echo "<script>alert('Input Is Empty')</script>";
        } else {
            $change_status = $_POST['change_status'];
            $update_status = $connect->prepare("UPDATE orders SET status= :status WHERE id='$id'");
            $update_status->execute([
                'status' => $change_status,
            ]);
            header("location: show-orders.php");
        }
    }
}
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mt-5">Update Status</h5>
                <form method="POST" class="p-auto" action="change-status.php?id=<?php echo $id; ?>">
                    <div class="form-outline mb-4">
                        <select name="change_status" class="form-select  form-control" aria-label="Default select example">
                            <option value="Delivered">Delivered</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require "../layouts/footer.php"; ?>