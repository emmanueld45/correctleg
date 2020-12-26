<?php
session_start();
include 'dbconn.php';
//include 'send_twilio_sms.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/sellers.class.php';
include 'classes/customers.class.php';
include 'classes/admin.class.php';
include 'classes/orders.class.php';
include 'classes/products.class.php';
include 'classes/emails.class.php';


if (!isset($_SESSION['payment_method'])  and !isset($_SESSION['cart'])) {
    echo '<script>
    window.location.href="./";
    </script>';
}

echo "<h3>Please wait...</h3>";
if (isset($_SESSION['id']) and $customer->customerIsLoggedIn($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
} else {
    $customer_id = "Unknown";
}

$rand = RAND(10000000, 99000000);
$orderid = "cl-" . $rand;
$_SESSION['order_id'] = $orderid;


$delivery_method = $_SESSION['delivery_method'];
if ($delivery_method == "Pickup") {
    $delivery_station = $_SESSION['delivery_station'];
    $pickup_station_address = get_pickup_station($_SESSION['delivery_station']);
    $_SESSION['pickup_station_address'] = $pickup_station_address;
}
if (isset($_GET['paidonline'])) {
    $payment_method = "onlinepayment";
} else {
    $payment_method = $_SESSION['payment_method'];
}


$firstname = $_SESSION['order_firstname'];
$lastname = $_SESSION['order_lastname'];
$phone = $_SESSION['order_phone'];
$additionalphone = $_SESSION['order_additionalphone'];
$email = $_SESSION['order_email'];
$region = $_SESSION['order_region'];
$address1 = $_SESSION['order_address1'];
$address2 = $_SESSION['order_address2'];

$shipping_fee = $_SESSION['order_shipping_fee'];


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


if (isset($_SESSION['coupon_amount'])) {
    $coupon_amount = $_SESSION['coupon_amount'];
} else {
    $coupon_amount = 0;
}
$total_amount = $_SESSION['cart_total'];










// insert into orders table start
$sql = "INSERT INTO orders (orderid, customerid, deliverymethod, paymentmethod, status, time, date, timeview, time_created, adminnew, new, shipping_fee, coupon_amount) VALUES ('$orderid', '$customer_id', '$delivery_method', '$payment_method', '$status', '$time', '$date', '$timeview', '$time_created', '$adminnew', '$new', '$shipping_fee', '$coupon_amount');";
$send_order = mysqli_query($conn, $sql);

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
$items = $_SESSION['cart'];
foreach ($items as $item) {
    // echo "<br> id =" . $item['item_id'] . ": price = " . $item['item_price'] . ": image = " . $item['item_image'] . ": name = " . $item['item_name'] . ": howmany = x" . $item['how_many'] . "<br>";
    $item_id =  $item['item_id'];
    $how_many =  $item['how_many'];
    $item_price = $item['item_price'];
    $sellerid = $product->getDetail($item['item_id'], "sellerid");
    add_to_sellers_array($sellerid, $item_id);
    $order->addItemsToCookie($customer_id, $item_id, $orderid);

    $sql = "INSERT INTO orderproducts (orderid, productid, sellerid, customerid, howmany, price, status) VALUES ('$orderid', '$item_id', '$sellerid', '$customer_id', '$how_many', '$item_price', 'Active');";
    $add_products = mysqli_query($conn, $sql);
}
// add each items to the orderproducts table end








// add order pickup station if selected start
if ($delivery_method == "Pickup") {
    $sql = "INSERT INTO orderpickupstation (orderid, stationid) VALUES ('$orderid', '$delivery_station');";
    $add_pickup_station = mysqli_query($conn, $sql);
}
// add order pickup station if selected end






// add order shipping address if selected start
if ($delivery_method == "Door") {
    $sql = "INSERT INTO ordershippingaddress (orderid, firstname, lastname, email, phone, additionalphone, address1, address2, region) VALUES ('$orderid', '$firstname', '$lastname', '$email', '$phone', '$additionalphone', '$address1', '$address2', '$region');";
    $add_pickup_station = mysqli_query($conn, $sql);
}
// add order shipping address if selected end



// add to ordercustomerdetails start
$order_firstname = $_SESSION['order_firstname'];
$order_lastname = $_SESSION['order_lastname'];
$order_email = $_SESSION['order_email'];
$order_phone = $_SESSION['order_phone'];

$sql = "INSERT INTO ordercustomerdetails (orderid, firstname, lastname, email, phone, address1, address2, region) VALUES ('$orderid', '$order_firstname', '$order_lastname', '$order_email', '$order_phone', '$address1', '$address2', '$region');";
mysqli_query($conn, $sql);
// add to ordercustomerdetails end









// add pending balance to respective sellers start
$items = $_SESSION['cart'];

foreach ($items as $item) {

    $total_price = $item['item_price'] * $item['how_many'];
    $amount_removed = $admin->calcItemCommission($item['item_price']) * $item['how_many'];
    $amount_remaining = $total_price - $amount_removed;

    $sellerid = get_item_seller_id($item['item_id']);
    $seller->updateDetail($sellerid, "pendingbalance", $amount_remaining, "+");
    // add_to_admin_pending_balance($adminid, $amount_removed);
    $admin->updateAdminDetail("pendingbalance", $amount_removed, "+");

    //echo "<br>" . $item['item_name'] . ", Price=" . $item['item_price'] . ", Removed = " . $amount_removed . ", Remaining = " . $amount_remaining . ", sellerid = " . $sellerid . "<br>";
}
// add pending balance to respective sellers end








// reduce item stock amount after it has been ordered start
$items = $_SESSION['cart'];
foreach ($items as $item) {
    $item_id = $item['item_id'];
    $how_many = $item['how_many'];

    if ($item['promotion_id'] != "") {
        $product->reducePromotionStock($item_id, $item['promotion_id'], $how_many);
    } else if ($product->productHaveVariation($item_id)) {
        $product->reduceVariationStock($item_id, $item['item_size'], $how_many);
    } else {
        //reduce_item_stocks($item_id);
        $product->updateDetail($item_id, "howmany", $how_many, "-");
    }
}

// reduce item stock amount after it has been ordered end


$email = new Email();
// send sellers new order email notification start
//send_seller_new_order_email($o;rderid);
$email->sendSellerNewOrderEmail($orderid);
// send sellers new order email notification end


// send customer new order email notification start
// send_customer_new_order_email($_SESSION['order_id'], $_SESSION['order_shipping_fee']);
$email->sendCustomerNewOrderEmail($_SESSION['order_id'], $_SESSION['order_shipping_fee']);
// send customer new order email notification end








// add orderid to session variable start
$_SESSION['order_id'] = $orderid;
// add orderid to session variable end


// clear cart and other session variables
unset($_SESSION['cart']);
unset($_SESSION['coupon_amount']);
// unset($_SESSION['order_shipping_fee']);




echo '<script>
window.location.href="order-status-view";
</script>';
