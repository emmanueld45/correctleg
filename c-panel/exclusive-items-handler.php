<?php
include '../dbconn.php';
include '../functions.php';


if (isset($_GET['add_item'])) {

    $item_id = $_GET['item_id'];

    $sql = "UPDATE product SET exclusive='yes' WHERE uniqueid='$item_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        window.location.href="exclusive-items.php?item_added=true";
        </script>';
    }
}




if (isset($_GET['remove_item'])) {

    $item_id = $_GET['item_id'];

    $sql = "UPDATE product SET exclusive='no' WHERE uniqueid='$item_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        window.location.href="exclusive-items.php?item_removed=true";
        </script>';
    }
}
