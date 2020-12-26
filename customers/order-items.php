<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/products.class.php';
include '../classes/customers.class.php';
include '../classes/sellers.class.php';
include '../classes/orders.class.php';

if (!isset($_SESSION['id'])) {
    echo '<script>
window.location.href="login";
</script>';
}

$sessionid = $_SESSION['id'];
$orderid = $_GET['orderid'];


if (isset($_GET['remove_item']) and isset($_GET['orderid']) and isset($_GET['item_id'])) {
    $item_id = mysqli_real_escape_string($db->conn, $_GET['item_id']);
    $order_id = mysqli_real_escape_string($db->conn, $_GET['orderid']);

    $result = $db->setQuery("SELECT * FROM orderproducts WHERE orderid='$order_id' AND productid='$item_id';");
    $row = mysqli_fetch_assoc($result);

    // add the quantity back to ite respective sections
    if ($row['promotion_id'] != "empty" and $product->promotionExist($row['promotion_id'])) {
        if ($product->productHaveVariation($item_id)) {
            $product->increaseVariationStock($item_id, $row['size'], $row['howmany']);
        }
        $product->increasePromotionStock($item_id, $row['promotion_id'], $row['howmany']);
    } else {
        if ($product->productHaveVariation($item_id)) {
            $product->increaseVariationStock($item_id, $row['size'], $row['howmany']);
        } else {
            $product->updateDetail($item_id, "howmany", $row['howmany'], "+");
        }
    }

    $total_price = $row['price'] * $row['howmany'];
    $seller_id = $row['sellerid'];
    $commission = $admin->calcItemCommission($row['price']) * $row['howmany'];
    $amount_remaining = $total_price - $commission;
    $seller->updateDetail($seller_id, "pendingbalance", $amount_remaining, "-");
    $admin->updateAdminDetail("pendingbalance", $commission, "-");

    $db->setQuery("DELETE FROM orderproducts WHERE orderid='$order_id' AND productid='$item_id';");

    if ($order->getNumTotalProductsOrdered($order_id) == 0) {
        $db->setQuery("DELETE FROM orders WHERE orderid='$order_id';");
        $admin->goToPage("my-orders", "order_cancelled");
    } else {
        $admin->goToPage("", "orderid=$order_id&item_removed");
    }
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


            .fixed-head {
                width: 100%;
                padding: 10px;
                height: 50px;
                font-size: 20px;
                background-color: crimson;
                color: white;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);


            }

            .order-container {
                width: 100%;
                padding: 10px;

            }


            .order-box {
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
                border-bottom: 1px solid lightgrey;
            }


            .order-box-left {
                width: 30%;

            }

            .order-box-right {
                width: 70%;
                padding: 10px;

            }

            .order-img {
                width: 100px;
                height: 100px;
            }

        }

        /** end of smaller screen **/




































































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }



            .details-section {
                width: 90%;
                margin: auto;
                padding: 10px;
                background-color: crimson;
                margin-top: 10px;

            }

            .wallet-section {
                width: 90%;
                margin: auto;
                background-color: white;
                box-shadow: 0px 2px 4px lightgrey;
            }


            .items-container {

                background-color: white;
                width: 90%;
                margin: auto;

                margin-top: 10px;
                margin-bottom: 10px;
                height: 200px;
            }

            .items-box {
                width: 100%;
                height: 50px;
                padding: 10px;
                color: grey;
            }




            .order-container {
                width: 100%;
                padding: 10px;

            }


            .order-box {
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
                border-bottom: 1px solid lightgrey;
            }


            .order-box-left {
                width: 20%;

            }

            .order-box-right {
                width: 80%;
                padding: 10px;

            }

            .order-img {
                width: 120px;
                height: 120px;
            }


        }

        /** end of bigger screen **/
    </style>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg - Profile</title>

    <!-- Google Font -->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />

    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>

    <!-- start of mobile view -->
    <div class="mobile-view-container" style="">

        <!-- header start -->
        <div class="fixed-head sticky-top">
            <i class="fa fa-angle-left back-btn"></i> Orders
        </div>
        <!-- header end -->


        <!-- start of order container -->
        <?php
        if (isset($_GET['item_removed'])) {
            echo "<div class='alert alert-danger' style='margin:auto;margin-top:10px;'>Item successfully removed</div>";
        }
        ?>
        <div class="order-container">


            <?php
            $sql = "SELECT * FROM orderproducts WHERE orderid='$orderid';";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);
            //   $row = mysqli_fetch_assoc($result);

            if ($numrows != 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['productid'];
                    $sql1 = "SELECT * FROM product WHERE uniqueid='$product_id';";
                    $result1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_assoc($result1);


            ?>

                    <!-- box 1-->
                    <div class="order-box">
                        <div class="order-box-left">
                            <img src="../<?php echo $row1['image1']; ?>" class="order-img">
                        </div>
                        <div class="order-box-right">
                            <span style="font-weight:600;font-size:17px;"><?php echo $row1['name']; ?> </span><br>
                            <span style="color: crimson;font-size:17px;font-weight:600;"><span>&#8358</span><?php echo number_format($row['price']); ?></span><br>
                            <div><?php echo $product->getStars($row1['uniqueid'], "<i class='fa fa-star' style='color:orange;font-size:12px;'></i>", "<i class='fa fa-star' style='color:lightgrey;font-size:12px;'></i>") ?></div>
                            <span style="color:grey;font-size:12px;font-weight:normal;">Placed on : <?php echo $order->getDetail($orderid, "time_created"); ?></span><br>
                            <span style="color:grey;font-size:12px;font-weight:normal;">Status: <?php if ($row['status'] == "Active") {
                                                                                                    echo "<span style='color:orange;'>Awaiting delivery..</span>";
                                                                                                } else {
                                                                                                    echo "<span style='color:mediumseagreen;'>Delivered <i class='fa fa-check-circle'></i></span>";
                                                                                                } ?></span>
                            <br>
                            <?php
                            if ($row['status'] == "Active") {
                            ?>
                                <a item_id="<?php echo $row1['uniqueid']; ?>" class="btn btn-danger remove-btn" style='font-size:13px;float:right;color:white;'>remove <i class="fa fa-delete"></i></a>
                            <?php

                            }
                            ?>
                            <a href="../product?i=<?php echo $row1['uniqueid']; ?>" class="btn btn-primary" style="float:right;border:none;font-size:13px;margin-right:10px;">view</a>

                        </div>
                    </div>

            <?php
                }
            } else {
                echo "<div style='width:100%;'>
                
                <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:#eee'><i class='fa fa-envelope'></i></div>
                <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey;'>You have not placed any Orders yet!</div>
                
                <a href='../index.php'>
                <div style='width:100%;padding:10px;display:flex;justify-content:center;'>
                <button style='padding:10px;background-color:orange;color:black;border:none;border-radius:3px;box-shadow:0px 2px 5px rgba(0, 0, 0, 0.3);font-size:17px;'>Start Shopping <i class='fa fa-angle-double-right'></i></button>
                </div>
                </a>

                </div>";
            }
            ?>



        </div>
        <!-- end of order container -->





    </div>
    <!-- end of mobile view -->


















































































































    <!--- start of desktop view --->
    <div class="desktop-view-container">


        <!-- header start -->
        <?php include 'header.php'; ?>
        <!-- header end -->



        <!-- main area container start -->
        <div class="row main-area-container">



            <!-- left side start -->
            <div class="col-sm-4">

                <?php include 'desktop-sidebar.php'; ?>




            </div>
            <!-- left side end -->












            <!-- right side start -->
            <div class="col-sm-8">

                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">MY ORDERS</div>
                <?php
                if (isset($_GET['item_removed'])) {
                    echo "<div class='alert alert-danger' style='margin:auto;margin-top:10px;'>Item successfully removed</div>";
                }
                ?>
                <!-- start of order container -->
                <div class="order-container">
                    <?php
                    $sql = "SELECT * FROM orderproducts WHERE orderid='$orderid';";
                    $result = mysqli_query($conn, $sql);
                    $numrows = mysqli_num_rows($result);
                    //    $row = mysqli_fetch_assoc($result);

                    if ($numrows != 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $product_id = $row['productid'];
                            $sql1 = "SELECT * FROM product WHERE uniqueid='$product_id';";
                            $result1 = mysqli_query($conn, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);

                    ?>

                            <!-- box 1-->
                            <div class="order-box">
                                <div class="order-box-left">
                                    <img src="../<?php echo $row1['image1']; ?>" class="order-img">
                                </div>
                                <div class="order-box-right">
                                    <span style="font-weight:600;font-size:17px;"><?php echo $row1['name']; ?> </span><br>
                                    <span style="color: crimson;font-size:17px;font-weight:600;"><span>&#8358</span><?php echo number_format($row['price']); ?></span><br>
                                    <div><?php echo $product->getStars($row1['uniqueid'], "<i class='fa fa-star' style='color:orange;font-size:12px;'></i>", "<i class='fa fa-star' style='color:lightgrey;font-size:12px;'></i>") ?></div>
                                    <span style="color:grey;font-size:12px;font-weight:normal;">Placed on : <?php echo $order->getDetail($orderid, "time_created"); ?></span><br>
                                    <span style="color:grey;font-size:12px;font-weight:normal;">Status: <?php if ($row['status'] == "Active") {
                                                                                                            echo "<span style='color:orange;'>Awaiting delivery..</span>";
                                                                                                        } else {
                                                                                                            echo "<span style='color:mediumseagreen;'>Delivered <i class='fa fa-check-circle'></i></span>";
                                                                                                        } ?></span>
                                    <br>
                                    <a item_id="<?php echo $row1['uniqueid']; ?>" class="btn btn-danger remove-btn" style='font-size:14px;float:right;color:white;'>remove <i class="fa fa-delete"></i></a>
                                    <a href="../product?i=<?php echo $row1['uniqueid']; ?>" class="btn btn-primary" style="float:right;border:none;font-size:14px;margin-right:10px;">view</a>

                                </div>
                            </div>

                    <?php
                        }
                    } else {
                        echo "<div style='width:100%;'>
                
                <div style='width:100%;padding:10px;text-align:center;font-size:80px;color:#eee'><i class='fa fa-envelope'></i></div>
                <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey;'>You have not placed any Orders yet!</div>
                
                <a href='../index.php'>
                <div style='width:100%;padding:10px;display:flex;justify-content:center;'>
                <button style='padding:10px;background-color:orange;color:black;border:none;border-radius:3px;box-shadow:0px 2px 5px rgba(0, 0, 0, 0.3);font-size:17px;'>Start Shopping <i class='fa fa-angle-double-right'></i></button>
                </div>
                </a>

                </div>";
                    }
                    ?>




                </div>
                <!-- end of order container -->




            </div>
            <!-- right side end -->




        </div>
        <!-- main area container end -->








    </div>
    <!-- end of desktop view -->





    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        var order_id = "<?php echo $orderid; ?>";
        $(".back-btn").click(function() {
            window.history.back();
        });

        $(".remove-btn").click(function() {
            var item_id = $(this).attr("item_id");

            if (confirm("Are you sure you want to remove this product from your order")) {
                window.location.href = "?remove_item=true&orderid=" + order_id + "&item_id=" + item_id;
            }
        })
    </script>
</body>

</html>