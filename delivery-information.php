<?php
session_start();
include 'dbconn.php';
include 'functions.php';

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


            .login-btn {
                display: block;
                font-size: 19px;
                color: crimson;
                height: 35px;

                line-height: 33px;
                text-align: center;
                border: 1px solid crimson;
                cursor: pointer;
                position: absolute;
                right: 15px;
                top: 22px;
                padding-right: 5px;
                padding-left: 5px;
            }

            .humberger__open {
                display: none !important;
            }

            .head-container {
                width: 90%;
                margin: auto;
                padding: 10px;
                font-weight: bold;
                font-size: 20px;
                text-align: center;
                font-family: Arial, Helvetica, sans-serif;
                border-bottom: 1px solid lightgrey;
                margin-bottom: 10px;
            }

            .main-content-area {
                width: 90%;
                margin: auto;
                padding: 10px;
                font-family: Arial, Helvetica, sans-serif;

            }

            .header-title {
                font-family: Arial, Helvetica, sans-serif;
                color: crimson;
                margin-bottom: 10px;
            }

            .header-title-small {
                font-family: Arial, Helvetica, sans-serif;
                color: crimson;
                margin-bottom: 10px;
                font-size: 15px;
            }


            .para {
                line-height: 1.9;
                font-family: Arial, Helvetica, sans-serif;
            }

            .sub-section {
                width: 90%;
                padding: 10px;
                background-color: #eee;
                float: right;
                margin-bottom: 50px;

            }

        }

        /** end of smaller screen **/















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .login-btn {
                display: none;
            }

            .head-container {
                width: 90%;
                margin: auto;
                padding: 10px;
                font-weight: bold;
                font-size: 30px;
                text-align: center;
                font-family: Arial, Helvetica, sans-serif;
                border-bottom: 1px solid lightgrey;
                margin-bottom: 10px;
            }

            .main-content-area {
                width: 75%;
                margin: auto;
                padding: 10px;
                font-family: Arial, Helvetica, sans-serif;

            }

            .header-title {
                font-family: Arial, Helvetica, sans-serif;
                color: crimson;
                margin-bottom: 10px;
            }

            .header-title-small {
                font-family: Arial, Helvetica, sans-serif;
                color: crimson;
                margin-bottom: 10px;
                font-size: 17px;
            }


            .para {
                line-height: 1.9;
                font-family: Arial, Helvetica, sans-serif;
            }

            .sub-section {
                width: 90%;
                padding: 10px;
                background-color: #eee;
                float: right;
                margin-bottom: 50px;

            }

        }

        /** end of bigger screen **/
    </style>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg - Delivery Information</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <!-- <link rel="stylesheet" href="css/nice-select.css" type="text/css" /> -->
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/mystyle.css" type="text/css" />
    <link rel="stylesheet" href="css/cart.css" type="text/css" />
</head>

<body style="font-family: Arial, Helvetica, sans-serif !important;">
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>







    <!-- header start -->
    <?php include 'header.php'; ?>
    <!-- header end -->


    <!-- start of head container -->
    <div class="head-container">
        Delivery Information
    </div>
    <!-- end of head container -->


    <!-- main content area start -->
    <div class="main-content-area">

        <br>
        <h4 class="header-title">1. General information</h4>

        <p class="para">All orders are subject to product availability. If an item is not in stock at the time you place your order,
            we will notify you and refund you the total amount of your order, using the original method of payment. </p>


        <br>
        <h4 class="header-title">2. Deivery Location</h4>

        <p class="para">Items offered on our website are only available for delivery to addresses in Nigerian state where we are currently operating.
            Any shipments outside of Nigerian states are not available at this time.</p>


        <br>
        <h4 class="header-title">3. Deivery Time</h4>

        <p class="para">Unless there are exceptional circumstances,
            we make every effort to fulfill your order within 24 – 48 hours of the date of your order.
            Please note we do not ship or deliver on Sundays. </p>

        <p class="para">Delivery times are to be used as a guide only and are subject to the acceptance and approval of your order.
        </p>


        <br>
        <h4 class="header-title">4. Deivery Instructions</h4>

        <p class="para">It is important that you provide us with accurate information while
            making your orders to enable us to deliver your product seamlessly. </p>


        <br>
        <h4 class="header-title">5. Shipping Costs</h4>

        <p class="para">Shipping costs are based on the location difference of the seller and the buyer. </p>

        <p class="para">Additional shipping charges may apply to remote areas or for large or heavy items.
            You will be advised of any charges on the checkout page. </p>

        <p class="para">Sales tax is charged accordingly. </p>





        <br>
        <h4 class="header-title">6. Damaged items in transport</h4>

        <p class="para">If there is any damage to the packaging on delivery, contact us immediately </p>

        <br>
        <h4 class="header-title">7. Questions</h4>

        <p class="para">If you have any questions about the delivery and shipment or your order, please contact us immediately. </p>




    </div>
    <!-- main content area end -->



    <!-- footer start -->

    <?php include 'footer.php'; ?>
    <!-- footer end -->
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/jquery.nice-select.min.js"></script> -->
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <!-- <script src="js/mixitup.min.js"></script> -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>

    <script>


    </script>
</body>

</html>