<?php
session_start();
include 'dbconn.php';
include 'functions.php';

if (isset($_POST['online_payment'])) {

    $_SESSION['order_firstname'] = $_POST['firstname'];
    $_SESSION['order_lastname'] = $_POST['lastname'];
    $_SESSION['order_phone'] = $_POST['phone'];
    $_SESSION['order_additionalphone'] = $_POST['additionalphone'];
    $_SESSION['order_email'] = $_POST['email'];
    $_SESSION['order_region'] = $_POST['region'];
    $_SESSION['order_address1'] = $_POST['address1'];
    $_SESSION['order_address2'] = $_POST['address2'];

    $_SESSION['delivery_method'] = $_POST['delivery_method'];
    $_SESSION['payment_method'] = $_POST['payment_method'];
    $_SESSION['delivery_station'] = $_POST['station'];
    $_SESSION['order_shipping_fee'] = $_POST['shipping_fee'];
}
