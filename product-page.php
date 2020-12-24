<?php
session_start();
include 'dbconn.php';
include 'functions.php';
include 'classes/database.class.php';
include 'classes/admin.class.php';
include 'classes/products.class.php';
include 'classes/sellers.class.php';
include 'classes/customers.class.php';


if (!isset($_GET['i'])) {
    $admin->goToPage("./", "invalid_product");
}

$item_id = mysqli_real_escape_string($db->conn, $_GET['i']);


if (!$product->productExist($item_id)) {
    $admin->goToPage("./", "invalid_product");
}

if ($product->getDetail($item_id, "status") == "inactive") {
    $admin->goToPage("./", "invalid_product");
}

$promotion_id = "";
if (isset($_GET['promotion_id'])) {
    if ($product->promotionExist(mysqli_real_escape_string($db->conn, $_GET['promotion_id']))) {
        $promotion_id = mysqli_real_escape_string($db->conn, $_GET['promotion_id']);
    } else {
        $admin->goToPage("./", "invalid_promotion");
    }
}

if (isset($_SESSION['id'])) {
    $sessionid = $_SESSION['id'];
    if (customer_is_logged_in($sessionid)) {
        if (!$customer->customerHaveViewedItem($sessionid, $item_id)) {
            $customer->viewItem($sessionid, $item_id);
        }
    }
}

$product->updateDetail($item_id, "views", "1", "+");

if (!isset($_SESSION['recent_products'])) {
    $_SESSION['recent_products'] = [];
    $_SESSION['recent_products'][0] = $item_id;
} else {
    if (!in_array($item_id, $_SESSION['recent_products'])) {
        $_SESSION['recent_products'][count($_SESSION['recent_products'])] = $item_id;
    }
}

$seller_id = get_item_seller_id($item_id);
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

            .thumb-image {
                width: 100px;
                height: 100px;
            }

            .hero__categories {
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

            /* .humberger__open {
                position: relative;
                top: 50px !important;
                border: none !important;
            } */

            .hero__search__form {
                display: none;
            }

            .hero__search__phone {
                display: none;
            }

            .bottom-add-to-cart-container {
                width: 100%;
                height: 60px;
                background-color: white;
                display: flex;
                position: fixed;
                bottom: 0px;
                left: 0px;
                box-shadow: 0px -3px 6px rgba(0, 0, 0, 0.2);
                z-index: 1000;
                padding: 10px;
                justify-content: center;
            }

            .bottom-add-to-cart-phone {
                width: 40px;
                height: 40px;
                background-color: white;
                box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.3);
                border: none;
                padding: 10px;
                margin-right: 5px;
                font-size: 17px;
                color: crimson;
                display: flex;
                justify-content: center;
            }

            .bottom-add-to-cart-btn {
                width: 70%;
                height: 40px;
                padding: 10px;
                background-color: crimson;
                color: white;
                border-radius: 2px;
                font-size: 17px;
                border: none;
                line-height: 0px;
                box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
            }

            .tips-container {
                width: 100%;
                padding: 5px;
                display: flex;
                flex-flow: row wrap;
            }

            .tips-box {
                width: 100%;
                padding: 10px;
                margin-bottom: 8px;

            }

            .tips-icon {
                width: 40px;
                height: 40px;
                border: none;
                border-radius: 40px;
                background-color: crimson;
                color: white;
                margin-right: 10px;
                font-size: 22px;
            }

            .tips-text {
                font-weight: 600;
                font-size: 18px;
                color: black;
                position: relative;
            }

            .seller-container {
                width: 80%;
                margin: auto;
                padding: 10px;
                box-shadow: 0px 5px 20px lightgrey;
            }

            .seller-company-logo {
                width: 80px;
                height: 80px;
                border-radius: 80px;
            }

            .seller-company-name {
                width: 100%;
                padding: 10px;
                text-align: center;
                font-weight: 600;
            }

            .seller-store-btn {
                padding: 7px;
                background-color: white;
                border: 1px solid crimson;
                color: crimson;
            }

            .views-count {
                display: block;
                color: grey;
                margin-bottom: 10px;
            }
        }

        /** end of smaller screen **/

















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {

            .login-btn {
                display: none;
            }

            .thumb-image {
                width: 100px;
                height: 100px;
            }

            .bottom-add-to-cart-container {
                width: 300px;
                height: 60px;
                background-color: white;
                display: flex;
                position: fixed;
                bottom: 10px;
                right: 10px;
                box-shadow: 0px -3px 6px rgba(0, 0, 0, 0.2);
                z-index: 1000;
                padding: 10px;
                justify-content: center;
            }

            .bottom-add-to-cart-phone {
                width: 40px;
                height: 40px;
                background-color: white;
                box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.3);
                border: none;
                padding: 10px;
                margin-right: 5px;
                font-size: 17px;
                color: crimson;
                display: flex;
                justify-content: center;
            }

            .bottom-add-to-cart-btn {
                width: 70%;
                height: 40px;
                padding: 10px;
                background-color: crimson;
                color: white;
                border-radius: 2px;
                font-size: 17px;
                border: none;
                line-height: 0px;
                box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
            }


            .tips-container {
                width: 100%;
                padding: 5px;
                display: flex;
                flex-flow: row wrap;
                background-color: ;
            }

            .tips-box {
                width: 30%;
                padding: 10px;
                margin-bottom: 5px;
                margin-right: 10px;
                border-radius: 5px;
                box-shadow: 0px 3px 20px lightgrey;
            }

            .tips-icon {
                width: 40px;
                height: 40px;
                border: none;
                border-radius: 40px;
                background-color: crimson;
                color: white;
                margin-right: 10px;
                font-size: 22px;
            }

            .tips-text {
                font-weight: 600;
                font-size: 18px;
                color: black;
                position: relative;
            }


            .seller-container {
                width: 80%;
                margin: auto;
                padding: 10px;
                box-shadow: 0px 5px 20px lightgrey;
            }

            .seller-company-logo {
                width: 120px;
                height: 120px;
                border-radius: 120px;
            }

            .seller-company-name {
                width: 100%;
                padding: 10px;
                text-align: center;
                font-weight: 600;
            }

            .seller-store-btn {
                padding: 7px;
                background-color: white;
                border: 1px solid crimson;
                color: crimson;
                width: 200px;
                text-align: center;
            }

            .views-count {
                display: block;
                color: grey;
                margin-bottom: 10px;
            }
        }

        /** end of bigger screen **/
    </style>

    <meta charset="UTF-8">
    <meta name="description" content="Buy <?php echo get_item_detail($item_id, "name"); ?> on correctleg.com">
    <meta name="keywords" content="Correctleg, foot wears, online shop, Nigerian online shop">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correct Leg - <?php echo get_item_detail($item_id, "name"); ?></title>

    <!-- Google Font -->
    <!-- <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet" /> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

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
    <link rel="stylesheet" href="css/cart.css" type="text/css" />
    <link rel="stylesheet" href="css/pages1.css" type="text/css">
    <link rel="stylesheet" href="css/components.css" type="text/css">


    <!-- og graph start -->
    <meta property="og:url" content="https://correctleg.com/product.php?i=<?php echo get_item_detail($item_id, "uniqueid"); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="CorrectLeg - <?php echo get_item_detail($item_id, "name"); ?>" />
    <meta property="og:description" content="<?php echo get_item_detail($item_id, "description"); ?>" />
    <meta property="og:image" content="https://correctleg.com/<?php echo get_item_detail($item_id, "image1"); ?>" />
    <!-- og graph end -->





</head>

<body>
    <!-- Page Preloder -->








    <!-- header start -->
    <?php include 'header.php'; ?>
    <!-- header end -->




    <!-- Breadcrumb Section Begin --
    <section class="breadcrumb-section set-bg" data-setbg="img/footbanner1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php echo get_item_detail($item_id, 'name'); ?></h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <a href="./index.php"><?php echo get_item_detail($item_id, 'itemtype'); ?></a>
                            <span><?php echo get_item_detail($item_id, 'itemisfor'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad" style="margin-top:-10px;padding:0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large main-image" modal_main_image_index="1" src="<?php echo get_item_detail($item_id, "image1"); ?>" alt="" style="max-height:400px;transition:1s ease;">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">

                            <?php

                            if (get_item_detail($item_id, "image1") != "empty") {

                                $image1 = get_item_detail($item_id, "image1");
                                echo " <img data-imgbigurl='$image1' src='$image1' alt='' class='thumb-image'>";
                            }

                            if (get_item_detail($item_id, "image2") != "empty") {
                                $image2 = get_item_detail($item_id, "image2");
                                echo " <img data-imgbigurl='$image2' src='$image2' alt='' class='thumb-image'>";
                            }

                            if (get_item_detail($item_id, "image3") != "empty") {
                                $image3 = get_item_detail($item_id, "image3");
                                echo " <img data-imgbigurl='$image3' src='$image3' alt='' class='thumb-image'>";
                            }

                            if (get_item_detail($item_id, "image4") != "empty") {
                                $image4 = get_item_detail($item_id, "image4");
                                echo " <img data-imgbigurl='$image4' src='$image4' alt='' class='thumb-image'>";
                            }

                            if (get_item_detail($item_id, "image5") != "empty") {
                                $image5 = get_item_detail($item_id, "image5");
                                echo " <img data-imgbigurl='$image5' src='$image5' alt='' class='thumb-image'>";
                            }
                            ?>
                            <!-- <img data-imgbigurl="img/product/details/product-details-2.jpg" src="img/foot5.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-3.jpg" src="img/foot6.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg" src="img/foot7.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg" src="img/foot8.jpg" alt=""> -->
                        </div>
                    </div>
                </div>

                <?php
                // $price = get_item_detail($item_id, "price");

                // $howmany = get_item_detail($item_id, "howmany");

                // if (item_is_on_clearance_sale($item_id)) {
                //     // $original_price = $price;
                //     //$original_price = $product->getClearancesaleProductDetail($item_id, "price");
                //     $howmany = get_item_clearance_sale_howmany($item_id);
                //     $price = $product->getClearancesaleProductDetail($item_id, "price");
                // }
                if ($promotion_id != "") {
                    $price_removed = $product->getDetail($item_id, "price") * $product->getPromotionProductDetails($item_id, $promotion_id, "discount");
                    $price = $product->getDetail($item_id, "price") - $price_removed;
                    $old_price = $product->getDetail($item_id, "price");
                    $howmany = $product->getPromotionProductDetails($item_id, $promotion_id, "quantity");
                } else {
                    $price = $product->getDetail($item_id, "price");
                    $old_price = $product->getDetail($item_id, "old_price");
                    $howmany = $product->getDetail($item_id, "howmany");
                }


                ?>

                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo get_item_detail($item_id, "name"); ?></h3>
                        <?php
                        // if ($product->getDetail($item_id, "views") >= 5) {
                        //     echo "<span class='views-count'>(" . number_format($product->getDetail($item_id, "views")) . " views)</span>";
                        // }
                        ?>
                        <div class="product__details__rating">

                            <?php
                            echo $product->getStars($item_id, "<i class='fa fa-star'></i>", "<i class='fa fa-star' style='color:lightgrey !important;'></i>");

                            ?>
                            <!-- <span>(18 reviews)</span> -->
                        </div>
                        <?php
                        if ($promotion_id != "") {
                            echo "<div style='width:100%;padding:10px;color:crimson;font-weight:500;font-size:15px;'>-" . $product->getPromotionProductDetails($item_id, $promotion_id, "discount") * 100 .
                                "% OFF(" . $product->getPromotionDetail($promotion_id, "name") . ")</div>";
                        }
                        ?>
                        <div class="product__details__price"><span>&#8358</span><?php echo number_format($price); ?><span style='font-weight:normal;color:grey;font-size:17px;text-decoration:line-through;'><span>&#8358</span><?php echo number_format($old_price); ?></span></div>
                        <span><span style="color:black;font-weight:600;font-size:19px;">Brand:</span> <?php echo $product->getDetail($item_id, "brandname"); ?></span><br>
                        <span><span style="color:black;font-weight:600;font-size:19px;">Productcode:</span> <?php echo $product->getDetail($item_id, "productcode"); ?></span><br>

                        <span><span style="color:black;font-weight:600;font-size:19px;">Sellercode:</span> <?php echo $seller->getDetail($seller_id, "cid"); ?></span>
                        <br><br>


                        <p><?php echo get_item_detail($item_id, "description"); ?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" class="howmany" value="1">
                                </div>
                            </div>
                        </div>
                        <button class="primary-btn add-to-cart-btn" style="border:none;" id="<?php echo $product->getDetail($item_id, "uniqueid"); ?>" itemname="<?php echo $product->getDetail($item_id, "name"); ?>" itemprice="<?php echo $price; ?>" itemimagesrc="<?php echo $product->getDetail($item_id, "image1"); ?>">ADD TO CARD <i class="fa fa-shopping-cart"></i></button>
                        <span style="cursor:pointer;" id="<?php echo $product->getDetail($item_id, "uniqueid"); ?>" class="save-item-btn">Save <span class="icon_heart_alt"></span></span>
                        <ul>
                            <li><b>Availability</b> <span><?php if ($howmany > 0) {
                                                                echo $howmany . " instock";
                                                            } else {
                                                                echo "Out of stock";
                                                            } ?></span></li>
                            <?php
                            if ($product->getDetail($item_id, "size") != "Any") {
                                echo "<li><b>Size</b> <span>" . $product->getDetail($item_id, "size") . " <samp><a href='size-guide' style='color:inherit;text-decoration:underline;'>(read our size guide)</a></samp></span></li>";
                            }

                            ?>
                            <li><b>Shipping</b> <span> 2 to 4 working days. <samp>Free shipping for Orders in River State</samp></span></li>
                            <!-- <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li> -->
                            <li><b>Share item:</b></li>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox"></div>
                        </ul>


                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Secure</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Seller Information</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews <span>(1)</span></a>
                            </li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <!-- <h6>Products Infomation</h6> -->

                                    <!-- tips container start -->
                                    <div class="tips-container">

                                        <!-- trusted and reliable -->
                                        <div class="tips-box">
                                            <button class="tips-icon"><i class="fa fa-shield"></i></button>
                                            <span class="tips-text">Trusted & Reliable</span>
                                        </div>

                                        <!-- trusted and reliable -->
                                        <div class="tips-box">
                                            <button class="tips-icon"><i class="fa fa-bus"></i></button>
                                            <span class="tips-text">Fast in shippment</span>
                                        </div>

                                        <!-- trusted and reliable -->
                                        <div class="tips-box">
                                            <button class="tips-icon"><i class="fa fa-lock"></i></button>
                                            <span class="tips-text">Safe security</span>
                                        </div>

                                    </div>
                                    <!-- tips container end -->
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <!-- <h6>Products Infomation</h6> -->

                                    <!-- seller container start -->
                                    <div class="seller-container">
                                        <?php
                                        $seller_id = get_item_seller_id($item_id);
                                        ?>

                                        <div style="width:100%;display:flex;justify-content:center;">
                                            <img src="<?php if (seller_have_business_details($seller_id)) {
                                                            echo get_seller_business_detail($seller_id, 'logo');
                                                        } else {
                                                            echo "businesslogos/default-business-logo.jpg";
                                                        } ?>" class="seller-company-logo">
                                        </div>


                                        <div class="seller-company-name"><?php if (seller_have_business_details($seller_id)) {
                                                                                echo get_seller_business_detail($seller_id, 'companyname');
                                                                            } else {
                                                                                echo "Seller";
                                                                            } ?></div>

                                        <div style="width:100%;display:flex;justify-content:center;">
                                            <a href="seller-products.php?cid=<?php echo get_seller_detail($seller_id, 'cid'); ?>" class="seller-store-btn">Vist store</a>
                                        </div>

                                    </div>
                                    <!-- seller container end -->
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <!-- <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->




















    <!-- carousel product component start --->
    <?php
    $sql = "SELECT * FROM product WHERE sellerid!='$seller_id' ORDER by RAND() LIMIT 5;";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows != 0) {
    ?>
        <section class="carousel-product-component">
            <div class="component-title" style="">Related products</div>
            <div class="component-container related-products-carousel owl-carousel owl-theme">

                <?php
                if ($seller->haveOtherProducts($seller_id)) {
                    $result1 = $db->setQuery("SELECT * FROM product WHERE sellerid='$seller_id';");
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                ?>
                        <a href="product?i=<?php echo $row1['uniqueid']; ?>" class="box">
                            <!-- <span class="label">20% off</span> -->
                            <div class="centered-div">
                                <img class="lazy-loaded-img" data-src="<?php echo $product->getDetail($row1['uniqueid'], "image1"); ?>">
                            </div>
                            <div class="product-name"><?php echo $product->getDetail($row1['uniqueid'], "name"); ?></div>
                            <div class="stars-container">
                                <i class="fa fa-star star active"></i>
                                <i class="fa fa-star star active"></i>
                                <i class="fa fa-star star active"></i>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                            </div>
                            <div class="product-price">
                                <span class="new-price"><span>&#8358</span><?php echo number_format($product->getDetail($row1['uniqueid'], "price")); ?></span>
                                <span class="old-price"><span>&#8358</span><?php echo number_format($product->getDetail($row1['uniqueid'], "old_price")); ?></span>
                            </div>
                        </a>
                <?php
                    }
                }
                ?>


                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <a href="product?i=<?php echo $row['uniqueid']; ?>" class="box">
                        <span class="label">20% off</span>
                        <div class="centered-div">
                            <img class="lazy-loaded-img" data-src="<?php echo $product->getDetail($row['uniqueid'], "image1"); ?>">
                        </div>
                        <div class="product-name"><?php echo $product->getDetail($row['uniqueid'], "name"); ?></div>
                        <div class="stars-container">
                            <i class="fa fa-star star active"></i>
                            <i class="fa fa-star star active"></i>
                            <i class="fa fa-star star active"></i>
                            <i class="fa fa-star star"></i>
                            <i class="fa fa-star star"></i>
                        </div>
                        <div class="product-price">
                            <span class="new-price"><span>&#8358</span><?php echo number_format($product->getDetail($row['uniqueid'], "price")); ?></span>
                            <span class="old-price"><span>&#8358</span><?php echo number_format($product->getDetail($row['uniqueid'], "old_price")); ?></span>
                        </div>
                    </a>
                <?php
                }
                ?>




            </div>
        </section>
    <?php
    }
    ?>
    <!-- carousel product component end --->



    <!-- carousel product component start --->
    <?php
    if (isset($_SESSION['recent_products']) and count($_SESSION['recent_products']) > 1) {
        $x = count($_SESSION['recent_products']) - 1;
    ?>
        <section class="carousel-product-component">
            <div class="component-title" style="">Recently viewed</div>
            <div class="component-container recently-viewed-carousel owl-carousel owl-theme">
                <?php
                for ($i = 0; $i < count($_SESSION['recent_products']); $i++) {
                    $recent_item_id = $_SESSION['recent_products'][$x];
                    if ($item_id != $recent_item_id) {
                ?>
                        <a href="product?i=<?php echo $recent_item_id; ?>" class="box">
                            <!-- <span class="label">30% off</span> -->
                            <div class="centered-div">
                                <img src="<?php echo $product->getDetail($recent_item_id, "image1"); ?>">
                            </div>
                            <div class="product-name"><?php echo $product->getDetail($recent_item_id, "name"); ?></div>
                            <div class="stars-container">
                                <i class="fa fa-star star active"></i>
                                <i class="fa fa-star star active"></i>
                                <i class="fa fa-star star active"></i>
                                <i class="fa fa-star star"></i>
                                <i class="fa fa-star star"></i>
                            </div>
                            <div class="product-price">
                                <span class="new-price"><span>&#8358</span><?php echo number_format($product->getDetail($recent_item_id, "price")); ?></span>
                                <span class="old-price"><span>&#8358</span><?php echo number_format($product->getDetail($recent_item_id, "old_price")); ?></span>
                            </div>
                        </a>
                <?php
                    }
                    $x--;
                }
                ?>

            </div>
        </section>
    <?php
    }
    ?>
    <!-- carousel product component end --->





























    <!-- start of bottom add to cart container -->
    <div class="bottom-add-to-cart-container">
        <a href="tel:08162383712" class="bottom-add-to-cart-phone"><i class="fa fa-phone"></i></a>
        <button class="bottom-add-to-cart-btn add-to-cart-btn" id="<?php echo get_item_detail($item_id, "uniqueid"); ?>" itemname="<?php echo get_item_detail($item_id, "name"); ?>" itemprice="<?php echo get_item_detail($item_id, "price"); ?>" itemimagesrc="<?php echo get_item_detail($item_id, "image1"); ?>">Add to cart <i class="fa fa-shopping-cart"></i></button>
    </div>
    <!-- bottom add to cart container -->



    <!-- images modal start --->
    <section class="product-images-modal">
        <div class="box">
            <div class="title"> Product images <button class="close-btn image-modal-close-btn"><i class="fa fa-close"></i></button></div>
            <div class="body">
                <div class="image-container">
                    <img src="productimages/foot8.jpg" class="modal-main-image" alt="">
                    <button class="left-btn modal-prev-btn"><i class="fa fa-angle-left"></i></button>
                    <button class="right-btn modal-next-btn"><i class="fa fa-angle-right"></i></button>
                </div>
                <div class="thumbnail-container">
                    <!-- <img src="productimages/foot1.jpg" modal_thumbnail_index="0" class="modal-thumbnail active" alt="">
                    <img src="productimages/foot2.jpg" modal_thumbnail_index="1" class="modal-thumbnail" alt="">
                    <img src="productimages/foot3.jpg" modal_thumbnail_index="2" class="modal-thumbnail" alt="">
                    <img src="productimages/foot4.jpg" modal_thumbnail_index="3" class="modal-thumbnail" alt=""> -->

                    <?php
                    $image_index = 0;
                    if ($product->getDetail($item_id, "image1") != "empty") {
                        echo " <img src='" . $product->getDetail($item_id, "image1") . "' modal_thumbnail_index='$image_index' class='modal-thumbnail active' alt=''>";
                        $image_index++;
                    }
                    if ($product->getDetail($item_id, "image2") != "empty") {
                        echo " <img src='" . $product->getDetail($item_id, "image2") . "' modal_thumbnail_index='$image_index' class='modal-thumbnail active' alt=''>";
                        $image_index++;
                    }
                    if ($product->getDetail($item_id, "image3") != "empty") {
                        echo " <img src='" . $product->getDetail($item_id, "image3") . "' modal_thumbnail_index='$image_index' class='modal-thumbnail active' alt=''>";
                        $image_index++;
                    }
                    if ($product->getDetail($item_id, "image4") != "empty") {
                        echo " <img src='" . $product->getDetail($item_id, "image4") . "' modal_thumbnail_index='$image_index' class='modal-thumbnail active' alt=''>";
                        $image_index++;
                    }
                    if ($product->getDetail($item_id, "image5") != "empty") {
                        echo " <img src='" . $product->getDetail($item_id, "image5") . "' modal_thumbnail_index='$image_index' class='modal-thumbnail active' alt=''>";
                        $image_index++;
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- images modal end --->

    <input type="text" class="promotion-id" value="<?php if (isset($_GET['promotion_id'])) {
                                                        echo $_GET['promotion_id'];
                                                    } ?>" style="display:none;">

    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>
    <!-- Footer Section End -->


    <!-- cart modal start -->
    <?php
    include 'cart-modal.php';
    ?>
    <!-- cart modal end -->



    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/jquery.nice-select.min.js"></script> -->
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <!-- <script src="js/mixitup.min.js"></script> -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/lazyload.js"></script>
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/banner-handler.js"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eeccfcb01a0ed39"></script>


    <script>
        lazyload();
        $('.related-products-carousel').owlCarousel({
            autoplayTimeout: 5000,
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

        $('.recently-viewed-carousel').owlCarousel({
            // loop: true,
            // autoplay: true,
            autoplayTimeout: 5000,
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


        var picking_index = 0;

        $(".main-image").click(function() {
            picking_index = $(this).attr("modal_main_image_index")
            change_modal_image();
            $(".product-images-modal").css("display", "flex");
        })

        $(".image-modal-close-btn").click(function() {
            $(".product-images-modal").css("display", "none");
        })

        images = [];
        <?php

        //$image_array = array($product->getDetail($item_id, "image1"), $product->getDetail($item_id, "image2"), $product->getDetail($item_id, "image3"));
        $image_array = [];
        $image_index = 0;
        if ($product->getDetail($item_id, "image1") != "empty") {
            $image_array[count($image_array)] = $product->getDetail($item_id, "image1");
        }
        if ($product->getDetail($item_id, "image2") != "empty") {
            $image_array[count($image_array)] = $product->getDetail($item_id, "image2");
        }
        if ($product->getDetail($item_id, "image3") != "empty") {
            $image_array[count($image_array)] = $product->getDetail($item_id, "image3");
        }

        if ($product->getDetail($item_id, "image4") != "empty") {
            $image_array[count($image_array)] = $product->getDetail($item_id, "image4");
        }

        if ($product->getDetail($item_id, "image5") != "empty") {
            $image_array[count($image_array)] = $product->getDetail($item_id, "image5");
        }
        foreach ($image_array as $image) {
            if ($image != "") {
                echo '
                images.push("' . $image . '");
                ';
            }
        }
        ?>

        // used php to push images to the image array instead of using javascript down here
        //var images = ["productimages/foot1.jpg", "productimages/foot2.jpg", "productimages/foot3.jpg", "productimages/foot4.jpg"];

        function change_modal_image() {
            $(".modal-main-image").addClass("animate");
            $(".modal-main-image").attr("src", images[picking_index]);
            $(".modal-thumbnail").removeClass("active");
            $("[modal_thumbnail_index = " + picking_index + "]").addClass("active");
            setTimeout(function() {
                $(".modal-main-image").removeClass("animate");
            }, 500)
        }


        $(".modal-thumbnail").click(function() {
            picking_index = $(this).attr("modal_thumbnail_index");
            change_modal_image();
        })

        $(".modal-next-btn").click(function() {
            if (picking_index >= images.length - 1) {
                picking_index = images.length - 1;
                change_modal_image();

            } else {
                picking_index++;
                change_modal_image();
            }
        })


        $(".modal-prev-btn").click(function() {
            if (picking_index <= 0) {
                picking_index = 0;
                change_modal_image();

            } else {
                picking_index--;
                change_modal_image();
            }
        })
    </script>
</body>

</html>