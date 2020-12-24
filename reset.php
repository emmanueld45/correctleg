<?php
session_start();
include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/sellers.class.php';
include 'classes/customers.class.php';
include 'classes/admin.class.php';
include 'classes/products.class.php';
include 'classes/orders.class.php';
include 'classes/emails.class.php';


/*
$sql = "UPDATE product SET howmany=10;";
mysqli_query($conn, $sql);
*/


/*
$sql = "INSERT INTO shippingaddress (customerid, firstname, lastname, phone, additionalphone, email, address1, address2, region, status) VALUES ('1234', 'John', 'Doe', '0807899', '0998967', 'johndoe@gmail.com', 'Ikenga', 'Igwuruta', 'Rivers', 'default');";
mysqli_query($conn, $sql);
*/

/*
$state = "Rivers";
$station = "Mile 2 Bus-Stop by geralds office";
$sql = "INSERT INTO pickupstation (state, station) VALUES ('$state', '$station');";
mysqli_query($conn, $sql);
*/



//$image = "businesslogos/business-logo.jpg";
/* $sql = "UPDATE product SET old_price=2000;";
mysqli_query($conn, $sql); */



//echo number_format(calc_item_price_percentage(3500));

/*
$orderid = "67618844";
$sellerid = "5edb748676d36";
echo "<br>";
$items = get_ordered_items($orderid, $sellerid);

foreach ($items as $item) {
    //echo $item['productid'] . "<br>";
    $product_id = $item['productid'];
    $sql = "SELECT * FROM product WHERE uniqueid='$product_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $image = $row['image1'];
    echo "<img src='$image' style='width:100px;height:100px;'><br>";
}
//print_r($items);
*/

//echo get_pickup_station($_SESSION['delivery_station']);


/*
$sql = "INSERT INTO clearancesale (productid, howmany) VALUES('5edbffe41ecfa', '3');";
mysqli_query($conn, $sql); */

/*
$cid = create_product_code();

$sql = "UPDATE sellers SET activebalance=0, pendingbalance=0;";
mysqli_query($conn, $sql);
*/

/*
$sql1 = "UPDATE admin SET pendingbalance=0, activebalance=0;";
mysqli_query($conn, $sql1);
*/

/*
$sql1 = "UPDATE product SET exclusive='no';";
mysqli_query($conn, $sql1);
*/

/*
$sql1 = "UPDATE orders SET shipping_fee='0';";
mysqli_query($conn, $sql1);
*/

//add_to_seller_active_balance('5edb8099d21a7', '1000');
//remove_from_seller_active_balance('5edb8099d21a7', '7600');
//remove_from_seller_active_balance('5edb748676d36', '5600');


/*
$uniqueid = uniqid();
$activebalance = 0;
$pendingbalance = 0;
$sql = "INSERT INTO admin (uniqueid, activebalance, pendingbalance) VALUES ('$uniqueid', '$activebalance', '$pendingbalance');";
mysqli_query($conn, $sql);
*/



//$adminid = get_admin_id();
//add_to_admin_active_balance($adminid, '400');
//remove_from_admin_active_balance($adminid, '200');
//add_to_admin_pending_balance($adminid, '300');
//remove_from_admin_pending_balance($adminid, '200');

//echo get_order_status('70128430');



//turn_off_clearance_sale($adminid);

//echo $_SESSION['order_firstname'];


//send_customer_welcome_email("5edb7549a261a");
//send_seller_welcome_email("5edb748676d36");

/*
print_r($_SESSION['sellers_array']);

$sellers_array = $_SESSION['sellers_array'];

foreach ($sellers_array as $sellers) {
    $sellerid = $sellers;
    echo $sellerid . "<br>";
}
*/

//add_footwear_type("Kids", "Gladiator boots");
//add_footwear_size("Kids", "37");
//echo create_recover_password_key("emmy@gmail.com");
// $adminid = get_admin_id();
// add_to_admin_active_balance($adminid, "100");

//echo $seller->updateDetail("5edb748676d36", "activebalance", "100", "-");

//echo $customer->updateDetail("5edb7549a261a", "cwallet", "100", "-");
//echo $admin->updateAdminDetail("activebalance", "100", "-");
//echo $order->updateDetail("cl-25256084", "shipping_fee", "100", "-");
//echo $product->updateDetail("5edbff73de66f", "howmany", "1", "+");

// $cart_array = $_SESSION['cart'];
// foreach ($cart_array as $item){
//     echo $item['item_id']." ".$item['item_name']."<br>";
// }
//print_r($_SESSION['cart']);
//unset($_SESSION['cart']);
//echo $product->createCoupon("5edb7549a261a", "500");

// if ($product->couponIsValid("U72T49H3ZW")) {
//     echo "yes";
// } else {
//     echo "no";
// }
//$product->markCouponAsUsed("U72T49H3ZW");
//session_unset();
//echo $product->getCouponAmount("U72T49H3ZW");


//$admin->createAdmin("Admin", "1234", "yes");
// if ($seller->haveOtherProducts("5edb748676d")) {
//     echo "yes";
// } else {
//     echo "no";
// }

//$db->setQuery("UPDATE product SET views='0';");
//echo $admin->sendVerificationCodeSms("2348162383712");
// if (isset($_SESSION['id'])) {
//     echo "yes";
// } else {
//     echo "no";
// }
//echo create_product_code();
// if ($product->productIsOnClearanceSale("5edbffe41ecfa")) {
//     echo "yes";
// } else {
//     echo "no";
// }
//echo $product->getClearancesaleProductDetail("5edbffe41ecfa", "price");
// session_unset();
// session_destroy();
// if ($db->isSellerCode("H48N")) {
//     echo "yes";
// } else {
//     echo "no";
// }


//$db->setQuery("UPDATE product SET stars='3';");

// $result = $admin->prepareStatement("SELECT * FROM sellers WHERE id=?;", array("5"));
// $row = mysqli_fetch_assoc($result);
// echo $row['firstname'];

// $uniqueid = uniqid();
// $data = array("eghwuhjwheu", "dhwkje6347", "100", "unused");
// $result = $admin->prepareStatement("INSERT INTO coupons (userid, coupon_code, amount, status) VALUES (?, ?, ?, ?);", $data);

// $result = $db->prepareStatement("SELECT * FROM sellers WHERE id=? AND uniqueid=?;", array("4", "5edb748676d36"));
// if (mysqli_num_rows($result) != 0) {
//     $row = mysqli_fetch_assoc($result);
//     echo $row['firstname'];
// } else {
//     echo "error occured";
// }

// try {
//     twilio_sendVerificationCodeSms("+2348162383712");
//     echo "sent";
// } catch (Exception $e) {
//     echo "Message: " . $e->getMessage();
// }

// if (twilio_sendSellerOrderSms("+2348162383712")) {
//     echo "success";
// } else {
//     echo "failed";
// }
// try {
//     twilio_sendSellerOrderSms("+2348162383712");
// } catch (Exception $e) {
//     echo $e->getMessage();
// }

// if ($seller->haveBankDetails("5edb8099d21a7")) {
//     echo "yes";
// } else {
//     echo "no";
// }
//twilio_sendSellerOrderSms("+2348162383712", "High heel shoe", "DHSHD63");

// $sellers_array = $_SESSION['sellers_array'];

// foreach ($sellers_array as $sellers) {
//     $sellerid = $sellers['seller_id'];
//     echo $sellerid . "<br>";
// }

//get_order_delivery_method($orderid);

// $arr = array("1", "2", "3");
// if (in_array("2", $arr)) {
//     echo "in array";
// } else {
//     echo "not in array";
// }
// print_r($_SESSION['recent_products']);
// echo "<br>";
// $x = count($_SESSION['recent_products']) - 1;
// for ($i = 0; $i < count($_SESSION['recent_products']); $i++) {
//     $recent_item_id = $_SESSION['recent_products'][$x];
//     echo $recent_item_id;
//     echo "<br>";
//     $x--;
// }


//echo $_ENV['TWILIO_ACCOUNT_SID'];
//phpinfo();

//$db->setQuery("UPDATE product SET howmany='10'  WHERE name='Nice shoe';");

//echo $product->shortenLength("HELLO WORLD", 5, " <a href=''>see more</a>");
//$email->sendCustomerReceiptEmail("CL-KHDHGSHAGS", "SGDSKJDHS");

//$admin->sendAdminOrderSms("09012712672");
//print_r($customer->viewItem($_SESSION['id'], "5edc04c1a6e89"));

//$db->setQuery("UPDATE sellers SET pendingwithdrawals=0;");



// $test_items = array(
//     array('customer_id' => '1', 'item_id' => 'dsajhdasjhd'),
//     array('customer_id' => '2', 'item_id' => 'ashaksjaBSN')
// );
// setCookie("test_items", json_encode($test_items), time() + 500);

//print_r($_COOKIE['test_items']);
// $test_items = json_decode($_COOKIE['test_items']);
// for ($i = 0; $i < count($test_items); $i++) {
//     $item = (array) $test_items[$i];
//     // print_r($item['item_id']);
// }


//$order->addItemsToCookie("3", "ccccc");
//print_r($_COOKIE['ordered_items']);


//setcookie("ordered_items", "", time() - 2419200);

// $ordered_items_array = (array) json_decode($_COOKIE['ordered_items']);
// foreach ($ordered_items_array as $ordered_item) {
//     $ordered_item = (array) $ordered_item;
//     $customer_id = $ordered_item['customer_id'];
//     $item_id = $ordered_item['item_id'];
//     echo $customer_id . " " . $item_id;
// }
//echo $order->getProductOrderDetail("cl-50267406", "5edbff73de66f", "price");
//setcookie("dont_show_rating_modal", "dont show", time() - 86400);
//echo $_COOKIE['dont_show_rating_modal'];

//print_r($_SESSION['item_variations']);

//$product->addVariation("sgdjhadd", "4.2", "2000", "4");

// if ($product->productHaveVariation("5fe22635c5fe8")) {
//     echo "yes";
// } else {
//     echo "no";
// }

// echo $product->getProductVariationDetail("5fe22635c5fe8", "price");
//$product->reduceVariationStock("5fe226aab5627", "4.2", 3);

//echo $product->getProductVariationQuantityFromSize("5fe226aab5627", "4.4");

//setcookie("cl_cart", "", time() - 2419200);
// print_r($product->increaseCartItemQuantity("5ef5f1287e34e"));
//print_r($product->decreaseCartItemQuantity("5ef5f1287e34e"));


// $arr = array('item_id' => '12345', 'how_many' => '2');
// $arr['how_many'] = '5';
// print_r($arr);
// $cart = json_decode($_COOKIE['cl_cart']);
// print_r($cart);

// if ($product->itemHaveSufficientQuantityForOrder("5eebe41f69634", "5eebe41f69634", "35", "1")) {
//     echo "available";
// } else {
//     echo "unavailable";
// }

if ($customer->haveShippingAddress($_SESSION['id'])) {
    echo "yes";
} else {
    echo "no";
}
