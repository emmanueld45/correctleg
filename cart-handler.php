<?php
session_start();
include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/products.class.php';

if (isset($_POST['add_item_to_cart'])) {

    $item_id = $_POST['item_id'];
    $how_many = $_POST['how_many'];
    // $item_price = $_POST['item_price'];
    // $item_name = $_POST['item_name'];
    // $item_image = $_POST['item_image'];
    $item_size = $_POST['item_size'];

    // Note: This variation_price variable lets me know if the item had variations or not
    // if empty, then item has no variation else the item has variations
    $variation_price = $_POST['variation_price'];

    $promotion_id = $_POST['promotion_id'];




    if ($promotion_id != "" and $product->promotionExist($promotion_id)) {
        $howmany_items_available = $product->getPromotionProductDetails($item_id, $promotion_id, "quantity");
        if ($product->productHaveVariation($item_id)) {
            $howmany_items_available = $product->getProductVariationQuantityFromSize($item_id, $item_size);
        }
    } else {
        $howmany_items_available = $product->getDetail($item_id, "howmany");
    }




    if ($how_many <= $howmany_items_available) {
        // check if cart session is set
        if (isset($_COOKIE['cl_cart'])) {
            $cart = json_decode($_COOKIE['cl_cart']);

            // check if item is already in cart variable
            if ($product->itemIsInCart($item_id)) {
                echo "alreadyexists";
            } else {
                $item_count = count($cart);
                $item_array = array(
                    'item_id' => $_POST['item_id'],
                    'how_many' => $how_many,
                    "item_size" => $item_size,
                    "promotion_id" => $promotion_id
                );
                $cart[$item_count] = $item_array;
                setcookie("cl_cart", json_encode($cart), time() + 2419200);

                echo "added";
            }
        } else {
            $cart = [];
            $item_array = array(
                'item_id' => $_POST['item_id'],
                'how_many' => $how_many,
                "item_size" => $item_size,
                "promotion_id" => $promotion_id
            );

            $cart[0] = $item_array;
            // create new cart cookie
            setcookie("cl_cart", json_encode($cart), time() + 2419200);
            echo "added";
        }
    } else {
        echo "stocksunavailable";
    }
}





































if (isset($_POST['remove_cart_item'])) {

    $item_id = $_POST['item_id'];
    $cart = json_decode($_COOKIE['cl_cart']);
    for ($i = 0; $i < count($cart); $i++) { {
            $cart[$i] = (array) $cart[$i];
            if ($cart[$i]['item_id'] == $item_id) {
                unset($cart[$i]);
            }
        }
    }
    $cart = array_values($cart);
    setcookie("cl_cart", json_encode($cart), time() + 2419200);
    echo "item removed";
}



if (isset($_POST['increase_cart_item_quantity'])) {
    $item_id = $_POST['item_id'];
    $promotion_id = $_POST['promotion_id'];
    $item_size = $_POST['item_size'];
    $how_many = $_POST['how_many'];

    $itemIsAvailable = $product->itemHaveSufficientQuantityForOrder($item_id, $promotion_id, $item_size, $how_many);
    if ($itemIsAvailable['status'] == 'yes') {
        $product->increaseCartItemQuantity($item_id);
        echo "available";
    } else {
        echo $itemIsAvailable['message'];
    }
}






if (isset($_POST['decrease_cart_item_quantity'])) {
    $item_id = $_POST['item_id'];
    $promotion_id = $_POST['promotion_id'];
    $item_size = $_POST['item_size'];
    $how_many = $_POST['how_many'];

    if ($how_many > 1) {

        $product->decreaseCartItemQuantity($item_id);
        echo "available";
    } else {
        echo "unavalable";
    }
}



if (isset($_POST['get_total_cart_item_amount'])) {

    echo $product->getTotalCartItemPrice();
}
