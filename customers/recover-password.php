<?php
session_start();
include '../dbconn.php';
include '../functions.php';

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

            .login-title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 20px;
                text-align: center;
                margin-top: 50px;
            }

            .form-container {
                width: 90%;
                margin: auto;
                margin-top: 20px;
                margin-bottom: 50px;
            }

            .switching-btn-container {
                width: 100%;

            }

            .switching-btn {
                padding: 10px;
                background-color: lightgrey;
                border: none;
                width: 49%;
                font-size: 18px;

            }

            .active {
                background-color: crimson;
                color: white;
            }

            .field {
                padding: 10px;
                background-color: white;
                border: none;
                border-bottom: 2px solid lightgrey;
                width: 90%;
                margin: auto;
            }

            .submit-btn {
                width: 80%;
                padding: 10px;
                background-color: crimson;
                border: none;
                color: white;
                width: 200px;
                font-size: 18px;
            }
        }

        /** end of smaller screen **/
















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }


            .login-title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 20px;
                text-align: center;
                margin-top: 70px;
            }

            .form-container {
                width: 500px;
                margin: auto;
                margin-top: 20px;
                margin-bottom: 50px;
            }

            .switching-btn-container {
                width: 100%;

            }

            .switching-btn {
                padding: 10px;
                background-color: lightgrey;
                border: none;
                width: 49%;
                font-size: 18px;

            }

            .active {
                background-color: crimson;
                color: white;
            }

            .field {
                padding: 10px;
                background-color: white;
                border: none;
                border-bottom: 2px solid lightgrey;
                width: 90%;
                margin: auto;
            }

            .submit-btn {
                width: 80%;
                padding: 10px;
                background-color: crimson;
                border: none;
                color: white;
                width: 200px;
                font-size: 18px;
            }
        }

        /** end of bigger screen **/
    </style>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg - recover password</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet" />

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


    <a href="../" style="position:absolute;top:5px;left:5px;padding:5px;color:crimson;font-weight:bold;font-size:19px;text-shadow:2px 2px 2px lightgrey;">CORRECT<span style="color:black;">LEG</span></a>




    <div class="login-title">Recover password</div>




    <!-- form container start -->
    <div class="form-container">
        <!-- switch btns container start --
        <div class="switching-btn-container">
            <a href="login.php" style="color:inherit;"> <button class="switching-btn active">Login</button></a>
            <a href="signup.php" style="color:inherit;"> <button class="switching-btn">Sign Up</button></a>
        </div>
        <!-- switching btns container end -->

        <form action="" method="POST">
            <?php if (isset($_GET['email_does_not_exist'])) {
            ?>
                <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                    <span class="alert-link">email address</span> does not exist
                </div>
            <?php } ?>

            <?php if (isset($_GET['error'])) {
            ?>
                <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                    An <span class="alert-link">error occurred!</span> try
                </div>
            <?php } ?>




            <?php
            if (!isset($_GET['email_sent'])) {

            ?>
                <div class="alert alert-info">You will receive an email with a <span class="alert-link">password recovery link</span></div>

                <br>
                <label style="font-weight:600;font-size:;">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="">
                <br>

                <div style="width:100%;display:flex;justify-content:center;">
                    <button type="submit" class="submit-btn" name="submit" value="loginaccount">SEND LINK</button>
                </div>
            <?php
            } else {

            ?>
                <div class="alert alert-success">
                    A password recovery link has been successfully sent to <span class="alert-link"><?php echo $_GET['email']; ?></span>
                </div>
                <div style="width:100%;display:flex;justify-content:center">
                    <a href="login.php" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> return</a>
                </div>
            <?php
            }
            ?>

        </form>
    </div>
    <!-- form container end -->














    <?php

    if (isset($_POST['submit'])) {


        $email = mysqli_real_escape_string($conn, $_POST['email']);



        $sql = "SELECT * FROM customers WHERE email='$email';";
        $result = mysqli_query($conn, $sql);
        $numrows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);


        if ($numrows != 0) {
            send_customer_recover_password_email($email);

            echo '<script>
            window.location.href="recover-password.php?email_sent=true&email=' . $email . '";
            </script>';
        } else {

            echo '<script>
            window.location.href="recover-password.php?email_does_not_exist=true";
            </script>';
        }
    }






    ?>




































    <!-- footer start -->

    <!-- footer end -->


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
        $(".return-btn").click(function() {
            window.history.back();
        });
    </script>
</body>

</html>