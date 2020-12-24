<?php


function customer_is_logged_in($customer_id)
{
    global $conn;

    $sql = "SELECT * FROM customers WHERE uniqueid='$customer_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows != 0) {
        return true;
    } else {
        return false;
    }
}



function customer_have_shipping_address($customer_id)
{
    global $conn;

    $sql = "SELECT * FROM shippingaddress WHERE customerid='$customer_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows != 0) {
        return true;
    } else {
        return false;
    }
}



function get_customer_shipping_address($customer_id)
{
    global $conn;

    $sql = "SELECT * FROM shippingaddress WHERE customerid='$customer_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row;
}



function get_pickup_station_detail($station_id, $detail)
{
    global $conn;

    $sql = "SELECT * FROM pickupstation WHERE id='$station_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $pickup_detail = $row[$detail];

    return $pickup_detail;
}
