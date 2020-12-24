<?php
include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/products.class.php';

$cid = $_GET['cid'];

$sql = "SELECT * FROM sellers WHERE cid='$cid';";
$result = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$seller_id = $row['uniqueid'];
//echo $seller_id;
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

            .main-area-content {
                width: 100% !important;
                margin: auto !important;
                margin-top: 50px !important;
            }

            .head-section {
                width: 100%;
                height: 100px;
                background-color: crimson;

            }

            .head-logo {
                width: 100px;
                height: 100px;
                border-radius: 100px;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
                margin-top: 30px;

            }

            .head-business-name {
                width: 100%;
                text-align: center;
                margin-top: 10px;
                padding: 10px;
                font-size: 20px;
                font-weight: 600;
            }

            .desktop-tour-video {
                display: none !important;
            }

            .mobile-tour-video {
                margin-bottom: 20px;
            }

            .item-images {
                width: 100%;
                max-height: 180px;
            }

            .item-box {
                width: 48% !important;
                margin-bottom: 15px;
                background-color: white !important;
                border: none !important;

            }

            .item-name {
                font-size: 15px;
                font-weight: 600;
                text-align: center;
            }

            .item-brand {
                color: grey;
                font-size: 14px;
            }

            .item-price {
                font-size: 15px;
                font-weight: 600;
                text-align: center;
                color: crimson;
            }

            .item-card {
                width: 100% !important;

            }

            .tour-video {
                width: 100%;
                height: auto;
            }


        }

        /** end of smaller screen **/




































































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .main-area-content {
                width: 90% !important;
                margin: auto !important;
                margin-top: 50px !important;
            }

            .head-section {
                width: 100%;
                height: 100px;
                background-color: crimson;

            }

            .head-logo {
                width: 100px;
                height: 100px;
                border-radius: 100px;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
                margin-top: 30px;

            }

            .head-business-name {
                width: 100%;
                text-align: center;
                margin-top: 10px;
                padding: 10px;
                font-size: 20px;
                font-weight: 600;
            }

            .mobile-tour-video {
                display: none !important;
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
                max-height: 200px;
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

            .tour-video {
                width: 100%;
                height: auto;
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
    <link rel="stylesheet" href="css/mystyle.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>


    <!-- main area content start -->
    <div class="row main-area-content">





        <!-- left side start-->
        <div class="col-sm-8" style="">



            <!-- head scetion start-->
            <div class="head-section">
                <div style="width:100%;display:flex;justify-content:center;">
                    <img src="<?php if (seller_have_business_details($seller_id)) {
                                    echo get_seller_business_detail($seller_id, 'logo');
                                } else {
                                    echo "businesslogos/default-business-logo.jpg";
                                } ?>" class="head-logo">
                </div>
                <div class="head-business-name"><?php if (seller_have_business_details($seller_id)) {
                                                    echo get_seller_business_detail($seller_id, 'companyname');
                                                } ?></div>
            </div>
            <!-- head section end -->




            <div class="row" style="margin-top:150px !important;">

                <!-- <?php
                        if (seller_have_tour_video($seller_id)) {
                        ?>
                    <div class="mobile-tour-video">
                        <div style="width:100%;margin-bottom:8px;font-weight:bold;font-size:23px;">Video Tour</div>
                        <video class="tour-video" controls autoplay>
                            <source src="<?php echo get_seller_tour_video($seller_id); ?>" type="video/mp4">
                            <source src="<?php echo get_seller_tour_video($seller_id); ?>" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                <?php
                        }
                ?> -->

                <?php
                $sql = "SELECT * FROM product WHERE sellerid='$seller_id';";
                $result = mysqli_query($conn, $sql);
                $numrows = mysqli_num_rows($result);
                if ($numrows != 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $item_id = $row['uniqueid'];

                ?>
                        <div class="col-sm-4 col-xm-6 item-box">
                            <div class="card item-card" style="">
                                <a href="product.php?i=<?php echo $item_id; ?>" style="color:inherit;">
                                    <img class="card-img-top item-images" src="<?php echo $row['image1']; ?>" alt="Card image">
                                    <div class="card-body">
                                        <h5 class="card-title item-name"><?php echo $product->shortenName($row['name']); ?></h5>
                                        <div style="width:100%;text-align:;">
                                            <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                            <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                            <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                        </div>
                                        <div class="item-brand">Brand: <?php echo $product->shortenBrandName($row['brandname']); ?></div>

                                        <div class="item-price">
                                            <span>&#8358</span><?php echo number_format($row['price']); ?>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>





            </div>


        </div>
        <!-- left side end -->































        <!-- right side start-->
        <div class="col-sm-4" style="">

            <!-- <?php
                    if (seller_have_tour_video($seller_id)) {
                    ?>
                <div class="desktop-tour-video">
                    <div style="width:100%;margin-bottom:8px;font-weight:bold;font-size:23px;">Video Tour</div>
                    <video class="tour-video" controls autoplay>
                        <source src="<?php echo get_seller_tour_video($seller_id); ?>" type="video/mp4">
                        <source src="<?php echo get_seller_tour_video($seller_id); ?>" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                </div>
            <?php
                    }
            ?> -->

            <?php
            $sql = "SELECT * FROM product ORDER by RAND() LIMIT 5;";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if ($numrows != 0) {
            ?>
                <div class="sidebar__item">
                    <div class="latest-product__text">
                        <h4>Products from other sellers</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <a href="product.php?i=<?php echo $row['uniqueid']; ?>" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="<?php echo $row['image1']; ?>" alt="" style="width:100px;height:100px;">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6><?php echo $product->shortenName($row['name']); ?></h6>
                                            <span><u>&#8358</u><?php echo number_format($row['price']); ?></span>
                                        </div>
                                        <div style="width:100%;text-align:;">
                                            <i class="fa fa-star" style="color:orange;font-size:13px;"></i>
                                            <i class="fa fa-star" style="color:orange;font-size:13px;"></i>
                                            <i class="fa fa-star" style="color:orange;font-size:13px;"></i>
                                        </div>
                                    </a>

                                <?php
                                }
                                ?>




                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>


        </div>
        <!-- right side end -->










    </div>
    <!-- main area content area -->








































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