<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/sellers.class.php';
include '../classes/admin.class.php';
include '../send_twilio_sms.php';


if (isset($_POST['send_verification_code'])) {
    $_SESSION['tmp_verification_code'] = twilio_sendVerificationCodeSms($_SESSION['tmp_phone']);
    echo "success";
}



if (isset($_POST['check_verification_code'])) {

    $verification_code = $_POST['verification_code'];

    if ($verification_code == $_SESSION['tmp_verification_code']) {

        echo "success";
    } else {
        echo "failed";
    }
}


if (isset($_GET['signup_seller'])) {

    $firstname = $_SESSION['tmp_firstname'];
    $lastname = $_SESSION['tmp_lastname'];
    $email = $_SESSION['tmp_email'];
    $phone = $_SESSION['main_phone'];
    $password = $_SESSION['tmp_password'];
    // echo $firstname . " " . $lastname . " " . $email . " " . $phone . " " . $password;
    $uniqueid = uniqid();
    $image = "sellerimages/defaultimage.png";
    $time = time();
    $date = date("d-m-y");
    $a = date("h");
    $b = $a - 1;
    $c = date("i A");
    $timeview = $b . ":" . $c;
    $status = "inactive";
    $activebalance = 0;
    $pendingbalance = 0;
    $new = "yes";
    $cid = create_product_code();
    $website_url = "empty";
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $subscribed = "no";


    $sql = "INSERT INTO sellers (uniqueid, firstname, lastname, image, email, phone, password, activebalance, pendingbalance, time, date, timeview, status, new, cid, subscribed) VALUES ('$uniqueid', '$firstname', '$lastname', '$image', '$email', '$phone', '$hashed', '$activebalance', '$pendingbalance', '$time', '$date', '$timeview', '$status', '$new', '$cid', '$subscribed');";
    mysqli_query($conn, $sql);



    $_SESSION['id'] = $uniqueid;

    send_seller_welcome_email($_SESSION['id']);


    $admin->goToPage("business-info", "isnewsignup");
}





// if (isset($_POST['send_recover_password_verification_code'])) {
//     $phone = mysqli_real_escape_string($db->conn, $_POST['phone']);
//     $phone = "234" . $phone;

//     $_SESSION['tmp_recovery_verification_code'] = $admin->sendVerificationCodeSms($phone);

//     echo "success";
// }
