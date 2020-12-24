<?php


/****** ITEMS FUNCTIONS START ** */

// get product details start
function get_item_detail($item_id, $detail)
{
    global $conn;

    $sql = "SELECT * FROM product WHERE uniqueid='$item_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $itemdetail = $row[$detail];

    return $itemdetail;
}

// get product details end 






// item have stocks start
function item_have_stocks($item_id)
{
    global $conn;

    $sql = "SELECT * FROM product WHERE uniqueid='$item_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $howmany = $row['howmany'];

    if ($howmany > 0) {
        return true;
    } else if (item_is_on_clearance_sale($item_id)) {
        if (get_item_clearance_sale_howmany($item_id) > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// item have stocks end 




// reduce item stock start
function reduce_item_stocks($item_id)
{
    global $conn;

    $sql = "SELECT * FROM product WHERE uniqueid='$item_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $howmany = $row['howmany'];

    $howmany = (int) $howmany - 1;

    $sql1 = "UPDATE product SET howmany=$howmany WHERE uniqueid='$item_id';";
    $reduce = mysqli_query($conn, $sql1);

    if ($reduce) {
        return true;
    } else {
        return false;
    }
}

// reduce item stock end 





// reduce item  learansale stock start
function reduce_item_clearance_sale_stocks($item_id, $amount)
{
    global $conn;

    $sql = "SELECT * FROM clearancesale WHERE productid='$item_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $howmany = $row['howmany'];

    $howmany = (int) $howmany - $amount;

    $sql1 = "UPDATE clearancesale SET howmany=$howmany WHERE productid='$item_id';";
    $reduce = mysqli_query($conn, $sql1);

    if ($reduce) {
        return true;
    } else {
        return false;
    }
}

// reduce item clearancesale stock end 






// check if item is in clearance sale start

function item_is_on_clearance_sale($item_id)
{
    global $conn;

    $sql = "SELECT * FROM clearancesale WHERE productid='$item_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        return true;
    } else {
        return false;
    }
}

// check if item is in clearance sale end


// get item clearance sale howmany start
function get_item_clearance_sale_howmany($item_id)
{
    global $conn;

    $sql = "SELECT * FROM clearancesale WHERE productid='$item_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $item_howmany = $row['howmany'];

    return $item_howmany;
}

// get item clearance sale howmany end 



// calculate clearance sale price start
function calc_clearance_sale_price($price)
{
    $remainder = $price * 0.2;
    $newprice = $price - $remainder;

    return $newprice;
}


// add footwear type start
function add_footwear_type($item_is_for, $item_type)
{
    global $conn;

    $sql = "INSERT INTO footwear_type (item_is_for, item_type) VALUES ('$item_is_for', '$item_type');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "inserted";
    } else {
        echo "Not inserted";
    }
}
// add footwear type end


// add footwear size start
function add_footwear_size($item_is_for, $item_size)
{
    global $conn;

    $sql = "INSERT INTO footwear_size (item_is_for, item_size) VALUES ('$item_is_for', '$item_size');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "inserted";
    } else {
        echo "Not inserted";
    }
}
// add footwear size end





// calculate clearance price end




// check if item have old price start

function item_have_old_price($item_id)
{
    global $conn;

    $sql = "SELECT * FROM product WHERE uniqueid='$item_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $old_price = $row['old_price'];

    if ($old_price != "empty") {
        return true;
    } else {
        return false;
    }
}

// check if item have old price end







// check if seller have tour video start

function seller_have_tour_video($seller_id)
{
    global $conn;

    $sql = "SELECT * FROM tourvideo WHERE sellerid='$seller_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);


    if ($numrows != 0) {
        return true;
    } else {
        return false;
    }
}

// check if seller have tour video end







// get seller tour video start

function get_seller_tour_video($seller_id)
{
    global $conn;

    $sql = "SELECT * FROM tourvideo WHERE sellerid='$seller_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $video = $row['video'];

    return $video;
}

// get seller tour video end


/****** ITEMS FUNCTIONS END ***** */






























/****** SELLERS FUNCTIONS START**** */


function create_product_code()
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

// check if seller is logged in start
function seller_is_logged_in($seller_id)
{
    global $conn;

    $sql = "SELECT * FROM sellers WHERE uniqueid='$seller_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows != 0) {
        return true;
    } else {
        return false;
    }
}
// check if seller is logged in end


// get seller details start
function get_seller_detail($userid, $detail)
{
    global $conn;

    $sql = "SELECT * FROM sellers WHERE uniqueid='$userid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $userdetail = $row[$detail];

    return $userdetail;
}

// get seller detail end





// get seller business details start
function get_seller_business_detail($userid, $detail)
{
    global $conn;

    $sql = "SELECT * FROM businessdetails WHERE sellerid='$userid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $userdetail = $row[$detail];

    return $userdetail;
}

// get seller business detail end



// get seller bank details start
function get_seller_bank_detail($userid, $detail)
{
    global $conn;

    $sql = "SELECT * FROM bankdetails WHERE sellerid='$userid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $userdetail = $row[$detail];

    return $userdetail;
}

// get seller bank details end


// calc item price percentage start
function calc_item_price_percentage($item_price)
{

    if ($item_price >= 0 and $item_price <= 2000) {
        $reduction_amount = 100;
    } else if ($item_price >= 2001 and $item_price <= 5000) {
        $reduction_amount = 200;
    } else if ($item_price >= 5001 and $item_price <= 7500) {
        $reduction_amount = 300;
    } else if ($item_price >= 7501 and $item_price <= 10000) {
        $reduction_amount = 400;
    } else if ($item_price >= 10001 and $item_price <= 15000) {
        $reduction_amount = 500;
    } else if ($item_price >= 15001 and $item_price <= 20000) {
        $reduction_amount = 600;
    } else if ($item_price >= 20001 and $item_price <= 40000) {
        $reduction_amount = 1000;
    } else if ($item_price >= 40001 and $item_price <= 60000) {
        $reduction_amount = 3000;
    } else if ($item_price >= 60001 and $item_price <= 80000) {
        $reduction_amount = 4000;
    } else if ($item_price >= 80001 and $item_price <= 100000) {
        $reduction_amount = 5000;
    } else if ($item_price >= 100001 and $item_price < 200000) {
        $reduction_amount = 7500;
    } else if ($item_price >= 200000) {
        $reduction_amount = 10000;
    }

    return $reduction_amount;
}

// calc item price percentage end

// add to seller pending balance start
function add_to_seller_pending_balance($sellerid, $amount)
{
    global $conn;

    $sql = "SELECT * FROM sellers WHERE uniqueid='$sellerid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $pending_balance = $row['pendingbalance'];

    $pending_balance = $pending_balance + $amount;

    $sql1 = "UPDATE sellers SET pendingbalance=$pending_balance WHERE uniqueid='$sellerid';";
    mysqli_query($conn, $sql1);

    return true;
}

// add to seller pending balance end




// remove from seller pending balance start
function remove_from_seller_pending_balance($sellerid, $amount)
{
    global $conn;

    $sql = "SELECT * FROM sellers WHERE uniqueid='$sellerid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $pending_balance = $row['pendingbalance'];

    $pending_balance = $pending_balance - $amount;

    $sql1 = "UPDATE sellers SET pendingbalance=$pending_balance WHERE uniqueid='$sellerid';";
    mysqli_query($conn, $sql1);

    return true;
}

// remove from seller pending balance end




// add to seller active balance start
function add_to_seller_active_balance($sellerid, $amount)
{
    global $conn;

    $sql = "SELECT * FROM sellers WHERE uniqueid='$sellerid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $active_balance = $row['activebalance'];

    $active_balance = $active_balance + $amount;

    $sql1 = "UPDATE sellers SET activebalance=$active_balance WHERE uniqueid='$sellerid';";
    mysqli_query($conn, $sql1);

    return true;
}

// add to seller active balance end





// remove from seller active balance start
function remove_from_seller_active_balance($sellerid, $amount)
{
    global $conn;

    $sql = "SELECT * FROM sellers WHERE uniqueid='$sellerid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $active_balance = $row['activebalance'];

    $active_balance = $active_balance - $amount;

    $sql1 = "UPDATE sellers SET activebalance=$active_balance WHERE uniqueid='$sellerid';";
    mysqli_query($conn, $sql1);

    return true;
}

// remove from seller active balance end




// get item seller id start
function get_item_seller_id($itemid)
{
    global $conn;

    $sql = "SELECT * FROM product WHERE uniqueid='$itemid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $sellerid = $row['sellerid'];

    return $sellerid;
}

// get item seller id end



// get sellers ordered items start
function get_sellers_ordered_items($orderid, $sellerid)
{
    global $conn;

    $sql = "SELECT * FROM orderproducts WHERE orderid='$orderid' AND sellerid='$sellerid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    return $result;
}

// get sellers ordered items end


// get ordered items start
function get_ordered_items($orderid)
{
    global $conn;

    $sql = "SELECT * FROM orderproducts WHERE orderid='$orderid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    return $result;
}

// get ordered items end


// get all sellers ordered items start
function get_all_sellers_ordered_items($sellerid)
{
    global $conn;

    $sql = "SELECT * FROM orderproducts WHERE sellerid='$sellerid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    return $result;
}

// get all sellers ordered items end


// get order status start
function get_order_status($orderid)
{
    global $conn;

    $sql = "SELECT * FROM orders WHERE orderid='$orderid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $order_status = $row['status'];
    return $order_status;
}
// get order status end


// get order date start
function get_order_date($orderid)
{
    global $conn;

    $sql = "SELECT * FROM orders WHERE orderid='$orderid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $date = $row['date'];
    return $date;
}
// get order date end



// get order timeview start
function get_order_timeview($orderid)
{
    global $conn;

    $sql = "SELECT * FROM orders WHERE orderid='$orderid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $timeview = $row['timeview'];
    return $timeview;
}
// get order timeview end



// get order payment method start
function get_order_payment_method($orderid)
{
    global $conn;

    $sql = "SELECT * FROM orders WHERE orderid='$orderid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $payment_method = $row['paymentmethod'];
    return $payment_method;
}
// get order payment method end



// get order delivery method start
function get_order_delivery_method($orderid)
{
    global $conn;

    $sql = "SELECT * FROM orders WHERE orderid='$orderid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $delivery_method = $row['deliverymethod'];
    return $delivery_method;
}
// get order delivery method end




// check if seller have business details start

function seller_have_business_details($seller_id)
{
    global $conn;

    $sql = "SELECT * FROM businessdetails WHERE sellerid='$seller_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        return true;
    } else {
        return false;
    }
}

// check if seller have business details end




// check if seller have bank details start

function seller_have_bank_details($seller_id)
{
    global $conn;

    $sql = "SELECT * FROM bankdetails WHERE sellerid='$seller_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        return true;
    } else {
        return false;
    }
}

// check if seller have bank details end





// get total orders from this seller start
function get_total_orders_from_seller($sellerid)
{
    global $conn;

    $sql = "SELECT * FROM orderproducts WHERE sellerid='$sellerid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    return $numrows;
}
// get total orders from seller





// get total items from this seller start
function get_total_items_from_seller($sellerid)
{
    global $conn;

    $sql = "SELECT * FROM product WHERE sellerid='$sellerid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    return $numrows;
}
// get total items from seller



/**** SELLERS FUNCTIONS END ****** */















































/***** CUSTOMERS FUNCTIONS START*** */


// get customer details start
function get_customer_detail($userid, $detail)
{
    global $conn;

    $sql = "SELECT * FROM customers WHERE uniqueid='$userid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $userdetail = $row[$detail];

    return $userdetail;
}

// get customer details end 


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


// get customer shipping address start
function get_customer_shipping_address($customer_id)
{
    global $conn;

    $sql = "SELECT * FROM shippingaddress WHERE customerid='$customer_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row;
}
// get customer shipping address end 




// get pick up station id
function get_pickup_station_id($orderid)
{
    global $conn;

    $sql = "SELECT * FROM orderpickupstation WHERE orderid='$orderid';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $station_id = $row['stationid'];

    return $station_id;
}
// get pick up station id





// get pick up station detail
function get_pickup_station_detail($station_id, $detail)
{
    global $conn;

    $sql = "SELECT * FROM pickupstation WHERE id='$station_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $pickup_detail = $row[$detail];

    return $pickup_detail;
}
// get pick up station detail


// check if customer have saved item start

function customer_have_saved_item($customer_id, $item_id)
{
    global $conn;

    $sql = "SELECT * FROM savedproducts WHERE customerid='$customer_id' AND productid='$item_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        return true;
    } else {
        return false;
    }
}

// check if customer have saved item end






// save item start

function save_item($customer_id, $item_id)
{
    global $conn;

    $sql = "INSERT INTO savedproducts (customerid, productid) VALUES ('$customer_id', '$item_id');";
    $result = mysqli_query($conn, $sql);
}

// save item end





// check if customer have viewed item start

function customer_have_viewed_item($customer_id, $item_id)
{
    global $conn;

    $sql = "SELECT * FROM recentlyviewed WHERE customerid='$customer_id' AND productid='$item_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 0) {
        return true;
    } else {
        return false;
    }
}

// check if customer have viewed item end






// view item start

function view_item($customer_id, $item_id)
{
    global $conn;

    $sql = "INSERT INTO recentlyviewed (customerid, productid) VALUES ('$customer_id', '$item_id');";
    $result = mysqli_query($conn, $sql);
}

// view item end




// get pickup station start

function get_pickup_station($station_id)
{
    global $conn;

    $sql = "SELECT * FROM pickupstation WHERE id='$station_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $pickup_address = $row['station'];
    return $pickup_address;
}

// get pickup station station end



// get customer saved items start
function get_customer_total_saved_items($customer_id)
{
    global $conn;

    $sql = "SELECT * FROM savedproducts WHERE customerid='$customer_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);


    return $numrows;
}

// get customer saved items end





// get customer saved items start
function get_customer_total_order_items($customer_id, $order_id)
{
    global $conn;

    $sql = "SELECT * FROM orderproducts WHERE customerid='$customer_id' AND orderid='$order_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);


    return $numrows;
}

// get customer saved items end

/***** CUSTOMERS FUNCTIONS END ***** */
























































/****** ADMIN FUNCTIONS START******* */




// add to admin active balance start
function add_to_admin_active_balance($adminid, $amount)
{
    global $conn;

    $sql = "SELECT * FROM admin WHERE uniqueid='$adminid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $active_balance = $row['activebalance'];

    $active_balance = $active_balance + $amount;

    $sql1 = "UPDATE admin SET activebalance=$active_balance WHERE uniqueid='$adminid';";
    mysqli_query($conn, $sql1);

    return true;
}

// add to admin active balance end





// remove from admin active balance start
function remove_from_admin_active_balance($adminid, $amount)
{
    global $conn;

    $sql = "SELECT * FROM admin WHERE uniqueid='$adminid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $active_balance = $row['activebalance'];

    $active_balance = $active_balance - $amount;

    $sql1 = "UPDATE admin SET activebalance=$active_balance WHERE uniqueid='$adminid';";
    mysqli_query($conn, $sql1);

    return true;
}

// remove from admin active balance end








// add to admin pending balance start
function add_to_admin_pending_balance($adminid, $amount)
{
    global $conn;

    $sql = "SELECT * FROM admin WHERE uniqueid='$adminid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $pending_balance = $row['pendingbalance'];

    $pending_balance = $pending_balance + $amount;

    $sql1 = "UPDATE admin SET pendingbalance=$pending_balance WHERE uniqueid='$adminid';";
    mysqli_query($conn, $sql1);

    return true;
}

// add to admin pending balance end


// get admin id start
function get_admin_id()
{

    global $conn;

    $sql = "SELECT * FROM admin WHERE id='1';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    return $row['uniqueid'];
}
// get admin id end




// remove from admin pending balance start
function remove_from_admin_pending_balance($adminid, $amount)
{
    global $conn;

    $sql = "SELECT * FROM admin WHERE uniqueid='$adminid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $pending_balance = $row['pendingbalance'];

    $pending_balance = $pending_balance - $amount;

    $sql1 = "UPDATE admin SET pendingbalance=$pending_balance WHERE uniqueid='$adminid';";
    mysqli_query($conn, $sql1);

    return true;
}

// remove from admin pending balance end









// turn on clearance sale start
function turn_on_clearance_sale()
{
    global $conn;
    $adminid = get_admin_id();

    $sql = "UPDATE admin SET clearancesale='On' WHERE uniqueid='$adminid';";
    mysqli_query($conn, $sql);

    return true;
}

// turn on clearance sale end




// turn off clearance sale start
function turn_off_clearance_sale()
{
    global $conn;
    $adminid = get_admin_id();

    $sql = "UPDATE admin SET clearancesale='Off' WHERE uniqueid='$adminid';";
    mysqli_query($conn, $sql);

    $sql1 = "DELETE FROM clearancesale;";
    mysqli_query($conn, $sql1);

    return true;
}

// turn off clearance sale end






// chec is clearance sale is on start
function clearance_sale_is_on()
{
    global $conn;

    $adminid  = get_admin_id();

    $sql = "SELECT * FROM admin WHERE uniqueid='$adminid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $clearance_sale_status = $row['clearancesale'];

    if ($clearance_sale_status == "On") {
        return true;
    } else {
        return false;
    }
}
// check if clearance sale is on end




// get admin start
function get_admin_detail($detail)
{
    global $conn;
    $adminid = get_admin_id();

    $sql = "SELECT * FROM admin WHERE uniqueid='$adminid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $admindetail = $row[$detail];

    return $admindetail;
}

// get admin details end 




// get admin new orders start
function get_new_admin_orders()
{
    global $conn;
    //  $adminid = get_admin_id();

    $sql = "SELECT * FROM orders WHERE adminnew='yes';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    return $numrows;
}

// get new admin orders end 


// set admin new orders to old start
function set_admin_new_orders_to_old()
{
    global $conn;
    //  $adminid = get_admin_id();

    $sql = "UPDATE orders SET adminnew='no';";
    $result = mysqli_query($conn, $sql);
}

// set new admin orders to old end 




// check if order has shipping fee start

function order_have_shipping_fee($order_id)
{
    global $conn;

    $sql = "SELECT * FROM orders WHERE orderid='$order_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $shipping_fee = $row['shipping_fee'];

    if ($shipping_fee > 0) {
        return true;
    } else {
        return false;
    }
}

// check if order has shipping fee end



// get order shipping fee start
function get_order_shipping_fee($order_id)
{
    global $conn;

    $sql = "SELECT * FROM orders WHERE orderid='$order_id';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $shipping_fee = $row['shipping_fee'];

    return $shipping_fee;
}

// get order shipping fee end







// create recover password key start 
function create_recover_password_key($email)
{


    global $conn;

    $secret_key = uniqid();
    $status = "unused";

    $sql = "INSERT INTO recoverpasswordkey (secret_key, email, status) VALUES ('$secret_key', '$email', '$status');";
    $result = mysqli_query($conn, $sql);

    return $secret_key;
}
// create recover password key end


// check if seller is video subscribed start

function seller_is_subscribed($seller_id)
{

    global $conn;

    $sql = "SELECT * FROM sellers WHERE uniqueid='$seller_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $subscribed = $row['subscribed'];

    if ($subscribed == "yes") {
        return true;
    } else {
        return false;
    }
}
// check if seller is video subscribed end
/*******ADMIN FUNCTIONS END ******* */











































































































/*************EMAIL FUNCTIONS START ********* */







// send  customer welcome email start

function send_customer_welcome_email($userid)
{

    $website_url = "test.correctleg.com";
    $website_url_http = "https://test.correctleg.com";
    $website_name = "CorrectLeg";


    $email_title = ["Welcome to CorrectLeg", "We are delighted to have you - CorrectLeg", "Welcome onboard - CorrectLeg", "You are welcome -    CorrectLeg"];
    $logo = "img/correctleg-logo.png";
    global $conn;


    $rand = RAND(0, 3);

    $receiver_firstname = get_customer_detail($userid, "firstname");
    $receiver_lastname = get_customer_detail($userid, "lastname");
    $receiver_email = get_customer_detail($userid, "email");
    // $receiver_email = "emmydanjumbo4@gmail.com";

    $title = $email_title[$rand];
    $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $website_name . " | The links in this email will always direct to " . $website_url_http . " Learn about email security and online safety. 
   © " . $website_name;

    $to =  $receiver_email;
    $subject = $title;
    $from = $website_name . ' hello@' . $website_url;

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body style="">';

    // main container start
    $message .= '<div style="width:100%;margin:auto;background-color: white;box-shadow:0px 10px 20px lightgrey;border-radius: 10px;padding:15px;">';


    $message .= '
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $website_url_http . '/' . $logo . '" style="width:100px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Welcome ' . $receiver_firstname . '!</h2>
</div>';

    $message .= '<div style="width:100%;padding:10px;text-align:;">
We specially welcome you to our website ' . $website_url . ' your No.1 onine shopping mall for foot wear products.
<br>
We connect with sellers around the nation and hand pick the best sellers with good quality products just to serve you better.
<br><br>
Below are some links to help you walk around our website!.


<div style="width:100%;display: flex;justify-content:center ;margin-top: 10px;margin-bottom: 10px;">
<a href="' . $website_url_http . '" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Visit website</a>
<br>
<a href="' . $website_url_http . '/customers/login.php" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Login Account</a>
<br>
<a href="' . $website_url_http . '/how-it-works.php" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">How it works</a>


</div>

<br><br>
<p style="color:black;"><b>Regards, ' . $website_name . '</b></p>
</div>
';








    $message .= '</div>
<div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
' . $footer . '
</div>

</body></html>';

    // Sending email
    $send = mail($to, $subject, $message, $headers);

    if ($send) {
        echo "Email sent";
    } else {
        echo "Not sent";
    }
}



// send welcome email end

















// send seller welcome email start

function send_seller_welcome_email($userid)
{

    $website_url = "test.correctleg.com";
    $website_url_http = "https://test.correctleg.com";
    $website_name = "CorrectLeg";


    $email_title = ["Welcome to CorrectLeg", "We are delighted to have you - CorrectLeg", "Welcome onboard - CorrectLeg", "You are welcome -    CorrectLeg"];
    $logo = "img/correctleg-logo.png";
    global $conn;


    $rand = RAND(0, 3);

    $receiver_firstname = get_seller_detail($userid, "firstname");
    $receiver_lastname = get_seller_detail($userid, "lastname");
    $receiver_email = get_seller_detail($userid, "email");
    //$receiver_email = "emmydanjumbo4@gmail.com";

    $title = $email_title[$rand];
    $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $website_name . " | The links in this email will always direct to " . $website_url_http . " Learn about email security and online safety. 
   © " . $website_name;

    $to =  $receiver_email;
    $subject = $title;
    $from = $website_name . ' hello@' . $website_url;

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body style="">';

    // main container start
    $message .= '<div style="width:100%;margin:auto;background-color: white;box-shadow:0px 10px 20px lightgrey;border-radius: 10px;padding:15px;">';


    $message .= '
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $website_url_http . '/' . $logo . '" style="width:100px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Welcome ' . $receiver_firstname . '!</h2>
</div>';

    $message .= '<div style="width:100%;padding:10px;text-align:;">
You have made the right choice to join ' . $website_name . ' as a seller.
<br>
Correct leg sellers have a better advantage in selling to a wider audience all around the Nation, as we do all the hard work for you.. Like shipping, handling and customer service management.

<br><br>
Below are some useful links to help you get started!.


<div style="width:100%;display: flex;justify-content:center;margin-top: 10px;margin-bottom: 10px;">
<a href="' . $website_url_http . '" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Visit website</a>
<br>
<a href="' . $website_url_http . '/sellers/login.php" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Login Account</a>
<br>
<a href="' . $website_url_http . '/how-it-works.php" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">How it works</a>


</div>

<br><br>
<p style="color:black;"><b>Regards, ' . $website_name . '</b></p>
</div>
';








    $message .= '</div>
<div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
' . $footer . '
</div>

</body></html>';

    // Sending email
    $send = mail($to, $subject, $message, $headers);

    if ($send) {
        echo "Email sent";
    } else {
        echo "Not sent";
    }
}



// send seller welcome email end






































































// send customer new order email start

function send_customer_new_order_email($orderid, $shipping_fee)
{

    $website_url = "test.correctleg.com";
    $website_url_http = "https://test.correctleg.com";
    $website_name = "CorrectLeg";


    $email_title = ["Your Order was received", "You placed an Order - CorrectLeg", "We received your Order - CorrectLeg", "Your Order has been confirmed -    CorrectLeg"];
    $logo = "img/correctleg-logo.png";
    global $conn;


    $rand = RAND(0, 3);

    $receiver_firstname = $_SESSION['order_firstname'];
    $receiver_lastname = $_SESSION['order_lastname'];
    $receiver_email = $_SESSION['order_email'];
    $receiver_email = "emmydanjumbo4@gmail.com";


    $receiver_region = $_SESSION['order_region'];
    $receiver_address1 = $_SESSION['order_address1'];
    $receiver_phone = $_SESSION['order_phone'];

    $title = $email_title[$rand];
    $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $website_name . " | The links in this email will always direct to " . $website_url_http . " Learn about email security and online safety. 
   © " . $website_name;

    $to =  $receiver_email;
    $subject = $title;
    $from = $website_name . ' hello@' . $website_url;

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body style="">';

    // main container start
    $message .= '<div style="width:100%;margin:auto;background-color: white;box-shadow:0px 10px 20px lightgrey;border-radius: 10px;padding:15px;">';


    $message .= '
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $website_url_http . '/' . $logo . '" style="width:200px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Hey ' . $receiver_firstname . '!</h2>
</div>';


    $message .= '<div style="width:100%;padding:10px;text-align:;">
Thank you for your order from ' . $website_name . '. Once your package ships we will send you a notification email and sms.

<br><br>
If you have any questions about your order, you can email us at <a href="#">support@' . $website_url . '</a>

<br><br>
<span style="font-weight:bold;font-size:30px;>Your Order id: ' . $orderid . '</span>
<br><br>';

    // table start
    $message .= '
    <div style="width:100%;background-color:#eee;margin-top:10px;margin-bottom:10px;">
    
    <table style="background-color:#eee;">
    
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Image</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Name</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">price</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Quantity</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Total price</th>
    ';

    // get customer ordered products
    $sql = "SELECT * FROM orderproducts WHERE orderid='$orderid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);


    // get customer order details
    $sql1 = "SELECT * FROM ordercustomerdetails WHERE orderid='$orderid';";
    $result1 = mysqli_query($conn, $sql1);
    $numrows1 = mysqli_num_rows($result1);
    $row1 = mysqli_fetch_assoc($result1);
    $firstname = $row1['firstname'];
    $lastname = $row1['lastname'];
    $email = $row1['email'];
    $phone = $row1['phone'];

    $total_price_general = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $item_id = $row['productid'];
        $image = get_item_detail($item_id, 'image1');
        $name = $row['name'];
        $price = $row['price'];
        $howmany = $row['howmany'];
        $total_price = $price * $howmany;

        $total_price_general += $total_price;

        $message .= '

    <tr style="margin-top:10px;margin-bottom:10px;">
    <td><img src="' . $website_url_http . '/' . $image . '" style="width:100px;height:100px;"></td>
    <td>' . $name . '</td>
    <td><span>N</span>' . number_format($price) . '</td>
    <td>' . $howmany . '</td>
    <td><span>N</span>' . number_format($total_price) . '</td>
    </tr>
    ';
    }


    $message .= '



    <tr style="margin-top:10px;margin-bottom:10px;">
    <td></td>
    <td></td>
    <td></td>
    <td><span style="font-weight:600;">Subtotal</span></td>
    <td><span>N</span>' . number_format($total_price_general) . '</td>
    </tr>


    <tr style="margin-top:10px;margin-bottom:10px;">
    <td></td>
    <td></td>
    <td></td>
    <td>Shipping</td>
    <td><span>N</span>' . $shipping_fee . '</td>
    </tr>


    <tr style="margin-top:10px;margin-bottom:10px;">
    <td></td>
    <td></td>
    <td></td>
    <td><span style="font-weight:bold;">Total</td>
    <td><span>N</span>' . number_format($total_price_general + $shipping_fee) . '</td>
    </tr>
    
    
    
    
    
    
    
    </table>
    
    </div>
    <br>
    ';
    // table end 

    $message .= '<div style="width:100%;padding:10px;">
    
    <span>Billing Info</span><br>
    <span>' . $receiver_firstname . ' ' . $receiver_lastname . '</span><br>
    <span>' . $receiver_address1 . '</span><br>
    <span>Nigeria</span><br>
    <span>' . $receiver_phone . '</span><br>
    
    </div>';


    $delivery_method = get_order_delivery_method($orderid);
    $message .= 'delivery Method: ' . $delivery_method . ' delivery';

    if ($delivery_method == "Pickup") {
        $station_id = get_pickup_station_id($orderid);
        $station_location = get_pickup_station_detail($station_id, 'station');

        $message .= ' <br><br><span style="font-weight:bold;">Pickup Delivery</span><br>
    <span>Location: ' . $station_location . '</span><br> ';
    }

    if ($delivery_method == "Door") {


        // $sql2 = "SELECT * FROM ordershippingaddress WHERE orderid='$orderid';";
        // $result2 = mysqli_query($conn, $sql2);
        // $numrows2 = mysqli_num_rows($result2);
        // $row2 = mysqli_fetch_assoc($result2);
        // $firstname = $row2['firstname'];
        // $lastname = $row2['lastname'];
        // $email = $row2['email'];
        // $phone = $row2['phone'];
        // $additionalphone = $row2['additionalphone'];
        // $region = $row2['region'];
        // $address1 = $row2['address1'];
        // $address2 = $row2['address2'];



        $message .= ' <br><br><span style="font-weight:bold;>Shipping Address:</span><br>
        <span>This order will be shipped to the address you provided on checkout page.</span><br>
        ';
        $message .= '<span>This delivery will be a door step delivery</span>';
    }





    $message .= '
<br><br>
<p style="color:black;"><b>Regards, ' . $website_name . '</b></p>
</div>
';








    $message .= '</div>
<div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
' . $footer . '
</div>

</body></html>';

    // Sending email
    $send = mail($to, $subject, $message, $headers);

    if ($send) {
        echo "Email sent";
    } else {
        echo "Not sent";
    }
}


//send_customer_new_order_email("5edb748676d36", "26677536", "500");


// send customer new order email end












































// send seller new order email start

function send_seller_new_order_email($orderid)
{

    $website_url = "test.correctleg.com";
    $website_url_http = "https://test.correctleg.com";
    $website_name = "CorrectLeg";


    $email_title = ["New Order received", "Money is calling - CorrectLeg", "New order on your product - CorrectLeg", "Your product has been ordered -    CorrectLeg"];
    $logo = "img/correctleg-logo.png";
    global $conn;
    $admin = new Admin();


    $rand = RAND(0, 3);






    $sellers_array = $_SESSION['sellers_array'];

    foreach ($sellers_array as $sellers) {
        $sellerid = $sellers;

        $receiver_firstname = get_seller_detail($sellerid, "firstname");
        $receiver_lastname = get_seller_detail($sellerid, "lastname");
        $receiver_phone = get_seller_detail($sellerid, "phone");
        $receiver_email = get_seller_detail($sellerid, "email");
        //  $receiver_email = "emmyceo123@gmail.com";

        // send seller SMS notification
        $admin->sendSellerOrderSms("234" . $receiver_phone);
        //twilio_sendSellerOrderSms("+234" . $receiver_phone);


        $title = $email_title[$rand];
        $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $website_name . " | The links in this email will always direct to " . $website_url_http . " Learn about email security and online safety. 
   © " . $website_name;

        $to =  $receiver_email;
        $subject = $title;
        $from = $website_name . ' hello@' . $website_url;

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Create email headers
        $headers .= 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Compose a simple HTML email message
        $message = '<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body style="">';

        // main container start
        $message .= '<div style="width:100%;margin:auto;background-color: white;box-shadow:0px 10px 20px lightgrey;border-radius: 10px;padding:15px;">';


        $message .= '
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $website_url_http . '/' . $logo . '" style="width:200px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Hello ' . $receiver_firstname . '!</h2>
</div>';


        $message .= '<div style="width:100%;padding:10px;text-align:;">
Your item has been Ordered on ' . $website_url . '.

<br><br>
Kindly email us immediately at <a href="#">support@' . $website_url . '</a> OR call our phone line <a href="">08162383712</a> 
to quickly proccess this order and get you some cash.

<br><br>
<span style="font-weight:bold;font-size:30px;>OrderID: ' . $orderid . '</span>
<br><br>';

        // table start
        $message .= '
    <div style="width:100%;background-color:#eee;margin-top:10px;margin-bottom:10px;">
    
    <table style="background-color:#eee;">
    
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Image</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Name</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">price</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Quantity</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Total price</th>
    ';

        // get customer ordered products
        $sql = "SELECT * FROM orderproducts WHERE sellerid='$sellerid' AND orderid='$orderid';";
        $result = mysqli_query($conn, $sql);
        $numrows = mysqli_num_rows($result);


        // get customer order details
        $sql1 = "SELECT * FROM ordercustomerdetails WHERE orderid='$orderid';";
        $result1 = mysqli_query($conn, $sql1);
        $numrows1 = mysqli_num_rows($result1);
        $row1 = mysqli_fetch_assoc($result1);
        $firstname = $row1['firstname'];
        $lastname = $row1['lastname'];
        $email = $row1['email'];
        $phone = $row1['phone'];

        $total_price_general = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $item_id = $row['productid'];
            $image = get_item_detail($item_id, 'image1');
            $name = $row['name'];
            $price = $row['price'];
            $howmany = $row['howmany'];
            $total_price = $price * $howmany;

            $total_price_general += $total_price;

            $message .= '

    <tr style="margin-top:10px;margin-bottom:10px;">
    <td><img src="' . $website_url_http . '/' . $image . '" style="width:100px;height:100px;"></td>
    <td>' . $name . '</td>
    <td><span>N</span>' . number_format($price) . '</td>
    <td>' . $howmany . '</td>
    <td><span>N</span>' . number_format($total_price) . '</td>
    </tr>
    ';
        }


        $message .= '



    <tr style="margin-top:10px;margin-bottom:10px;">
    <td></td>
    <td></td>
    <td></td>
    <td><span style="font-weight:600;">Subtotal</span></td>
    <td><span>N</span>' . number_format($total_price_general) . '</td>
    </tr>


   


    <tr style="margin-top:10px;margin-bottom:10px;">
    <td></td>
    <td></td>
    <td></td>
    <td><span style="font-weight:bold;">Total</td>
    <td><span>N</span>' . number_format($total_price_general) . '</td>
    </tr>
    
    
    
    
    
    
    
    </table>
    
    </div>
    <br>
    ';
        // table end 

        $message .= 'Kindly Contact us immediately you get this email so we can help you proccess this order.';






        $message .= '
<br><br>
<p style="color:black;"><b>Regards, ' . $website_name . '</b></p>
</div>
';








        $message .= '</div>
<div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
' . $footer . '
</div>

</body></html>';

        // Sending email
        $send = mail($to, $subject, $message, $headers);

        if ($send) {
            echo "Email sent";
        } else {
            echo "Not sent";
        }
    }
}


//send_customer_new_order_email("5edb748676d36", "26677536", "500");


// send seller new order email end















// send  customer recover password email start
function send_seller_recover_password_email($email)
{



    $website_url = "test.correctleg.com";
    $website_url_http = "https://test.correctleg.com";
    $website_name = "CorrectLeg";


    $email_title = ["Password recovery", "Get back in! - CorrectLeg", "You forgot you password? - CorrectLeg", "Lets help you get back in -    CorrectLeg"];
    $logo = "img/correctleg-logo.png";
    global $conn;


    $rand = RAND(0, 3);

    $sql = "SELECT * FROM sellers WHERE email='$email';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $userid = $row['uniqueid'];

    $key = create_recover_password_key($email);

    $receiver_firstname = get_seller_detail($userid, "firstname");
    $receiver_lastname = get_seller_detail($userid, "lastname");
    $receiver_email = get_seller_detail($userid, "email");
    // $receiver_email = "emmydanjumbo4@gmail.com";

    $title = $email_title[$rand];
    $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $website_name . " | The links in this email will always direct to " . $website_url_http . " Learn about email security and online safety. 
   © " . $website_name;

    $to =  $receiver_email;
    $subject = $title;
    $from = $website_name . ' hello@' . $website_url;

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body style="">';

    // main container start
    $message .= '<div style="width:100%;margin:auto;background-color: white;box-shadow:0px 10px 20px lightgrey;border-radius: 10px;padding:15px;">';


    $message .= '
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $website_url_http . '/' . $logo . '" style="width:100px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Hey ' . $receiver_firstname . '!</h2>
</div>';

    $message .= '<div style="width:100%;padding:10px;text-align:;">
We noticed you applied for a password recovery on ' . $website_url . '
<br>
To recovery your password please click the link below to reset a new password!
<br><br>


<div style="width:100%;display: flex;justify-content:center ;margin-top: 10px;margin-bottom: 10px;">
<a href="' . $website_url_http . '/customers/update-new-password.php?key=' . $key . '&email=' . $email . '" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Visit website</a>
<br>


</div>

<br><br>
<p style="color:black;"><b>Regards, ' . $website_name . '</b></p>
</div>
';








    $message .= '</div>
<div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
' . $footer . '
</div>

</body></html>';

    // Sending email
    $send = mail($to, $subject, $message, $headers);

    if ($send) {
        echo "Email sent";
    } else {
        echo "Not sent";
    }
}



// send seller recover password email end



















// send  customer recover password email start
function send_customer_recover_password_email($email)
{



    $website_url = "test.correctleg.com";
    $website_url_http = "https://test.correctleg.com";
    $website_name = "CorrectLeg";


    $email_title = ["Password recovery", "Get back in! - CorrectLeg", "You forgot you password? - CorrectLeg", "Lets help you get back in -    CorrectLeg"];
    $logo = "img/correctleg-logo.png";
    global $conn;


    $rand = RAND(0, 3);

    $sql = "SELECT * FROM customers WHERE email='$email';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $userid = $row['uniqueid'];

    $key = create_recover_password_key($email);

    $receiver_firstname = get_customer_detail($userid, "firstname");
    $receiver_lastname = get_customer_detail($userid, "lastname");
    $receiver_email = get_customer_detail($userid, "email");
    // $receiver_email = "emmydanjumbo4@gmail.com";

    $title = $email_title[$rand];
    $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $website_name . " | The links in this email will always direct to " . $website_url_http . " Learn about email security and online safety. 
   © " . $website_name;

    $to =  $receiver_email;
    $subject = $title;
    $from = $website_name . ' hello@' . $website_url;

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body style="">';

    // main container start
    $message .= '<div style="width:100%;margin:auto;background-color: white;box-shadow:0px 10px 20px lightgrey;border-radius: 10px;padding:15px;">';


    $message .= '
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $website_url_http . '/' . $logo . '" style="width:100px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Hey ' . $receiver_firstname . '!</h2>
</div>';

    $message .= '<div style="width:100%;padding:10px;text-align:;">
We noticed you applied for a password recovery on ' . $website_url . '
<br>
To recovery your password please click the link below to reset a new password!
<br><br>


<div style="width:100%;display: flex;justify-content:center ;margin-top: 10px;margin-bottom: 10px;">
<a href="' . $website_url_http . '/sellers/update-new-password.php?key=' . $key . '&email=' . $email . '" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Visit website</a>
<br>


</div>

<br><br>
<p style="color:black;"><b>Regards, ' . $website_name . '</b></p>
</div>
';








    $message .= '</div>
<div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
' . $footer . '
</div>

</body></html>';

    // Sending email
    $send = mail($to, $subject, $message, $headers);

    if ($send) {
        echo "Email sent";
    } else {
        echo "Not sent";
    }
}



// send customer recover password email end

/**************EMAIL FUNCTIONS END *********** */
