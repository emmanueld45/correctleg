<?php

class Customer
{


    // public function createSeller($name, $phone, $email, $password)
    // {
    //     global $db;
    //     $uniqueid = uniqid();
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



    //     $result = $db->setQuery("INSERT INTO users (uniqueid, name, phone, email, password, image, status, new, tracking_id, time, date, online_time, online_status, wallet, first_time) VALUES ('$uniqueid', '$name', '$phone', '$email', '$hashed', '$image', '$status', '$new', '$tracking_id', '$time', '$date', '$online_time', '$online_status', '$wallet', '$first_time');");
    //     return $result;
    // }


    public function getDetail($customer_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM customers WHERE uniqueid='$customer_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function setDetail($customer_id, $field, $detail)
    {
        global $db;

        $result = $db->setQuery("UPDATE customers SET $field='$detail' WHERE uniqueid='$customer_id';");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function updateDetail($customer_id, $detail, $value, $op)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM customers WHERE uniqueid='$customer_id';");
        $row = mysqli_fetch_assoc($result);
        $old_value = $row[$detail];

        if ($op == "+") {
            $new_value = $old_value + $value;
        } else if ($op == "-") {
            $new_value = $old_value - $value;
        }

        $result1 = $db->setQuery("UPDATE customers SET $detail='$new_value' WHERE uniqueid='$customer_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function sellerExist($customer_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM customers WHERE uniqueid='$customer_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function encodePhone($phone)
    {
        // if (strlen($phone) > 5) {)
        $part1 = substr($phone, 0, 3);
        $part2 = substr($phone, 7, 11);

        $phone = $part1 . "****" . $part2;


        return $phone;
    }

    public function customerIsLoggedIn($customer_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM customers WHERE uniqueid='$customer_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function haveShippingAddress($customer_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM shippingaddress WHERE customerid='$customer_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getShippingAddress($customer_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM shippingaddress WHERE customerid='$customer_id';");
        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    public function getShippingAddressDetail($customer_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM shippingaddress WHERE customerid='$customer_id';");
        $row = mysqli_fetch_assoc($result);

        return $row[$detail];
    }

    public function haveSavedItem($customer_id, $item_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM savedproducts WHERE customerid='$customer_id' AND productid='$item_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function saveItem($customer_id, $item_id)
    {
        global $db;

        $result = $db->setQuery("INSERT INTO savedproducts (customerid, productid) VALUES ('$customer_id', '$item_id');");
    }

    public function haveViewedItem($customer_id, $item_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM recentlyviewed WHERE customerid='$customer_id' AND productid='$item_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getNumTotalSavedItems($customer_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM savedproducts WHERE customerid='$customer_id';");
        $numrows = mysqli_num_rows($result);


        return $numrows;
    }

    public function getNumTotalOrderItems($customer_id, $order_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM orderproducts WHERE customerid='$customer_id' AND orderid='$order_id';");
        $numrows = mysqli_num_rows($result);

        return $numrows;
    }

    public function customerHaveViewedItem($customer_id, $item_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM recentlyviewed WHERE customerid='$customer_id' AND productid='$item_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function viewItem($customer_id, $item_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM recentlyviewed WHERE customerid='$customer_id';");
        $numrows = mysqli_num_rows($result);

        $last_item_id = "";
        $x = 0;
        if ($numrows >= 10) {
            while ($row = mysqli_fetch_assoc($result)) {
                $x++;
                if ($x == 1) {
                    $last_item_id = $row['productid'];
                }
            }

            $db->setQuery("DELETE FROM recentlyviewed WHERE customerid='$customer_id' AND productid='$last_item_id';");
        }
        $result1 = $db->setQuery("INSERT INTO recentlyviewed (customerid, productid) VALUES ('$customer_id', '$item_id');");
    }


    public function customerHaveReviewedItem($customer_id, $item_id, $order_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product_reviews WHERE customer_id='$customer_id' AND product_id='$item_id' AND order_id='$order_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }
}


$customer = new Customer();
