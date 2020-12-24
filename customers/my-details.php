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
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);
                background-color: crimson;
                color: white;

            }


            .col-xs-6 {
                width: 45% !important;

            }


            .form-container {
                width: 97%;
                background-color: white;

                margin: auto;
                margin-top: 10px;
            }

            .save-details-btn {
                width: 80%;
                padding: 10px;
                background-color: crimson;
                color: white;
                border: none;
                font-size: 19px;
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


            .form-container {
                width: 500px;
                margin: auto;
                background-color: white;

                margin: auto;
                margin-top: 10px;
            }

            .save-details-btn {
                width: 80%;
                padding: 10px;
                background-color: crimson;
                color: white;
                border: none;
                font-size: 19px;
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
    <div class="mobile-view-container" style="background-color:;height:100%;">

        <!-- header start -->
        <div class="fixed-head sticky-top">
            <i class="fa fa-angle-left" onclick="go_back()"></i> My Details
        </div>
        <!-- header end -->



        <!-- start of address container -->
        <div class="form-container">
            <form action="" method="POST">

                <!-- firstname and last name-->
                <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                    <div class="" style="margin-right:7px !important;width:45%;">FirstName</div>
                    <div class="" style="width:45%;padding-left:10px;">LastName</div>
                </div>
                <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">
                    <input type="text" class="form-control col-sm-6 col-xs-6" style="margin-right:7px !important;" name="firstname" placeholder="" value="<?php echo get_customer_detail($sessionid, 'firstname'); ?>">
                    <input type="text" class="form-control col-sm-6 col-xs-6" style="" name="lastname" placeholder="" value="<?php echo get_customer_detail($sessionid, 'lastname'); ?>">
                </div>

                <label>Email Address</label>
                <input type="email" class="form-control" name="email" value="<?php echo get_customer_detail($sessionid, 'email'); ?>">
                <br>
                <label>Phone No.</label>
                <input type=" tel" class="form-control" name="phone" value="<?php echo get_customer_detail($sessionid, 'phone'); ?>">




                <br><br><br>

                <!-- save btn -->
                <div style=" width:100%;display:flex;justify-content:center;margin-bottom:100px;">
                    <button type="submit" class="save-details-btn" name="submit">Save Details</button>
                </div>

            </form>
        </div>






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


                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">MY DETAILS</div>
                <!-- start of address container -->
                <div class="form-container">


                    <form action="" method="POST">

                        <!-- firstname and last name-->
                        <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                            <div class="" style="margin-right:7px !important;width:45%;">FirstName</div>
                            <div class="" style="width:45%;padding-left:10px;">LastName</div>
                        </div>
                        <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">
                            <input type="text" class="form-control col-sm-6 col-xs-6" style="margin-right:7px !important;" name="firstname" placeholder="" value="<?php echo get_customer_detail($sessionid, 'firstname'); ?>">
                            <input type="text" class="form-control col-sm-6 col-xs-6" style="" name="lastname" placeholder="" value="<?php echo get_customer_detail($sessionid, 'lastname'); ?>">
                        </div>

                        <label>Email Address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo get_customer_detail($sessionid, 'email'); ?>">
                        <br>
                        <label>Phone No.</label>
                        <input type=" tel" class="form-control" name="phone" value="<?php echo get_customer_detail($sessionid, 'phone'); ?>">




                        <br><br><br>

                        <!-- save btn -->
                        <div style=" width:100%;display:flex;justify-content:center;margin-bottom:100px;">
                            <button type="submit" class="save-details-btn" name="submit">Save Details</button>
                        </div>

                    </form>

                </div>






            </div>
            <!-- end of address container -->




        </div>
        <!-- right side end -->




    </div>
    <!-- main area container end -->








    </div>
    <!-- end of desktop view -->

    <?php if (isset($_GET['details_updated'])) { ?>
        <div class="alert alert-success update-success-box" style="position:fixed;top:10px;right:10px;z-index:1100;display:;">
            Details <span class="alert-link">updated!</span>
        </div>
    <?php }  ?>

    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger update-error-box" style="position:fixed;top:10px;right:10px;z-index:1100;display:;">
            An <span class="alert-link">error occurred!</span>
        </div>
    <?php } ?>



    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <?php
    if (isset($_POST['submit'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "UPDATE customers SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone' WHERE uniqueid='$sessionid';";
        $update = mysqli_query($conn, $sql);

        if ($update) {
            echo '<script>
   window.location.href="my-details.php?details_updated=true";
    </script>';
        } else {
            echo '<script>
            window.location.href="my-details.php?error=true";
    </script>';
        }
    }
    ?>
</body>

</html>