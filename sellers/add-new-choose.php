<?php
session_start();
include '../dbconn.php';
include '../functions.php';

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

                background-color: crimson;
                color: white;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);
            }


            .choose-container {
                width: 80%;
                margin: auto;
                margin-top: 10px;
                margin-bottom: 50px;
            }

            .retail-btn {
                width: 80%;
                padding: 10px;
                border: none;
                border-radius: 3px;
                background-color: royalblue;
                color: white;
            }


            .wholesale-btn {
                width: 80%;
                padding: 10px;
                border: none;
                border-radius: 3px;
                background-color: crimson;
                color: white;
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
                margin-bottom: 70px;
                height: 200px;
            }

            .items-box {
                width: 100%;
                height: 50px;
                padding: 10px;
                color: grey;
            }


            .choose-container {
                width: 100%;
                margin: auto;
                margin-top: 10px;
                margin-bottom: 50px;
                display: flex;
                flex-flow: row wrap;
            }

            .retail-btn {
                width: 80%;
                padding: 10px;
                border: none;
                border-radius: 3px;
                background-color: royalblue;
                color: white;
            }


            .wholesale-btn {
                width: 80%;
                padding: 10px;
                border: none;
                border-radius: 3px;
                background-color: crimson;
                color: white;
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
            <i class="fa fa-angle-left back-btn"></i> CHOOSE
        </div>
        <!-- header end -->




        <!-- choose container start -->
        <div class="choose-container">



            <!-- retail -->
            <div class="card" style="margin-bottom:15px;">
                <div class="card-header" style="font-weight:600;">RETAIL</div>
                <div class="card-body">

                    <div style="width:100%;margin-bottom:10px;">
                        Sell singular products at Normal price
                    </div>

                    <a href="add-new-retail.php" style="color:inherit;">
                        <div style="width:100%;display:flex;justify-content:center;">
                            <button class="retail-btn">ADD NEW</button>
                        </div>
                    </a>


                </div>
            </div>








            <!-- whole sale -->
            <div class="card">
                <div class="card-header" style="font-weight:600;">WHOLESALE</div>
                <div class="card-body">

                    <div style="width:100%;margin-bottom:10px;">
                        Sell products in bulk at wholesale prices
                    </div>

                    <a href="add-new-wholesale.php" style="color:inherit;">
                        <div style="width:100%;display:flex;justify-content:center;">
                            <button class="wholesale-btn">ADD NEW</button>
                        </div>
                    </a>


                </div>
            </div>





        </div>
        <!-- choose container end -->



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


                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">CHOOSE SALE TYPE</div>
                <!-- choose container start -->
                <div class="choose-container">



                    <!-- retail -->
                    <div class="card" style="margin-bottom:15px;margin-right:15px;width:300px;">
                        <div class="card-header" style="font-weight:600;">RETAIL</div>
                        <div class="card-body">

                            <div style="width:100%;margin-bottom:10px;">
                                Sell singular products at Normal price
                            </div>

                            <a href="add-new-retail.php" style="color:inherit;">
                                <div style="width:100%;display:flex;justify-content:center;">
                                    <button class="retail-btn">ADD NEW</button>
                                </div>
                            </a>


                        </div>
                    </div>








                    <!-- whole sale -->
                    <div class="card" style="width:300px;">
                        <div class="card-header" style="font-weight:600;">WHOLESALE</div>
                        <div class="card-body">

                            <div style="width:100%;margin-bottom:10px;">
                                Sell products in bulk at wholesale prices
                            </div>

                            <a href="add-new-wholesale.php" style="color:inherit;">
                                <div style="width:100%;display:flex;justify-content:center;">
                                    <button class="wholesale-btn">ADD NEW</button>
                                </div>
                            </a>


                        </div>
                    </div>





                </div>
                <!-- choose container end -->




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
        // $(".back-btn").click(function() {
        //     window.history.back();
        // });
    </script>
</body>

</html>