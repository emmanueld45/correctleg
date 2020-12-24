<?php
session_start();

include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';

?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg</title>

    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet" /> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Css Styles -->

    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/mystyle.css" type="text/css" />


    <style>
        * {
            margin: 0;
            padding: 0;
        }

        /** start of other stylings **/

        /** end of other stylings **/

        /** start of  smaller screen*/
        @media only screen and (max-width: 690px) {


            .faq-container {
                width: 100%;
                padding: 10px;
                display: flex;
                flex-flow: row wrap;
                justify-content: center;


            }


            .faq-container .box {
                width: 90%;

                margin-bottom: 15px;
            }


            .faq-container .box .header-container {
                width: 100%;
                padding: 10px;
                background-color: crimson;
                color: white;
                position: relative;
            }


            .faq-container .box .header-container .icon {
                position: absolute;
                top: 0%;
                right: 10px;
                font-size: 30px;
            }

            .faq-container .box .content {
                padding: 10px;
                font-size: 14px;
                border: 1px solid crimson;

            }
        }

        /** end of smaller screen **/

        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {


            .faq-container {
                width: 100%;
                padding: 10px;
                display: flex;
                flex-flow: row wrap;
                justify-content: center;


            }


            .faq-container .box {
                width: 30%;

                margin-bottom: 20px;
                margin-right: 10px;
            }


            .faq-container .box .header-container {
                width: 100%;
                padding: 10px;
                background-color: crimson;
                color: white;
                position: relative;
                cursor: pointer;
                transition: 0.4s ease;
            }

            .faq-container .box .header-container:hover {
                background-color: crimson;
                opacity: 0.8;
            }




            .faq-container .box .header-container .icon {
                position: absolute;
                top: 0%;
                right: 10px;
                font-size: 30px;
            }

            .faq-container .box .content {
                padding: 10px;
                font-size: 14px;
                border: 1px solid crimson;

            }

        }

        /** end of bigger screen **/
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>

    <br>

    <!-- header start -->
    <?php include 'header.php'; ?>
    <!-- header end -->


    <!-- <button data-toggle="collapse" data-target="#demo">Collapsible</button>
<div id="demo" class="collapse">
Lorem ipsum dolor text....
</div> -->



    <div class="centered-div mb-3">
        <h2>FAQ</h2>
    </div>



    <!-- faq container start --->
    <div class="faq-container">


        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq1">
                How do i buy on CorrectLeg.com? <span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq1">
                It’s as simple as ABC. All you have to do is to log on to correctleg.com, <br>
                search for the footwear of your choice check on it and place order.<br>
                You will have to put in your address and contact phone number and email to help us deliver to you.<br>
                You can get more info about shoe sizes and shoe type reading through our shoe size guide or shoe type guide on the product page.
            </div>
        </div>



        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq2">
                How do i find a specific brand or item? <span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq2">
                At the top of the screen, there is a search bar,<br>
                type in the footwear brand name for footwear type or the product code (if you already know it) you will like to search for. <br><br>
                Endeavor to read the description, as well as the reviews on the product page to confirm that it matches your taste.
            </div>
        </div>


        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq3">
                Where will i enter my promo giveaway code? <span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq3">
                Tap on the product in cart, scroll down and type in your giveaway code in the enter promo code field.
            </div>
        </div>





        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq4">
                What do i do if the footwear is out of stock?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq4">
                Not to worry! We got your back.<br>
                All you need to do is to call our customer care line on: 09034123537, 09030643105,
                and we will help to get exactly what you want and as soon as you want it.
            </div>
        </div>



        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq5">
                Why are there different prices for the same item?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq5">
                Sellers/stores set their own prices for each footwear type,
                so that’s why you can find the same footwear type with different prices.
            </div>
        </div>


        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq6">
                How do i track/monitor my order?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq6">
                To monitor the delivery update of your order, <br>
                you can simply log into correct leg account and go to your order history and check progress of your order.
            </div>
        </div>


        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq7">
                How much does shipping cost?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq7">
                Orders within the same city in your country incur no shipping cost
                i.e. shipping is free if the seller is in the city as the buyer.<br>
                Other more, our shipping cost is between #500 for single items.<br>
                For wholesale delivery, we strive to maintain affordable shipping cost.<br>
                The cost varies depending on the size, weight and location of your order.<br>
                Also, knowing that items can be shipped from multiple store, shipping cost applied separately by item ordered.
            </div>
        </div>


        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq8">
                How long does shipping take?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq8">
                Shipping times may depend largely on the individual seller and your location.<br>
                However, orders will typically ship within 24-48 hours.
            </div>
        </div>



        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq9">
                Can i change my shipping address?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq9">
                We are sorry, once your order is pushed; it’s no longer possible to change address.<br>
                We will advise that you contact our customer care office/pick up point in your city with
                your order I.D to see if they can redirect your order to a new address.
            </div>
        </div>


        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq10">
                How do i return a footwear?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq10">
                All items may be returned within 48 hours.<br>
                Kindly, contact the customer care unit in your city and you will be guided accordingly.<br>
                Also, note that we may not accept the return of all footwear.
            </div>
        </div>

        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq11">
                How do i cancel my order on correctleg?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq11">
                Good thing is, you have up to 6 hours from the time of purchase to cancel any items you no longer wish to receive.<br>
                Go to your ‘order history’ and check on ‘cancel order’. Your order will be cancelled and no changes will occur.
            </div>
        </div>


        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq12">
                How do i receive my refund after cancelling my order?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq12">
                Your refund will be automatically sent back to your account using the same medium with which you made payments.<br><br>
                An alternative refund channel can be used if you so request and are at our disposal and meets our company refund policies.
            </div>
        </div>


        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq13">
                What payment method does correctleg accept?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq13">
                We currently accept payments through the following:
                <ul style="margin-left:30px;">
                    <li>Visa, mastercard</li>
                    <li>Paystack</li>
                    <li>Bank transfer</li>
                </ul><br>
                We cannot accept cash or installment
            </div>
        </div>



        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq14">
                How can i edit a product i uploaded on correctleg?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq14">
                As a seller, you can always edit your products info on your dashboard. <br>
                All you have to do is to go login and on your dashboard click on new items and then you can edit.
            </div>
        </div>


        <div class="box">
            <div class="header-container" data-toggle="collapse" data-target="#faq15">
                How do i add a video?<span class="icon">+</span>
            </div>
            <div class="content collapse" id="faq15">
                The video tour feature is a premium functionality.<br>
                You will have to subscribe to premium package before you can be able to add videos.
            </div>
        </div>



    </div>
    <!-- faq container end --->
























































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
</body>

</html>