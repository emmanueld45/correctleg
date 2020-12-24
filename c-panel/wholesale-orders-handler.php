<?php
include '../dbconn.php';
include '../functions.php';


$action = $_GET['action'];


if ($action == "Activate") {
    $order_id = $_GET['order_id'];

    $sql = "UPDATE wholesaleorders SET status='Active' WHERE orderid='$order_id';";
    $result = mysqli_query($conn, $sql);



    if ($result) {
        echo '<script>
        window.location.href="-wholesale-active-orders.php?order_activated=true";
        </script>';
    }
}







































































if ($action == "Settle") {
    $order_id = $_GET['order_id'];

    // markk order as settled
    $sql = "UPDATE wholesaleorders SET status='Settled' WHERE orderid='$order_id';";
    $result = mysqli_query($conn, $sql);


    if ($result) {
        echo '<script>
         window.location.href="wholesale-active-orders.php?order_settled=true";
         </script>';
    }
}






























































if ($action == "Cancel") {
    $order_id = $_GET['order_id'];

    $sql = "UPDATE wholesaleorders SET status='Cancelled' WHERE orderid='$order_id';";
    $result = mysqli_query($conn, $sql);





    if ($result) {
        echo '<script>
        window.location.href="wholesale-active-orders.php?order_cancelled=true";
        </script>';
    }
}
