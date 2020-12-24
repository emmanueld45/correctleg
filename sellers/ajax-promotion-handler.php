<?php
session_start();

include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/products.class.php';

if (isset($_POST['add_item'])) {

    $item_id = mysqli_real_escape_string($db->conn, $_POST['item_id']);
    $howmany = mysqli_real_escape_string($db->conn, $_POST['howmany']);
    $discount_percentage = mysqli_real_escape_string($db->conn, $_POST['discount_percentage']);
    $promotion_id = mysqli_real_escape_string($db->conn, $_POST['promotion_id']);

    $sql = "INSERT INTO promotion_products (promotion_id, product_id, discount, quantity) VALUES (?, ?, ?, ?)";
    $db->prepareStatement($sql, array($promotion_id, $item_id, $discount_percentage, $howmany));
    echo "added";
}


if (isset($_POST['remove_item'])) {

    $item_id = mysqli_real_escape_string($db->conn, $_POST['item_id']);
    $promotion_id = mysqli_real_escape_string($db->conn, $_POST['promotion_id']);

    $db->setQuery("DELETE FROM promotion_products WHERE product_id='$item_id' AND promotion_id='$promotion_id';");
    echo "removed";
}
