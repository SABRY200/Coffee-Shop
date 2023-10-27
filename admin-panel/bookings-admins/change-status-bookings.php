<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php
if (!isset($_SESSION['username'])) {
    echo "<script> window.location.href='" . ADMINURL . "'; </script>";
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if (isset($_POST['submit'])) {
        if (empty($_POST['status_booking'])) {
            echo "<script>alert('Input Is Empty')</script>";
        } else {
            $statusbook = $_POST['status_booking'];

            $status_booking = $connect->prepare("UPDATE bookings SET status= :status WHERE id='$id'");
            $status_booking->execute([
                'status' => $statusbook,
            ]);

            header("location: show-bookings.php");
        }
    }
}
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mt-5">Update Status</h5>
                <form method="POST" class="p-auto" action="change-status-bookings.php?id=<?php echo $id; ?>">
                    <div class="form-outline mb-4">
                        <select name="status_booking" class="form-select  form-control" aria-label="Default select example">
                            <option value="Done">Done</option>
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