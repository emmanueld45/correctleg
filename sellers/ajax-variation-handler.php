<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/products.class.php';


if (isset($_POST['add_variation'])) {
    $variation_size = $_POST['variation_size'];
    $variation_price = $_POST['variation_price'];
    $variation_quantity = $_POST['variation_quantity'];

    $rand = RAND(0, 10000000);

    if (!isset($_SESSION['item_variations'])) {
        $_SESSION['item_variations'] = [];
        $variation = array(
            'variation_id' => $rand,
            'variation_size' => $variation_size,
            'variation_price' => $variation_price,
            'variation_quantity' => $variation_quantity
        );

        $_SESSION['item_variations'][0] = $variation;
    } else {
        $variation = array(
            'variation_id' => $rand,
            'variation_size' => $variation_size,
            'variation_price' => $variation_price,
            'variation_quantity' => $variation_quantity
        );
        $_SESSION['item_variations'][count($_SESSION['item_variations'])] = $variation;
    }

    echo "
    <div variation_box='$rand' class='box' style='background-color:crimson;color:white;border-bottom:1px solid white;'>
    <div class='row1 p-1'>$variation_size</div>
    <div class='row2 p-1'><span>&#8358</span>" . number_format($variation_price) . "</div>
    <div class='row3 p-1'>$variation_quantity <i  class='fa fa-times remove-variation-btn'  onclick='remove_variation(this)' style='float:right;cursor:pointer;' variation_id='$rand'></i></div>
</div>
    ";
}







if (isset($_POST['remove_variation'])) {
    $variation_id = $_POST['variation_id'];

    foreach ($_SESSION['item_variations'] as $key => $value) {
        if ($value['variation_id'] == $variation_id) {
            unset($_SESSION['item_variations'][$key]);
        }
    }
    $_SESSION['item_variations'] = array_values($_SESSION['item_variations']);
}



if (isset($_POST['remove_inbuilt_variation'])) {
    $variation_id = $_POST['variation_id'];
    $item_id = $_POST['item_id'];

    $db->setQuery("DELETE FROM product_variations WHERE product_id='$item_id' AND id='$variation_id';");
}
