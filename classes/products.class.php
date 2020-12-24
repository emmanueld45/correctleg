<?php

class Product
{
    // public $product_id;

    // public function createProduct($user_id, $title, $description, $price, $product_condition, $image1, $image2, $category, $type)
    // {
    //     global $db;
    //     $uniqueid = uniqid();
    //     $time = time();
    //     $date = date("d-m-y");
    //     $status = "inactive";
    //     $new = "yes";
    //     $views = 0;
    //     $sold = "no";
    //     $tracking_id = RAND(0, 10000);



    //     $result = $db->setQuery("INSERT INTO product (uniqueid, userid, title, description, price, product_condition, image1, image2, category, type, time, date, status, new, views, sold, tracking_id) VALUES ('$uniqueid', '$user_id', '$title', '$description', '$price', '$product_condition', '$image1', '$image2', '$category', '$type', '$time', '$date', '$status', '$new', '$views', '$sold', '$tracking_id');");
    //     return $result;
    // }

    public function getDetail($product_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product WHERE uniqueid='$product_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function setDetail($product_id, $field, $detail)
    {
        global $db;

        $result = $db->setQuery("UPDATE product SET $field='$detail' WHERE uniqueid='$product_id';");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function updateDetail($product_id, $detail, $value, $op)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product WHERE uniqueid='$product_id';");
        $row = mysqli_fetch_assoc($result);
        $old_value = $row[$detail];

        if ($op == "+") {
            $new_value = $old_value + $value;
        } else if ($op == "-") {
            $new_value = $old_value - $value;
        }

        $result1 = $db->setQuery("UPDATE product SET $detail='$new_value' WHERE uniqueid='$product_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function productExist($product_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product WHERE uniqueid='$product_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function wholesaleProductExist($product_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM wholesaleproduct WHERE uniqueid='$product_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function promotionExist($promotion_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM promotions WHERE uniqueid='$promotion_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPromotionDetail($promotion_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM promotions WHERE uniqueid='$promotion_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function itemIsInPromotion($promotion_id, $item_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM promotion_products WHERE promotion_id='$promotion_id' AND product_id='$item_id';");
        $numrows = mysqli_num_rows($result);
        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }




    public function shortenName($name)
    {
        if (strlen($name) > 25) {
            $name = substr($name, 0, 25);
            $name = $name . "...";
        }


        return $name;
    }


    public function shortenBrandName($name)
    {
        if (strlen($name) > 10) {
            $name = substr($name, 0, 10);
            $name = $name . "...";
        }


        return $name;
    }

    public function shortenLength($text, $length, $prefix)
    {
        if (strlen($text) > $length) {
            $text = substr($text, 0, $length);
            $text = $text . $prefix;
        }


        return $text;
    }


    public function createCouponCode()
    {
        $alph = str_shuffle("ABCDEFGHIJKLMNPQRSTUVWXYZ");
        $nums = str_shuffle("1234567890123456789");
        if (strlen($alph) > 5) {
            $cutalph = substr($alph, 0, 5);

            $alph = $cutalph;
        }

        if (strlen($nums) > 5) {
            $cutnums = substr($nums, 0, 5);

            $nums = $cutnums;
        }

        $result = $alph . $nums;
        $final_result = str_shuffle($result);
        return $final_result;
    }


    public function createCoupon($user_id, $amount)
    {
        global $db;

        $coupon_code = $this->createCouponCode();
        $status = "active";
        $result = $db->setQuery("INSERT INTO coupons (userid, coupon_code, amount, status) VALUES ('$user_id', '$coupon_code', '$amount', '$status');");
        return $coupon_code;
    }

    public function couponIsValid($coupon_code)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM coupons WHERE coupon_code='$coupon_code';");
        $numrows = mysqli_num_rows($result);
        if ($numrows != 0) {
            $row = mysqli_fetch_assoc($result);

            if ($row['status'] == "active") {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }



    public function getCouponAmount($coupon_code)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM coupons WHERE coupon_code='$coupon_code';");
        $row = mysqli_fetch_assoc($result);
        return $row['amount'];
    }


    public function markCouponAsUsed($coupon_code)
    {
        global $db;

        $db->setQuery("UPDATE coupons SET status='used' WHERE coupon_code='$coupon_code';");
    }

    public function productIsOnClearanceSale($product_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM clearancesale WHERE productid='$product_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            return true;
        } else {
            return false;
        }
    }


    public function getClearancesaleProductDetail($product_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM clearancesale WHERE productid='$product_id';");
        $numrows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        return $row[$detail];
    }

    public function createProductCode()
    {
        $alph = str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ");
        $nums = str_shuffle("12345678901234567890");
        if (strlen($alph) > 2) {
            $cutalph = substr($alph, 0, 2);

            $alph = $cutalph;
        }

        if (strlen($nums) > 2) {
            $cutnums = substr($nums, 0, 2);

            $nums = $cutnums;
        }

        $result = $alph . $nums;
        $final_result = str_shuffle($result);
        return $final_result;
    }


    public function addFootwearType($item_is_for, $item_type)
    {
        global $db;

        $result = $db->setQuery("INSERT INTO footwear_type (item_is_for, item_type) VALUES ('$item_is_for', '$item_type');");

        if ($result) {
            echo "inserted";
        } else {
            echo "Not inserted";
        }
    }

    function addFootwearSize($item_is_for, $item_size)
    {
        global $db;

        $result = $db->setQuery("INSERT INTO footwear_size (item_is_for, item_size) VALUES ('$item_is_for', '$item_size');");
        if ($result) {
            echo "inserted";
        } else {
            echo "Not inserted";
        }
    }

    public function IsInPromotion($item_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM promotion_products WHERE product_id='$item_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPromotionDetails($item_id, $promotion_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM promotion_products WHERE product_id='$item_id' AND promotion_id='$promotion_id';");
        $row = mysqli_fetch_assoc($result);
        return $row[$detail];
    }

    public function getPromotionProductDetails($item_id, $promotion_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM promotion_products WHERE product_id='$item_id' AND promotion_id='$promotion_id';");
        $row = mysqli_fetch_assoc($result);
        return $row[$detail];
    }

    public function reducePromotionStock($item_id, $promotion_id, $how_many)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM promotion_products WHERE product_id='$item_id' AND promotion_id='$promotion_id';");
        $row = mysqli_fetch_assoc($result);
        if ($row['quantity'] > 0) {
            $new_quantity = $row['quantity'] - $how_many;
        } else {
            $new_quantity = 0;
        }

        $result1 = $db->setQuery("UPDATE promotion_products SET quantity='$new_quantity' WHERE product_id='$item_id' AND promotion_id='$promotion_id';");
    }



    public function displayStars($number_of_stars, $active_star_template, $inactive_star_template)
    {

        global $db;

        $output = "";
        $number_of_active_stars = $number_of_stars;
        $number_of_inactive_stars = 5 - $number_of_active_stars;
        for ($i = 0; $i < $number_of_active_stars; $i++) {
            $output .=  $active_star_template;
        }

        for ($i = 0; $i < $number_of_inactive_stars; $i++) {
            $output .=  $inactive_star_template;
        }

        return $output;
    }


    public function displayReviewStars($number_of_stars, $active_star_template, $inactive_star_template)
    {

        global $db;

        $output = "";
        $number_of_active_stars = $number_of_stars;
        $number_of_inactive_stars = 5 - $number_of_active_stars;
        for ($i = 0; $i < $number_of_active_stars; $i++) {
            $output .=  $active_star_template;
        }

        for ($i = 0; $i < $number_of_inactive_stars; $i++) {
            $output .=  $inactive_star_template;
        }

        return $output;
    }

    public function getStars($item_id, $active_star_template, $inactive_star_template)
    {
        global $db;

        $views = $this->getDetail($item_id, "views");
        $number_of_stars = "";
        if ($views == 0) {
            $number_of_stars = 0;
        } else if ($views > 1 and $views < 11) {
            $number_of_stars = 1;
        } else if ($views > 10 and $views < 31) {
            $number_of_stars = 2;
        } else if ($views > 0 and $views < 61) {
            $number_of_stars = 3;
        } else if ($views > 60 and $views < 101) {
            $number_of_stars = 4;
        } else if ($views > 100) {
            $number_of_stars = 5;
        }

        return $this->displayStars($number_of_stars, $active_star_template, $inactive_star_template);
    }

    public function getPagination($total_number_of_items, $limit, $page_url)
    {

        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $number_of_pages = floor($total_number_of_items / $limit);

        if ($page > $number_of_pages) {
            $page = 1;
        }


        $next_page_count = "";
        $prev_page_count = "";
        $number_of_pages = floor($total_number_of_items / $limit);
        if ($page != 1) {
            $prev_page_count = $page - 1;
            echo '<a href="' . $page_url . '&page=' . $prev_page_count . '" class="prev"><i class="fa fa-angle-left"></i> PREV PAGE</a>';
        }
        echo '<span class="page-count"><b>' . $page . '</b>/' . $number_of_pages . '</span>';
        if ($page < $number_of_pages) {
            $next_page_count = $page + 1;
            echo '<a href="' . $page_url . '&page=' . $next_page_count . '" class="next"> NEXT PAGE <i class="fa fa-angle-right"></i></a>';
        }
    }

    public function addRating($rating_customer_id, $rating_comment, $rating_item_id, $rating_order_id, $rating_number)
    {
        global $db;
        global $customer;
        $status = "Pending";
        $time = time();
        $date = date("d/m/y");
        if (!$customer->customerHaveReviewedItem($rating_customer_id, $rating_item_id, $rating_order_id)) {
            $result = $db->setQuery("INSERT INTO product_reviews (customer_id, product_id, order_id, number_of_stars, comment, status, time, date) VALUES ('$rating_customer_id', '$rating_item_id', '$rating_order_id', '$rating_number', '$rating_comment', '$status', '$time', '$date');");
        }
    }

    public function productHaveReviews($product_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product_reviews WHERE product_id='$product_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addVariation($item_id, $size, $price, $quantity)
    {
        global $db;

        $db->setQuery("INSERT INTO product_variations (product_id, size, price, quantity) VALUES ('$item_id', '$size', '$price', '$quantity');");
    }


    public function productHaveVariation($item_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product_variations WHERE product_id='$item_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getProductVariationDetail($item_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product_variations WHERE product_id='$item_id';");
        $row = mysqli_fetch_assoc($result);
        return $row[$detail];
    }

    public function getProductVariationQuantityFromSize($item_id, $item_size)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product_variations WHERE product_id='$item_id' AND size='$item_size';");
        $row = mysqli_fetch_assoc($result);
        return $row['quantity'];
    }

    public function getProductVariationPriceFromSize($item_id, $item_size)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product_variations WHERE product_id='$item_id' AND size='$item_size';");
        $row = mysqli_fetch_assoc($result);
        return $row['price'];
    }


    public function reduceVariationStock($item_id, $variation_size, $how_many)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product_variations WHERE product_id='$item_id' AND size='$variation_size';");
        $row = mysqli_fetch_assoc($result);
        if ($row['quantity'] > 0) {
            $new_quantity = $row['quantity'] - $how_many;
        } else {
            $new_quantity = 0;
        }

        $result1 = $db->setQuery("UPDATE product_variations SET quantity='$new_quantity' WHERE product_id='$item_id' AND size='$variation_size';");
    }

    public function itemIsInCart($item_id)
    {
        $cart = json_decode($_COOKIE['cl_cart']);
        foreach ($cart as $item) {
            $item = (array) $item;
            if ($item_id == $item['item_id']) {
                return true;
            }

            return false;
        }
    }

    public function itemHaveSufficientQuantityForOrder($item_id, $promotion_id, $item_size, $how_many)
    {

        if ($promotion_id != "" and $this->promotionExist($promotion_id)) {
            $how_many_available = $this->getPromotionProductDetails($item_id, $promotion_id, 'quantity');
            if ($how_many < $how_many_available) {

                if ($this->productHaveVariation($item_id)) {
                    $how_many_available = $this->getProductVariationQuantityFromSize($item_id, $item_size);
                    if ($how_many < $how_many_available) {
                        //echo 'available';
                        return array('status' => 'yes', 'message' => '');
                    } else {
                        // echo 'unvailable: have promotion but variation is finished';
                        return array('status' => 'no', 'message' => "your item '" . $this->getDetail($item_id, 'name') . "' is out of stock for your desired size");
                    }
                } else {
                    if ($how_many < $how_many_available) {
                        // echo 'available';
                        return array('status' => 'yes', 'message' => '');;
                    } else {
                        // echo 'unvailable: have promotion but no quantity left for promotion';
                        return array('status' => 'no', 'message' => "your item '" . $this->getDetail($item_id, 'name') . "' is out of stock for your desired quantity on this promotion: $how_many_available available");
                    }
                }
            } else {
                // echo 'unvailable: have promotion but no quantity left for promotion';
                return false;
            }
        } else {
            if ($this->productHaveVariation($item_id)) {
                $how_many_available = $this->getProductVariationQuantityFromSize($item_id, $item_size);
                if ($how_many < $how_many_available) {
                    //echo 'available';
                    return array('status' => 'yes', 'message' => '');
                } else {
                    // echo 'unvailable: Does not have promotion but have variation, and variation is out of stock';
                    return array('status' => 'no', 'message' => "your item '" . $this->getDetail($item_id, 'name') . "' is out of stock for your desired size: $how_many_available available");
                }
            } else {
                $how_many_available = $this->getDetail($item_id, 'howmany');
                if ($how_many < $how_many_available) {
                    // echo 'available';
                    return array('status' => 'yes', 'message' => '');
                } else {
                    //echo 'unvailable: does not have promotion nor a variation, but item is out of stock';
                    return array('status' => 'no', 'message' => "your item '" . $this->getDetail($item_id, 'name') . "' is out of stock for your desired quantity: $how_many_available available");
                }
            }
        }
    }

    public function increaseCartItemQuantity($item_id)
    {
        $cart = json_decode($_COOKIE['cl_cart']);

        for ($i = 0; $i < count($cart); $i++) {
            $cart[$i] = (array) $cart[$i];
            if ($item_id == $cart[$i]['item_id']) {
                $cart[$i]['how_many'] += 1;
            }
        }

        setcookie("cl_cart", json_encode($cart), time() + 2419200);
    }

    public function decreaseCartItemQuantity($item_id)
    {
        $cart = json_decode($_COOKIE['cl_cart']);

        for ($i = 0; $i < count($cart); $i++) {
            $cart[$i] = (array) $cart[$i];
            if ($item_id == $cart[$i]['item_id']) {
                $cart[$i]['how_many'] -= 1;
            }
        }

        setcookie("cl_cart", json_encode($cart), time() + 2419200);
    }

    public function getTotalCartItemPrice()
    {
        $total = 0;
        $cart = json_decode($_COOKIE['cl_cart']);
        foreach ($cart as $item) {
            $item = (array) $item;
            $item_id = $item['item_id'];
            if ($item['promotion_id'] != "" and $this->promotionExist($item['promotion_id'])) {
                $discount = $this->getPromotionProductDetails($item_id, $item['promotion_id'], 'discount');
                $quantity = $this->getPromotionProductDetails($item_id, $item['promotion_id'], 'quantity');

                if ($this->productHaveVariation($item_id)) {
                    $price = $this->getProductVariationPriceFromSize($item_id, $item['item_size']);
                } else {
                    $price = $this->getDetail($item_id, 'price');
                }
                $removed_price = $price * $discount;
                $price = $price - $removed_price;
            } else {
                if ($this->productHaveVariation($item_id)) {
                    $price = $this->getProductVariationPriceFromSize($item_id, $item['item_size']);;
                } else {
                    $price = $this->getDetail($item_id, 'price');
                }
            }
            $total += ($price * $item['how_many']);
        }
        return $total;
    }

    public function getTotalNumItemsInCart()
    {
        if (isset($_COOKIE['cl_cart'])) {
            $cart = json_decode($_COOKIE['cl_cart']);
            return count($cart);
        } else {
            return 0;
        }
    }

    public function getCartItemMainPriceBasedOnSizeVariationAndPromotionId($item_id, $item_size, $promotion_id)
    {
        if ($promotion_id != "" and $this->promotionExist($promotion_id)) {
            $discount = $this->getPromotionProductDetails($item_id, $promotion_id, 'discount');
            $quantity = $this->getPromotionProductDetails($item_id, $promotion_id, 'quantity');

            if ($this->productHaveVariation($item_id)) {
                $price = $this->getProductVariationPriceFromSize($item_id, $item_size);
            } else {
                $price = $this->getDetail($item_id, 'price');
            }
            $removed_price = $price * $discount;
            $price = $price - $removed_price;
        } else {
            if ($this->productHaveVariation($item_id)) {
                $price = $this->getProductVariationPriceFromSize($item_id, $item_size);
            } else {
                $price = $this->getDetail($item_id, 'price');
            }
        }

        return $price;
    }
}

$product = new Product();
