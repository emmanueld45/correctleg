<?php
session_start();
include '../dbconn.php';
include '../functions.php';


include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/products.class.php';
include '../classes/customers.class.php';
include '../classes/orders.class.php';

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
                width: 80%;

                background-color: white;
                padding: 10px;
                box-shadow: 3px 6px 10px lightgrey;
                border-radius: 5px;
                margin: auto;
                margin-bottom: 30px;
            }

            .order-box div {
                padding: 10px;
                width: 100%;
                color: grey;
            }

            .view-btn {
                width: 80%;
                padding: 10px;
                border-radius: 10px;
                background-color: crimson;
                color: white;
                border: none;
                text-align: center;
            }

            .track-btn {
                width: 80%;
                padding: 10px;
                border-radius: 10px;
                background-color: white;
                color: crimson;
                border: 1px solid crimson;
                text-align: center;
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
                display: flex;
                flex-flow: row wrap;


            }


            .order-box {
                width: 300px;

                background-color: white;
                padding: 10px;
                box-shadow: 3px 6px 10px lightgrey;
                border-radius: 5px;
                /* margin: auto; */
                margin-bottom: 30px;
                margin-right: 20px;
            }

            .order-box div {
                padding: 10px;
                width: 100%;
                color: grey;
            }

            .view-btn {
                width: 80%;
                padding: 10px;
                border-radius: 10px;
                background-color: crimson;
                color: white;
                border: none;
                text-align: center;
            }

            .track-btn {
                width: 80%;
                padding: 10px;
                border-radius: 10px;
                background-color: white;
                color: crimson;
                border: 1px solid crimson;
                text-align: center;
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
            <i class="fa fa-angle-left back-btn"></i> Orders
        </div>
        <!-- header end -->


        <!-- start of order container -->
        <div class="order-container">

            <?php
            $sql = "SELECT * FROM orders WHERE customerid='$sessionid' ORDER BY id DESC;";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);

            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="order-box">
                        <div>
                            <h5>OrderID: <?php echo $row['orderid']; ?></h5>
                        </div>
                        <div><i class="fa fa-shopping-cart"></i>
                            Quantity: <?php
                                        $no_of_items = get_customer_total_order_items($sessionid, $row['orderid']);
                                        if ($no_of_items == 1) {
                                            echo $no_of_items . " item";
                                        } else {
                                            echo $no_of_items . "items";
                                        }
                                        ?>
                        </div>
                        <div><i class="fa fa-clock-o"></i> Time: <?php echo $row['timeview']; ?></div>
                        <div><i class="fa fa-book"></i> Date: <?php echo $row['date']; ?></div>
                        <div class="c-div">
                            <a href="order-items.php?orderid=<?php echo $row['orderid']; ?>" class="view-btn">View items</a>
                        </div>
                        <div class="c-div">
                            <a href="track-order.php?orderid=<?php echo $row['orderid']; ?>" class="track-btn">Track order</a>
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




                <!-- start of order container -->
                <div class="order-container">

                    <?php
                    $sql = "SELECT * FROM orders WHERE customerid='$sessionid';";
                    $result = mysqli_query($conn, $sql);
                    $numrows = mysqli_num_rows($result);

                    if ($numrows != 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <div class="order-box">
                                <div>
                                    <h5>OrderID: <?php echo $row['orderid']; ?></h5>
                                </div>
                                <div><i class="fa fa-shopping-cart"></i>
                                    Quantity: <?php
                                                $no_of_items = get_customer_total_order_items($sessionid, $row['orderid']);
                                                if ($no_of_items == 1) {
                                                    echo $no_of_items . " item";
                                                } else {
                                                    echo $no_of_items . "items";
                                                }
                                                ?>
                                </div>
                                <div><i class="fa fa-clock-o"></i> Time: <?php echo $row['timeview']; ?></div>
                                <div><i class="fa fa-book"></i> Date: <?php echo $row['date']; ?></div>
                                <div class="c-div">
                                    <a href="order-items.php?orderid=<?php echo $row['orderid']; ?>" class="view-btn">View items</a>
                                </div>
                                <div class="c-div">
                                    <a href="track-order.php?orderid=<?php echo $row['orderid']; ?>" class="track-btn">Track order</a>
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