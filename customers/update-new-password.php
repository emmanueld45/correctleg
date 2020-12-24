<?php
session_start();
include '../dbconn.php';

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
    <title>Correct Leg - update new password</title>

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


    <a href="../" style="position:absolute;top:5px;left:5px;padding:5px;color:crimson;font-weight:bold;font-size:19px;text-shadow:2px 2px 2px lightgrey;">CORRECT<span style="color:black;">LEG</span></a>




    <div class="login-title">Update new password</div>




    <!-- form container start -->
    <div class="form-container">
        <!-- switch btns container start --
        <div class="switching-btn-container">
            <a href="login.php" style="color:inherit;"> <button class="switching-btn active">Login</button></a>
            <a href="signup.php" style="color:inherit;"> <button class="switching-btn">Sign Up</button></a>
        </div>
        <!-- switching btns container end -->

        <form action="" method="POST">
            <?php if (isset($_GET['invalid_user'])) {
            ?>
                <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                    <span class="alert-link">user does not exists</span> you might have tempered with the email
                </div>
            <?php } ?>

            <?php if (isset($_GET['error'])) {
            ?>
                <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                    An <span class="alert-link">error occurred!</span> try again
                </div>
            <?php } ?>
            <?php if (isset($_GET['invalid_key'])) {
            ?>
                <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                    An <span class="alert-link">invalid key!</span> try again
                </div>
            <?php } ?>

            <?php if (isset($_GET['passwords_do_not_match'])) {
            ?>
                <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                    <span class="alert-link">Passwords do not match</span> try again
                </div>
            <?php } ?>




            <br>
            <label style="font-weight:600;font-size:;">New password</label>
            <input type="password" name="password" class="form-control" placeholder="">
            <br>

            <label style="font-weight:600;font-size:;">Confirm password</label>
            <input type="password" name="confirmpassword" class="form-control" placeholder="">
            <br>
            <input type="text" name="key" value="<?php echo $_GET['key']; ?>" style="display:none;">
            <input type="text" name="email" value="<?php echo $_GET['email']; ?>" style="display:none;">
            <div style="width:100%;display:flex;justify-content:center;">
                <button type="submit" class="submit-btn" name="submit" value="loginaccount">Update password</button>
            </div>


        </form>
    </div>
    <!-- form container end -->














    <?php

    if (isset($_POST['submit'])) {


        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $key = mysqli_real_escape_string($conn, $_POST['key']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);


        $sql = "SELECT * FROM customers WHERE email='$email';";
        $result = mysqli_query($conn, $sql);
        $numrows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if ($numrows != 0) {

            $sql1 = "SELECT * FROM recoverpasswordkey WHERE secret_key='$key' AND email='$email';";
            $result1 = mysqli_query($conn, $sql1);
            $numrows1 = mysqli_num_rows($result1);

            if ($numrows1 != 0) {

                if ($password == $confirmpassword) {
                    $hashed = password_hash($password, PASSWORD_DEFAULT);

                    $sql2 = "UPDATE customers SET password='$hashed' WHERE email='$email';";
                    $result2 = mysqli_query($conn, $sql2);
                    if ($result2) {
                        echo '<script>
                        window.location.href="login.php?password_updated=true";
                        </script>';
                    } else {
                        echo '<script>
                window.location.href="update-new-password.php?error=true&key=' . $key . '&email=' . $email . '";
                </script>';
                    }
                } else {
                    echo '<script>
                window.location.href="update-new-password.php?passwords_do_not_match=true&key=' . $key . '&email=' . $email . '";
                </script>';
                }
            } else {
                echo '<script>
                window.location.href="update-new-password.php?invalid_key=true&key=' . $key . '&email=' . $email . '";
                </script>';
            }
        } else {

            echo '<script>
            window.location.href="update-new-password.php?invalid_user=true&key=' . $key . '&email=' . $email . '";
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
</body>

</html>