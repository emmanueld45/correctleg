<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/sellers.class.php';

if (!isset($_SESSION['id'])) {
    $admin->goToPage("login", "invalid_seller");
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

            .mobile-view-container {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                overflow-y: scroll;
                background-color: #eee;
            }

            .fixed-head {
                width: 100%;
                padding: 10px;
                height: 50px;
                border-bottom: 1px solid lightgrey;
                background-color: white;
            }


            .details-section {
                width: 100%;
                padding: 10px;
                background-color: crimson;

            }

            .business-logo {
                width: 50px;
                height: 50px;
                border-radius: 50px;
            }

            .wallet-section {
                background-color: white;
                box-shadow: 0px 2px 4px lightgrey;
            }


            .items-container {

                background-color: white;
                width: 95%;
                margin: auto;
                margin-top: 10px;
                margin-bottom: 30px;
                padding: 10px;
                /* height: 200px; */
            }

            .items-box {
                width: 100%;
                height: 50px;
                padding: 10px;
                color: grey;
                background-color: white;
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

            }

            .business-logo {
                width: 60px;
                height: 60px;
                border-radius: 60px;
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
                margin-bottom: 30px;

            }

            .items-box {
                width: 100%;
                height: 50px;
                padding: 10px;
                color: grey;
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
    <div class="mobile-view-container">

        <!-- header start -->
        <?php include 'header.php'; ?>
        <!-- header end -->

        <!-- details section start-->
        <div class="details-section">

            <div style="width:100%;padding-left:10px;color:white;font-weight:bold;">
                <img src="<?php if (seller_have_business_details($sessionid)) {
                                echo "../" . get_seller_business_detail($sessionid, "logo");
                            } else {
                                echo "../businesslogos/default-business-logo.jpg";
                            } ?>" class="business-logo"> SELLER ACCOUNT <i class="fa fa-users"></i>
            </div>
            <div style="width:100%;padding-left:10px;color:white;">
                Welcome <?php if (seller_have_business_details($sessionid)) {
                            echo get_seller_business_detail($sessionid, "companyname");
                        } else {
                            echo get_seller_detail($sessionid, "firstname");
                        } ?>,
            </div>
            <div style="width:100%;padding-left:10px;color:white;">
                <?php echo get_seller_detaIl($sessionid, "email"); ?>
            </div>


        </div>
        <!-- details section end -->


        <!-- wallet section start -->
        <div class="wallet-section">
            <div style="width:100%;padding:10px;">
                <span style="color:mediumseagreen;">Active balance: <span>&#8358</span><?php echo number_format(get_seller_detail($sessionid, "activebalance")); ?>.00</span><br>
                <span style="color:orange;">Pending balance: <span>&#8358</span><?php echo number_format(get_seller_detail($sessionid, "pendingbalance")); ?>.00</span><br>
                <span style="color:orange;">Pending withdrawals: <span>&#8358</span><?php echo number_format(get_seller_detail($sessionid, "pendingwithdrawals")); ?>.00</span><br>
                <span style="color:;">Seller Code: <span style="color:mediumseagreen;"><?php echo get_seller_detail($sessionid, "cid"); ?></span></span>
            </div>
        </div>
        <!-- wallet section end -->

        <div style="width:100%;padding:10px;color:rgb(90, 90, 90);">MY CORRECTLEG ACCOUNT</div>

        <!-- start of items container -->
        <div class="items-container">


            <!-- Add New-->
            <a href="add-new-choose" style="color:inherit;">
                <div class="items-box">
                    <i class="fa fa-edit"></i> Add New <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a>


            <!-- Orders-->
            <a href="active-orders" style="color:inherit;">
                <div class="items-box">
                    <i class="fa fa-envelope"></i> My Orders <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a>






            <!-- My items-->
            <a href="my-retail-items" style="color:inherit;">
                <div class="items-box">
                    <i class="fa fa-shopping-cart"></i> My Retail Items <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a>


            <a href="my-wholesale-items" style="color:inherit;">
                <div class="items-box">
                    <i class="fa fa-shopping-cart"></i> My Wholesale Items <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a>


            <!-- Clearance sales-->
            <a href="promotions" style="color:inherit;">
                <div class="items-box" style="color:crimson;">
                    <i class="fa fa-gift"></i> Promotions <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a>





        </div>
        <!-- end of items container -->





















        <div style="width:100%;padding:10px;color:rgb(90, 90, 90);">ACCOUNT SETTINGS</div>

        <!-- start of items container -->
        <div class="items-container">

            <!-- tour video-->
            <!-- <a href="tour-video" style="color:inherit;">
                <div class="items-box">
                    <i class="fa fa-play-circle"></i> Tour video <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a> -->

            <!-- Withdrawals-->
            <a href="withdraw" style="color:inherit;">
                <div class="items-box">
                    <i class="fa fa-download"></i> Withdrawal <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a>

            <!-- Personal Details-->
            <a href="personal-details" style="color:inherit;">
                <div class="items-box">
                    <i class="fa fa-user"></i> Personal Details <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a>


            <!-- business Details-->
            <a href="business-details" style="color:inherit;">
                <div class="items-box">
                    <i class="fa fa-file"></i> Business Details <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a>

            <!-- bank Details-->
            <a href="bank-details" style="color:inherit;">
                <div class="items-box">
                    <i class="fa fa-bank"></i> Bank Details <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a>

            <!-- Change Password-->
            <a href="change-password" style="color:inherit;">
                <div class="items-box">
                    <i class="fa fa-lock"></i> Change Password <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a>

            <!-- Logout-->
            <a href="../logout" style="color:red;">
                <div class="items-box" style="color:red">
                    <i class="fa fa-sign-out"></i> Logout <i class="fa fa-angle-right" style="float:right;font-size:20px;position:relative;top:5px;"></i>
                </div>
            </a>





        </div>
        <!-- end of items container -->









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





                <div style="width:100%;padding:10px;font-weight:700;font-size:20px;margin-bottom:10px;">ACCOUNT OVERVIEW</div>
                <a href="add-new-choose"><button class="btn btn-danger">Add item <i class="fa fa-edit"></i></button></a>
                <br><br>


                <div class="row">


                    <!-- order start -->
                    <div class="" style="width:300px;height:100px;background-color:crimson;color:white;border-radius:5px;box-shadow:0px 3px 7px rgba(0, 0, 0, 0.3);text-align:center;margin-right:10px;margin-bottom:10px;">
                        <span style="font-weight:600;font-size:30px;position:relative;top:20px;"><button style="width:50px;height:50px;border-radius:50px;background-color:rgba(0, 0, 0, 0.5);border:none;color:crimson;">
                                <i class="fa fa-envelope"></i></button> <?php if (get_total_orders_from_seller($sessionid) == 1) {
                                                                            echo get_total_orders_from_seller($sessionid) . " Order";
                                                                        } else {
                                                                            echo get_total_orders_from_seller($sessionid) . " Orders";
                                                                        } ?></span>
                    </div>
                    <!-- Orders end -->


                    <!-- items start -->
                    <div class="" style="width:300px;height:100px;background-color:crimson;color:white;border-radius:5px;
                    box-shadow:0px 3px 7px rgba(0, 0, 0, 0.3);text-align:center;margin-right:10px;margin-bottom:10px;">
                        <span style="font-weight:600;font-size:30px;position:relative;top:20px;">
                            <button style="width:50px;height:50px;border-radius:50px;background-color:rgba(0, 0, 0, 0.5);border:none;color:crimson;">
                                <i class="fa fa-shopping-cart"></i></button> <?php if (get_total_items_from_seller($sessionid) == 1) {
                                                                                    echo get_total_items_from_seller($sessionid) . " Item";
                                                                                } else {
                                                                                    echo get_total_items_from_seller($sessionid) . " Items";
                                                                                } ?> </span>
                    </div>
                    <!-- items end -->


                    <!-- account details start -->
                    <div class="card" style="width:300px;margin-right:10px;margin-bottom:10px;">
                        <div class="card-header">Account Details <a href="my-details" style="color:inherit;"><i class="fa fa-edit" style="float:right;color:#7fad39;"></i></a></div>
                        <div class="card-body">
                            Emmanuel Dan-Jumbo<br>
                            <span style="color:grey;font-size:14px;">emmydanjumbo4@gmail.com</span><br><br>
                            <a href="change-password.php" style="color:inherit;"> <span style="color:red;">Change password</span></a>
                        </div>
                    </div>
                    <!-- account details end -->





                </div>








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
</body>

</html>