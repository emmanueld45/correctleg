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
    <title>Correct Leg - Return Policy</title>

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
        Return Policy
    </div>
    <!-- end of head container -->


    <!-- main content area start -->
    <div class="main-content-area">


        <br>
        <h4 class="header-title">1. Returns</h4>

        <p class="para">Correctlegs accept returns. You can return unopened items in the original packaging
            within 48 hours of your purchase with receipt or proof of purchase.
            If 48 hours or more have passed since your purchase, we cannot offer you a refund or an exchange. </p>


        <p class="para">Upon receipt of the returned item, we will fully examine it and notify you via email,
            within a reasonable period of time, whether you are entitled to a return. If you are entitled to a return,
            we will refund your purchase price and a credit will automatically be applied to your original method of payment.</p>


        <p class="para">To follow-up on the status of your return, please contact us. </p>











        <br>
        <h4 class="header-title">2. Exchanges</h4>

        <p class="para">Correctleg only exchange goods if they are defective or damaged.
            In circumstances where you consider that a product is defective, you should promptly contact us with details of the product and the defect.
            You can send the item you consider defective to us.</p>


        <p class="para">Upon receipt of the returned product, we will fully examine it and notify you via e-mail,
            within a reasonable period of time, whether you are entitled to a replacement as a result of the defect.
            If you are eligible, we will send you a replacement product. </p>




        <br>
        <h4 class="header-title">3. Exceptions</h4>

        <p class="para">Some items are non-refundable and non-exchangeable</p>


        <br>
        <h4 class="header-title">4. Shipping</h4>

        <p class="para">To return the item you purchased, please contact us immediately.</p>


        <p class="para">Refunds do not include any shipping and handling charges shown on the packaging slip or invoice.
            Shipping charges for all returns must be prepaid and insured by you.
            Correctleg do not guarantee that we will receive your returned item. Shipping and handling charges are not refundable.
            Any amounts refunded will not include the cost of shipping.
        </p>


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
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>

    <script>


    </script>
</body>

</html>