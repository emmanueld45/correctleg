<?php
session_start();
include 'dbconn.php';
include 'functions.php';

if (!isset($_SESSION['order_id'])) {
    echo '<script>
    window.location.href="index.php";
    </script>';
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        /** start of other stylings **/

        /** end of other stylings **/

        /** start of  smaller screen*/
        @media only screen and (max-width: 690px) {
            .desktop-view-container {
                display: none;
            }

            .main-area-container {
                margin-top: 50px;
            }

            .status-img {
                width: 100px;
                height: 100px;
            }

            .thank-you-text {
                width: 100%;
                padding: 10px;
                font-weight: 600;
                color: mediumseagreen;
                font-size: 25px;
                text-align: center;
            }

            .order-message {
                width: 80%;
                margin: auto;
                padding: 10px;
                text-align: center;
            }

            .continue-shopping-btn {
                padding: 7px;
                background-color: crimson;
                color: white;
                border: none;
            }

            .address-details-container {
                width: 90%;
                margin: auto !important;
                margin-top: 50px !important;
                padding: 10px !important;

            }

            label {
                font-weight: bold;
                font-size: 15px;
            }

            .whatsapp-btn {

                padding: 8px;
                padding-left: 20px;
                padding-right: 20px;
                background-color: white;
                border: 1px solid green;
                color: green;
                border-radius: 50px;
            }

            .whatsapp-btn:hover {
                color: green;
            }

            .whatsapp-icon {
                width: 40px;
                height: 40px;
            }
        }

        /** end of smaller screen **/














































































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .main-area-container {
                margin-top: 50px;
            }

            .status-img {
                width: 100px;
                height: 100px;
            }

            .thank-you-text {
                width: 100%;
                padding: 10px;
                font-weight: 600;
                color: mediumseagreen;
                font-size: 25px;
                text-align: center;
            }

            .order-message {
                width: 80%;
                margin: auto;
                padding: 10px;
                text-align: center;
            }

            .continue-shopping-btn {
                padding: 7px;
                background-color: crimson;
                color: white;
                border: none;
            }

            .address-details-container {
                width: 50%;
                margin: auto !important;
                margin-top: 50px !important;
                padding: 10px !important;

            }

            label {
                font-weight: bold;
                font-size: 15px;
            }

            .whatsapp-btn {

                padding: 8px;
                padding-left: 20px;
                padding-right: 20px;
                background-color: white;
                border: 1px solid green;
                color: green;
                border-radius: 50px;
            }

            .whatsapp-btn:hover {
                color: green;
            }

            .whatsapp-icon {
                width: 40px;
                height: 40px;
            }
        }

        /** end of bigger screen **/
    </style>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg - Order Status</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>




    <div class="main-area-container">



        <div style="width:100%;display:flex;justify-content:center;">
            <img src="img/goodsign1.png" class="status-img">
        </div>

        <div class="thank-you-text">Thank you!</div>

        <div class="order-message">
            Your order id is :<span style="font-weight:600;"><?php echo $_SESSION['order_id']; ?></span><br>
            We'll email you an order confirmation with details about your Order.
            <br><br>
            You can easily send us a message on whatsapp for further enquiries
        </div>

        <?php
        $chat_phone = 2348162383712;
        $chat_text_normal = "Hello, my name is " . $_SESSION['order_firstname'] . ", I just placed an Order and my order ID is: " . $_SESSION['order_id'] . "";
        $chat_text = urlencode($chat_text_normal);
        ?>
        <div style="width:100%;display:flex;justify-content:center;margin-bottom:10px;">
            <a href="https://wa.me/<?php echo $chat_phone; ?>?text=<?php echo $chat_text; ?>" class="whatsapp-btn"><img src="img/whatsapp-logo.png" class="whatsapp-icon"> Send Message</a>
        </div>

        <a href="./" style="color:inherit">
            <div style="width:100%;display:flex;justify-content:center;">
                <button class="continue-shopping-btn">CONTINUE SHOPPING <i class="fa fa-angle-double-right"></i></button>
            </div>
        </a>







        <!-- billing or shipping address -->
        <div class="row address-details-container">


            <div class="col-sm-6 mb-3">
                <div class="card">
                    <div class="card-header" style="width:100%;font-weight:600;text-align:center;font-weight:20px;">Personal details</div>
                    <div class="card-body">
                        <label>Name:</label><br>
                        <span><?php echo $_SESSION['order_firstname'] . " " . $_SESSION['order_lastname']; ?></span><br>
                        <label>Email Address:</label><br>
                        <span><?php echo $_SESSION['order_email'];; ?></span><br>
                        <label>Phone:</label><br>
                        <span><?php echo $_SESSION['order_phone']; ?></span><br>
                        <label>Additional Phone:</label><br>
                        <span><?php echo $_SESSION['order_additionalphone']; ?></span>
                    </div>
                </div>
            </div>


            <div class="col-sm-6">

                <div class="card">
                    <div class="card-header" style="width:100%;font-weight:600;text-align:center;font-weight:20px;">Address details</div>
                    <div class="card-body">
                        <?php
                        // if ($_SESSION['delivery_method'] == "Pickup") {

                        //     $pickup_station_address =  $_SESSION['pickup_station_address'];

                        //     echo "<label>Pickup Location:</label><br>
                        //     <span>$pickup_station_address</span><br>";
                        // }
                        ?>
                        <?php
                        $shipping_fee =  $_SESSION['order_shipping_fee'];
                        echo "<label>Shipping Fee:</label><br>
                            <span><span>&#8358</span>" . number_format($shipping_fee) . "</span><br><br>";

                        ?>
                        <label>Address 1:</label><br>
                        <span><?php echo $_SESSION['order_address1']; ?></span><br>
                        <label>Address 2:</label><br>
                        <span><?php echo $_SESSION['order_address2']; ?></span><br>
                        <label>Phone:</label><br>
                        <span><?php echo $_SESSION['order_phone']; ?></span><br>
                        <label>Additional Phone:</label><br>
                        <span><?php echo $_SESSION['order_additionalphone']; ?></span>
                    </div>
                </div>

            </div>


        </div>








    </div>























































    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>