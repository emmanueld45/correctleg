<?php

class Database
{


    public $dbservername = 'localhost';

    public $dbusername = 'root';

    public $dbpassword = '';

    public $dbname = 'correctleg1';

    public $conn;

    public $sql;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname);
    }

    public function setQuery($query)
    {
        $this->sql = $query;
        $result = mysqli_query($this->conn, $this->sql);
        return $result;
    }


    public function format_countdown_time($time)
    {

        $hours = floor($time / 3600);

        $minutes_remainder = floor($time % 3600);
        $minutes = floor($minutes_remainder / 60);

        $seconds = round($minutes_remainder % 60);

        $time_array = array(
            "hours" => $hours,
            "minutes" => $minutes,
            "seconds" => $seconds
        );

        return $time_array;
    }


    public function format_time($old_time)
    {
        $diff = time() - $old_time;

        //seconds
        if ($diff < 60) {

            $time = $diff;
            $roundtime = round($time);
            if ($roundtime == 1) {
                return $roundtime . " second ago";
            } else {
                return $roundtime . " seconds ago";
            }
        }

        //minutes
        else if ($diff > 60 and $diff < 3600) {
            $time = $diff / 60;
            $roundtime = round($time);
            if ($roundtime == 1) {
                return $roundtime . " minute ago";
            } else {
                return $roundtime . " minutes ago";
            }
        }



        // hours
        else if ($diff > 3600 and $diff < 86400) {
            $time = $diff / 3600;

            $roundtime = round($time);
            if ($roundtime == 1) {
                return $roundtime . " hour ago";
            } else {
                return $roundtime . " hours ago";
            }
        }

        // days
        else if ($diff > 86400 and $diff < 604800) {
            $time = $diff / 86400;
            $roundtime = round($time);
            if ($roundtime == 1) {
                return $roundtime . " day ago";
            } else {
                return $roundtime . " days ago";
            }
        }

        // weeks
        else if ($diff > 604800 and $diff < 2419200) {
            $time = $diff / 604800;

            $roundtime = round($time);
            if ($roundtime == 1) {
                return $roundtime . " week ago";
            } else {
                return $roundtime . " weeks ago";
            }
        }

        // years
        else if ($diff > 2419200 and $diff < 29030400) {
            $time = $diff / 2419200;

            $roundtime = round($time);
            if ($roundtime == 1) {
                return $roundtime . " month ago";
            } else {
                return $roundtime . " months ago";
            }
        }
    }

    public function isProductCode($query)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product WHERE productcode='$query';");
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isSellerCode($query)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM sellers WHERE cid='$query';");
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getProductIdFromProductCode($product_code)
    {
        global $db;

        $result = $db->setQuery("SELECT * FROM product WHERE productcode='$product_code';");
        $row = mysqli_fetch_assoc($result);

        return $row['uniqueid'];
    }



    public function prepareStatement($sql, $parameters_array)
    {
        global $db;
        $parameters = [];
        $no_of_s = "";
        $stmt = mysqli_stmt_init($this->conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            return false;
        } else {

            foreach ($parameters_array as $param) {
                $no_of_s .= "s";
                $parameters[count($parameters)] = $param;
            }

            mysqli_stmt_bind_param($stmt, $no_of_s, ...$parameters);
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                return $result;
            } else {
                return false;
            }
        }
    }

    public function automaticallyLogCustomerIn()
    {
        if (isset($_COOKIE['customer_id']) and !isset($_SESSION['session_id'])) {
            $_SESSION['session_id'] = $_COOKIE['customer_id'];
        }
    }


    // public function format_countdown_time($time)
    // {

    //     $hours = floor($time / 3600);

    //     $minutes_remainder = floor($time % 3600);
    //     $minutes = floor($minutes_remainder / 60);

    //     $seconds = round($minutes_remainder % 60);

    //     $time_array = array(
    //         "hours" => $hours,
    //         "minutes" => $minutes,
    //         "seconds" => $seconds
    //     );

    //     return $time_array;
    // }

    // public function format_time($time)
    // {

    //     if ($time >= 0 and $time < 60) {
    //         $t = round($time);
    //         if ($t == 1) {
    //             return array("time" => $t, "time_frame" => "seconds", "suffix" => "s");
    //         } else {
    //             return array("time" => $t, "time_frame" => "seconds",  "suffix" => "s");
    //         }
    //     } else if ($time >= 60 and $time < 3600) {
    //         $t = round($time / 60);
    //         if ($t == 1) {
    //             return array("time" => $t, "time_frame" => "minutes", "suffix" => "min");
    //         } else {
    //             return array("time" => $t, "time_frame" => "minutes",  "suffix" => "mins");
    //         }
    //     } else if ($time >= 3600 and $time < 86400) {
    //         $t = round($time / 3600);
    //         if ($t == 1) {
    //             return array("time" => $t, "time_frame" => "hours", "suffix" => "hr");
    //         } else {
    //             return array("time" => $t, "time_frame" => "hours",  "suffix" => "hrs");
    //         }
    //     } else if ($time >= 86400 and $time < 604800) {
    //         $t = round($time / 86400);
    //         if ($t == 1) {
    //             return array("time" => $t, "time_frame" => "days", "suffix" => "day");
    //         } else {
    //             return array("time" => $t, "time_frame" => "days",  "suffix" => "days");
    //         }
    //     } else if ($time < 0) {
    //         return array("time" => 0, "time_frame" => "0", "suffix" => "0");
    //     }
    // }
}

$db = new Database();
$website_name = "Correct Leg";
$db->automaticallyLogCustomerIn();
