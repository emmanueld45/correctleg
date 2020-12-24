<?php

class Seller
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


    public function getDetail($seller_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM sellers WHERE uniqueid='$seller_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function setDetail($seller_id, $field, $detail)
    {
        global $db;

        $result = $db->setQuery("UPDATE sellers SET $field='$detail' WHERE uniqueid='$seller_id';");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function updateDetail($seller_id, $detail, $value, $op)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM sellers WHERE uniqueid='$seller_id';");
        $row = mysqli_fetch_assoc($result);
        $old_value = $row[$detail];

        if ($op == "+") {
            $new_value = $old_value + $value;
        } else if ($op == "-") {
            $new_value = $old_value - $value;
        }

        $result1 = $db->setQuery("UPDATE sellers SET $detail='$new_value' WHERE uniqueid='$seller_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function sellerIsLoggedIn($seller_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM sellers WHERE uniqueid='$seller_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function sellerExist($seller_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM sellers WHERE uniqueid='$seller_id';");
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

    public function haveOtherProducts($seller_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product WHERE sellerid='$seller_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows > 1) {
            return true;
        } else {
            return false;
        }
    }

    public function haveBusinessDetails($seller_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM businessdetails WHERE sellerid='$seller_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function haveBankDetails($seller_id)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM bankdetails WHERE sellerid='$seller_id';");
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            return true;
        } else {
            return false;
        }
    }




    public function getSellerTotalOrders($sellerid)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM orderproducts WHERE sellerid='$sellerid';");
        $numrows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        return $numrows;
    }

    public function getSellerTotalItems($sellerid)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product WHERE sellerid='$sellerid';");
        $numrows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        return $numrows;
    }
}


$seller = new Seller();
