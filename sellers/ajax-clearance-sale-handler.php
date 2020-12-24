<?php
session_start();
include '../dbconn.php';
include '../functions.php';

if (isset($_POST['add_to_clearance_item'])) {


    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $howmany = mysqli_real_escape_string($conn, $_POST['howmany']);
    $discount_percentage = mysqli_real_escape_string($conn, $_POST['discount_percentage']);
    $sellerid = $_SESSION['id'];

    $original_price = get_item_detail($item_id, "price");
    $removed_price = $original_price * $discount_percentage;
    $discounted_price = $original_price - $removed_price;

    $sql = "INSERT INTO clearancesale (productid, sellerid, howmany, price, original_price, discount_percentage) VALUES('$item_id', '$sellerid', '$howmany', '$discounted_price', '$original_price', '$discount_percentage');";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "added";
    } else {
        echo "error";
    }
}


















if (isset($_POST['remove_from_clearance_item'])) {


    $item_id = $_POST['item_id'];
    $sellerid = $_SESSION['id'];

    $sql = "DELETE FROM clearancesale WHERE productid='$item_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "removed";
    } else {
        echo "error";
    }
}
