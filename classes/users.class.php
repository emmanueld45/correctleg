<?php

class User
{
    public $user_id;

    public function createUser($name, $phone, $email, $password)
    {
        global $db;
        $uniqueid = uniqid();
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $image = "profileimages/defaultimage.jpeg";
        $status = "active";
        $time = time();
        $date = date("d-m-y");
        $new = "yes";
        $tracking_id = RAND(0, 100000);
        $online_time = time();
        $online_status = "online";
        $wallet = 0;
        $first_time = "yes";
      
      

        $result = $db->setQuery("INSERT INTO users (uniqueid, name, phone, email, password, image, status, new, tracking_id, time, date, online_time, online_status, wallet, first_time) VALUES ('$uniqueid', '$name', '$phone', '$email', '$hashed', '$image', '$status', '$new', '$tracking_id', '$time', '$date', '$online_time', '$online_status', '$wallet', '$first_time');");
        return $result;
    }


    public function getUserDetail($user_id, $detail)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM users WHERE uniqueid='$user_id';");
        $row = mysqli_fetch_assoc($result);
        $detail = $row[$detail];

        return $detail;
    }


    public function setUserDetail($user_id, $field, $detail)
    {
        global $db;

        $result = $db->setQuery("UPDATE users SET $field='$detail' WHERE uniqueid='$user_id';");

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function updateUserDetail($userid, $detail, $value, $op)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM users WHERE uniqueid='$userid';");
        $row = mysqli_fetch_assoc($result);
        $old_value = $row[$detail];

        if ($op == "+") {
            $new_value = $old_value + $value;
        } else if ($op == "-") {
            $new_value = $old_value - $value;
        }

        $result1 = $db->setQuery("UPDATE users SET $detail='$new_value' WHERE uniqueid='$userid';");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function userExist($user_id){
        global $db;

        $result = $db->setQuery("SELECT * FROM users WHERE uniqueid='$user_id';");
        $numrows = mysqli_num_rows($result);

        if($numrows > 0){
            return true;
        }else{
            return false;
        }
    }


    public function encodePhone($phone){
        // if (strlen($phone) > 5) {)
            $part1 = substr($phone, 0, 3);
            $part2 = substr($phone, 7, 11);

            $phone = $part1."****".$part2;
          

          return $phone;
    }



    public function getNumUserItems($user_id){
        global $db;

        $result = $db->setQuery("SELECT * FROM products WHERE userid='$user_id';");
        $numrows = mysqli_num_rows($result);

        return $numrows;
    }


   
  
}


$user = new User();