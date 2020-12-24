<?php
session_start();
include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/admin.class.php';
include 'classes/products.class.php';


if (!isset($_GET['i'])) {
    $admin->goToPage("./", "invalid_product");
}

$item_id = mysqli_real_escape_string($conn, $_GET['i']);

if (!$product->wholesaleProductExist($item_id)) {
    $admin->goToPage("./", "invalid_product");
}


$sql = "SELECT * FROM wholesaleproduct WHERE uniqueid='$item_id';";
$result = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$image1 = $row['image1'];
$image2 = $row['image2'];
$image3 = $row['image3'];
$name = $row['name'];
$description = $row['description'];
$itemisfor = $row['itemisfor'];
$size = $row['size'];
$itemtype = $row['itemtype'];
$brandname = $row['brandname'];
$price_per_dozen = $row['price_per_dozen'];
$price_per_set = $row['price_per_set'];
$howmany_per_set = $row['howmany_per_set'];

if ($row['price_per_dozen'] == "empty") {
    $price = $row['price_per_set'];
    $pricing_type = "per_set";
} else {
    $price = $row['price_per_dozen'];
    $pricing_type = "per_dozen";
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

            .thumb-image {
                width: 100px;
                height: 100px;
            }


            .hero__categories {
                display: none;
            }

            .hero__search__form {}

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



        }

        /** end of smaller screen **/

















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {

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
        }

        /** end of bigger screen **/
    </style>

    <meta charset="UTF-8">
    <meta name="description" content="Buy <?php echo $name; ?> on correctleg">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correct Leg - <?php echo $name; ?></title>

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
    <link rel="stylesheet" href="css/cart.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>


    <!-- header start -->
    <?php include 'header.php'; ?>
    <!-- header  end -->








    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/footbanner2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php echo $name; ?></h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html"><?php echo $itemisfor; ?></a>
                            <span><?php echo $itemtype; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="<?php echo $image1; ?>" alt="" style="max-height:400px;">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">

                            <?php

                            if ($image1 != "empty") {


                                echo " <img data-imgbigurl='$image1' src='$image1' alt='' class='thumb-image'>";
                            }

                            if ($image2 != "empty") {

                                echo " <img data-imgbigurl='$image2' src='$image2' alt='' class='thumb-image'>";
                            }

                            if ($image3 != "empty") {

                                echo " <img data-imgbigurl='$image3' src='$image3' alt='' class='thumb-image'>";
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
                /*   $price = get_item_detail($item_id, "price");

                $howmany = get_item_detail($item_id, "howmany");

                if (item_is_on_clearance_sale($item_id)) {
                    $original_price = $price;
                    $howmany = get_item_clearance_sale_howmany($item_id);
                    $price = calc_clearance_sale_price($price);
                }
 */

                ?>

                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $name; ?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <!-- <span>(18 reviews)</span> -->
                        </div>

                        <div class="product__details__price"><span>&#8358</span><?php echo number_format($price); ?></div>
                        <p><?php echo $description; ?></p>
                        <div class="product__details__quantity">
                            <!-- <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" class="howmany" value="1">
                                </div>
                            </div> -->
                        </div>
                        <a href="wholesale-checkout.php?i=<?php echo $row['uniqueid']; ?>" class="primary-btn" style="border:none;color:white;">ORDER NOW <i class="fa fa-shopping-cart"></i></a>
                        <!-- <span style="cursor:pointer;" id="<?php echo get_item_detail($item_id, "uniqueid"); ?>" class="save-item-btn">Save <span class="icon_heart_alt"></span></span> -->
                        <ul>


                            <li><b>Size</b> <span><?php echo $size; ?></span></li>
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
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Secure</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Seller Information</a>
                            </li> -->
                            <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews <span>(1)</span></a>
                            </li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">


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
                                    <!-- <h6>Seller Infomation</h6> -->


                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->


    <?php
    $sql = "SELECT * FROM wholesaleproduct ORDER by RAND();";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);

    if ($numrows > 1) {
    ?>
        <!-- Related Product Section Begin -->
        <section class="related-product">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title related__product__title">
                            <h2>Related Product</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['price_per_dozen'] == "empty") {
                            $price = $row['price_per_set'];
                        } else {
                            $price = $row['price_per_dozen'];
                        }

                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?php echo $row['image1']; ?>">
                                    <!-- <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul> -->
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="wholesale-product.php?i=<?php echo $row['uniqueid']; ?>"><?php echo $row['name']; ?></a></h6>
                                    <h5><span>&#8358</span><?php echo number_format($price); ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>



                </div>
            </div>
        </section>
    <?php
    }
    ?>
    <!-- Related Product Section End -->





























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
    <script src="js/cart.js"></script>

    <script>

    </script>
</body>

</html>