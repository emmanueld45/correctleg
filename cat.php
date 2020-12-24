<?php
session_start();
include 'dbconn.php';
include 'functions.php';
include 'classes/database.class.php';
include 'classes/admin.class.php';
include 'classes/products.class.php';

if (!isset($_GET['item_is_for'])) {
    $admin->goToPage("./", "invalid_product");
}


$item_is_for = mysqli_real_escape_string($db->conn, $_GET['item_is_for']);

if ($item_is_for == "All" or $item_is_for == "Men" or $item_is_for == "Women" or $item_is_for == "Kids") {
} else {
    $admin->goToPage("./", "invalid_category");
}



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
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/mystyle.css" type="text/css">
    <link rel="stylesheet" href="css/cart.css" type="text/css" />
    <link rel="stylesheet" href="css/components.css" type="text/css" />

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


            .main-area {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
            }

            .main-area .left {
                width: 100%;
                display: none;

                background-color: #eee;

            }


            .main-area .right {
                width: 100%;
                background-color: white;


            }

            .desktop-filter-container {
                display: none;
            }



            .col-xs-6 {
                width: 45% !important;
            }


            .humberger__open {
                top: 0px !important;
                border: none !important;
            }

            /* .hero__categories {
                display: none;
            }

            .hero__search__form {
                display: none;
            }

            .hero__search__phone {
                display: none;
            } */

            .cat-banner {
                width: 100%;

            }

            .item-container {
                width: 100%;
                padding: 10px;

            }




            .item-box {
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
                border-bottom: 1px solid #eee;
            }


            .item-box-left {
                width: 35%;

            }

            .item-box-right {
                width: 65%;
                padding: 10px;

            }

            .item-images {
                width: 80px;
                height: 80px;
            }

            .item-brand {
                color: grey;
                font-size: 14px;
            }


            .item-price {
                color: crimson;
                font-weight: bold;
                font-size: 15px;
            }

            .item-old-price {
                color: grey;
                text-decoration: line-through;
                font-weight: normal;
                font-size: 13px;
            }

            .pagination-container {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                justify-content: center;
                margin-top: 15px;
                padding-bottom: 20px;
                overflow-x: auto;
                white-space: nowrap;
            }

            .pagination-container a {
                width: 25px;
                height: 25px;
                border-radius: 30px;

                text-align: center;
                background-color: white;
                border: 1px solid lightgrey;
                color: grey;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-right: 10px;
                font-size: 12px;
            }

            .pagination-container a.active {
                background-color: crimson;
                color: white;
            }

            .pagination-container a:hover {
                background-color: rgba(220, 20, 60, 0.527);
                color: white;
            }


            .pagination-container2 {
                width: 100%;
                text-align: center;
                height: 40px;
                padding: 5px;

            }

            .pagination-container2 .prev {
                color: grey;
                font-size: 13px;
                font-weight: 500;
                float: left;
            }

            .pagination-container2 .page-count {
                color: grey;
                font-size: 13px;
            }

            .pagination-container2 .next {
                color: crimson;
                float: right;
                font-size: 13px;
                font-weight: 500;
            }
        }

        /** end of smaller screen **/



















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .hide-on-mobile {
                display: none !important;
            }

            .main-area {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
            }

            .main-area .left {
                width: 30%;
                /* height: 300px; */
                background-color: #eee;

            }


            .main-area .right {
                width: 70%;
                /* height: 300px; */
                background-color: white;
                padding: 10px;

            }

            .hero__search__form form button {
                right: 100px !important;
            }

            .item-container {
                width: 100%;
                display: flex;
                flex-flow: row wrap;
            }


            .item-box {
                width: 200px;
                margin-bottom: 15px;
                background-color: white;
                border: none;
                margin-right: 20px;

            }


            .item-images {
                width: 100%;
                height: 170px;
                /* object-fit: cover; */
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


            .item-box-right {
                padding: 5px;
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
                color: crimson;
                font-weight: bold;
                font-size: 17px;
            }

            .item-old-price {
                color: grey;
                text-decoration: line-through;
                font-weight: normal;
                font-size: 14px;
            }

            .item-card {
                width: 100% !important;

            }

            .ads-image {
                width: 80%;
                height: auto;
            }

            .pagination-container {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                justify-content: center;
                margin-top: 15px;
                overflow-x: auto;
            }

            .pagination-container a {
                width: 30px;
                height: 30px;
                border-radius: 30px;

                text-align: center;
                background-color: white;
                border: 1px solid lightgrey;
                color: grey;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-right: 10px;
            }

            .pagination-container a.active {
                background-color: crimson;
                color: white;
            }

            .pagination-container a:hover {
                background-color: rgba(220, 20, 60, 0.527);
                color: white;
            }


            .pagination-container2 {
                width: 100%;
                text-align: center;
                height: 40px;

            }

            .pagination-container2 .prev {
                color: grey;
                font-size: 14px;
                font-weight: 500;
                float: left;
            }

            .pagination-container2 .page-count {
                color: grey;
            }

            .pagination-container2 .next {
                color: crimson;
                float: right;
                font-size: 14px;
                font-weight: 500;
            }




        }

        /** end of bigger screen **/

        .centered-div {
            width: 100%;
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>

    <?php include 'cat-header.php'; ?>


    <!-- main area start --->
    <div class="main-area">
        <div class="left">
            <div class="centered-div">
                <img src="banners/banner10.jpg" class="ads-image" alt="ads image">
            </div>
            <div class="centered-div">
                <img src="banners/banner8.jpg" class="ads-image" alt="ads image">
            </div>
            <div class="centered-div">
                <img src="banners/banner9.jpg" class="ads-image" alt="ads image">
            </div>
        </div>
        <div class="right">

            <!-- filter container start -->
            <?php include 'desktop-filter-container.php'; ?>
            <!-- filter container end -->


            <div class="item-container">
                <?php

                $main_item_array;
                if ($item_is_for != "All") {
                    if (!isset($_SESSION[$item_is_for . 'items'])) {
                        $_SESSION[$item_is_for . 'items'] = [];
                        $result = $db->setQuery("SELECT * FROM product WHERE itemisfor='$item_is_for' AND status='active' ORDER BY RAND();");
                        while ($row = mysqli_fetch_assoc($result)) {
                            $_SESSION[$item_is_for . 'items'][count($_SESSION[$item_is_for . 'items'])] = $row['uniqueid'];
                        }
                    }
                    $main_item_array =  $_SESSION[$item_is_for . 'items'];
                    // $sql = "SELECT * FROM product WHERE itemisfor='$item_is_for' ORDER BY RAND();";
                } else {
                    if (!isset($_SESSION[$item_is_for . 'items'])) {
                        $_SESSION[$item_is_for . 'items'] = [];
                        $result = $db->setQuery("SELECT * FROM product  ORDER BY RAND();");
                        while ($row = mysqli_fetch_assoc($result)) {
                            $_SESSION[$item_is_for . 'items'][count($_SESSION[$item_is_for . 'items'])] = $row['uniqueid'];
                        }
                    }
                    $main_item_array =  $_SESSION[$item_is_for . 'items'];
                    //  $sql = "SELECT * FROM product ORDER BY RAND();";
                }

                $limit = 10;

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                if ($page > count($main_item_array) / $limit) {
                    $page = 1;
                }
                $previous_limits = ($page * $limit) - $limit;

                if ($limit > count($main_item_array)) {
                    $limit = count($main_item_array);
                }

                if (count($main_item_array) != 0) {

                    for ($i = $previous_limits; $i < $limit + $previous_limits; $i++) {

                        if ($product->productExist($main_item_array[$i])) {
                            $item_id = $main_item_array[$i];
                ?>
                            <div class="item-box">
                                <div class="item-box-left">
                                    <a href="product?i=<?php echo $item_id; ?>" style="color:inherit;">
                                        <img data-src="<?php echo $product->getDetail($item_id, "image1"); ?>" class="item-images lazy-loaded-img">
                                    </a>
                                </div>
                                <div class="item-box-right">
                                    <a href="product.php?i=<?php echo $item_id; ?>" style="color:inherit;">
                                        <span style="font-weight:600;font-size:17px;"><?php echo $product->shortenName($product->getDetail($item_id, "name")); ?> </span><br>
                                        <?php echo $product->getStars($item_id, "<i class='fa fa-star' style='color:orange;font-size:13px;'></i>", "<i class='fa fa-star' style='color:lightgrey;font-size:13px;'></i>") ?>
                                        <br>

                                    </a>

                                    <span class="item-price"><span>&#8358</span><?php echo number_format($product->getDetail($item_id, "price")); ?> <span class='item-old-price'><span>&#8358</span><?php echo number_format($product->getDetail($item_id, "old_price")); ?></span></span>

                                    <!-- <a href="product.php?i=<?php echo $item_id; ?>"><button class="btn btn-primary" style="float:right;">view</button></a> -->
                                </div>
                            </div>
                <?php
                        }
                    }
                } else {
                    echo "<div style='width:100%;'>
                
            <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-search'></i></div>
            <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey;'>No items under '$item_is_for' yet </div>
            <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey;'>Other items you may like:</div>
            
           

            </div>";
                }
                ?>
            </div>



            <div class="pagination-component">
                <?php
                $product->getPagination(count($main_item_array), $limit, "cat?item_is_for=$item_is_for");
                ?>
            </div>




        </div>
    </div>
    <!-- main area end--->

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

    <input type="text" class="howmany" value="1" style="display:none;">



    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/jquery.nice-select.min.js"></script> -->
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/banner-handler.js"></script>
    <script src="js/lazyload.js"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        lazyload();


        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/5eecdc9c9e5f69442290ed2b/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>