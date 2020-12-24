<?php
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

            .banners {
                display: none;
            }

            .col-xs-6 {
                width: 45% !important;
            }

            .header-logo-holder {
                font-size: 17px;
                padding-left: 10px !important;

            }

            .x {
                color: grey;
                font-weight: bold;
                font-size: 30px;
                position: absolute;
                top: 0px;
            }

            .header-seperator {
                margin-top: 100px;
            }

            .login-btn {
                display: block;
                font-size: 19px;
                color: crimson !important;
                height: 35px;

                line-height: 33px;
                text-align: center;
                border: 1px solid crimson;
                cursor: pointer;
                position: absolute;
                right: 15px;
                top: 25px;
                padding-right: 5px;
                padding-left: 5px;
            }

            .humberger__open {
                /* display: none !important; */
            }


            .exclusive-banner {
                width: 100%;
                background-color: ;
            }

            .exclusive-banner-img {
                width: 100%;
                height: auto;
                cursor: pointer;

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

            .item-label {
                padding: 5px;
                position: absolute;
                top: 5px;
                left: 0px;
                background-color: orange;
                color: black;
                font-size: 13px;
                border: none;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);
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


            .owl-dots {
                width: 100%;
                /* background-color: green; */
            }

            .owl-dot {
                border-radius: 50px;
                height: 10px;
                width: 10px;
                display: inline-block;
                background: red;
                margin-left: 5px;
                margin-right: 5px;
            }

            .owl-nav {
                background-color: ;
                color: black;
                display: flex;
                justify-content: center;
                padding: 10px;
            }

            .owl-nav button span {
                font-size: 18px;
                padding: 5px;
                border: 1px solid lightgrey;
            }

        }

        /** end of smaller screen **/









































































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .banners {
                display: none;
            }

            .login-btn {
                display: none;
            }

            .hero {
                display: none;
            }

            .header-logo-holder {
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 25px !important;
            }


            .x {
                color: grey;
                font-weight: bold;
                font-size: 50px;
                position: absolute;
                top: -10px;
            }

            .exclusive-banner {
                width: 100%;
                background-color: black;

            }

            .exclusive-banner-img {
                width: 100%;
                max-height: 330px;
                object-fit: cover;
                cursor: pointer;


            }

            .header-seperator {
                margin-top: 200px;
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

            .item-label {
                padding: 5px;
                position: absolute;
                top: 5px;
                left: 0px;
                background-color: orange;
                color: black;
                font-size: 14px;
                font-weight: bold;
                border: none;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);
            }

            .owl-dots {
                width: 100%;
                /* background-color: green; */
            }

            .owl-dot {
                border-radius: 50px;
                height: 10px;
                width: 10px;
                display: inline-block;
                background: red;
                margin-left: 5px;
                margin-right: 5px;
            }

            .owl-nav {
                background-color: ;
                color: black;
                display: flex;
                justify-content: center;
                padding: 10px;
            }

            .owl-nav button span {
                font-size: 20px;
                padding: 10px;
                border: 1px solid lightgrey;
            }
        }

        /** end of bigger screen **/
    </style>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg</title>

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
    <link rel="stylesheet" href="css/mystyle.css" type="text/css">
    <link rel="stylesheet" href="css/components.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="myloader">EXCL<span class="myloader-right" style="color:grey;">USIVE</span></div>
    </div>



    <!-- Header Section Begin -->
    <header class="header myheader" style="background-color:white;margin-bottom:0px;">
        <!-- <img src="img/jumia-header-banner.gif" class="top-head-banner"> -->
        <img src="banners/bannerx4.jpg" class="banners banner1" style="display:block;">
        <img src="banners/bannerx5.jpg" class="banners banner2">
        <img src="banners/bannerx6.jpg" class="banners banner3">
        <img src="banners/bannerx7.jpg" class="banners banner4">

        <div class="header__top">
            <div class="" style="background-color:grey;width:100%;color:white;padding-left:10px;padding-right:10px;">
                <div class="row" style="background-color:rgba(0, 0, 0, 0.2);margin-right:0px;">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@correctleg.com</li>
                                <li>Free Shipping for all Order in River state, Lagos and Abuja</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>

                            </div>
                            <div class="header__top__right__language">

                                <?php
                                if (!isset($_SESSION['id'])) {
                                    echo "  <div><i class='fa fa-user'></i> Login</div>
                             <span class='arrow_carrot-down'></span>
                             <ul>

                                 <li class='dp'><a href='sellers'>As Seller</a></li>
                                 <li class='dp'><a href='customers'>As Buyer</a></li>

                             </ul> ";
                                } else {
                                    echo "<div><a href='logout' style='color:black;'><i class='fa fa-user'></i> Logout</a></div>";
                                }
                                ?>

                            </div>
                            <div class="header__top__right__auth">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fliud">
            <div class="row">
                <div class="col-lg-3" style="background-color:;">
                    <div class="header__logo header-logo-holder">
                        <!-- <a href="./index.html"><img src="img/logo.png" alt="" /></a> -->
                        <a href="./"><span style="color:grey;font-weight:bold;">CORRECT<span style="color:black;">LEG</span><span class="x">x</span></span></a>
                    </div>
                </div>
                <div class="col-lg-9" style="background-color:;">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./" style="color:black;"><i class="fa fa-home"></i>Home</a></li>
                            <li><a href="become-a-seller" style="color:black;"><i class="fa fa-user"></i>Be a seller</a></li>
                            <li><a href="exclusive" style="color:black;"><i class="fa fa-check-circle"></i>Exclusive</a></li>
                            <li><a href="wholesale" style="color:black;"><i class="fa fa-shopping-cart"></i>Wholesale</a></li>
                            <li>
                                <?php
                                if (!isset($_SESSION['id'])) {
                                    echo '<a href="#" style="color:black !important;"><i class="fa fa-sign-in"></i>Login</a>
                             <ul class="header__menu__dropdown" style="z-index:1100;">
                                 <li><a href="sellers" >Seller account</a></li>
                                 <li><a href="customers">Buyer account</a></li>

                             </ul>';
                                } else {

                                    echo '<a href="logout" style="color:black;"><i class="fa fa-user"></i> Logout</a>';
                                }
                                ?>
                            </li>
                            <?php
                            if (isset($_SESSION['id'])) {
                                if (customer_is_logged_in($_SESSION['id'])) {
                                    echo '<li><a href="customers/profile"><i class="fa fa-dashboard"></i> My profile</a></li>';
                                }
                                if (seller_is_logged_in($_SESSION['id'])) {
                                    echo '<li><a href="sellers/profile"><i class="fa fa-dashboard"></i> My profile</a></li>';
                                }
                            }
                            ?>


                            <li><a href="contact-us.php" style="color:black !important;">Contact</a></li>

                        </ul>
                    </nav>
                </div>
                <!-- <div class="col-lg-3">
                  <div class="header__cart">
                     <ul>
                         <li>
                             <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
                         </li>
                         <li>
                             <a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a>
                         </li>
                     </ul>
                     <div class="header__cart__price">item: <span>$150.00</span></div>
                 </div> 
             </div> -->
            </div>
            <!-- snkalsl-->
        </div>
    </header>
    <!-- Header Section End -->



    <div class="header-seperator"></div>










    <div class="owl-carousel owl-theme" style="width:100%;">
        <!-- <div class="item"> -->
        <img src="banners/bannerx1.jpg" class="exclusive-banner-img">
        <img src="banners/bannerx2.jpg" class="exclusive-banner-img">
        <img src="banners/bannerx3.jpg" class="exclusive-banner-img">
        <!-- </div> -->

    </div>


    <!-- exclusive banner start --
    <div class="exclusive-banner">

        <img src="banners/banner2.jpg" class="exclusive-banner-img">
    </div>
    <!-- exclusive banner end -->










    <!-- <div style="width:85%;margin:auto;padding:20px;font-weight:600;font-size:25px;text-align:center;">EXCLUSIVES</div> -->
    <input type="text" class="howmany" value="1" style="display:none;">





    <!-- carousel product component start --->
    <section class="product-component" style="background-color:;">
        <div class="component-title" style="background-color:#666666;color:white;">Exclusives</div>
        <div class="component-container ">
            <?php
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $limit = 10;
            $previous_limits = ($page * $limit) - $limit;



            $result = $db->setQuery("SELECT * FROM product WHERE exclusive='yes' LIMIT $previous_limits, $limit;");
            $numrows = mysqli_num_rows($result);
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $item_id = $row['uniqueid'];

            ?>
                    <a href="product?i=<?php echo $item_id; ?>" class="box">
                        <span class="label">Exclusive</span>
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
                            <span class="new-price"><span>&#8358</span><?php echo number_format($product->getDetail($item_id, "price")); ?></span>
                            <span class="old-price"><span>&#8358</span><?php echo number_format($product->getDetail($item_id, "old_price")); ?></span>
                        </div>
                    </a>
            <?php
                }
            } else {
                echo "div class='alert alert-info'>No exclusive items yet! try Back later/div>";
            }
            ?>
            <div class="pagination-component">
                <?php $product->getPagination($numrows, $limit, "exclusive?"); ?>
            </div>
        </div>
    </section>
    <!--product component end --->


















    <!-- footer start -->
    <?php include 'footer.php'; ?>
    <!-- footer end -->

    <!-- bottom nav start -->
    <?php include 'bottom-nav.php'; ?>
    <!-- bottom nav end -->
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/jquery.nice-select.min.js"></script> -->
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <!-- <script src="js/mixitup.min.js"></script> -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/lazyload.js"></script>


    <script>
        lazyload();

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })




















        var count = 2;
        setInterval(function() {
            if (count == 1) {
                $(".banner4").hide();
                $(".banner1").show();
                count++;
            } else if (count == 2) {
                $(".banner1").hide();
                $(".banner2").show();
                count++;
            } else if (count == 3) {
                $(".banner2").hide();
                $(".banner3").show();
                count++;
            } else if (count == 4) {
                $(".banner3").hide();
                $(".banner4").show();
                count = 1;
            }
        }, 2000);
    </script>
</body>

</html>