<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/customers.class.php';

if (!isset($_SESSION['id'])) {
    echo '<script>
window.location.href="login";
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



            .address-container {
                width: 90%;
                background-color: white;

                margin: auto;
                margin-top: 10px;
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


            .address-container {
                width: 100%;
                background-color: white;

                margin: auto;
                margin-top: 10px;
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
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>

    <!-- start of mobile view -->
    <div class="mobile-view-container" style="background-color:#eee;height:100%;">

        <!-- header start -->
        <div class="fixed-head sticky-top">
            <i class="fa fa-angle-left back-btn"></i> Address Book
        </div>
        <!-- header end -->



        <!-- start of address container -->
        <div class="address-container">
            <?php
            if (customer_have_shipping_address($sessionid)) {
                $sql = "SELECT * FROM shippingaddress WHERE customerid='$sessionid';";
                $result = mysqli_query($conn, $sql);
                $numrows = mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);
            ?>
                <div style="width:100%;padding:10px;font-weight:600;"><?php echo $row['firstname'] . " " . $row['lastname']; ?></div>
                <div style="width:100%;padding:10px;color:grey;">
                    <?php echo $row['phone']; ?><br>
                    <?php if ($row['additionalphone'] != "Not added") {
                        echo $row['additionalphone'];
                    } ?><br>
                    <?php echo $row['email']; ?><br>
                    <?php echo $row['region']; ?><br>
                    <?php echo $row['address1']; ?><br>
                    <?php if ($row['address2'] != "Not added") {
                        echo $row['address2'];
                    } ?><br>

                </div>

                <div style="width:100%;padding:10px;">
                    <div style="color:#7fad39;">Default Address</div>
                    <a href="change-address.php"> <button class="btn btn-danger">Update</button></a>
                </div>
            <?php
            } else {
                echo "<div style='width:100%;'>
                
                <div style='width:100%;padding:10px;text-align:center;font-size:40px;color:crimson'><i class='fa fa-map-marker'></i></div>
                <div style='width:100%;padding:10px;text-align:center;font-size:19px;'>You have no saved shipping address yet!</div>
                
                <a href='change-address.php'>
                <div style='width:100%;padding:10px;display:flex;justify-content:center;'>
                <button style='padding:10px;background-color:crimson;color:white;border:none;border-radius:3px;box-shadow:0px 2px 5px rgba(0, 0, 0, 0.3);font-size:17px;'>Add address</button>
                </div>
                </a>

                </div>";
            }
            ?>
        </div>
        <!-- end of address container -->






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


                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">ADDRESS BOOK <i class="fa fa-map-marker" style="color:grey;"></i></div>
                <!-- start of address container -->
                <div class="address-container">

                    <?php
                    if (customer_have_shipping_address($sessionid)) {
                        $sql = "SELECT * FROM shippingaddress WHERE customerid='$sessionid';";
                        $result = mysqli_query($conn, $sql);
                        $numrows = mysqli_num_rows($result);
                        $row = mysqli_fetch_assoc($result);
                    ?>
                        <div style="width:100%;padding:10px;font-weight:600;"><?php echo $row['firstname'] . " " . $row['lastname']; ?></div>
                        <div style="width:100%;padding:10px;color:grey;">
                            <?php echo $row['phone']; ?><br>
                            <?php if ($row['additionalphone'] != "") {
                                echo $row['additionalphone'];
                            } ?><br>
                            <?php echo $row['email']; ?><br>
                            <?php echo $row['region']; ?><br>
                            <?php echo $row['address1']; ?><br>
                            <?php if ($row['address2'] != "") {
                                echo $row['address2'];
                            } ?><br>

                        </div>

                        <div style="width:100%;padding:10px;">
                            <div style="color:#7fad39;">Default Address</div>
                            <a href="change-address.php"> <button class="btn btn-danger">Update</button></a>
                        </div>
                    <?php
                    } else {
                        echo "<div style='width:100%;'>
                
                <div style='width:100%;padding:10px;text-align:center;font-size:40px;color:crimson'><i class='fa fa-map-marker'></i></div>
                <div style='width:100%;padding:10px;text-align:center;font-size:19px;'>You have no saved shipping address yet!</div>
                
                <a href='change-address.php'>
                <div style='width:100%;padding:10px;display:flex;justify-content:center;'>
                <button style='padding:10px;background-color:crimson;color:white;border:none;border-radius:3px;box-shadow:0px 2px 5px rgba(0, 0, 0, 0.3);font-size:17px;'>Add address</button>
                </div>
                </a>

                </div>";
                    }
                    ?>

                </div>
                <!-- end of address container -->




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