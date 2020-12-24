<?php
session_start();
include 'dbconn.php';
include 'functions.php';


include 'classes/database.class.php';
include 'classes/products.class.php';
include 'classes/users.class.php';



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

            .top-head-banner {
                height: 40px !important;
                object-fit: cover;
            }

            .login-btn {
                display: block;
                font-size: 19px;
                color: black !important;
                height: 35px;

                line-height: 33px;
                text-align: center;

                cursor: pointer;
                position: absolute;
                right: 15px;
                top: 25px;
                padding-right: 5px;
                padding-left: 5px;
            }

            .humberger__open {
                /* position: relative; */
                top: 20px !important;
            }

            .hero__categories {
                display: none;
            }

            .hero__search__form {
                display: ;
                width: 100% !important;
                background-color: ;
            }



            .hero__search__phone {
                display: none;
            }


            .sliding-banner {}

            .slide-banner-right {
                display: none;
            }

            .sliding-banner-thumb-img {
                display: none;
            }

            .sliding-banner-img {}

            .filter-btn {
                background: white;
                color: white;
                width: 80%;
                padding: 10px;
                border: none;
            }

            .item-images-container {
                position: relative;
                transition: 1s ease;
            }


            .item-images-container-background {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0);
                transition: 1s ease;

            }

            .item-icons-container {
                position: absolute;
                bottom: 0px;
                left: 0px;

            }

            .item-icons-container button {
                width: 40px;
                height: 40px;
                border-radius: 40px;
                background-color: white;
                border: none;
                color: crimson;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);
                transition: 1s ease;
                display: none;

            }

            .item-images-container-background:hover {
                background-color: rgba(0, 0, 0, 0.4);
            }

            .item-images-container-background:hover button {
                display: inline-block;
            }


            .item-images {
                width: 100%;
                max-height: 150px;
            }

            .item-box {
                width: 45% !important;
                margin-bottom: 15px;
                background-color: white !important;
                border: none !important;
                margin-right: 10px !important;

            }

            .item-name {
                font-size: 16px;
                font-weight: 600;
                text-align: ;
            }

            .item-brand {
                color: grey;
                font-size: 14px;
            }

            .item-price {
                font-size: 16px;
                font-weight: 600;
                text-align: ;
                color: crimson;
            }

            .item-card {
                width: 100% !important;

            }





            .clearance-info-container {
                width: 90%;
                padding: 10px;
                background-color: red;
                color: white;
                margin: auto;
                text-align: center;
                margin-top: 10px;
                margin-bottom: 10px;
            }


            .count-down-container {
                width: 100%;
                display: flex;
                justify-content: center;
                flex-flow: row nowrap;
            }

            .count-down-header-text {
                width: 90px;
                border: none;
                color: white;
                background-color: rgba(0, 0, 0, 0.4);


            }

            .count-down-box {
                width: 90px;

                background-color: royalblue;
                color: white;
                font-weight: 600;
                font-size: 25px;
                border: 1px solid black;
                padding: 5px;
            }


            .reminder-container {
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
            }

            .reminder-btn {
                width: 150px;
                padding: 8px;
                background-color: orange;
                color: black;
                font-weight: 600;
                border: none;
                font-size: 18px;
            }


            .date-btn {
                width: 90px;
                height: 90px;
                border-radius: 90px;
                position: relative;
                right: 0px;

                background-color: crimson;

            }

            .date-text-large {
                font-size: 30px;
                position: relative;
                left: 10px;
                color: white;
            }

            .date-text-small {
                font-size: 13px;
                color: white;
                position: relative;
                right: 10px;

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

            .hero__search__form form button {
                right: 100px !important;
            }

            .sliding-banner {
                width: 100%;
                margin: auto;
                margin-bottom: 10px;
                display: flex;
                flex-flow: row nowrap;
            }


            .sliding-banner-img {
                width: 100%;
                max-height: 320px;
                object-fit: ;
            }

            .sliding-banner-thumb-img {
                width: 45%;
                height: 150px;
                margin-right: 10px;
                margin-bottom: 10px;
                border-radius: 10px;
            }

            .item-images-container {
                position: relative;
                transition: 1s ease;
            }


            .item-images-container-background {
                position: absolute;
                top: 0px;
                left: 0px;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0);
                transition: 1s ease;

            }

            .item-icons-container {
                position: absolute;
                bottom: 0px;
                left: 0px;

            }

            .item-icons-container button {
                width: 40px;
                height: 40px;
                border-radius: 40px;
                background-color: white;
                border: none;
                color: crimson;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);
                transition: 1s ease;
                display: none;

            }

            .item-images-container-background:hover {
                background-color: rgba(0, 0, 0, 0.4);
            }

            .item-images-container-background:hover button {
                display: inline-block;
            }



            .item-images {
                width: 100%;
                /* max-height: 200px; */
                height: 150px;
                object-fit: cover;
            }

            .item-box {
                width: 200px !important;
                margin-bottom: 15px;
                background-color: white !important;
                border: none !important;
                margin-right: 20px !important;

            }

            .item-name {
                font-size: 19px;
                font-weight: 600;
                text-align: ;
            }

            .item-brand {
                color: grey;
                font-size: 15px;
            }

            .item-price {
                font-size: 19px;
                font-weight: 600;
                text-align: ;
                color: crimson;
            }

            .item-card {
                width: 100% !important;

            }



            .clearance-info-container {
                width: 60%;
                padding: 10px;
                background-color: red;
                color: white;
                margin: auto;
                text-align: center;
                margin-top: 10px;
                margin-bottom: 10px;
            }


            .count-down-container {
                width: 100%;
                display: flex;
                justify-content: center;
                flex-flow: row nowrap;
            }

            .count-down-header-text {
                width: 90px;
                border: none;
                color: white;
                background-color: rgba(0, 0, 0, 0.4);


            }

            .count-down-box {
                width: 90px;

                background-color: royalblue;
                color: white;
                font-weight: 600;
                font-size: 25px;
                border: 1px solid black;
                padding: 5px;
            }

            .reminder-container {
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
            }

            .reminder-btn {
                width: 200px;
                padding: 8px;
                background-color: orange;
                color: black;
                font-weight: 600;
                border: none;
                font-size: 21px;
            }

            .date-btn {
                width: 100px;
                height: 100px;
                border-radius: 100px;
                position: absolute;
                right: 0px;

                background-color: crimson;
                box-shadow: rgba(0, 0, 0, 0.8);

            }

            .date-text-large {
                font-size: 40px;
                position: relative;
                left: 5px;
                color: white;
            }

            .date-text-small {
                font-size: 15px;
                color: white;
                position: relative;
                right: 30px;
            }
        }

        /** end of bigger screen **/
    </style>

    <meta charset="UTF-8">
    <meta name="description" content="Get huge discounts on items on clearance sales">
    <meta name="keywords" content="Correctleg, foot wears, online shop, Nigerian online shop">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clearance sale - Correctleg</title>

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
    <link rel="stylesheet" href="css/mystyle.css" type="text/css">
    <link rel="stylesheet" href="css/components.css" type="text/css">

    <!-- og graph start -->
    <meta property="og:url" content="https://correctleg.com" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Nigeria's Largest Onine Market Place For Foot Wear" />
    <meta property="og:description" content="Buy awesome foot wears at affordable prices." />
    <meta property="og:image" content="https://correctleg.com/banners/banner1.jpg" />
    <!-- og graph end -->
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>

    <?php include 'header.php'; ?>


    <!-- Breadcrumb Section Begin -->
    <?php if (clearance_sale_is_on()) { ?>
        <section class="breadcrumb-section set-bg" data-setbg="img/footbanner1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Clearance Sale</h2>
                            <div class="breadcrumb__option">
                                <a href="./">Home</a>
                                <span>clearance sale</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- Breadcrumb Section End -->



    <?php
    if (clearance_sale_is_on()) {
    ?>



        <!-- carousel product component start --->
        <section class="product-component">
            <div class="component-title" style="background-color:royalblue;color:white;">Clearance sales! <i class="fa fa-star"></i></div>
            <div class="component-container ">
                <?php
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
                $limit = 20;
                $previous_limits = ($page * $limit) - $limit;


                $promotion_id = "5fdb35876d204";
                $result = $db->setQuery("SELECT * FROM promotion_products WHERE promotion_id='$promotion_id' LIMIT $previous_limits, $limit;");
                $numrows = mysqli_num_rows($result);
                if ($numrows != 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $item_id = $row['product_id'];
                        $price_removed = $product->getDetail($item_id, "price") * $row['discount'];
                        $price = $product->getDetail($item_id, "price") - $price_removed;
                        $discount_percentage = $row['discount'] * 100;
                ?>
                        <a href="product?i=<?php echo $item_id; ?>&promotion_id=<?php echo $promotion_id; ?>" class="box">
                            <span class="label"><?php echo $discount_percentage ?>% off</span>
                            <div class="centered-div">
                                <img data-src="<?php echo $product->getDetail($item_id, "image1"); ?>" class="lazy-loaded-img">
                            </div>
                            <div class="product-name"><?php echo $product->shortenLength($product->getDetail($item_id, "name"), 17, ".."); ?></div>
                            <div class="stars-container">

                                <?php
                                echo $product->getStars($item_id, "<i class='fa fa-star active' style='color:orange;font-size:14px;'></i>", "<i class='fa fa-star' style='color:lightgrey;font-size:14px;'></i>");
                                ?>
                            </div>
                            <div class="product-price">
                                <span class="new-price"><span>&#8358</span><?php echo number_format($price); ?></span>
                                <span class="old-price"><span>&#8358</span><?php echo number_format($product->getDetail($item_id, "price")); ?></span>
                            </div>
                        </a>
                <?php
                    }
                } else {
                    echo "<div class='alert alert-info'>No products under this promotion yet! try back later</div>";
                }
                ?>
                <div class="pagination-component">
                    <?php $product->getPagination($numrows, $limit, "clearance-sale?"); ?>
                </div>

            </div>
        </section>
        <!--product component end --->





    <?php
    } else {
    ?>


        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="img/footbanner1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <!-- date start -->
                        <button class="date-btn"><span class="date-text-large">27<sup>th</sup></span><span class="date-text-small">JULY</span></button>
                        <!-- date end -->
                        <div class="breadcrumb__text">
                            <h2>NEXT</h2><br>
                            <h2>Clearance Sale</h2>
                            <!-- <div class="breadcrumb__option">
                                    <a href="./index.php">Home</a>
                                    <span>clearance sale</span>
                                </div> -->
                        </div><br>
                        <div class="count-down-container">
                            <button class="count-down-header-text">Days</button>
                            <button class="count-down-header-text">Hours</button>
                            <button class="count-down-header-text">Seconds</button>
                        </div>
                        <div class="count-down-container">
                            <button class="count-down-box days">01</button>
                            <button class="count-down-box hours">01</button>
                            <button class="count-down-box seconds">01</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->



        <?php
        if (isset($_GET['reminder_sent'])) {
            echo "<div class='alert alert-success' style='width:300px;text-align:center;margin:auto;font-size:18px;margin-top:10px;'>
                <i class='fa fa-check-circle'></i>  Reminder <span class='alert-link'>successfully sent!</span>
              </div>";
        }


        if (isset($_GET['reminder_not_sent'])) {
            echo "<div class='alert alert-danger' style='width:300px;text-align:center;margin:auto;font-size:18px;margin-top:10px;'>
                <i class='fa fa-times'></i>  Reminder <span class='alert-link'>not sent!</span> try again
              </div>";
        }
        ?>

        <div class="reminder-container">
            <button class="reminder-btn" data-toggle="modal" data-target="#reminder">Remind Me <i class="fa fa-bell-o"></i></button>
        </div>

    <?php
    }
    ?>






    <!-- Reminder Modal Start -->
    <div class="modal" id="reminder">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Let us remind you!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="usr">Full Name:</label>
                            <input type="text" name="name" class="form-control" id="usr" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Email Address:</label>
                            <input type="email" name="email" class="form-control" id="pwd" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Phone Number:</label>
                            <input type="tel" name="phone" class="form-control" id="pwd" required>
                        </div>



                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="submit_reminder" class="btn btn-success">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Reminder Modal Start-->






















































    <?php


    if (isset($_POST['submit_reminder'])) {

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];


        $website_url = "test.correctleg.com";
        $website_url_http = "https://test.correctleg.com";
        $website_name = "CorrectLeg";
        $logo = "img/correctleg-logo.png";

        $title = "Clearance sale reminder applicant";


        // $to =  "clearancesaleapplications@correctleg.com";
        $to =  "emmydanjumbo4@gmail.com";
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
        <div style="width:100%;text-align: center;color:black;font-weight: bold;"><img src="' . $website_url_http . '/' . $logo . '" style="width:100px;height:auto;"></div>
        
        
       
        </div>';


        $message .= 'Name: ' . $name . '
            <br>
            Email: ' . $email . '<br>
            Phone: ' . $phone . '

            
            
            ';





        $message .= '
        </body></html>';

        // Sending email
        $send = mail($to, $subject, $message, $headers);

        if ($send) {
            echo '<script>
                window.location.href="reminder_sent=true";
                </script>';
        } else {
            echo '<script>
                window.location.href="reminder_not_sent=true";
                </script>';
        }
    }











    ?>






    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/banner-handler.js"></script>
    <script src="js/lazyload.js"></script>



    <script>
        lazyload();

        // Set the date we're counting down to
        var countDownDate = new Date("October 7, 2020 12:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            //  document.getElementById("display").innerHTML = days + "d " + hours + "h " +
            //  minutes + "m " + seconds + "s ";

            //  alert(seconds)

            $(".days").html(days);
            $(".hours").html(hours);
            $(".seconds").html(seconds);



            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("display").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>



</body>

</html>