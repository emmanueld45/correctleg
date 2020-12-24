<?php
include 'classes/database.class.php';
include 'classes/products.class.php';
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

            .col-xs-6 {
                width: 45% !important;
            }



            .title {
                width: 100%;
                padding: 10px;
                text-align: center;
                color: crimson;
                font-weight: bold;
                font-size: 30px;
                margin-top: 50px;
            }

            .title-small {
                color: grey;
                font-size: 20px;
                width: 100%;
                padding: 10px;
                text-align: center;
                margin-bottom: 10px;
            }

            .intro-img {
                width: 200px;
                height: auto;
            }

            .get-started-btn {
                padding: 6px;
                border: none;
                border-radius: 3px;
                background-color: crimson;
                color: white;
                font-size: 20px;
                width: 200px;
                text-align: center;
            }

            .how-it-works {
                width: 100%;
                padding: 10px 13px;
                font-size: 22px;
                color: #555;
                text-align: center;
                font-family: 'Roboto', sans-serif !important;
            }

            .how-it-works-message {
                width: 100%;
                margin: auto;
                padding: 10px;
                font-size: 15px;
                color: #555;
                text-align: center;
                font-family: 'Roboto', sans-serif !important;
            }


            .info-container {
                width: 80%;
                display: flex;
                flex-flow: row wrap;
                justify-content: center;

                margin: auto;
                margin-top: 20px;
                background-color: ;
            }

            .info-box {
                width: 95%;
                margin-right: 10px;

                background-color: ;
                box-shadow: 0px 5px 10px lightgrey;
                border-radius: 10px;
                padding: 10px;
            }

            .info-icon {
                width: 100%;
                text-align: center;
                font-size: 40px;
                color: crimson;
                padding: 10px;
            }

            .info-title {
                width: 100%;
                text-align: center;
                font-size: 20px;
                color: #555;
                padding: 10px;
                font-weight: 600;
            }


            .info-message {
                width: 100%;
                padding: 10px;
                font-size: 14px;
                color: slategrey;
                text-align: center;
            }

            .footer-container {
                width: 100%;
                height: 200px;
                background-color: #010b1d;
                margin-top: 40px;
            }

            .footer-title {
                width: 100%;
                padding: 10px;
                color: white;
                font-size: 20px;
                text-align: center;
            }

            .footer-get-started-btn {
                padding: 6px;
                border: none;
                border-radius: 3px;
                background-color: crimson;
                color: white;
                font-size: 20px;
                width: 200px;
                text-align: center;
            }

            .footer-credit {
                width: 100%;
                padding: 10px;
                text-align: center;
                color: white;
                opacity: 0.7;
            }


        }

        /** end of smaller screen **/
























































































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }


            .title {
                width: 100%;
                padding: 10px;
                text-align: center;
                color: crimson;
                font-weight: bold;
                font-size: 30px;
                margin-top: 50px;

            }

            .title-small {
                color: grey;
                font-size: 20px;
                width: 100%;
                padding: 10px;
                text-align: center;
                margin-bottom: 10px;
            }

            .intro-img {
                width: 200px;
                height: auto;
            }

            .get-started-btn {
                padding: 6px;
                border: none;
                border-radius: 3px;
                background-color: crimson;
                color: white;
                font-size: 20px;
                width: 200px;
                text-align: center;
            }

            .how-it-works {
                width: 100%;
                padding: 10px;
                font-size: 22px;
                color: #555;
                text-align: center;
                font-family: 'Roboto', sans-serif !important;
            }

            .how-it-works-message {
                width: 500px;
                margin: auto;
                padding: 10px;
                font-size: 16px;
                color: #555;
                text-align: center;
                font-family: 'Roboto', sans-serif !important;
            }

            .info-container {
                width: 80%;
                display: flex;
                flex-flow: row wrap;
                justify-content: center;

                margin: auto;
                margin-top: 20px;
                background-color: ;
            }

            .info-box {
                width: 30%;
                margin-right: 10px;
                box-shadow: 0px 5px 10px lightgrey;
                border-radius: 10px;
                padding: 10px;
                background-color: ;
            }

            .info-icon {
                width: 100%;
                text-align: center;
                font-size: 40px;
                color: crimson;
                padding: 10px;
            }

            .info-title {
                width: 100%;
                text-align: center;
                font-size: 20px;
                color: #555;
                padding: 10px;
                font-weight: 600;
            }


            .info-message {
                width: 100%;
                padding: 10px;
                font-size: 15px;
                color: slategrey;
                text-align: center;

            }

            .footer-container {
                width: 100%;
                height: 200px;
                background-color: #010b1d;
                margin-top: 40px;
            }

            .footer-title {
                width: 100%;
                padding: 10px;
                color: white;
                font-size: 30px;
                text-align: center;
            }

            .footer-get-started-btn {
                padding: 6px;
                border: none;
                border-radius: 3px;
                background-color: crimson;
                color: white;
                font-size: 20px;
                width: 200px;
                text-align: center;
            }

            .footer-credit {
                width: 100%;
                padding: 10px;
                text-align: center;
                color: white;
                opacity: 0.7;
            }
        }

        /** end of bigger screen **/
    </style>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg - Become a seller</title>

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
    <link rel="stylesheet" href="css/mystyle.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>






    <a href="./" style="position:absolute;top:5px;left:5px;padding:5px;color:crimson;font-weight:bold;font-size:19px;text-shadow:2px 2px 2px lightgrey;">CORRECT<span style="color:black;">LEG</span></a>





    <div class="title">Seller Center</div>
    <div class="title-small">Make money on CorrectLeg</div>
    <div style="width:100%;display:flex;justify-content:center;background-color:;">
        <img src="img/shopping1.svg" class="intro-img">
    </div>

    <a href="new_select_category_info.php">
        <div style="width:100%;padding:10px;display:flex;justify-content:center;">
            <a href="sellers/signup" class="get-started-btn">SIGNUP HERE</a>
        </div>
    </a>

    <div class="how-it-works">Why sell on Correctleg.com?</div>
    <div class="how-it-works-message">
        Correctleg.com is an online marketplace for footwear.<br>
        It connects footwear retailers and wholesalers to buyers with a flexible and organized pick-up and delivery system.
    </div>


    <!-- start of info container -->
    <div class="info-container">


        <!-- first box-->
        <div class="info-box">
            <div class="info-icon"><i class="fa fa-money"></i></div>
            <div class="info-title">Increase in sales</div>
            <div class="info-message">
                We are on a move to be the largest online footwear hub in Africa.
                Hence, we are providing you the opportunity to sell your footwear to millions
                of potential buyers across every city/region in your country.
            </div>
        </div>


        <!-- second box-->
        <div class="info-box">
            <div class="info-icon"><i class="fa fa-level-down"></i></div>
            <div class="info-title">Very low commission</div>
            <div class="info-message">
                Our commission charges on any footwear successfully sold on the platform are very low. There are no hidden charges.
            </div>
        </div>

        <!-- third box-->
        <div class="info-box">
            <div class="info-icon"><i class="fa fa-bus"></i></div>
            <div class="info-title">Fast and safe delivery</div>
            <div class="info-message">
                The safe and timely delivery of your products is one of our major priorities .
                we package the products properly and deliver in record time to enhance
                customer satisfaction and enable constant and increased patronage.
            </div>
        </div>

        <!-- forth box-->
        <div class="info-box">
            <div class="info-icon"><i class="fa fa-lock"></i></div>
            <div class="info-title">Guaranteed security</div>
            <div class="info-message">
                Correctleg.com is a safe and reliable system to buy and sell footwear in Nigeria.
                We have integrated and set up mechanisms that guarantees secured and easy transactions between buyers and sellers.

            </div>
        </div>

        <!-- fifth box-->
        <div class="info-box">
            <div class="info-icon"><i class="fa fa-flag"></i></div>
            <div class="info-title">24 hours feedback/support</div>
            <div class="info-message">
                Our support and customer service teams are available 24 hours to handle your
                feedbacks and ensure you continuously enjoy selling your products on correctleg.com
            </div>
        </div>

        <!-- sixth box-->
        <div class="info-box">
            <div class="info-icon"><i class="fa fa-users"></i></div>
            <div class="info-title">Enchanced visibility</div>
            <div class="info-message">
                With our unique seller’s code for every verified seller,
                it’s a lot easier now for sellers to enhance their brand and products visibility.
            </div>
        </div>

    </div>
    <!-- end of info container -->




    <!-- start of footer container-->
    <div class="footer-container">

        <div class="footer-title">WHAT ARE YOU WAITING FOR?</div>
        <div style="width:100%;padding:10px;display:flex;justify-content:center;">
            <a href="sellers/signup" class="footer-get-started-btn">SIGNUP HERE</a>
        </div>

        <div class="footer-credit">All right reserved.. CorrectLeg</div>


    </div>
    <!-- end of footer container --->





    <br>
    <div class="how-it-works"><u>HOW IT WORKS?</u></div>

    <!-- start of info container -->
    <div class="info-container">


        <!-- first box-->
        <div class="info-box">
            <div class="info-icon"><i class="fa fa-user-plus"></i></div>
            <div class="info-title">Sign Up</div>
            <div class="info-message">
                Signup as a seller on correctleg.com by clicking the get started button on this page
            </div>
        </div>


        <!-- second box-->
        <div class="info-box">
            <div class="info-icon"><i class="fa fa-upload"></i></div>
            <div class="info-title">Upload Items</div>
            <div class="info-message">
                Add any foot wear items you want to sell to your online store on Correctleg
            </div>
        </div>

        <!-- third box-->
        <div class="info-box">
            <div class="info-icon"><i class="fa fa-envelope"></i></div>
            <div class="info-title">Get Orders</div>
            <div class="info-message">
                Start receiving orders.. We handle the delivery for you. All you have to do is get your item ready.
            </div>
        </div>

    </div>
    <!-- end of info container -->




















































    <!-- footer start -->
    <?php include 'footer.php'; ?>
    <!-- footer end -->


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