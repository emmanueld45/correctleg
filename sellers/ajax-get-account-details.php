<?php
session_start();

include '../classes/database.class.php';
include '../classes/users.class.php';
include '../classes/admin.class.php';



if (isset($_POST['get_account_details'])) {
    $account_number = mysqli_real_escape_string($db->conn, $_POST['account_number']);
    $account_bank = mysqli_real_escape_string($db->conn, $_POST['account_bank']);
    $data = array(
        'account_number' => $account_number,
        'account_bank' => $account_bank
    );

    $data_array = json_encode($data);

    $cURLConnection = curl_init('https://api.flutterwave.com/v3/accounts/resolve');
    curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $data_array);
    curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
        'Content-Type:application/json',
        'Authorization: Bearer FLWSECK-51766b4aab9fa0d56aa6275023b5e5b8-X',
        'Cache-Control: no-cache',
    ));
    $apiResponse = curl_exec($cURLConnection);
    curl_close($cURLConnection);


    // $apiResponse - available data from the API request
    $jsonArrayResponse = json_decode($apiResponse);


    $data = (array) $jsonArrayResponse;

    if ($data['status'] == "success") {
        $details = (array) $data['data'];
        //$details['account_name']; 
        //$details['account_number'];
        $result = array(
            "status" => "success",
            "account_name" => $details['account_name'],
            "account_number" => $details['account_number'],
        );

        echo json_encode($result);
    } else {
        $result = array(
            "status" => "failed",
        );

        echo json_encode($result);
    }
}




if (isset($_POST['get_available_balance'])) {

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.flutterwave.com/v3/balances",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer FLWSECK-51766b4aab9fa0d56aa6275023b5e5b8-X",
            "Content-Type: application/json"
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    $response = (array) json_decode($response);
    $details = (array) $response['data'][0];

    //echo $response['status'];
    echo $details['available_balance'];
}
