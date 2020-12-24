<?php
include 'dbconn.php';
include 'functions.php';


// send welcome email start

function send_seller_welcome_email($userid)
{

    $website_url = "test.correctleg.com";
    $website_url_http = "https://test.correctleg.com";
    $website_name = "CorrectLeg";


    $email_title = ["Welcome to CorrectLeg", "We are delighted to have you - CorrectLeg", "Welcome onboard - CorrectLeg", "You are welcome -    CorrectLeg"];
    $logo = "img/correctleg-logo.png";
    global $conn;


    $rand = RAND(0, 3);

    $receiver_firstname = get_seller_detail($userid, "firstname");
    $receiver_lastname = get_seller_detail($userid, "lastname");
    $receiver_email = get_seller_detail($userid, "email");
    $receiver_email = "emmydanjumbo4@gmail.com";

    $title = $email_title[$rand];
    $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $website_name . " | The links in this email will always direct to " . $website_url_http . " Learn about email security and online safety. 
   © " . $website_name;

    $to =  $receiver_email;
    $subject = $title;
    $from = $website_name . ' hello@' . $website_url;

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body style="background-color: #eee;padding:10px;">';

    // main container start
    $message .= '<div style="width:100%;margin:auto;background-color: white;box-shadow:0px 10px 20px lightgrey;border-radius: 10px;padding:15px;">';


    $message .= '
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $website_url_http . '/' . $logo . '" style="width:100px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Welcome ' . $receiver_firstname . '!</h2>
</div>';

    $message .= '<div style="width:100%;padding:10px;text-align:center;">
You have made the right choice to join ' . $website_name . ' as a seller.
<br>
Correct leg sellers have a better advantage in seller to a wider audience all around the Nation, as we do all the hard work for you.. Like shipping, handling and customer service management.

<br><br>
Below are some useful links to help you get started!.


<div style="width:100%;display: flex;justify-content: center;margin-top: 10px;margin-bottom: 10px;">
<a href="' . $website_url_http . '" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Visit website</a>
<br>
<a href="' . $website_url_http . '/sellers/login.php" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Login Account</a>
<br>
<a href="' . $website_url_http . '/how-it-works.php" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">How it works</a>


</div>

<br><br>
<p style="color:black;"><b>Regards, ' . $website_name . '</b></p>
</div>
';








    $message .= '</div>
<div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
' . $footer . '
</div>

</body></html>';

    // Sending email
    $send = mail($to, $subject, $message, $headers);

    if ($send) {
        echo "Email sent";
    } else {
        echo "Not sent";
    }
}



// send welcome email end

//$userid = "5edb748676d36";
//send_seller_welcome_email("5edb748676d36");

















































// send  customer welcome email start

function send_customer_welcome_email($userid)
{

    $website_url = "test.correctleg.com";
    $website_url_http = "https://test.correctleg.com";
    $website_name = "CorrectLeg";


    $email_title = ["Welcome to CorrectLeg", "We are delighted to have you - CorrectLeg", "Welcome onboard - CorrectLeg", "You are welcome -    CorrectLeg"];
    $logo = "img/correctleg-logo.png";
    global $conn;


    $rand = RAND(0, 3);

    $receiver_firstname = get_customer_detail($userid, "firstname");
    $receiver_lastname = get_customer_detail($userid, "lastname");
    $receiver_email = get_customer_detail($userid, "email");
    $receiver_email = "emmydanjumbo4@gmail.com";

    $title = $email_title[$rand];
    $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $website_name . " | The links in this email will always direct to " . $website_url_http . " Learn about email security and online safety. 
   © " . $website_name;

    $to =  $receiver_email;
    $subject = $title;
    $from = $website_name . ' hello@' . $website_url;

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body style="background-color: #eee;padding:10px;">';

    // main container start
    $message .= '<div style="width:100%;margin:auto;background-color: white;box-shadow:0px 10px 20px lightgrey;border-radius: 10px;padding:15px;">';


    $message .= '
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $website_url_http . '/' . $logo . '" style="width:100px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Welcome ' . $receiver_firstname . '!</h2>
</div>';

    $message .= '<div style="width:100%;padding:10px;text-align:center;">
We specially welcome you to our website ' . $website_url . ' your No.1 onine shopping mall for foot wear products.
<br>
We connect with sellers around th nation and hank pick the best sellers with good quality products just to serve you better.
<br><br>
Below are some links to help you walk around our website!.


<div style="width:100%;display: flex;justify-content: center;margin-top: 10px;margin-bottom: 10px;">
<a href="' . $website_url_http . '" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Visit website</a>
<br>
<a href="' . $website_url_http . '/customers/login.php" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Login Account</a>
<br>
<a href="' . $website_url_http . '/how-it-works.php" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">How it works</a>


</div>

<br><br>
<p style="color:black;"><b>Regards, ' . $website_name . '</b></p>
</div>
';








    $message .= '</div>
<div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
' . $footer . '
</div>

</body></html>';

    // Sending email
    $send = mail($to, $subject, $message, $headers);

    if ($send) {
        echo "Email sent";
    } else {
        echo "Not sent";
    }
}



// send welcome email end

//$userid = "5edb748676d36";
//send_customer_welcome_email("5edb748676d36");


































































function send_customer_new_order_email($userid, $orderid, $shipping_fee)
{

    $website_url = "test.correctleg.com";
    $website_url_http = "https://test.correctleg.com";
    $website_name = "CorrectLeg";


    $email_title = ["New Order received", "You placed an Order - CorrectLeg", "We received your Order - CorrectLeg", "Your Order has been confirmed -    CorrectLeg"];
    $logo = "img/correctleg-logo.png";
    global $conn;


    $rand = RAND(0, 3);

    $receiver_firstname = get_seller_detail($userid, "firstname");
    $receiver_lastname = get_seller_detail($userid, "lasttname");
    $receiver_email = get_seller_detail($userid, "email");
    $receiver_email = "emmydanjumbo4@gmail.com";

    $title = $email_title[$rand];
    $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $website_name . " | The links in this email will always direct to " . $website_url_http . " Learn about email security and online safety. 
   © " . $website_name;

    $to =  $receiver_email;
    $subject = $title;
    $from = $website_name . ' hello@' . $website_url;

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message = '<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body style="">';

    // main container start
    $message .= '<div style="width:100%;margin:auto;background-color: white;box-shadow:0px 10px 20px lightgrey;border-radius: 10px;padding:15px;">';


    $message .= '
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $website_url_http . '/' . $logo . '" style="width:200px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Hey ' . $receiver_firstname . '!</h2>
</div>';


    $message .= '<div style="width:100%;padding:10px;text-align:;">
Thank you for your order from ' . $website_name . '. Once your package ships we will send you a notification email and sms.

<br><br>
If you have any questions about your order, you can email us at <a href="#">support@' . $website_url . '</a>

<br><br>
<span style="font-weight:bold;font-size:30px;>Your Order id: ' . $orderid . '</span>
<br><br>';

    // table start
    $message .= '
    <div style="width:100%;background-color:#eee;margin-top:10px;margin-bottom:10px;">
    
    <table style="background-color:#eee;">
    
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Image</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Name</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">price</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Quantity</th>
    <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Total price</th>
    ';

    // get customer ordered products
    $sql = "SELECT * FROM orderproducts WHERE orderid='$orderid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);


    // get customer order details
    $sql1 = "SELECT * FROM ordercustomerdetails WHERE orderid='$orderid';";
    $result1 = mysqli_query($conn, $sql1);
    $numrows1 = mysqli_num_rows($result1);
    $row1 = mysqli_fetch_assoc($result1);
    $firstname = $row1['firstname'];
    $lastname = $row1['lastname'];
    $email = $row1['email'];
    $phone = $row1['phone'];

    $total_price_general = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $item_id = $row['productid'];
        $image = get_item_detail($item_id, 'image1');
        $name = $row['name'];
        $price = $row['price'];
        $howmany = $row['howmany'];
        $total_price = $price * $howmany;

        $total_price_general += $total_price;

        $message .= '

    <tr style="margin-top:10px;margin-bottom:10px;">
    <td><img src="' . $website_url_http . '/' . $image . '" style="width:100px;height:100px;"></td>
    <td>' . $name . '</td>
    <td><span>N</span>' . number_format($price) . '</td>
    <td>' . $howmany . '</td>
    <td><span>N</span>' . number_format($total_price) . '</td>
    </tr>
    ';
    }


    $message .= '



    <tr style="margin-top:10px;margin-bottom:10px;">
    <td></td>
    <td></td>
    <td></td>
    <td><span style="font-weight:600;">Subtotal</span></td>
    <td><span>N</span>' . number_format($total_price_general) . '</td>
    </tr>


    <tr style="margin-top:10px;margin-bottom:10px;">
    <td></td>
    <td></td>
    <td></td>
    <td>Shipping</td>
    <td><span>N</span>' . $shipping_fee . '</td>
    </tr>


    <tr style="margin-top:10px;margin-bottom:10px;">
    <td></td>
    <td></td>
    <td></td>
    <td><span style="font-weight:bold;">Total</td>
    <td><span>N</span>' . number_format($total_price_general + $shipping_fee) . '</td>
    </tr>
    
    
    
    
    
    
    
    </table>
    
    </div>
    <br>
    ';
    // table end 

    $message .= '<div style="width:100%;padding:10px;">
    
    <span>Billing Info</span><br>
    <span>' . $firstname . ' ' . $lastname . '</span><br>
    <span>Portharcourt Riverstate</span><br>
    <span>Nigeria</span><br>
    <span>08162383712</span><br>
    
    </div>';


    $delivery_method = get_order_delivery_method($orderid);
    $message .= 'delivery Method: ' . $delivery_method;

    if ($delivery_method == "Pickup") {
        $station_id = get_pickup_station_id($orderid);
        $station_location = get_pickup_station_detail($station_id, 'station');

        $message .= ' <br><br><span style="font-weight:bold;">Pickup Delivery</span><br>
    <span>Location: ' . $station_location . '</span><br> ';
    }

    if ($delivery_method == "Door") {

        /*
        $sql2 = "SELECT * FROM ordershippingaddress WHERE orderid='$orderid';";
        $result2 = mysqli_query($conn, $sql2);
        $numrows2 = mysqli_num_rows($result2);
        $row2 = mysqli_fetch_assoc($result2);
        $firstname = $row2['firstname'];
        $lastname = $row2['lastname'];
        $email = $row2['email'];
        $phone = $row2['phone'];
        $additionalphone = $row2['additionalphone'];
        $region = $row2['region'];
        $address1 = $row2['address1'];
        $address2 = $row2['address2'];



        $message .= ' <br><br><span style="font-weight:bold;>Shipping Address:</span><br>
        <span>' . $firstname . ' ' . $lastname . ' 1</span><br>
        <span>' . $phone . ' 2<br>
        <span>' . $email . ' 3</span><br>
        <span>' . $address1 . ' 4</span><br>
        <span>' . $region . ' 5</span>'; */
        $message .= '<span>This delivery will be a door step delivery</span>';
    }





    $message .= '
<br><br>
<p style="color:black;"><b>Regards, ' . $website_name . '</b></p>
</div>
';








    $message .= '</div>
<div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
' . $footer . '
</div>

</body></html>';

    // Sending email
    $send = mail($to, $subject, $message, $headers);

    if ($send) {
        echo "Email sent";
    } else {
        echo "Not sent";
    }
}


send_customer_new_order_email("5edb748676d36", "26677536", "500");


// send welcome email end
