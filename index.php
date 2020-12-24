<?php
session_start();
include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/products.class.php';
include 'classes/admin.class.php';
include 'classes/users.class.php';
include 'classes/customers.class.php';
include 'classes/orders.class.php';

if (isset($_GET['close_rating_modal'])) {
    setcookie("dont_show_rating_modal", "dont show", time() + 86400);
    $admin->goToPage("./", "");
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

            /* .humberger__open {
                position: relative;
                top: 50px !important;
                border: none !important;
            } */

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

            .selected-items-title {
                width: 100%;
                margin: auto;
                padding: 10px;
                font-weight: 600;
                font-size: 15px;
                text-align: ;
                background-color: orange;
                color: #111;
                margin-bottom: 10px;
                margin-top: 10px;
            }

            .random-items-title {
                width: 100%;
                margin: auto;
                padding: 10px;
                font-weight: 600;
                font-size: 15px;
                text-align: ;
                background-color: crimson;
                color: white;
                margin-bottom: 10px;
                margin-top: 10px;
            }

            .item-container {
                width: 100%;
                display: flex;
                flex-flow: row wrap;
                padding: 5px;
            }

            .item-images-container {
                position: relative;
                transition: 1s ease;
            }

            .item-images-container .discount-label {
                position: absolute;
                top: 5px;
                right: 5px;
                width: 40px;
                height: 40px;
                border-radius: 40px;
                background-color: crimson;
                color: white;
                font-size: 11px;
                border: none;
                box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
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
                height: 150px;
                object-fit: cover;
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




            .category-container {
                width: 100%;
                padding: 5px;
                display: flex;
                flex-flow: row wrap;
                background-color: ;
                justify-content: center;
            }

            .category-box {
                width: 20%;
                padding: 10px;
                margin-bottom: 5px;
                margin-right: 10px;
                border-radius: 5px;
                text-align: center;


            }

            .category-icon {
                width: 40px;
                height: 40px;
                border: none;
                border-radius: 40px;
                background-color: crimson;
                color: white;
                margin-right: 0px;
                font-size: 22px;
            }

            .category-text {
                font-weight: normal;
                font-size: 14px;

            }


            .brand-wrapper {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 10px;
                overflow-x: auto;
                background-color: ;

            }

            .brand-wrapper .brand-container {
                display: flex;
                flex-flow: row nowrap;
                background-color: ;
                justify-content: center;
            }


            .brand-wrapper .brand-container .box {
                /* width:150px !important; */
                background-color: white;
                margin-right: 15px;
                position: relative;
                box-shadow: 2px 3px 5px lightgrey;
                border-radius: 2px;
                display: flex;
                flex-flow: row nowrap;
                white-space: nowrap;


            }



            .brand-wrapper .brand-container .box .left {
                /* width:30%; */
                background-color: crimson;
                padding: 5px;
            }


            .brand-wrapper .brand-container .box .right {
                /* width:70%; */
                padding: 5px;
                font-size: 14px;
                font-weight: bold;
                /* text-align:center; */
                display: flex;
                justify-content: center;
                align-items: center;
            }


            .brand-wrapper .brand-container .box .left .icon {
                font-size: 30px;
                color: white;
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
                width: 85%;
                margin: auto;
                margin-bottom: 10px;
                display: flex;
                flex-flow: row nowrap;
            }

            .sliding-banner-left {
                width: 65%;
            }

            .sliding-banner-right {
                width: 35%;
                background-color: ;
                padding: 10px;
                display: flex;
                flex-flow: row wrap;
                justify-content: center;
            }

            .sliding-banner-img {
                width: 100%;
                max-height: 320px;
                object-fit: cover;
            }

            .sliding-banner-thumb-img {
                width: 45%;
                height: 150px;
                margin-right: 10px;
                margin-bottom: 10px;
                border-radius: 10px;
            }

            .selected-items-title {
                width: 85%;
                margin: auto;
                padding: 10px;
                font-weight: 600;
                font-size: 20px;
                text-align: ;
                background-color: orange;
                color: #111;
                margin-bottom: 10px;
                margin-top: 10px;
            }

            .random-items-title {
                width: 85%;
                margin: auto;
                padding: 10px;
                font-weight: 600;
                font-size: 20px;
                text-align: ;
                background-color: crimson;
                color: white;
                margin-bottom: 10px;
                margin-top: 10px;
            }

            .item-container {
                width: 90%;
                margin: auto;
                display: flex;
                flex-flow: row wrap;
                padding: 0px 30px;
                /* background-color:blue; */

            }

            .item-images-container {
                position: relative;
                transition: 1s ease;
            }

            .item-images-container .discount-label {
                position: absolute;
                top: 5px;
                right: 5px;
                width: 40px;
                height: 40px;
                border-radius: 40px;
                background-color: crimson;
                color: white;
                font-size: 11px;
                border: none;
                box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
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
                height: 150px !important;
                object-fit: cover !important;
            }

            .item-box {
                width: 200px;
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




            .category-container {
                width: 100%;
                padding: 5px;
                display: flex;
                flex-flow: row wrap;
                background-color: ;
                justify-content: center;
            }

            .category-box {
                width: 20%;
                padding: 10px;
                margin-bottom: 5px;
                margin-right: 10px;
                border-radius: 5px;
                box-shadow: 0px 3px 20px lightgrey;
            }

            .category-icon {
                width: 40px;
                height: 40px;
                border: none;
                border-radius: 40px;
                background-color: crimson;
                color: white;
                margin-right: 10px;
                font-size: 22px;
            }

            .category-text {
                font-weight: 600;
                font-size: 18px;
                color: black;
                position: relative;
            }


            .brand-wrapper {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 10px;
                overflow-x: auto;
                background-color: ;
                justify-content: center;

            }

            .brand-wrapper .brand-container {
                display: flex;
                flex-flow: row nowrap;
                background-color: ;
                justify-content: center;
            }


            .brand-wrapper .brand-container .box {
                width: 150px !important;
                background-color: white;
                margin-right: 25px;
                position: relative;
                box-shadow: 2px 3px 5px lightgrey;
                border-radius: 2px;
                display: flex;
                flex-flow: row nowrap;
                cursor: pointer;


            }



            .brand-wrapper .brand-container .box .left {
                /* width:30%; */
                background-color: crimson;
                padding: 5px;
                border-radius: 3px;
            }


            .brand-wrapper .brand-container .box .right {
                /* width:70%; */
                padding: 5px;
                font-size: 14px;
                font-weight: bold;
                /* text-align:center; */
                display: flex;
                justify-content: center;
                align-items: center;
            }


            .brand-wrapper .brand-container .box .left .icon {
                font-size: 30px;
                color: white;
            }




        }

        /** end of bigger screen **/


        .centered-div {
            width: 100%;
            display: flex;
            justify-content: center;
        }
    </style>
    <meta charset="UTF-8" />
    <meta name="description" content="Buy Footwears at affordable prices" />
    <meta name="keywords" content="Correctleg, foot wears, online shop, Nigerian online shop" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg</title>

    <!-- Google Font -->

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
    <!-- <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet" /> -->
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <!-- <link rel="stylesheet" href="css/nice-select.css" type="text/css" /> -->
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/mystyle.css" type="text/css">
    <link rel="stylesheet" href="css/cart.css" type="text/css" />
    <link rel="stylesheet" href="css/components.css" type="text/css" />

    <!-- og graph start -->
    <meta property="og:url" content="https://correctleg.com" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Nigeria's Largest Onine Market Place For Foot Wear" />
    <meta property="og:description" content="Buy awesome foot wears at affordable prices." />
    <meta property="og:image" content="https://correctleg.com/banners/banner3.jpeg" />
    <!-- og graph end -->

</head>

<body>
    <!-- Page Preloder -->







    <!-- header start -->
    <?php include 'header.php'; ?>
    <!-- header end -->





    <!-- sliding banner start -->
    <div class="sliding-banner">

        <!-- left side start-->
        <div class="sliding-banner-left">

            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="banners/banner17.jpg" alt="Clearance sales" class="sliding-banner-img">
                    </div>
                    <div class="carousel-item">
                        <img src="banners/bannern3.jpg" alt="Clearance sales" class="sliding-banner-img">
                    </div>
                    <div class="carousel-item">
                        <img src="banners/bannern5.jpg" alt="Clearance sales" class="sliding-banner-img">
                    </div>
                    <div class="carousel-item">
                        <img src="banners/bannern6.jpg" alt="Clearance sales" class="sliding-banner-img">
                    </div>
                    <div class="carousel-item">
                        <img src="banners/bannern7.jpg" alt="Clearance sales" class="sliding-banner-img">
                    </div>
                    <div class="carousel-item">
                        <img src="banners/banner4.jpeg" alt="Clearance sales" class="sliding-banner-img">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>

        </div>
        <!-- left side end -->



        <!-- right side start -->
        <div class="sliding-banner-right">

            <img src="banners/banner1.jpg" class="sliding-banner-thumb-img">
            <img src="banners/banner8.jpg" class="sliding-banner-thumb-img">
            <img src="banners/banner9.jpg" class="sliding-banner-thumb-img">
            <img src="banners/banner10.jpg" class="sliding-banner-thumb-img">
        </div>
        <!-- right side end -->

    </div>
    <!-- slider banner end -->












    <!-- category start -->
    <!-- catgory container start -->
    <div class="category-container">

        <!-- trusted and reliable -->
        <div class="category-box">
            <a href="cat?item_is_for=All" style="color:inherit;">
                <button class="category-icon" style="background-color:darkred;"><i class="fa fa-star"></i></button>
                <span class="category-text">All</span>
            </a>
        </div>

        <!-- trusted and reliable -->
        <div class="category-box">
            <a href="cat?item_is_for=Men" style="color:inherit;">
                <button class="category-icon" style="background-color:green;"><i class="fa fa-male"></i></button>
                <span class="category-text">Men</span>
            </a>
        </div>

        <!-- trusted and reliable -->
        <div class="category-box">
            <a href="cat?item_is_for=Women" style="color:inherit;">
                <button class="category-icon" style="background-color:orange;"><i class="fa fa-female"></i></button>
                <span class="category-text">Women</span>
            </a>
        </div>


        <!-- trusted and reliable -->
        <div class="category-box">
            <a href="cat?item_is_for=Kids" style="color:inherit;">
                <button class="category-icon"><i class="fa fa-child"></i></button>
                <span class="category-text">Kids</span>
            </a>
        </div>


        <!-- Exclusive -->
        <div class="category-box">
            <a href="exclusive" style="color:inherit;">
                <button class="category-icon" style="background-color:grey;"><i class="fa fa-diamond"></i></button>
                <span class="category-text">Xclusive</span>
            </a>
        </div>


        <!-- wholesale -->
        <div class="category-box">
            <a href="wholesale" style="color:inherit;">
                <button class="category-icon" style="background-color:mediumseagreen;"><i class="fa fa-shopping-cart"></i></button>
                <span class="category-text">Wholesale</span>
            </a>
        </div>

        <!-- Clearance -->
        <div class="category-box">
            <a href="clearance-sale" style="color:inherit;">
                <button class="category-icon" style="background-color:royalblue;"><i class="fa fa-star"></i></button>
                <span class="category-text">Clearance</span>
            </a>
        </div>

        <!-- sign up -->
        <div class="category-box">
            <a href="become-a-seller" style="color:inherit;">
                <button class="category-icon" style="background-color:skyblue;"><i class="fa fa-user-plus"></i></button>
                <span class="category-text">Sell</span>
            </a>
        </div>

    </div>
    <!-- catgory container end -->
    <!-- category end -->




    <!-- brand container start ---
    <div class="brand-wrapper">
        <div class="brand-container">

            <a class="box">
                <div class='left'>
                    <i class='fa fa-check-circle icon'></i>
                </div>
                <div class='right'>
                    FK Olubabe
                </div>
            </a>


            <a class="box">
                <div class='left'>
                    <i class='fa fa-check-circle icon'></i>
                </div>
                <div class='right'>
                    Jack Abels
                </div>
            </a>


            <a class="box">
                <div class='left'>
                    <i class='fa fa-check-circle icon'></i>
                </div>
                <div class='right'>
                    Kene Rapu
                </div>
            </a>



            <a class="box">
                <div class='left'>
                    <i class='fa fa-check-circle icon'></i>
                </div>
                <div class='right'>
                    T.T Dack
                </div>
            </a>


            <a class="box">
                <div class='left'>
                    <i class='fa fa-check-circle icon'></i>
                </div>
                <div class='right'>
                    Rd Solen
                </div>
            </a>


            <a class="box">
                <div class='left'>
                    <i class='fa fa-check-circle icon'></i>
                </div>
                <div class='right'>
                    Obacouture
                </div>
            </a>










        </div>
    </div>
    <!-- brand container end-->





    <!-- carousel product component start --->
    <section class="product-component">
        <div class="component-title" style="background-color:orange;">Top products</div>
        <div class="component-container ">
            <?php
            $top_products_array = array("5edbff73de66f", "5edbffe41ecfa", "5edc04c1a6e89", "5ee20b9f768f1", "5eebe41f69634");
            foreach ($top_products_array as $top_product_id) {
                if ($product->getDetail($top_product_id, "status") == "active") {

            ?>
                    <a href="product?i=<?php echo $top_product_id; ?>" class="box">
                        <!-- <span class="label">20% off</span> -->
                        <div class="centered-div">
                            <img data-src="<?php echo $product->getDetail($top_product_id, "image1"); ?>" class="lazy-loaded-img">
                        </div>
                        <div class="product-name"><?php echo $product->shortenLength($product->getDetail($top_product_id, "name"), 17, ".."); ?></div>
                        <div class="stars-container">

                            <?php
                            echo $product->getStars($top_product_id, "<i class='fa fa-star active' style='color:orange;font-size:14px;'></i>", "<i class='fa fa-star' style='color:lightgrey;font-size:14px;'></i>");
                            ?>
                        </div>
                        <div class="product-price">
                            <span class="new-price"><span>&#8358</span><?php echo number_format($product->getDetail($top_product_id, "price")); ?></span>
                            <span class="old-price"><span>&#8358</span><?php echo number_format($product->getDetail($top_product_id, "old_price")); ?></span>
                        </div>
                    </a>
            <?php
                }
            }
            ?>

        </div>
    </section>
    <!--product component end --->


    <!-- Categories Section Begin -->
    <section class="categories mt-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/foot1.jpg">
                            <h5><a href="cat?item_is_for=All" style="background-color:rgba(0, 0, 0, 0.7);color:white;">ALL</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/foot6.jpg">
                            <h5><a href="cat?item_is_for=Men" style="background-color:rgba(0, 0, 0, 0.7);color:white;">MEN</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/foot4.jpg">
                            <h5><a href="cat?item_is_for=Women" style="background-color:rgba(0, 0, 0, 0.7);color:white;">WOMEN</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/foot3.jpg">
                            <h5><a href="cat?item_is_for=Kids" style="background-color:rgba(0, 0, 0, 0.7);color:white;">KIDS</a></h5>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->



    <!--  product component start --->
    <?php
    $result = $db->setQuery("SELECT * FROM product WHERE status='active' ORDER BY RAND() LIMIT 10;");
    $numrows = mysqli_num_rows($result);
    ?>
    <section class="product-component">
        <div class="component-title" style="background-color:grey;color:white;">Recommended for you</div>
        <div class="component-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {

            ?>
                <a href="product?i=<?php echo $row['uniqueid']; ?>" class="box">
                    <!-- <span class="label">30% off</span> -->
                    <div class="centered-div">
                        <img data-src="<?php echo $row['image1']; ?>" class="lazy-loaded-img" alt="image">
                    </div>
                    <div class="product-name"><?php echo $product->shortenLength($row['name'], 17, ".."); ?></div>
                    <div class="stars-container">
                        <?php echo $product->getStars($row['uniqueid'], "<i class='fa fa-star'  style='color:orange;font-size:13px;'></i>", "<i class='fa fa-star'  style='color:lightgrey;font-size:13px;'></i>"); ?>
                    </div>
                    <div class="product-price">
                        <span class="new-price"><span>&#8358</span><?php echo number_format($row['price']); ?></span>
                        <span class="old-price"><span>&#8358</span><?php echo number_format($row['old_price']); ?></span>
                    </div>
                </a>
            <?php
            }
            ?>

        </div>
    </section>
    <!-- product component end --->



    <!--- double ads contanent start --->
    <section class="double-ads-component">
        <div class="ads-container">
            <div class="row1">
                <a href="">
                    <img src="banners/banner5.jpeg" alt="">
                </a>
            </div>
            <div class="row2">
                <a href="">
                    <img src="banners/banner7.jpeg" alt="">
                </a>
            </div>
        </div>
    </section>
    <!--- double ads container end --->









    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">


                <!-- for men start -->
                <?php
                $sql = "SELECT * FROM product WHERE status='active' AND itemisfor='Men' ORDER by RAND() LIMIT 6;";
                $result = mysqli_query($conn, $sql);
                $numrows = mysqli_num_rows($result);

                $items_id_array = [];
                while ($items_array = mysqli_fetch_assoc($result)) {
                    $items_id_array[count($items_id_array)] = $items_array['uniqueid'];
                }

                //echo $items_id_array[0];


                if ($numrows != 0) {
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>For Women</h4>
                            <div class="latest-product__slider owl-carousel">

                                <?php
                                //     $box = 0;
                                //     $count = 0;
                                //    // $arrayItems = ['a','b','c','d','e','f'];
                                //     for($box;$box < 2;$box++){
                                //         $boxes = 0;
                                //       //  echo 'BOX';
                                //         for($boxes;$boxes < 3;$boxes++){
                                //             //echo $items_id_array[$count];
                                //             $count++;
                                //         }
                                //     }
                                ?>




                                <?php
                                $box = 0;
                                $count = 0;
                                for ($box; $box < 2; $box++) {
                                ?>
                                    <div class='latest-prdouct__slider__item'>

                                        <?php
                                        $boxes = 0;
                                        for ($boxes; $boxes < 3; $boxes++) {
                                            $item_id = $items_id_array[$count];
                                        ?>
                                            <a href="product?i=<?php echo $item_id; ?>" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img class="lazy-loaded-img" data-src="<?php echo $product->getDetail($item_id, "image1"); ?>" alt="" style="width:100px;height:100px;" />
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?php echo $product->shortenLength($product->getDetail($item_id, "name"), 17, ".."); ?></h6>
                                                    <span><u>&#8358</u><?php echo number_format($product->getDetail($item_id, "price")); ?></span>
                                                    <?php
                                                    if (item_have_old_price($item_id)) {
                                                        echo "<span style='color:grey;font-size:15px;text-decoration:line-through;margin-left:5px;font-weight:normal;'><u>&#8358</u>" . number_format($product->getDetail($item_id, "old_price")) . "</span>";
                                                    }
                                                    ?>
                                                </div>
                                            </a>
                                        <?php
                                            $count++;
                                        }
                                        ?>
                                    </div>
                                <?php
                                }

                                ?>





                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!--- for men end -->














                <!-- for women start -->
                <?php
                $sql = "SELECT * FROM product WHERE itemisfor='Women' AND status='active' ORDER by RAND() LIMIT 6;";
                $result = mysqli_query($conn, $sql);
                $numrows = mysqli_num_rows($result);

                $items_id_array = [];
                while ($items_array = mysqli_fetch_assoc($result)) {
                    $items_id_array[count($items_id_array)] = $items_array['uniqueid'];
                }

                //echo $items_id_array[0];


                if ($numrows != 0) {
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>For Women</h4>
                            <div class="latest-product__slider owl-carousel">

                                <?php
                                //     $box = 0;
                                //     $count = 0;
                                //    // $arrayItems = ['a','b','c','d','e','f'];
                                //     for($box;$box < 2;$box++){
                                //         $boxes = 0;
                                //       //  echo 'BOX';
                                //         for($boxes;$boxes < 3;$boxes++){
                                //             //echo $items_id_array[$count];
                                //             $count++;
                                //         }
                                //     }
                                ?>




                                <?php
                                $box = 0;
                                $count = 0;
                                for ($box; $box < 2; $box++) {
                                ?>
                                    <div class='latest-prdouct__slider__item'>

                                        <?php
                                        $boxes = 0;
                                        for ($boxes; $boxes < 3; $boxes++) {
                                            $item_id = $items_id_array[$count];
                                        ?>
                                            <a href="product?i=<?php echo $item_id; ?>" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img class="lazy-loaded-img" data-src="<?php echo $product->getDetail($item_id, "image1"); ?>" alt="" style="width:100px;height:100px;" />
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?php echo $product->shortenLength($product->getDetail($item_id, "name"), 17, ".."); ?></h6>
                                                    <span><u>&#8358</u><?php echo number_format($product->getDetail($item_id, "price")); ?></span>
                                                    <?php
                                                    if (item_have_old_price($item_id)) {
                                                        echo "<span style='color:grey;font-size:15px;text-decoration:line-through;margin-left:5px;font-weight:normal;'><u>&#8358</u>" . number_format($product->getDetail($item_id, "old_price")) . "</span>";
                                                    }
                                                    ?>
                                                </div>
                                            </a>
                                        <?php
                                            $count++;
                                        }
                                        ?>
                                    </div>
                                <?php
                                }

                                ?>





                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!--- for women end -->


















                <!-- for Kids start -->
                <?php
                $sql = "SELECT * FROM product WHERE itemisfor='Kids' AND status='active' ORDER by RAND() LIMIT 6;";
                $result = mysqli_query($conn, $sql);
                $numrows = mysqli_num_rows($result);

                $items_id_array = [];
                while ($items_array = mysqli_fetch_assoc($result)) {
                    $items_id_array[count($items_id_array)] = $items_array['uniqueid'];
                }

                //echo $items_id_array[0];


                if ($numrows != 0) {
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="latest-product__text">
                            <h4>For Kids</h4>
                            <div class="latest-product__slider owl-carousel">

                                <?php
                                //     $box = 0;
                                //     $count = 0;
                                //    // $arrayItems = ['a','b','c','d','e','f'];
                                //     for($box;$box < 2;$box++){
                                //         $boxes = 0;
                                //       //  echo 'BOX';
                                //         for($boxes;$boxes < 3;$boxes++){
                                //             //echo $items_id_array[$count];
                                //             $count++;
                                //         }
                                //     }
                                ?>




                                <?php
                                $box = 0;
                                $count = 0;
                                for ($box; $box < 2; $box++) {
                                ?>
                                    <div class='latest-prdouct__slider__item'>

                                        <?php
                                        $boxes = 0;
                                        for ($boxes; $boxes < 3; $boxes++) {
                                            $item_id = $items_id_array[$count];
                                        ?>
                                            <a href="product?i=<?php echo $item_id; ?>" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img class="lazy-loaded-img" data-src="<?php echo $product->getDetail($item_id, "image1"); ?>" alt="" style="width:100px;height:100px;" />
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6><?php echo $product->shortenLength($product->getDetail($item_id, "name"), 17, ".."); ?></h6>
                                                    <span><u>&#8358</u><?php echo number_format($product->getDetail($item_id, "price")); ?></span>
                                                    <?php
                                                    if ($product->getDetail($item_id, "old_price") != "empty") {
                                                        echo "<span style='color:grey;font-size:15px;text-decoration:line-through;margin-left:5px;font-weight:normal;'><u>&#8358</u>" . number_format($product->getDetail($item_id, "old_price")) . "</span>";
                                                    }
                                                    ?>
                                                </div>
                                            </a>
                                        <?php
                                            $count++;
                                        }
                                        ?>
                                    </div>
                                <?php
                                }

                                ?>





                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!--- for Kids end -->


            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->





    <!-- category start -->
    <!-- catgory container start -->
    <div class="category-container">

        <!-- trusted and reliable -->
        <div class="category-box">
            <a href="cat.php?item_is_for=All" style="color:inherit;">
                <button class="category-icon" style="background-color:darkred;"><i class="fa fa-star"></i></button>
                <span class="category-text">All</span>
            </a>
        </div>

        <!-- trusted and reliable -->
        <div class="category-box">
            <a href="cat.php?item_is_for=Men" style="color:inherit;">
                <button class="category-icon" style="background-color:green;"><i class="fa fa-male"></i></button>
                <span class="category-text">Men</span>
            </a>
        </div>

        <!-- trusted and reliable -->
        <div class="category-box">
            <a href="cat.php?item_is_for=Women" style="color:inherit;">
                <button class="category-icon" style="background-color:orange;"><i class="fa fa-female"></i></button>
                <span class="category-text">Women</span>
            </a>
        </div>


        <!-- trusted and reliable -->
        <div class="category-box">
            <a href="cat.php?item_is_for=Kids" style="color:inherit;">
                <button class="category-icon"><i class="fa fa-child"></i></button>
                <span class="category-text">Kids</span>
            </a>
        </div>



    </div>
    <!-- catgory container end -->
    <!-- category end -->




    <!-- Blog Section Begin --
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="" />
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>
                                Sed quia non numquam modi tempora indunt ut labore et dolore
                                magnam aliquam quaerat
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="" />
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>
                                Sed quia non numquam modi tempora indunt ut labore et dolore
                                magnam aliquam quaerat
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="" />
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>
                                Sed quia non numquam modi tempora indunt ut labore et dolore
                                magnam aliquam quaerat
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->










    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img data-src="banners/banner16.jpg" class="lazy-loaded-img" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="clearance-sale.php">
                            <img data-src="banners/banner7.jpeg" class="lazy-loaded-img" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->




    <!-- cart modal start -->
    <?php
    include 'cart-modal.php';
    ?>
    <!-- cart modal end -->


    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>
    <!-- Footer Section End -->


    <!-- bottom nav start-->
    <?php include 'bottom-nav.php'; ?>
    <!-- bottom nav start-->



    <!-- shopping basket btn start -->
    <?php include 'shopping-basket-btn.php'; ?>
    <!-- shopping basket btn end -->



    <!-- rating modal start --->
    <?php
    if (isset($_POST['rate_item_submit'])) {
        $rating_comment = mysqli_real_escape_string($db->conn, $_POST['rating_comment']);
        $rating_item_id = mysqli_real_escape_string($db->conn, $_POST['rating_item_id']);
        $rating_order_id = mysqli_real_escape_string($db->conn, $_POST['rating_order_id']);
        $rating_customer_id = mysqli_real_escape_string($db->conn, $_POST['rating_customer_id']);
        $rating_number = mysqli_real_escape_string($db->conn, $_POST['rating_number']);

        if ($rating_comment == '') {
            $rating_comment == 'empty';
        }
        $product->addRating($rating_customer_id, $rating_comment, $rating_item_id, $rating_order_id, $rating_number);
    }
    ?>
    <?php
    $latest_delivered_item = $order->getLatestDeliveredItem();
    if ($latest_delivered_item['status'] == 'found') {
        echo '
<style>
.rating-component-modal{
    display:flex;
}
</style>
';
    ?>
        <section class="rating-component-modal">
            <div class="box">
                <div class="header"><a href="?close_rating_modal"><i class="fa fa-times close-rating-component-modal-btn"></i></a></div>
                <div class="body">
                    <form action="" method="POST" onsubmit="return validateRatingModal()">
                        <div class="centered-div">
                            <img src="<?php echo $product->getDetail($latest_delivered_item['item_id'], 'image1'); ?>" class="rating-item-img" alt="">
                        </div>
                        <div class="message-title">How was your item?</div>
                        <div class="centered-div mt-2">
                            <i class="fa fa-star rating-component-star" star_index="0" star_number="1"></i>
                            <i class="fa fa-star rating-component-star" star_index="1" star_number="2"></i>
                            <i class="fa fa-star rating-component-star" star_index="2" star_number="3"></i>
                            <i class="fa fa-star rating-component-star" star_index="3" star_number="4"></i>
                            <i class="fa fa-star rating-component-star" star_index="4" star_number="5"></i>
                        </div>
                        <div class="rating-message"></div>
                        <div class="centered-div">
                            <textarea name="rating_comment" id="" class="rating-comment-field" maxlength="30" placeholder="Leave a comment"></textarea>
                        </div>
                        <input type="text" value="0" name="rating_number" class="rating-number" style="display:none;">
                        <input type="text" value="<?php echo $latest_delivered_item['item_id']; ?>" class="rating-item-id" name="rating_item_id" style="display:none;">
                        <input type="text" value="<?php echo $latest_delivered_item['customer_id']; ?>" class="" name="rating_customer_id" style="display:none;">
                        <input type="text" value="<?php echo $latest_delivered_item['order_id']; ?>" class="" name="rating_order_id" style="display:none;">
                        <div class="centered-div">
                            <button class="rating-submit-btn" name="rate_item_submit">Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <?php
    }
    ?>
    <!-- rating modal end --->

    <input type="text" class="howmany" value="1" style="display:none;">

    <div class="click-loader">
        <img src="img/loader2.gif" alt="">
    </div>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/banner-handler.js"></script>
    <script src="js/lazyload.js"></script>
    <script src="service-worker.js"></script>



    <script>
        lazyload();

        $('.top-products-carousel').owlCarousel({
            loop: true,
            // autoplay: true,
            autoplayTimeout: 5000,
            // animateIn: 'fadeIn',
            // animateOut: 'fadeOut',
            mouseDrag: true,
            margin: 10,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

        show_click_loader();
        $(document).ready(function() {
            $(".click-loader").css("display", "none")
        })
    </script>

    <script>
        // // Check that service workers are supported
        // if ('serviceWorker' in navigator) {
        //     // Use the window load event to keep the page load performant
        //     window.addEventListener('load', () => {
        //         navigator.serviceWorker.register('./service-worker.js');
        //     });
        // }
    </script>

    <!-- <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "ad05ddbe-a94c-47d5-afc8-0ef0e788957f",
            });
        });
    </script> -->
</body>

</html>