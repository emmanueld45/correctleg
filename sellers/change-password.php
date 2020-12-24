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
                background-color: crimson;
                color: white;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);

            }


            .col-xs-6 {
                width: 45% !important;

            }


            .form-container {
                width: 80%;
                background-color: white;

                margin: auto;
                margin-top: 10px;
            }

            .change-password-btn {
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


            .business-logo {
                width: 60px;
                height: 60px;
                border-radius: 60px;
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
                width: 400px;
                margin: auto;
                background-color: white;

                margin: auto;
                margin-top: 10px;
            }

            .change-password-btn {
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
    <link rel="stylesheet" href="../css/mystyle.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>


    <!-- start of mobile view -->
    <div class="mobile-view-container" style="background-color:;height:100%;">

        <!-- header start -->
        <div class="fixed-head sticky-top">
            <i class="fa fa-angle-left back-btn"></i> Change Password
        </div>
        <!-- header end -->



        <!-- start of passwords container -->
        <div class="form-container">
            <form action="" method="POST">

                <label>Current Password</label>
                <input type="password" name="password" class="form-control">
                <br>
                <label>New Password</label>
                <input type="password" name="newpassword" class="form-control">
                <br>

                <label>Re-type New Password</label>
                <input type="password" name="repeatpassword" class="form-control">
                <br>
                <!-- save btn -->
                <div style="width:100%;display:flex;justify-content:center;margin-bottom:100px;">
                    <button type="submit" name="submit" class="change-password-btn">Change Password</button>
                </div>

            </form>
        </div>
        <!-- end of passwords container -->






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


                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">CHANGE PASSWORD</div>
                <!-- start of address container -->
                <div class="form-container">


                    <form action="" method="POST">

                        <label>Current Password</label>
                        <input type="password" name="password" class="form-control">
                        <br>
                        <label>New Password</label>
                        <input type="password" name="newpassword" class="form-control">
                        <br>

                        <label>Re-type New Password</label>
                        <input type="password" name="repeatpassword" class="form-control">
                        <br>
                        <!-- save btn -->
                        <div style="width:100%;display:flex;justify-content:center;margin-bottom:100px;">
                            <button type="submit" name="submit" class="change-password-btn">Change Password</button>
                        </div>

                    </form>



                </div>
                <!-- end of address container -->




            </div>
            <!-- right side end -->




        </div>
        <!-- main area container end -->








    </div>
    <!-- end of desktop view -->



    <?php if (isset($_GET['password_changed'])) { ?>
        <div class="alert alert-success update-success-box" style="position:fixed;top:10px;right:10px;z-index:1100;display:;">
            Password <span class="alert-link">successfully changed!</span>
        </div>
    <?php }  ?>

    <?php if (isset($_GET['passwords_do_not_match'])) { ?>
        <div class="alert alert-warning update-error-box" style="position:fixed;top:10px;right:10px;z-index:1100;display:;">
            Passwords <span class="alert-link">do not match!</span>
        </div>
    <?php } ?>

    <?php if (isset($_GET['old_password_incorrect'])) { ?>
        <div class="alert alert-warning update-error-box" style="position:fixed;top:10px;right:10px;z-index:1100;display:;">
            incorrect <span class="alert-link">old passsword!</span>
        </div>
    <?php } ?>

    <?php



    if (isset($_POST['submit'])) {
        $hashed = get_seller_detail($sessionid, "password");
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $repeatpassword = $_POST['repeatpassword'];

        if (PASSWORD_VERIFY($password, $hashed)) {

            if ($newpassword == $repeatpassword) {

                $new_hashed = password_hash($newpassword, PASSWORD_DEFAULT);
                $sql = "UPDATE sellers SET password='$new_hashed' WHERE uniqueid='$sessionid';";
                mysqli_query($conn, $sql);

                echo '<script>
       window.location.href="change-password.php?password_changed=true";
        </script>';
            } else {
                echo '<script>
                window.location.href="change-password.php?passwords_do_not_match=true";
        </script>';
            }
        } else {
            echo '<script>
            window.location.href="change-password.php?old_password_incorrect=true";
      </script>';
        }
    }








    ?>


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

    </script>
</body>

</html>