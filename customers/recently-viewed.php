<?php
session_start();
include '../dbconn.php';
include '../functions.php';


include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/customers.class.php';
include '../classes/products.class.php';


if (!isset($_SESSION['id'])) {
    echo '<script>
window.location.href="login.php";
</script>';
}
$sessionid = $_SESSION['id'];

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
                margin-bottom: 50px;
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
            <i class="fa fa-angle-left back-btn"></i> Recently Viewed <i class="fa fa-eye" style="color:white;"></i>
        </div>
        <!-- header end -->


        <!-- start of order container -->
        <div class="order-container">
            <?php
            $sql = "SELECT * FROM recentlyviewed WHERE customerid='$sessionid' ORDER BY id DESC;";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

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
                            <span style="font-weight:600;font-size:17px;"><?php echo $product->shortenLength($row1['name'], 17, "..."); ?> </span><br>
                            <?php echo $product->getStars($row1['uniqueid'], "<i class='fa fa-star' style='font-size:14px;color:orange;'></i>", "<i class='fa fa-star' style='font-size:14px;color:lightgrey;'></i>"); ?>
                            <br>
                            <button style="color:white;font-size:13px;background-color:grey;padding:3px;border:none;"><?php echo $row1['itemisfor']; ?></button><br>
                            <span style="color: crimson;font-size:17px;font-weight:600;"><span>&#8358</span><?php echo number_format($row1['price']); ?></span>
                            <a href="../product?i=<?php echo $row1['uniqueid']; ?>"><button class="btn btn-primary" style="float:right;background-color:slategrey;border:none;">view</button></a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='alert alert-info'>
                You have no recently viewed items yet!
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

                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">RECENTLY VIEWED <i class="fa fa-eye" style="color:grey;"></i></div>
                <!-- start of order container -->
                <div class="order-container">


                    <!-- box 1-->
                    <?php
                    $sql = "SELECT * FROM recentlyviewed WHERE customerid='$sessionid'  ORDER BY id DESC;";
                    $result = mysqli_query($conn, $sql);
                    $numrows = mysqli_num_rows($result);

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
                                    <span style="font-weight:600;font-size:17px;"><?php echo $product->shortenLength($row1['name'], 17, "..."); ?> </span><br>
                                    <?php echo $product->getStars($row1['uniqueid'], "<i class='fa fa-star' style='font-size:14px;color:orange;'></i>", "<i class='fa fa-star' style='font-size:14px;color:lightgrey;'></i>"); ?>
                                    <br>
                                    <button style="color:white;font-size:13px;background-color:grey;padding:3px;border:none;"><?php echo $row1['itemisfor']; ?></button><br>
                                    <span style="color: crimson;font-size:17px;font-weight:600;"><span>&#8358</span><?php echo number_format($row1['price']); ?></span>
                                    <a href="../product?i=<?php echo $row1['uniqueid']; ?>"><button class="btn btn-primary" style="float:right;background-color:slategrey;border:none;">view</button></a>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<div class='alert alert-info'>
                You have no recently viewed items yet!
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
        $(".back-btn").click(function() {
            window.history.back();
        });
    </script>
</body>

</html>