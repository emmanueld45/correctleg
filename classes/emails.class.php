<?php
class Email
{

    public $website_name = "CorrectLeg";
    public $website_url = "sellers.correctleg.com";
    public  $website_url_http = "https://sellers.correctleg.com";
    public $site_logo = "img/correctleg-logo.png";

    /*** send  customer welcome email start ***/
    public function sendCustomerWelcomeEmail($userid)
    {



        $email_title = ["Welcome to CorrectLeg", "We are delighted to have you - CorrectLeg", "Welcome onboard - CorrectLeg", "You are welcome -    CorrectLeg"];

        global $conn;


        $rand = RAND(0, 3);

        $receiver_firstname = get_customer_detail($userid, "firstname");
        $receiver_lastname = get_customer_detail($userid, "lastname");
        $receiver_email = get_customer_detail($userid, "email");
        // $receiver_email = "emmydanjumbo4@gmail.com";

        $title = $email_title[$rand];
        $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $this->website_name . " | The links in this email will always direct to " . $this->website_url_http . " Learn about email security and online safety. 
   © " . $this->website_name;

        $to =  $receiver_email;
        $subject = $title;
        $from = $this->website_name . ' hello@' . $this->website_url;

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
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $this->website_url_http . '/' . $this->site_logo . '" style="width:100px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Welcome ' . $receiver_firstname . '!</h2>
</div>';

        $message .= '<div style="width:100%;padding:10px;text-align:;">
We specially welcome you to our website ' . $this->website_url . ' your No.1 onine shopping mall for foot wear products.
<br>
We connect with sellers around the nation and hand pick the best sellers with good quality products just to serve you better.
<br><br>
Below are some links to help you walk around our website!.


<div style="width:100%;display: flex;justify-content:center ;margin-top: 10px;margin-bottom: 10px;">
<a href="' . $this->website_url_http . '" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Visit website</a>
<br>
<a href="' . $this->website_url_http . '/customers/login" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Login Account</a>


</div>

<br><br>
<p style="color:black;"><b>Regards, ' . $this->website_name . '</b></p>
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

    /***** send customer welcome email end ****/






    /*** send seller welcome email start ***/

    public function sendSellerWelcomeEmail($userid)
    {



        $email_title = ["Welcome to CorrectLeg", "We are delighted to have you - CorrectLeg", "Welcome onboard - CorrectLeg", "You are welcome -    CorrectLeg"];

        $rand = RAND(0, 3);

        $receiver_firstname = get_seller_detail($userid, "firstname");
        $receiver_lastname = get_seller_detail($userid, "lastname");
        $receiver_email = get_seller_detail($userid, "email");
        //$receiver_email = "emmydanjumbo4@gmail.com";

        $title = $email_title[$rand];
        $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $this->website_name . " | The links in this email will always direct to " . $this->website_url_http . " Learn about email security and online safety. 
   © " . $this->website_name;

        $to =  $receiver_email;
        $subject = $title;
        $from = $this->website_name . ' hello@' . $this->website_url;

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
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $this->website_url_http . '/' . $this->site_logo . '" style="width:100px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Welcome ' . $receiver_firstname . '!</h2>
</div>';

        $message .= '<div style="width:100%;padding:10px;text-align:;">
You have made the right choice to join ' . $this->website_name . ' as a seller.
<br>
Correctleg sellers have a better advantage in selling to a wider audience all around the Nation, as we do all the hard work for you.. Like packaging, delivering and customer service management.

<br><br>
Below are some useful links to help you get started!.


<div style="width:100%;display: flex;justify-content:center;margin-top: 10px;margin-bottom: 10px;">
<a href="' . $this->website_url_http . '" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Visit website</a>
<br>
<a href="' . $this->website_url_http . '/sellers/login?referral=welcome_email" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Login Account</a>


</div>

<br><br>
<p style="color:black;"><b>Regards, ' . $this->website_name . '</b></p>
</div>
';








        $message .= '</div>
<div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
' . $footer . '
</div>

</body></html>';

        // Sending email
        $send = mail($to, $subject, $message, $headers);

        // if ($send) {
        //     echo "Email sent";
        // } else {
        //     echo "Not sent";
        // }
    }


    /**** send seller welcome email end ***/





    /*** send customer new order email start ***/

    public function sendCustomerNewOrderEmail($orderid, $shipping_fee)
    {



        $email_title = ["Your Order was received", "You placed an Order - CorrectLeg", "We received your Order - CorrectLeg", "Your Order has been confirmed -    CorrectLeg"];

        global $conn;


        $rand = RAND(0, 3);

        $receiver_firstname = $_SESSION['order_firstname'];
        $receiver_lastname = $_SESSION['order_lastname'];
        $receiver_email = $_SESSION['order_email'];
        $receiver_email = "emmydanjumbo4@gmail.com";


        $receiver_region = $_SESSION['order_region'];
        $receiver_address1 = $_SESSION['order_address1'];
        $receiver_phone = $_SESSION['order_phone'];

        $title = $email_title[$rand];
        $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $this->website_name . " | The links in this email will always direct to " . $this->website_url_http . " Learn about email security and online safety. 
   © " . $this->website_name;

        $to =  $receiver_email;
        $subject = $title;
        $from = $this->website_name . ' hello@' . $this->website_url;

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
                <div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $this->website_url_http . '/' . $this->site_logo . '" style="width:200px;height:auto;"></div>


                <div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Hey ' . $receiver_firstname . '!</h2>
                </div>';


        $message .= '<div style="width:100%;padding:10px;text-align:;">
                Thank you for your order from ' . $this->website_name . '. Once your package ships we will send you a notification email and sms.

                <br><br>
                If you have any questions about your order, you can email us at <a href="#">support@' . $this->website_url . '</a>

                <br><br>
                <span style="font-weight:bold;font-size:30px;>Your Order id: ' . $orderid . '</span>
                <br><br>';

        // table start
        $message .= '
                <div style="width:100%;background-color:#eee;margin-top:10px;margin-bottom:10px;">
                
                <table style="background-color:#eee;">
                
                <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Image</th>
                <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Name</th>
                <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Size</th>
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
            $size = $row['size'];
            $howmany = $row['howmany'];
            $total_price = $price * $howmany;

            $total_price_general += $total_price;

            $message .= '

            <tr style="margin-top:10px;margin-bottom:10px;">
            <td><img src="' . $this->website_url_http . '/' . $image . '" style="width:100px;height:100px;"></td>
            <td>' . $name . '</td>
            <td>' . $size . '</td>
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
            <span>' . $receiver_firstname . ' ' . $receiver_lastname . '</span><br>
            <span>' . $receiver_address1 . '</span><br>
            <span>Nigeria</span><br>
            <span>' . $receiver_phone . '</span><br>
            
            </div>';


        $delivery_method = get_order_delivery_method($orderid);
        $message .= 'delivery Method: ' . $delivery_method;

        // if ($delivery_method == "Pickup") {
        //     $station_id = get_pickup_station_id($orderid);
        //     $station_location = get_pickup_station_detail($station_id, 'station');

        //     $message .= ' <br><br><span style="font-weight:bold;">Pickup Delivery</span><br>
        //     <span>Location: ' . $station_location . '</span><br> ';
        // }

        if ($delivery_method == "Door step delivery") {


            $sql2 = "SELECT * FROM ordershippingaddress WHERE orderid='$orderid';";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);


            $message .= '
            ' . $row2['firstname'] . ' ' . $row2['lastname'] . ' <br>
            ' . $row2['email'] . ' <br>
            ' . $row2['phone'] . '<br>
            ' . $row2['additionalphone'] . ' <br>
            ' . $row2['address1'] . ' <br>
            ' . $row2['address2'] . ' <br>
             ' . $row2['region'] . '
            ';



            $message .= ' <br><br><span style="font-weight:bold;>Shipping Address:</span><br>
        <span>This order will be shipped to the address you provided on checkout page.</span><br>
        ';
            // $message .= '<span>This delivery will be a door step delivery</span>';
        }





        $message .= '
<br><br>
<p style="color:black;"><b>Regards, ' . $this->website_name . '</b></p>
</div>
';








        $message .= '</div>
<div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
' . $footer . '
</div>

</body></html>';

        // Sending email
        $send = mail($to, $subject, $message, $headers);

        // if ($send) {
        //     echo "Email sent";
        // } else {
        //     echo "Not sent";
        // }
    }


    //send_customer_new_order_email("5edb748676d36", "26677536", "500");


    /*** send customer new order email end ***/












    /***  send seller new order email start ***/

    public function sendSellerNewOrderEmail($orderid)
    {


        $email_title = ["New Order received", "Money is calling - CorrectLeg", "New order on your product - CorrectLeg", "Your product has been ordered -    CorrectLeg"];

        global $conn;
        $admin = new Admin();
        global $seller;
        global $product;

        $rand = RAND(0, 3);



        $sellers_array = $_SESSION['sellers_array'];

        foreach ($sellers_array as $sellers) {
            $sellerid = $sellers['seller_id'];
            $item_id = $sellers['item_id'];

            $receiver_firstname = $seller->getDetail($sellerid, "firstname");
            $receiver_lastname = $seller->getDetail($sellerid, "lastname");
            $receiver_phone = $seller->getDetail($sellerid, "phone");
            $receiver_email = $seller->getDetail($sellerid, "email");
            $receiver_email = "emmyceo123@gmail.com";
            $receiver_phone = "8162383712";

            // send seller SMS notification
            $admin->sendSellerOrderSms("234" . $receiver_phone);
            $admin->sendAdminOrderSms($receiver_phone);

            $title = $email_title[$rand];
            $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $this->website_name . " | The links in this email will always direct to " . $this->website_url_http . " Learn about email security and online safety. 
             © " . $this->website_name;

            $to =  $receiver_email;
            $subject = $title;
            $from = $this->website_name . ' hello@' . $this->website_url;

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
                <div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $this->website_url_http . '/' . $this->site_logo . '" style="width:200px;height:auto;"></div>


                <div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Hello ' . $receiver_firstname . '!</h2>
                </div>';


            $message .= '<div style="width:100%;padding:10px;text-align:;">
                Your item has been Ordered on ' . $this->website_url . '.

                <br><br>
                Kindly email us immediately at <a href="#">support@' . $this->website_url . '</a> OR call our phone line <a href="">08162383712</a> 
                to quickly proccess this order and get you some cash.

                <br><br>
                <span style="font-weight:bold;font-size:30px;>OrderID: ' . $orderid . '</span>
                <br><br>';

            // table start
            $message .= '
                <div style="width:100%;background-color:#eee;margin-top:10px;margin-bottom:10px;">
                
                <table style="background-color:#eee;">
                
                <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Image</th>
                <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Name</th>
                <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Size</th>
                <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">price</th>
                <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Quantity</th>
                <th style="background-color:crimson;color:white;padding:5px;margin-bottom:5px;">Total price</th>
                ';

            // get customer ordered products
            $sql = "SELECT * FROM orderproducts WHERE sellerid='$sellerid' AND orderid='$orderid';";
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
                $name = get_item_detail($item_id, 'name');
                $price = $row['price'];
                $size = $row['size'];
                $howmany = $row['howmany'];
                $total_price = $price * $howmany;

                $total_price_general += $total_price;

                $message .= '

                <tr style="margin-top:10px;margin-bottom:10px;">
                <td><img src="' . $this->website_url_http . '/' . $image . '" style="width:100px;height:100px;"></td>
                <td>' . $name . '</td>
                <td>' . $size . '</td>
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
                <td><span style="font-weight:bold;">Total</td>
                <td><span>N</span>' . number_format($total_price_general) . '</td>
                </tr>
                
                
                
                
                
                
                
                </table>
                
                </div>
                <br>
                ';
            // table end 

            $message .= 'Kindly Contact us immediately you get this email so we can help you proccess this order.';






            $message .= '
            <br><br>
            <p style="color:black;"><b>Regards, ' . $this->website_name . '</b></p>
            </div>
            ';








            $message .= '</div>
                <div style="width:100%;text-align:center;font-size: 12px;color:rgb(100, 100, 100);padding:10px;">
                ' . $footer . '
                </div>

                </body></html>';

            // Sending email
            $send = mail($to, $subject, $message, $headers);

            // if ($send) {
            //     echo "Email sent";
            // } else {
            //     echo "Not sent";
            // }
        }
    }




    /**** send seller new order email end ****/








    /*** send  customer recover password email start ***/
    public function sendSellerRecoverPasswordEmail($email)
    {





        $email_title = ["Password recovery", "Get back in! - CorrectLeg", "You forgot you password? - CorrectLeg", "Lets help you get back in -    CorrectLeg"];

        global $conn;


        $rand = RAND(0, 3);

        $sql = "SELECT * FROM sellers WHERE email='$email';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $userid = $row['uniqueid'];

        $key = create_recover_password_key($email);

        $receiver_firstname = get_seller_detail($userid, "firstname");
        $receiver_lastname = get_seller_detail($userid, "lastname");
        $receiver_email = get_seller_detail($userid, "email");
        // $receiver_email = "emmydanjumbo4@gmail.com";

        $title = $email_title[$rand];
        $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $this->website_name . " | The links in this email will always direct to " . $this->website_url_http . " Learn about email security and online safety. 
   © " . $this->website_name;

        $to =  $receiver_email;
        $subject = $title;
        $from = $this->website_name . ' hello@' . $this->website_url;

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
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $this->website_url_http . '/' . $this->site_logo . '" style="width:100px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Hey ' . $receiver_firstname . '!</h2>
</div>';

        $message .= '<div style="width:100%;padding:10px;text-align:;">
We noticed you applied for a password recovery on ' . $this->website_url . '
<br>
To recovery your password please click the link below to reset a new password!
<br><br>


<div style="width:100%;display: flex;justify-content:center ;margin-top: 10px;margin-bottom: 10px;">
<a href="' . $this->website_url_http . '/customers/update-new-password.php?key=' . $key . '&email=' . $email . '" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Visit website</a>
<br>


</div>

<br><br>
<p style="color:black;"><b>Regards, ' . $this->website_name . '</b></p>
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



    /***** send seller recover password email end ****/










    /*** send  customer recover password email start ***/
    public  function sendCustomerRecoverPasswordEmail($email)
    {




        $email_title = ["Password recovery", "Get back in! - CorrectLeg", "You forgot you password? - CorrectLeg", "Lets help you get back in -    CorrectLeg"];

        global $conn;


        $rand = RAND(0, 3);

        $sql = "SELECT * FROM customers WHERE email='$email';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $userid = $row['uniqueid'];

        $key = create_recover_password_key($email);

        $receiver_firstname = get_customer_detail($userid, "firstname");
        $receiver_lastname = get_customer_detail($userid, "lastname");
        $receiver_email = get_customer_detail($userid, "email");
        // $receiver_email = "emmydanjumbo4@gmail.com";

        $title = $email_title[$rand];
        $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $this->website_name . " | The links in this email will always direct to " . $this->website_url_http . " Learn about email security and online safety. 
   © " . $this->website_name;

        $to =  $receiver_email;
        $subject = $title;
        $from = $this->website_name . ' hello@' . $this->website_url;

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
<div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $this->website_url_http . '/' . $this->site_logo . '" style="width:100px;height:auto;"></div>


<div style="padding: 10px;width:100%;text-align:center;"><h2 style="color:black;">Hey ' . $receiver_firstname . '!</h2>
</div>';

        $message .= '<div style="width:100%;padding:10px;text-align:;">
We noticed you applied for a password recovery on ' . $this->website_url . '
<br>
To recovery your password please click the link below to reset a new password!
<br><br>


<div style="width:100%;display: flex;justify-content:center ;margin-top: 10px;margin-bottom: 10px;">
<a href="' . $this->website_url_http . '/sellers/update-new-password.php?key=' . $key . '&email=' . $email . '" style="margin-bottom:10px;width:100%;padding:10px; background:white;color:crimson;border:none;border-radius: 4px;box-shadow: 0px 2px 4px;font-size: 17px;border:2px solid crimson;">Visit website</a>
<br>


</div>

<br><br>
<p style="color:black;"><b>Regards, ' . $this->website_name . '</b></p>
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



    /**** send customer recover password email end ****/



























    /***  send seller new order email start ***/

    public function sendCustomerReceiptEmail($orderid, $item_id)
    {


        // $email_title = ["New Order received", "Money is calling - CorrectLeg", "New order on your product - CorrectLeg", "Your product has been ordered -    CorrectLeg"];
        $email_title = "Your CorrectLeg Order $orderid";
        global $conn;
        $admin = new Admin();
        global $seller;
        global $product;
        global $db;

        $rand = RAND(0, 3);



        // $result = $db->setQuery("SELECT * FROM ordercustomerdetails WHERE orderid='$orderid';");
        // $row = mysqli_fetch_assoc($result);

        // $receiver_firstname = $row['firstname'];
        // $receiver_lastname = $row['lastname'];
        // $receiver_email = $row['email'];
        $receiver_firstname = "John";
        $receiver_lastname = "Doe";
        $receiver_email = "emmyceo123@gmail.com";


        $title = $email_title;
        $footer = "This email was intended for <span>$receiver_firstname $receiver_lastname</span>, because you signed on " . $this->website_name . " | The links in this email will always direct to " . $this->website_url_http . " Learn about email security and online safety. 
              © " . $this->website_name;

        $to =  $receiver_email;
        $subject = $title;
        $from = $this->website_name . ' hello@' . $this->website_url;

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
                 <style>
                 .main-area{
                    width:100%;
                    height:300px;
                    border:1px solid lightgrey;
                 }

                 .main-area .top-banner{
                     width:100%;
                     height:100px;
                 }

                 .main-area  .categories{
                    width:100%;
                    border-top:1px solid lightgrey;
                    border-bottom:1px solid lightgrey
                    padding:5px 5px;
                 }

                 .main-area  .categories a{
                     color:grey;
                 

                 </style>
                 </head>
                 <body style="">';

        // main container start


        $message .= "
        
        <section class='main-area'>

          

           <table class='categories'>
             <thead>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
             <thead>
           <tbody>
             <tr>
               <td><a class='box' href='" . $this->website_url_http . "/cat?item_is_for=All'>All</a></td>
               <td><a class='box' href='" . $this->website_url_http . "/cat?item_is_for=Men'>Men</a></td>
               <td><a class='box' href='" . $this->website_url_http . "/cat?item_is_for=Women'>Women</a></td>
               <td><a class='box' href='" . $this->website_url_http . "/cat?item_is_for=Kids'>Kids</a></td>
             </tr>
           </tbody>
          </table>




        </section>
        
        ";


        $message .= '
                 </body></html>';

        // Sending email
        $send = mail($to, $subject, $message, $headers);

        if ($send) {
            echo "Email sent";
        } else {
            echo "Not sent";
        }
    }




    /**** send customer receipt email end ****/
}

$email = new Email();
