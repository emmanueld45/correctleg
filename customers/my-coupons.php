<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/customers.class.php';

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

            .coupons-container {
                width: 100%;

            }

            .coupons-container .box {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 5px;
                margin-bottom: 5px;
                font-size: 13px;
            }

            .coupons-container .box .left {
                width: 40%;
            }

            .coupons-container .box .middle {
                width: 30%;
            }

            .coupons-container .box .right {
                width: 30%;
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
                margin-bottom: 40px;
                height: 200px;
            }

            .items-box {
                width: 100%;
                height: 50px;
                padding: 10px;
                color: grey;
            }

            .coupons-container {
                width: 100%;

            }

            .coupons-container .box {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 5px;
                margin-bottom: 5px;
                font-size: 15px;
            }

            .coupons-container .box .left {
                width: 40%;
            }

            .coupons-container .box .middle {
                width: 30%;
            }

            .coupons-container .box .right {
                width: 30%;
            }


        }

        /** end of bigger screen **/

        .c-div {
            width: 100%;
            display: flex;
            justify-content: center;
        }
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
            <i class="fa fa-angle-left back-btn"></i> My Coupons
        </div>
        <!-- header end -->


        <!-- coupons container start --->
        <div class="coupons-container">

            <div class="box" style="background-color:crimson;color:white;">
                <div class="left">Code</div>
                <div class="middle">Amount</div>
                <div class="right">Status</div>
            </div>

            <?php
            $result = $db->setQuery("SELECT * FROM coupons WHERE userid='$sessionid';");
            $numrows = mysqli_num_rows($result);
            $x = 0;
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $x++;
            ?>

                    <div class="box">
                        <div class="left"><b><?php echo $x; ?>.</b> <?php echo $row['coupon_code']; ?></div>
                        <div class="middle" style="color:green;"><span>&#8358</span><?php echo $row['amount']; ?></div>
                        <div class="right"> <?php echo $row['status']; ?></div>
                    </div>
            <?php
                }
            } else {
                echo "<div style='width:100%;text-align:center;color:grey;padding:10px;'>You have no coupon yet!</div>";
            }
            ?>





        </div>
        <!-- coupons container end --->








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

                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">MY COUPONS</div>



                <!-- coupons container start --->
                <div class="coupons-container">

                    <div class="box" style="background-color:crimson;color:white;">
                        <div class="left">Code</div>
                        <div class="middle">Amount</div>
                        <div class="right">Status</div>
                    </div>

                    <?php
                    $result = $db->setQuery("SELECT * FROM coupons WHERE userid='$sessionid';");
                    $numrows = mysqli_num_rows($result);
                    $x = 0;
                    if ($numrows != 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $x++;
                    ?>

                            <div class="box">
                                <div class="left"><b><?php echo $x; ?>.</b> <?php echo $row['coupon_code']; ?></div>
                                <div class="middle" style="color:green;"><span>&#8358</span><?php echo $row['amount']; ?></div>
                                <div class="right"> <?php echo $row['status']; ?></div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<div style='width:100%;text-align:center;color:grey;padding:10px;'>You have no coupon yet!</div>";
                    }
                    ?>


                </div>
                <!-- coupons container end --->





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