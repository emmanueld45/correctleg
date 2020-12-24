<?php
session_start();
include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/products.class.php';

if (isset($_POST['add_item_to_cart'])) {

    $item_id = $_POST['item_id'];
    $how_many = $_POST['how_many'];
    $item_price = $_POST['item_price'];
    $item_name = $_POST['item_name'];
    $item_image = $_POST['item_image'];
    $item_size = $_POST['item_size'];

    // Note: This variation_price variable lets me know if the item had variations or not
    // if empty, then item has no variation else the item has variations
    $variation_price = $_POST['variation_price'];

    $promotion_id = $_POST['promotion_id'];


    $howmany_items_available = get_item_detail($item_id, "howmany");
    // if (item_is_on_clearance_sale($item_id)) {
    //     $howmany_items_available = get_item_clearance_sale_howmany($item_id);
    // }

    if ($promotion_id != "") {
        $howmany_items_available = $product->getPromotionProductDetails($item_id, $promotion_id, "quantity");
    }

    if ($product->productHaveVariation($item_id)) {
        $howmany_items_available = $product->getProductVariationDetail($item_id, "quantity");
    }

    if (!item_have_stocks($item_id)) {
        echo "nostocks";
    } else {
        if ($how_many <= $howmany_items_available) {
            // check if cart session is set
            if (isset($_SESSION['cart'])) {

                $item_array_id = array_column($_SESSION['cart'], "item_id");
                // check if item is already in cart variable
                if (in_array($item_id, $item_array_id)) {
                    echo "alreadyexists";
                } else {
                    $item_count = count($_SESSION['cart']);
                    $item_array = array(
                        'item_id' => $_POST['item_id'],
                        'how_many' => $how_many,
                        "item_name" => $_POST['item_name'],
                        "item_image" => $_POST['item_image'],
                        "item_price" => $_POST['item_price'],
                        "item_size" => $item_size,
                        "promotion_id" => $promotion_id
                    );
                    $_SESSION['cart'][$item_count] = $item_array;


                    echo "added";
                }
            } else {

                $item_array = array(
                    'item_id' => $_POST['item_id'],
                    'how_many' => $how_many,
                    "item_name" => $_POST['item_name'],
                    "item_image" => $_POST['item_image'],
                    "item_price" => $_POST['item_price'],
                    "item_size" => $item_size,
                    "promotion_id" => $promotion_id
                );
                // create new cart session
                $_SESSION['cart'][0] = $item_array;
                //reduce_item_stocks($item_id);
                echo "added";
            }
        } else {
            echo "stocksunavailable";
        }
    }
}





































if (isset($_POST['remove_cart_item'])) {
    /*$item_id = $_POST['itemid'];
    $arr = $_SESSION['mycart'];
    $search = $item_id;

    $search_position = array_search($search, $arr, true);
    // array_splice($arr, $search_position, 1);
    unset($arr[$search_position]);

    echo $search_position; */

    $item_id = $_POST['item_id'];
    $cart_items = $_SESSION['cart'];
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['item_id'] == $item_id) {
            unset($_SESSION['cart'][$key]);
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}



if (isset($_POST['increase_cart_item_quantity'])) {
    $item_id = $_POST['item_id'];
    $promotion_id = $_POST['promotion_id'];
    $item_size = $_POST['item_size'];
    $how_many = $_POST['how_many'];

    if ($promotion_id != "") {
        $how_many_available = $product->getPromotionProductDetails($item_id, $promotion_id, 'quantity');
        if ($how_many < $how_many_available) {

            if ($product->productHaveVariation($item_id)) {
                $how_many_available = $product->getProductVariationQuantityFromSize($item_id, $item_size);
                if ($how_many < $how_many_available) {
                    echo 'available';
                } else {
                    echo 'unvailable: have promotion but variation is finished';
                }
            } else {
                $how_many_available = $product->getDetail($item_id, 'howmany');
                if ($how_many < $how_many_available) {
                    echo 'available';
                } else {
                    echo 'unvailable: have promotion but normal quantity is finished';
                }
            }
        } else {
            echo 'unvailable: have pronotiom but no quantity left for promotion';
        }
    } else if ($product->productHaveVariation($item_id)) {
        $how_many_available = $product->getProductVariationQuantityFromSize($item_id, $item_size);
        if ($how_many < $how_many_available) {
            echo 'available';
        } else {
            echo 'unvailable: Does not have promotion but have variation';
        }
    } else {
        $how_many_available = $product->getDetail($item_id, 'howmany');
        if ($how_many < $how_many_available) {
            echo 'available';
        } else {
            echo 'unvailable: does not have promotion nor a variation';
        }
    }
}






if (isset($_POST['decrease_cart_item_quantity'])) {
    $item_id = $_POST['item_id'];
    $promotion_id = $_POST['promotion_id'];
    $item_size = $_POST['item_size'];
    $how_many = $_POST['how_many'];

    if ($how_many > 1) {
        echo "available";
    } else {
        echo "unavalable";
    }
}
