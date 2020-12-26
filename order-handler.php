<?php
session_start();
include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/sellers.class.php';
include 'classes/customers.class.php';
include 'classes/admin.class.php';
include 'classes/orders.class.php';
include 'classes/products.class.php';
include 'classes/emails.class.php';


if (!isset($_SESSION['id'])) {
    $admin->goToPage("customers/login", "invalid_checkout");
} else if (!$customer->customerIsLoggedIn($_SESSION['id'])) {
    $admin->goToPage("customers/login", "invalid_checkout");
}

if (!isset($_COOKIE['cl_cart'])) {
    $admin->goToPage("./", "invalid_checkout");
} else {
    $cart = json_decode($_COOKIE['cl_cart']);
    if (count($cart) == 0) {
        $admin->goToPage("./", "invalid_checkout");
    }
}

// check if all items have available quantities for order
$cart = json_decode($_COOKIE['cl_cart']);
foreach ($cart as $item) {
    $item = (array) $item;
    $itemIsAvailable = $product->itemHaveSufficientQuantityForOrder($item['item_id'], $item['promotion_id'], $item['item_size'], $item['how_many']);
    if ($itemIsAvailable['status'] != 'yes') {
        $message = $itemIsAvailable['message'];
        $admin->goToPage("cart", "item_unavailable=true&message=$message");
        return;
    }
}

if (isset($_SESSION['id']) and $customer->customerIsLoggedIn($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
} else {
    $customer_id = "Unknown";
}

$rand = RAND(10000000, 99000000);
$orderid = "cl-" . $rand;
$_SESSION['order_id'] = $orderid;

if (isset($_SESSION['pay_online'])) {
    $payment_method = "pay online";
} else {
    $payment_method = "pay on delivery";
}

$firstname = mysqli_real_escape_string($db->conn, $customer->getShippingAddressDetail($customer_id, "firstname"));
$lastname =  mysqli_real_escape_string($db->conn, $customer->getShippingAddressDetail($customer_id, "lastname"));
$phone =  mysqli_real_escape_string($db->conn, $customer->getShippingAddressDetail($customer_id, "phone"));
$additionalphone =  mysqli_real_escape_string($db->conn, $customer->getShippingAddressDetail($customer_id, "additionalphone"));
$email =  mysqli_real_escape_string($db->conn, $customer->getShippingAddressDetail($customer_id, "email"));
$region =  mysqli_real_escape_string($db->conn, $customer->getShippingAddressDetail($customer_id, "region"));
$address1 =  mysqli_real_escape_string($db->conn, $customer->getShippingAddressDetail($customer_id, "address1"));
$address2 =  mysqli_real_escape_string($db->conn, $customer->getShippingAddressDetail($customer_id, "address2"));

$shipping_fee = 0;
$delivery_method = "Door step delivery";

$status = "Active";
$time = time();
$date = date("d/m/y");
$a = date("h");
$b = $a - 1;
$c = date("i A");
$timeview = $b . ":" . $c;
$new = "yes";
$adminnew = "yes";
$a = date("h");
$b = $a - 1;
$c = date("i A");
$mydate = getdate(date("U"));
$time_created = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

$coupon_amount = 0;





// insert into orders table start
$send_order = $db->setQuery("INSERT INTO orders (orderid, customerid, deliverymethod, paymentmethod, status, time, date, timeview, time_created, adminnew, new, shipping_fee, coupon_amount) VALUES ('$orderid', '$customer_id', '$delivery_method', '$payment_method', '$status', '$time', '$date', '$timeview', '$time_created', '$adminnew', '$new', '$shipping_fee', '$coupon_amount');");
// insert into orders table end




// add sellers into an array start
$_SESSION['sellers_array'] = [];
function add_to_sellers_array($sellerid, $item_id)
{
    if (!in_array($sellerid, $_SESSION['sellers_array'])) {
        $sellers_array_count = count($_SESSION['sellers_array']);
        $_SESSION['sellers_array'][$sellers_array_count] = array('seller_id' => $sellerid, 'item_id' => $item_id);
    }
}
// add sellers into an array end



// add each items to the orderproducts table start
$cart = json_decode($_COOKIE['cl_cart']);
foreach ($cart as $item) {
    $item = (array) $item;
    $item_id =  $item['item_id'];
    $how_many =  $item['how_many'];
    $promotion_id =  $item['promotion_id'];
    if ($promotion_id == "") {
        $promotion_id = "empty";
    }
    $item_size = $item['item_size'];
    $item_price = $product->getCartItemMainPriceBasedOnSizeVariationAndPromotionId($item_id, $item['item_size'], $item['promotion_id']);
    $sellerid = $product->getDetail($item['item_id'], "sellerid");
    add_to_sellers_array($sellerid, $item_id);
    $order->addItemsToCookie($customer_id, $item_id, $orderid);

    $add_product = $db->setQuery("INSERT INTO orderproducts (orderid, productid, sellerid, customerid, howmany, price, size, promotion_id, status) VALUES ('$orderid', '$item_id', '$sellerid', '$customer_id', '$how_many', '$item_price', '$item_size', '$promotion_id', 'Active');");
}
// add each items to the orderproducts table end








// add order pickup station if selected start
// if ($delivery_method == "Pickup") {
//     $sql = "INSERT INTO orderpickupstation (orderid, stationid) VALUES ('$orderid', '$delivery_station');";
//     $add_pickup_station = mysqli_query($conn, $sql);
// }
// add order pickup station if selected end






// add order shipping address if selected start
if ($delivery_method == "Door step delivery") {
    $sql = "INSERT INTO ordershippingaddress (orderid, firstname, lastname, email, phone, additionalphone, address1, address2, region) VALUES ('$orderid', '$firstname', '$lastname', '$email', '$phone', '$additionalphone', '$address1', '$address2', '$region');";
    mysqli_query($conn, $sql);
}
// add order shipping address if selected end



// add to ordercustomerdetails start
$sql = "INSERT INTO ordercustomerdetails (orderid, firstname, lastname, email, phone, address1, address2, region) VALUES ('$orderid', '$firstname', '$lastname', '$email', '$phone', '$address1', '$address2', '$region');";
mysqli_query($conn, $sql);
// add to ordercustomerdetails end









// add pending balance to respective sellers start
$cart = json_decode($_COOKIE['cl_cart']);
foreach ($cart as $item) {
    $item = (array) $item;
    $item_price = $product->getCartItemMainPriceBasedOnSizeVariationAndPromotionId($item['item_id'], $item['item_size'], $item['promotion_id']);
    $total_price = $item_price * $item['how_many'];
    $amount_removed = $admin->calcItemCommission($item_price) * $item['how_many'];
    $amount_remaining = $total_price - $amount_removed;

    $sellerid = get_item_seller_id($item['item_id']);
    $seller->updateDetail($sellerid, "pendingbalance", $amount_remaining, "+");
    $admin->updateAdminDetail("pendingbalance", $amount_removed, "+");
}
// add pending balance to respective sellers end





// reduce item stock amount after it has been ordered start
$cart = json_decode($_COOKIE['cl_cart']);
foreach ($cart as $item) {
    $item = (array) $item;
    $item_id = $item['item_id'];
    $how_many = $item['how_many'];

    if ($item['promotion_id'] != "" and $product->promotionExist($item['promotion_id'])) {
        if ($product->productHaveVariation($item_id)) {
            $product->reduceVariationStock($item_id, $item['item_size'], $how_many);
        }
        $product->reducePromotionStock($item_id, $item['promotion_id'], $how_many);
    } else {
        if ($product->productHaveVariation($item_id)) {
            $product->reduceVariationStock($item_id, $item['item_size'], $how_many);
        } else {
            $product->updateDetail($item_id, "howmany", $how_many, "-");
        }
    }
}

// reduce item stock amount after it has been ordered end


$email = new Email();
// send sellers new order email notification start
$email->sendSellerNewOrderEmail($orderid);
// send sellers new order email notification end


// send customer new order email notification start
$email->sendCustomerNewOrderEmail($orderid, $shipping_fee);
// send customer new order email notification end









$_SESSION['order_firstname'] = $firstname;
$_SESSION['order_lastname'] = $lastname;
$_SESSION['order_region'] = $region;
$_SESSION['order_address1'] = $address1;
$_SESSION['order_address2'] = $address2;
$_SESSION['order_email'] = mysqli_real_escape_string($db->conn, $customer->getShippingAddressDetail($customer_id, "email"));
$_SESSION['order_phone'] = $phone;
$_SESSION['order_additionalphone'] = $additionalphone;
$_SESSION['order_shipping_fee'] = $shipping_fee;

// clear cart cookie
setcookie("cl_cart", "", time() - 2419200);

echo "<h3>Please wait...</h3>";




$admin->goToPage("order-status-view", "");
