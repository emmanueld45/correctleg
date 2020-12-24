<?php
include '../dbconn.php';
include '../functions.php';


if (isset($_GET['activate_seller'])) {
    $seller_id = $_GET['seller_id'];

    $sql = "UPDATE sellers SET status='active' WHERE uniqueid='$seller_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        window.location.href="inactive-sellers.php?seller_activated=true";
        </script>';
    }
}





if (isset($_GET['deactivate_seller'])) {
    $seller_id = $_GET['seller_id'];

    $sql = "UPDATE sellers SET status='inactive' WHERE uniqueid='$seller_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        window.location.href="active-sellers.php?seller_deactivated=true";
        </script>';
    }
}
