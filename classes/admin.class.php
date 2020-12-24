<?php

class Admin
{
    public $admin_id = 1;




    public function getAdminDetail($detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM admin WHERE id='$this->admin_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function setAdminDetail($field, $detail)
    {
        global $db;

        $result = $db->setQuery("UPDATE admin SET $field='$detail' WHERE id='$this->admin_id';");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function updateAdminDetail($detail, $value, $op)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM admin WHERE id='$this->admin_id';");
        $row = mysqli_fetch_assoc($result);
        $old_value = $row[$detail];

        if ($op == "+") {
            $new_value = $old_value + $value;
        } else if ($op == "-") {
            $new_value = $old_value - $value;
        }

        $result1 = $db->setQuery("UPDATE admin SET $detail='$new_value' WHERE id='$this->admin_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }





    public function goToPage($page, $parameter)
    {
        echo '<script>
         window.location.href="' . $page . '?' . $parameter . '";
        </script>';
    }

    public function goBack()
    {
        echo '<script>
        window.history.back();
       </script>';
    }


    public function haveSmsCredits()
    {
        $url = "https://kullsms.com/customer/api/?username=luckywinng@gmail.com&password=Emmanueld45@&request=balance";
        $balance = file_get_contents($url);
        $balance = json_decode($balance, TRUE);


        if ($balance > 10) {
            return true;
        } else {
            return false;
        }
    }

    public function sendVerificationCodeSms($phone)
    {
        $sender = "CorrectLeg";
        $verification_code = RAND(10000, 20000);
        $text = 'Hello, your CorrectLeg verification code is: ' . $verification_code;
        $url = 'https://kullsms.com/customer/api/?username=correctleg123@gmail.com&password=Emmanueld45@&message=' . urlencode($text) . '&sender=' . urlencode($sender) . '&mobiles=' . $phone;
        $send = file_get_contents($url);

        return $verification_code;
    }


    public function sendSellerOrderSms($phone)
    {
        $sender = "CorrectLeg";

        $text = 'Hello, your product has been ordered on Correctleg, kindly check your email for information about this order. call 08162383712 for support ';
        $url = 'https://kullsms.com/customer/api/?username=correctleg123@gmail.com&password=Emmanueld45@&message=' . urlencode($text) . '&sender=' . urlencode($sender) . '&mobiles=' . $phone;
        $send = file_get_contents($url);
    }

    public function sendAdminOrderSms($seller_phone)
    {
        $sender = "CorrectLeg";
        $phone = "8162383712";
        $text = 'Hello Admin, An item has been ordered on CorrectLeg.com . call seller on ' . $seller_phone . ' for support ';
        $url = 'https://kullsms.com/customer/api/?username=correctleg123@gmail.com&password=Emmanueld45@&message=' . urlencode($text) . '&sender=' . urlencode($sender) . '&mobiles=' . $phone;
        $send = file_get_contents($url);
    }



    public function getNumTotalNewAdminOrders()
    {
        global $db;
        //  $adminid = get_admin_id();

        $result = $db->setQuery("SELECT * FROM orders WHERE adminnew='yes';");
        $numrows = mysqli_num_rows($result);

        return $numrows;
    }

    public function setadminNewOrdersToOld()
    {
        global $db;

        $result = $db->setQuery("UPDATE orders SET adminnew='no';");
    }

    public function createRecoverPasswordKey($email)
    {

        global $db;

        $secret_key = uniqid();
        $status = "unused";

        $result = $db->setQuery("INSERT INTO recoverpasswordkey (secret_key, email, status) VALUES ('$secret_key', '$email', '$status');");

        return $secret_key;
    }



    public function calcItemCommission($item_price)
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

    /*** ADMINS START *** */
    public function createAdmin($username, $password, $is_super_admin)
    {

        global $db;

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $result = $db->setQuery("INSERT INTO admins (username, password, is_super_admin) VALUES ('$username', '$hashed', '$is_super_admin');");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getAdminsDetail($admin_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM admins WHERE id='$admin_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function setAdminsDetail($admin_id, $field, $detail)
    {
        global $db;

        $result = $db->setQuery("UPDATE admins SET $field='$detail' WHERE id='$admin_id';");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function updateAdminsDetail($admin_id, $detail, $value, $op)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM admins WHERE id='$admin_id';");
        $row = mysqli_fetch_assoc($result);
        $old_value = $row[$detail];

        if ($op == "+") {
            $new_value = $old_value + $value;
        } else if ($op == "-") {
            $new_value = $old_value - $value;
        }

        $result1 = $db->setQuery("UPDATE admins SET $detail='$new_value' WHERE id='$admin_id';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



    /*** ADMINS END ** */
}


$admin = new Admin();
