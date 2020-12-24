<?php
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/sellers.class.php';
include '../classes/customers.class.php';
include '../classes/admin.class.php';
include '../classes/orders.class.php';
include '../classes/products.class.php';






if (isset($_GET['mark_as_settled'])) {
    $item_id = mysqli_real_escape_string($db->conn, $_GET['item_id']);
    $order_id = mysqli_real_escape_string($db->conn, $_GET['order_id']);
    $result = $db->setQuery("SELECT * FROM orderproducts WHERE productid='$item_id' AND orderid='$order_id';");
    $row = mysqli_fetch_assoc($result);
    $total_price = $row['price'] * $row['howmany'];
    $seller_id = $row['sellerid'];
    $commission = $admin->calcItemCommission($row['price']) * $row['howmany'];
    $amount_remaining = $total_price - $commission;

    $seller->updateDetail($seller_id, "pendingbalance", $amount_remaining, "-");
    $seller->updateDetail($seller_id, "activebalance", $amount_remaining, "+");

    $admin->updateAdminDetail("pendingbalance", $commission, "-");
    $admin->updateAdminDetail("activebalance", $commission, "+");

    $db->setQuery("UPDATE orderproducts SET status='Settled' WHERE productid='$item_id' AND orderid='$order_id';");

    $admin->goToPage("view-order-items", "product_settled=true&order_id=$order_id");
}


















if (isset($_GET['mark_as_active'])) {
    $item_id = mysqli_real_escape_string($db->conn, $_GET['item_id']);
    $order_id = mysqli_real_escape_string($db->conn, $_GET['order_id']);
    $result = $db->setQuery("SELECT * FROM orderproducts WHERE productid='$item_id' AND orderid='$order_id';");
    $row = mysqli_fetch_assoc($result);
    $total_price = $row['price'] * $row['howmany'];
    $seller_id = $row['sellerid'];
    $commission = $admin->calcItemCommission($row['price']) * $row['howmany'];
    $amount_remaining = $total_price - $commission;

    $seller->updateDetail($seller_id, "activebalance", $amount_remaining, "-");
    $seller->updateDetail($seller_id, "pendingbalance", $amount_remaining, "+");

    $admin->updateAdminDetail("activebalance", $commission, "-");
    $admin->updateAdminDetail("pendingbalance", $commission, "+");



    $db->setQuery("UPDATE orderproducts SET status='Active' WHERE productid='$item_id' AND orderid='$order_id';");

    $admin->goToPage("view-order-items", "product_activated=true&order_id=$order_id");
}









if (isset($_GET['remove_item'])) {
    $item_id = mysqli_real_escape_string($db->conn, $_GET['item_id']);
    $order_id = mysqli_real_escape_string($db->conn, $_GET['order_id']);
    $result = $db->setQuery("SELECT * FROM orderproducts WHERE productid='$item_id' AND orderid='$order_id';");
    $row = mysqli_fetch_assoc($result);
    $total_price = $row['price'] * $row['howmany'];
    $seller_id = $row['sellerid'];
    $commission = $admin->calcItemCommission($row['price']) * $row['howmany'];
    $amount_remaining = $total_price - $commission;


    $seller->updateDetail($seller_id, "pendingbalance", $amount_remaining, "-");

    $admin->updateAdminDetail("pendingbalance", $commission, "-");

    $product->updateDetail($item_id, "howmany", 1, "+");

    $db->setQuery("DELETE from orderproducts WHERE productid='$item_id' AND orderid='$order_id';");

    if ($order->getNumTotalProductsOrdered($order_id) == 0) {
        $db->setQuery("DELETE FROM orders WHERE orderid='$order_id';");
        $admin->goToPage("active-orders", "order_deleted");
    } else {
        $admin->goToPage("view-order-items", "product_deleted=true&order_id=$order_id");
    }
}
