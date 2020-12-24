<?php

class Order
{


    // public function createSeller($name, $phone, $email, $password)
    // {
    //     global $db;
    //     $orderid = uniqid();
    //     $hashed = password_hash($password, PASSWORD_DEFAULT);
    //     $image = "profileimages/defaultimage.jpeg";
    //     $status = "active";
    //     $time = time();
    //     $date = date("d-m-y");
    //     $new = "yes";
    //     $tracking_id = RAND(0, 100000);
    //     $online_time = time();
    //     $online_status = "online";
    //     $wallet = 0;
    //     $first_time = "yes";



    //     $result = $db->setQuery("INSERT INTO users (orderid, name, phone, email, password, image, status, new, tracking_id, time, date, online_time, online_status, wallet, first_time) VALUES ('$orderid', '$name', '$phone', '$email', '$hashed', '$image', '$status', '$new', '$tracking_id', '$time', '$date', '$online_time', '$online_status', '$wallet', '$first_time');");
    //     return $result;
    // }


    public function getDetail($order_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM orders WHERE orderid='$order_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function setDetail($order_id, $field, $detail)
    {
        global $db;

        $result = $db->setQuery("UPDATE orders SET $field='$detail' WHERE orderid='$order_id';");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function updateDetail($order_id, $detail, $value, $op)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM orders WHERE orderid='$order_id';");
        $row = mysqli_fetch_assoc($result);
        $old_value = $row[$detail];

        if ($op == "+") {
            $new_value = $old_value + $value;
        } else if ($op == "-") {
            $new_value = $old_value - $value;
        }

        $result1 = $db->setQuery("UPDATE orders SET $detail='$new_value' WHERE orderid='$order_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function getPickupStationId($orderid)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM orderpickupstation WHERE orderid='$orderid';");
        $row = mysqli_fetch_assoc($result);
        $station_id = $row['stationid'];

        return $station_id;
    }

    public function getPickupStationDetail($station_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM pickupstation WHERE id='$station_id';");
        $row = mysqli_fetch_assoc($result);
        $pickup_detail = $row[$detail];

        return $pickup_detail;
    }


    public function getNumTotalProductsOrdered($order_id)
    {
        global $db;
        $total = 0;
        $result = $db->setQuery("SELECT * FROM orderproducts WHERE orderid='$order_id';");
        $numrows = mysqli_num_rows($result);

        return $numrows;
    }

    public function getTotalAmountOrdered($order_id)
    {
        global $db;
        $total = 0;
        $result = $db->setQuery("SELECT * FROM orderproducts WHERE orderid='$order_id';");
        while ($row = mysqli_fetch_assoc($result)) {
            $total += ($row['price'] * $row['howmany']);
        }

        return $total;
    }

    public function getProductOrderDetail($order_id, $product_id, $detail)
    {
        global $db;
        $total = 0;
        $result = $db->setQuery("SELECT * FROM orderproducts WHERE orderid='$order_id' AND productid='$product_id';");
        $row = mysqli_fetch_assoc($result);
        return $row[$detail];
    }


    public function orderIsStillActive($order_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM orderproducts WHERE orderid='$order_id' AND status='Active';");
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function addItemsToCookie($customer_id, $item_id, $order_id)
    {
        if (!isset($_COOKIE['ordered_items'])) {
            $ordered_items_array = [];
            $details = array('customer_id' => $customer_id, 'item_id' => $item_id, 'order_id' => $order_id);
            $ordered_items_array[0] = $details;
            setcookie("ordered_items", json_encode($ordered_items_array), time() + 2419200);
        } else {
            $ordered_items_array = (array) json_decode($_COOKIE['ordered_items']);
            $details = array('customer_id' => $customer_id, 'item_id' => $item_id, 'order_id' => $order_id);
            $ordered_items_array[count($ordered_items_array)] = $details;
            setcookie("ordered_items", json_encode($ordered_items_array), time() + 2419200);
        }
    }

    public function getLatestDeliveredItem()
    {
        global $customer;
        if (isset($_SESSION['id']) and $customer->customerIsLoggedIn($_SESSION['id'])) {
            $session_id = $_SESSION['id'];
            if (isset($_COOKIE['ordered_items']) and !isset($_COOKIE['dont_show_rating_modal'])) {
                $ordered_items_array = (array) json_decode($_COOKIE['ordered_items']);
                foreach ($ordered_items_array as $ordered_item) {
                    $ordered_item = (array) $ordered_item;
                    $customer_id = $ordered_item['customer_id'];
                    $item_id = $ordered_item['item_id'];
                    $order_id = $ordered_item['order_id'];

                    // check if item has been delivered and also have no review yet!
                    if ($customer_id == $session_id and $this->getProductOrderDetail($order_id, $item_id, "status") == "Settled" and !$customer->customerHaveReviewedItem($customer_id, $item_id, $order_id)) {
                        $result = array('status' => 'found', 'item_id' => $item_id, 'order_id' => $order_id, 'customer_id' => $customer_id);
                        return $result;
                    }
                }
                return array('status' => 'not found');
            } else {
                $result = array('status' => 'not found');
            }
        } else {
            $result = array('status' => 'not found');
        }
    }
}


$order = new Order();
