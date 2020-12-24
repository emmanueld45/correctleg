<?php
session_start();
include 'dbconn.php';
include 'functions.php';


if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // check if order id exists
    $sql3 = "SELECT * FROM orders WHERE orderid='$order_id';";
    $result3 = mysqli_query($conn, $sql3);
    $numrows3 = mysqli_num_rows($result3);

    if ($numrows3 != 0) {


        // update order status to cancelled
        $sql = "UPDATE orders SET status='Cancelled' WHERE orderid='$order_id';";
        $result = mysqli_query($conn, $sql);


        $sql1 = "SELECT * FROM orderproducts WHERE orderid='$order_id';";
        $result1 = mysqli_query($conn, $sql1);
        $numrows1 = mysqli_num_rows($result1);

        while ($row1 = mysqli_fetch_assoc($result1)) {
            $product_id = $row1['productid'];
            $sellerid = $row1['sellerid'];


            // calc amount
            $sub_price = $row1['price'] * $row1['howmany'];
            $amount_removed = calc_item_price_percentage($sub_price);
            $amount_remaining = $sub_price - $amount_removed;

            remove_from_seller_pending_balance($sellerid, $amount_remaining);
        }
    } else {
        echo "Order_id does not exists";
    }
}







if (isset($_GET['single'])) {
    $item_id = $_GET['item_id'];
    $order_id = $_GET['order_id'];

    $sql = "SELECT * FROM orderproducts WHERE orderid='$order_id' AND productid='$item_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);



    // calc amount
    $sub_price = $row['price'] * $row['howmany'];
    $amount_removed = calc_item_price_percentage($sub_price);
    $amount_remaining = $sub_price - $amount_removed;
    remove_from_seller_pending_balance($sellerid, $amount_remaining);

    $sql = "DELETE FROM orderproducts WHERE orderid='$order_id' AND productid='$item_id';";
    $result = mysqli_query($conn, $sql);
}
