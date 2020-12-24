<?php
session_start();

include 'classes/database.class.php';
include 'classes/admin.class.php';
include 'classes/products.class.php';


?>




<?php
if (isset($_POST['process_online_payment'])) {

    $amount = $_POST['amount'];
    $tx_ref = $_POST['tx_ref'];






    // $ref = $_GET['txRef'];
    $amount = $amount; //Correct Amount from Server
    $currency = "NGN"; //Correct Currency from Server

    $query = array(
        "SECKEY" => "FLWSECK_TEST-f02497ec342eea10107612198ea24423-X",
        "txref" => $tx_ref
    );

    $data_string = json_encode($query);

    $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    $response = curl_exec($ch);

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

    curl_close($ch);

    $resp = json_decode($response, true);

    $paymentStatus = $resp['data']['status'];
    $chargeResponsecode = $resp['data']['chargecode'];
    $chargeAmount = $resp['data']['amount'];
    $chargeCurrency = $resp['data']['currency'];

    if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
        // transaction was successful...
        // please check other things like whether you already gave value for this ref
        // if the email matches the customer who owns the product etc
        //Give Value and return to Success page

        $result = array("status" => "success");
        echo json_encode($result);
    } else {
        //Dont Give Value and return to Failure page
        $result = array("status" => "failed");
        echo json_encode($result);
    }
}

?>























