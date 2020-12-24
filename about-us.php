<?php
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


            .hero__categories {
                display: none;
            }

            .hero__search__form {
                display: none;
            }

            .hero__search__phone {
                display: none;
            }






            .vision-section-container {
                width: 90%;

                margin: auto;
                display: flex;
                flex-flow: row wrap;
                box-shadow: 2px 4px 8px lightgrey;
                margin-top: 15px;
                margin-bottom: 10px;
            }

            .vision-section-left {
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
            }

            .vision-section-img {
                width: 120px;
                height: 120px;
            }

            .vision-section-right {
                width: 100%;
                padding: 10px;
                background-color: crimson;
            }

            .vision-section-header {
                font-weight: ;
                font-size: 25px;
                color: orange;
                padding: 10px;
            }

            .vision-section-message {
                width: 100%;
                padding: 10px;
                color: white;
                font-size: 18px;
            }



            .you-should-know-section {
                width: 90%;

                margin: auto;
                border: 1px solid #eee;
                margin-top: 10px;
                margin-bottom: 10px;

            }


            .you-should-know-icon {
                width: 50px;
                height: 50px;
                border-radius: 50px;
                border: 1px solid crimson;
                color: crimson;
                font-size: 30px;
            }

            .you-should-know-header {
                width: 100%;
                padding: 10px;
                color: black;
                font-weight: bold;
                text-align: center;
                font-size: 20px;
            }
















            .core-values-section {
                width: 90%;

                margin: auto;
                border: 1px solid #eee;
                margin-top: 10px;
                margin-bottom: 10px;

            }


            .core-values-icon {
                width: 50px;
                height: 50px;
                border-radius: 50px;
                border: 1px solid crimson;
                color: crimson;
                font-size: 30px;
                background-color: white;
            }

            .core-values-header {
                width: 100%;
                padding: 10px;
                color: black;
                font-weight: bold;
                text-align: center;
                font-size: 20px;
            }

            .core-values-sub-header {
                font-weight: 600;
                font-size: 18px;
                color: crimson;
            }

            a:hover {
                color: crimson;
            }

        }

        /** end of smaller screen **/















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {

            .login-btn {
                display: none;
            }


            .vision-section-container {
                width: 90%;

                margin: auto;
                display: flex;
                flex-flow: row wrap;
                box-shadow: 2px 4px 8px lightgrey;
                margin-top: 15px;
                margin-bottom: 10px;
            }

            .vision-section-left {
                width: 40%;
                padding: 10px;
                display: flex;
                justify-content: center;
            }

            .vision-section-img {
                width: 200px;
                height: 200px;
            }

            .vision-section-right {
                width: 60%;
                padding: 10px;

            }

            .vision-section-header {
                font-weight: ;
                font-size: 25px;
                color: orange;
                padding: 10px;
            }

            .vision-section-message {
                width: 100%;
                padding: 10px;

                font-size: 18px;
            }



            .you-should-know-section {
                width: 45%;

                margin: auto;
                border: 1px solid crimson;
                margin-top: 10px;
                margin-bottom: 10px;
                margin-right: 10px;

            }

            .you-should-know-header-box {
                background-color: crimson;
            }


            .you-should-know-icon {
                width: 50px;
                height: 50px;
                border-radius: 50px;
                border: 1px solid crimson;
                color: crimson;
                font-size: 30px;
                background-color: white;
            }

            .you-should-know-header {
                width: 100%;
                padding: 10px;
                color: black;
                font-weight: bold;
                text-align: center;
                font-size: 20px;
            }
















            .core-values-section {
                width: 45%;

                margin: auto;
                border: 1px solid crimson;
                margin-top: 10px;
                margin-bottom: 10px;

            }


            .core-values-icon {
                width: 50px;
                height: 50px;
                border-radius: 50px;
                border: 1px solid crimson;
                color: crimson;
                font-size: 30px;
            }

            .core-values-header-box {
                background-color: crimson;
            }

            .core-values-header {
                width: 100%;
                padding: 10px;
                color: black;
                font-weight: bold;
                text-align: center;
                font-size: 20px;
            }

            .core-values-sub-header {
                font-weight: 600;
                font-size: 18px;
                color: crimson;
            }

            a:hover {
                color: crimson;
            }

            .cont {
                width: 80%;
                margin: auto !important;
            }
        }

        /** end of bigger screen **/
    </style>


    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CorrectLeg | About Us</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/mystyle.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>


    <!-- header start -->
    <?php include 'header.php'; ?>
    <!-- header end -->



    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/footbanner1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>About Us</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>About Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->




    <!-- vision section start -->
    <div class="vision-section-container">

        <div class="vision-section-left">
            <img src="img/correctleg-logo.png" class="vision-section-img">
        </div>

        <div class="vision-section-right">
            <div class="vision-section-header">Our Vision</div>
            <div class="vision-section-message">
                To become the largest, most trusted and convenient footwear shopping online-platform for Africans.
            </div>

            <div class="vision-section-header">Our Mission</div>
            <div class="vision-section-message">
                We strive to be the continent’s most customer-centric online footwear retailing and wholesaling platform
                to offer our customers the most affordable prices, numerous options of quality footwear while giving satisfying,
                convenient and ensuring enormous profitability for our sellers.
            </div>
        </div>


    </div>
    <!-- vision section end -->


    <div class="container-fluid">
        <div class="row cont">

            <!-- you should know start -->
            <div class="you-should-know-section">

                <div class="you-should-know-header-box" style="width:100%;padding:10px;display:flex;justify-content:center;">
                    <button class="you-should-know-icon"><i class="fa fa-info"></i></button>
                </div>

                <div class="you-should-know-header">You should know that</div>

                <div style="padding:10px;">

                    <p>Correctleg.com is Nigeria’s largest online mall for footwear; we came into the space in 2020.
                        Correctleg.com has created a unique platform that will make easier for footwear retailers, wholesalers, distributors,
                        local and international shoemakers to reach out to retail and wholesale customer base that is steadily growing. </p>

                    <p>We offer everything footwear, be it shoes, sandals, slippers, safety shoes, sporting shoes etc.
                        we cater for everyone; every class. We have designed our operational system to focus on optimum customer
                        service that’s hinged on ensuring convenient and innovative footwear online shopping experience. </p>


                    <p>When we say we are correctleg, we mean we guarantee you of good quality foot wear at affordable prices,
                        variety of excellent and top-brand of foot wears policy and top-notch customer service support.
                        We have well-structured projects/ programs that
                        is geared towards improving our society such as the one- pad project and build the boychild project.</p>


                    <p>The only thing that matters to us most is our customers’ satisfaction and attracting profits to all sellers on our platform.
                        We welcome feedbacks and reviews to help us serve you better. </p>

                    <p>Reach us at: <a href="">feedback@correctleg.com </a></p>

                    <p>Thank you and we hope you will continue to be a <span style="color:crimson;">Correctlegger.</span> </p>
                </div>

            </div>
            <!-- you should know end -->










            <!-- core-values start -->
            <div class="core-values-section">

                <div class="core-values-header-box" style="width:100%;padding:10px;display:flex;justify-content:center;">
                    <button class="core-values-icon"><i class="fa fa-check"></i></button>
                </div>

                <div class="core-values-header">Our core values</div>

                <div style="padding:10px;">
                    <p><span class="core-values-sub-header">Customer First:</span> our customers’ satisfaction is top on our priority list.
                        We create an amazing relationship that converts our customers to our fans.</p>


                    <p><span class="core-values-sub-header">Commitment: </span> we are committed to our promise. We commit to our customer’s
                        satisfaction and will do anything and everything to exceed their expectation. </p>



                    <p><span class="core-values-sub-header">Team Work: </span> we have put together a group of passionate,
                        experienced and dedicated individuals working with great humility and ambition
                        to achieve our ultimate goal. We win as a team. Love as a team.</p>


                    <p><span class="core-values-sub-header">Innovation: </span> we believe in innovative thinking and hence we ensure
                        that our customers enjoy every bit of innovation that they deserve.
                        We continue to upgrade and update our product and services by adopting modern technologies and business models. </p>


                </div>
            </div>
            <!-- core-values end -->


        </div>
    </div>

    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/jquery.nice-select.min.js"></script> -->
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <!-- <script src="js/mixitup.min.js"></script> -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>