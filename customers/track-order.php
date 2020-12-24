<?php
session_start();
include '../dbconn.php';
include '../functions.php';

if (!isset($_SESSION['id'])) {
    echo '<script>
window.location.href="login.php";
</script>';
}

$sessionid = $_SESSION['id'];

$orderid = $_GET['orderid'];

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

            .tracking-container {
                width: 100%;
                padding: 10px;


            }


            .tracking-orderid {
                width: 100%;
                padding: 10px;
                text-align: center;
                font-weight: bold;
                background-color: #eee;
            }

            .tracking-box {
                width: 100%;
                background-color: white;
                padding: 10px;
                /* box-shadow: 3px 6px 10px lightgrey; */
                border-bottom: 1px solid lightgrey;
                border-radius: 5px;
                margin: auto;
                margin-bottom: 20px;
            }

            .tracking-box .time {
                display: block;
                color: crimson;
                font-size: 14px;
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




            .tracking-container {
                width: 100%;
                padding: 10px;


            }


            .tracking-orderid {
                width: 100%;
                padding: 10px;
                text-align: center;
                font-weight: bold;
                background-color: #eee;
            }

            .tracking-box {
                width: 100%;
                background-color: white;
                padding: 10px;
                /* box-shadow: 3px 6px 10px lightgrey; */
                border-bottom: 1px solid lightgrey;
                border-radius: 5px;
                margin: auto;
                margin-bottom: 30px;
            }

            .tracking-box .time {
                display: block;
                color: crimson;
                font-size: 14px;
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
            <i class="fa fa-angle-left back-btn"></i> Order Tracking
        </div>
        <!-- header end -->


        <!-- start of tracking container -->
        <div class="tracking-container">

            <div class="tracking-orderid">Tracking for OrderID: <?php echo $orderid; ?></div>

            <?php
            $sql = "SELECT * FROM order_tracking_details WHERE orderid='$orderid' ORDER BY id DESC;";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="tracking-box">
                        <h4><?php echo $row['title']; ?></h4>
                        <span class="time"><?php echo $row['timeview'] . ", " . $row['date']; ?></span>
                        <div><?php echo $row['content']; ?></div>

                    </div>
            <?php
                }
            } else {
                echo "<br><div class='alert alert-warning'>No tracking message has been sent yet!</div>";
            }

            ?>




        </div>
        <!-- end of tracking container -->





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

                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">ORDER TRACKING</div>




                <!-- start of tracking container -->
                <div class="tracking-container">

                    <div class="tracking-orderid">Tracking for OrderID: <?php echo $orderid; ?></div>

                    <?php
                    $sql = "SELECT * FROM order_tracking_details WHERE orderid='$orderid' ORDER BY id DESC;";
                    $result = mysqli_query($conn, $sql);
                    $numrows = mysqli_num_rows($result);

                    if ($numrows != 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <div class="tracking-box">
                                <h4><?php echo $row['title']; ?></h4>
                                <span class="time"><?php echo $row['timeview'] . ", " . $row['date']; ?></span>
                                <div><?php echo $row['content']; ?></div>

                            </div>
                    <?php
                        }
                    } else {
                        echo "<br><div class='alert alert-warning'>No tracking message has been sent yet!</div>";
                    }

                    ?>




                </div>
                <!-- end of tracking container -->




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