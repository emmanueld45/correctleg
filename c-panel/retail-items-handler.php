<?php
include '../dbconn.php';
include '../functions.php';


if (isset($_GET['activate_item'])) {
    $item_id = $_GET['item_id'];

    $sql = "UPDATE product SET status='active' WHERE uniqueid='$item_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        window.location.href="inactive-retail-items.php?item_activated=true";
        </script>';
    }
}





if (isset($_GET['deactivate_item'])) {
    $item_id = $_GET['item_id'];

    $sql = "UPDATE product SET status='inactive' WHERE uniqueid='$item_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        window.location.href="active-retail-items.php?item_deactivated=true";
        </script>';
    }
}


if (isset($_GET['delete_item'])) {
    $item_id = $_GET['item_id'];

    $sql = "DELETE FROM product WHERE uniqueid='$item_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        window.location.href="active-retail-items.php?item_deleted=true";
        </script>';
    }
}
