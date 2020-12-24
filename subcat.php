<?php
session_start();
include 'dbconn.php';
include 'functions.php';

$item_type = $_GET['item_type'];



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


            .item-container {
                width: 100%;
                padding: 10px;

            }


            .item-box {
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
                border-bottom: 1px solid lightgrey;
            }


            .item-box-left {
                width: 30%;

            }

            .item-box-right {
                width: 70%;
                padding: 10px;

            }

            .item-img {
                width: 100px;
                height: 100px;
            }

            .item-brand {
                color: grey;
                font-size: 14px;
            }

        }

        /** end of smaller screen **/



















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
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














            /* .details-section {
                width: 90%;
                margin: auto;
                padding: 10px;
                background-color: #7fad39;

            }

            .wallet-section {
                width: 90%;
                margin: auto;
                background-color: white;
                box-shadow: 0px 2px 4px lightgrey;
            }
*/

            .sidebar-items-container {

                background-color: white;
                width: 90%;
                margin: auto;

                margin-top: 10px;
                margin-bottom: 10px;

            }

            .sidebar-items-box {
                width: 100%;
                height: 50px;
                padding: 10px;
                color: rgb(90, 90, 90);
                font-size: 17px;
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
    <link rel="stylesheet" href="css/cart.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
   <?php include 'loader.php'; ?>



    <!-- start of mobile view -->
    <div class="mobile-view-container" style="background-color:white;">

        <!-- header start -->
        <?php include 'cat-header.php'; ?>
        <!-- header end -->



        <div style="width:100%;padding:10px;text-align:center;font-weight:600;font-size:20px;"> <?php echo $item_type; ?></div>
        <div style="width:100%;padding:5px;">
            <button class="btn humberger__open" style="width:100px !important;padding:0px !important;line-height:0px !important;left:0px !important;top:0px !important;background-color:white !important;color:crimson !important;padding:5px !important;border:1px solid crimson !important;border-radius:3px !important;position:relative !important;font-size:19px !important;">filter <i class="fa fa-search"></i></button>
        </div>
        <!-- box 1-->
        <?php
        $sql = "SELECT * FROM product WHERE itemtype='$item_type' ORDER BY RAND();";
        $result = mysqli_query($conn, $sql);
        $numrows = mysqli_num_rows($result);

        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <div class="item-box">
                    <div class="item-box-left">
                        <a href="product.php?i=<?php echo $row['uniqueid']; ?>" style="color:inherit;">
                            <img src="<?php echo $row['image1']; ?>" class="item-img">
                        </a>
                    </div>
                    <div class="item-box-right">
                        <a href="product.php?i=<?php echo $row['uniqueid']; ?>" style="color:inherit;">
                            <span style="font-weight:600;font-size:17px;"><?php echo $row['name']; ?> </span><br>
                            <i class="fa fa-star" style="color:orange;font-size:13px;"></i>
                            <i class="fa fa-star" style="color:orange;font-size:13px;"></i><br>
                            <span class="item-brand">Brand: <?php echo $row['brandname']; ?></span><br>
                            <!-- <button style="color:white;font-size:13px;background-color:grey;padding:3px;border:none;">New</button><br> -->
                            <span style="color: #7fad39;font-size:17px;"><span>&#8358</span><?php echo number_format($row['price']); ?></span>
                        </a>
                        <!-- <a href="product.php?i=<?php echo $row['uniqueid']; ?>"><button class="btn btn-primary" style="float:right;">view</button></a> -->
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<div style='width:100%;'>
                
            <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-search'></i></div>
            <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey;'>No items under $item_type </div>
            <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey;'>Other items you may like:</div>
            
           

            </div>";
        }
        ?>











        <?php
        $sql1 = "SELECT * FROM product ORDER BY RAND();";
        $result1 = mysqli_query($conn, $sql1);
        $numrows1 = mysqli_num_rows($result1);
        if ($numrows == 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
        ?>
                <div class="item-box">
                    <div class="item-box-left">
                        <a href="product.php?i=<?php echo $row1['uniqueid']; ?>" style="color:inherit;">
                            <img src="<?php echo $row1['image1']; ?>" class="item-img">
                        </a>
                    </div>
                    <div class="item-box-right">
                        <a href="product.php?i=<?php echo $row1['uniqueid']; ?>" style="color:inherit;">
                            <span style="font-weight:600;font-size:17px;"><?php echo $row1['name']; ?> </span><br>
                            <i class="fa fa-star" style="color:orange;font-size:13px;"></i>
                            <i class="fa fa-star" style="color:orange;font-size:13px;"></i><br>
                            <span class="item-brand">Brand: <?php echo $row1['brandname']; ?></span><br>
                            <!-- <button style="color:white;font-size:13px;background-color:grey;padding:3px;border:none;">New</button><br> -->
                            <span style="color: #7fad39;font-size:17px;"><span>&#8358</span><?php echo number_format($row1['price']); ?></span>
                        </a>
                    </div>
                </div>
        <?php
            }
        }
        ?>




    </div>
    <!-- end of mobile view -->


















































































































    <!--- start of desktop view --->
    <div class="desktop-view-container">


        <!-- header start -->
        <?php include 'cat-header.php'; ?>
        <!-- header end -->



        <!-- main area container start -->
        <div class="row main-area-container">



            <!-- left side start -->
            <div class="col-sm-4" style="background-color:#eee;">

                <?php include 'desktop-sidebar.php'; ?>




            </div>
            <!-- left side end -->












            <!-- right side start -->
            <div class="col-sm-8">



                <!-- <div style="width:100%;display:flex;flex-flow:row wrap;">
                    <!-- box 1-
                    <?php
                    $x = 0;
                    while ($x < 12) {
                    ?>
                        <div class="item-box">
                            <div class="item-box-left">
                                <img src="img/foot7.jpg" class="item-img">
                            </div>
                            <div class="item-box-right">
                                <span style="font-weight:600;font-size:17px;">Nikky Shoes </span><br>
                                <i class="fa fa-star" style="color:orange;font-size:13px;"></i>
                                <i class="fa fa-star" style="color:orange;font-size:13px;"></i>
                                <button style="color:white;font-size:13px;background-color:grey;padding:3px;border:none;">New</button><br>
                                <span style="color: #7fad39;font-size:17px;"><span>&#8358</span>7,000</span>
                                <button class="btn btn-primary" style="float:right;">view</button>
                            </div>
                        </div>
                    <?php
                        $x++;
                    }
                    ?>
                </div> -->



                <!-- filter container start -->
                <?php include 'desktop-filter-container.php'; ?>
                <!-- filter container end -->


                <div style="width:100%;padding:10px;text-align:center;font-weight:600;font-size:25px;color: crimson;"><?php echo $item_type; ?></div>

                <div class="filter__item">
                    <div class="row">
                        <!-- <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sort By</span>
                                <select>
                                    <option value="0">Default</option>
                                    <option value="0">Default</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span></span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row" style="width:100% !important;justify-content:center !important;">
                    <?php
                    $sql2 = "SELECT * FROM product WHERE itemtype='$item_type' ORDER BY RAND();";
                    $result2 = mysqli_query($conn, $sql2);
                    $numrows2 = mysqli_num_rows($result2);
                    if ($numrows2 != 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $item_id = $row2['uniqueid'];

                    ?>

                            <div class="col-xm-6 item-box" style="">
                                <div class="card item-card">
                                    <div class="item-images-container">
                                        <img class="card-img-top item-images" src="<?php echo $row2['image1']; ?>" alt="Card image">

                                        <div class="item-images-container-background">
                                            <div class="item-icons-container" style="width:100%;padding:10px;text-align:center;">
                                                <button id="<?php echo get_item_detail($item_id, "uniqueid"); ?>" class="save-item-btn"><i class="fa fa-heart"></i></button>
                                                <button class="primary-btn add-to-cart-btn" style="border:none;padding:0px !important;" id="<?php echo get_item_detail($item_id, "uniqueid"); ?>" itemname="<?php echo get_item_detail($item_id, "name"); ?>" itemprice="<?php echo get_item_detail($item_id, "price"); ?>" itemimagesrc="<?php echo get_item_detail($item_id, "image1"); ?>"><i class="fa fa-shopping-cart"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                    <a href="product.php?i=<?php echo $row2['uniqueid']; ?>" style="color:inherit;">
                                        <div class="card-body">
                                            <h5 class="card-title item-name"><?php echo $row2['name']; ?></h5>
                                            <div style="width:100%;text-align:;">
                                                <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                                <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                                <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                            </div>
                                            <div class="item-brand">Brand: <?php echo $row2['brandname']; ?></div>

                                            <div class="item-price">
                                                <span>&#8358</span><?php echo number_format($row2['price']); ?>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<div style='width:100%;'>
                            
                        <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-search'></i></div>
                        <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey;'>No items under $item_type </div>
                        <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey;'>Other items you may like:</div>
                        
                       
            
                        </div>";
                    }

                    ?>






                    <?php
                    $sql3 = "SELECT * FROM product ORDER BY RAND();";
                    $result3 = mysqli_query($conn, $sql3);
                    $numrows3 = mysqli_num_rows($result3);
                    if ($numrows2 == 0) {
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                            $item_id = $row3['uniqueid'];

                    ?>

                            <div class="col-xm-6 item-box" style="">
                                <div class="card item-card">
                                    <div class="item-images-container">
                                        <img class="card-img-top item-images" src="<?php echo $row3['image1']; ?>" alt="Card image">

                                        <div class="item-images-container-background">
                                            <div class="item-icons-container" style="width:100%;padding:10px;text-align:center;">
                                                <button id="<?php echo get_item_detail($item_id, "uniqueid"); ?>" class="save-item-btn"><i class="fa fa-heart"></i></button>
                                                <button class="primary-btn add-to-cart-btn" style="border:none;padding:0px !important;" id="<?php echo get_item_detail($item_id, "uniqueid"); ?>" itemname="<?php echo get_item_detail($item_id, "name"); ?>" itemprice="<?php echo get_item_detail($item_id, "price"); ?>" itemimagesrc="<?php echo get_item_detail($item_id, "image1"); ?>"><i class="fa fa-shopping-cart"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                    <a href="product.php?i=<?php echo $row3['uniqueid']; ?>" style="color:inherit;">
                                        <div class="card-body">
                                            <h5 class="card-title item-name"><?php echo $row3['name']; ?></h5>
                                            <div style="width:100%;text-align:;">
                                                <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                                <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                                <i class="fa fa-star" style="color:orange;font-size:14px;"></i>
                                            </div>
                                            <div class="item-brand">Brand: <?php echo $row3['brandname']; ?></div>

                                            <div class="item-price">
                                                <span>&#8358</span><?php echo number_format($row3['price']); ?>
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
            <!-- right side end -->




        </div>
        <!-- main area container end -->








    </div>
    <!-- end of desktop view -->



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

    <input type="text" class="howmany" value="1" style="display:none;">



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
</body>

</html>