<?php
include '../dbconn.php';
include '../functions.php';

$action = $_GET['action'];

if ($action == "turnon") {

    turn_on_clearance_sale();
    echo '<script>
    window.location.href="clearance-sales.php?on=true";
    </script>';
}



if ($action == "turnoff") {

    turn_off_clearance_sale();
    echo '<script>
    window.location.href="clearance-sales.php?off=true";
    </script>';
}


if ($action == "remove_item") {

    $item_id = $_GET['item_id'];

    $sql = "DELETE FROM clearancesale WHERE productid='$item_id';";
    $result = mysqli_query($conn, $sql);

    echo '<script>
    window.location.href="clearance-sales.php?item_removed=true";
    </script>';
}
