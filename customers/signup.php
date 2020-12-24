<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/sellers.class.php';
include '../classes/admin.class.php';





if (isset($_POST['submit'])) {


    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

    $uniqueid = uniqid();
    $image = "../customerimages/defaultimage.png";
    $time = time();
    $date = date("d-m-y");
    $a = date("h");
    $b = $a - 1;
    $c = date("i A");
    $timeview = $b . ":" . $c;
    $status = "inactive";
    $cwallet = 0;
    $new = "yes";
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM customers WHERE email=?;";
    $result = $db->prepareStatement($sql, array($email));
    $numrows = mysqli_num_rows($result);
    if ($numrows == 0) {

        if ($password == $confirmpassword) {

            $sql1 = "INSERT INTO customers (uniqueid, firstname, lastname, phone, email, password, image, time, date, timeview, status, cwallet, new) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

            $result1 = $db->prepareStatement($sql1, array($uniqueid, $firstname, $lastname, $phone, $email, $hashed, $image, $time, $date, $timeview, $status, $cwallet, $new));


            $sql2 = "SELECT * FROM customers WHERE uniqueid='$uniqueid';";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            $_SESSION['id'] = $row2['uniqueid'];

            // send_customer_welcome_email($_SESSION['id']);
            // echo '<script>
            // window.location.href="profile?isnewsignup=true";
            // </script>';
            if ($_POST['checkout'] == "yes") {
                $admin->goToPage("../checkout", "referral=signup");
            } else {
                $admin->goToPage("profile", "is_new_signup");
            }
        } else {
            echo '<script>
        window.location.href="signup?passwords_do_not_match=true";
        </script>';
        }
    } else {
        echo '<script>
        window.location.href="signup?email_exist=true";
        </script>';
    }
}


/*
session_unset();
session_destroy();
*/


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

            .title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 18px;
                text-align: center;
                margin-top: 50px;
            }

            .form-container {
                width: 90%;
                margin: auto;
                margin-top: 20px;
                margin-bottom: 50px;
                box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.2);
                padding: 10px;
                border-radius: 5px;
                border-top: 2px solid crimson;
            }

            .centered-div .image {
                width: 100px;
                height: 100px;
            }


            .form-container .field-container {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                margin-bottom: 20px;

            }

            .form-container .field-container .field {
                padding: 7px;
                background-color: #eee;
                border: none;

            }

            .form-container .centered-div .submit-btn {
                padding: 5px;
                font-size: 15px;
                background-color: crimson;
                color: white;
                border: none;
                border-radius: 3px;


            }



        }

        /** end of smaller screen **/
















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }


            .title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 18px;
                text-align: center;
                margin-top: 50px;
            }

            .form-container {
                width: 400px;
                margin: auto;
                margin-top: 20px;
                margin-bottom: 50px;
                box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.2);
                padding: 10px;
                border-radius: 5px;
                border-top: 2px solid crimson;
            }

            .centered-div .image {
                width: 100px;
                height: 100px;
            }


            .form-container .field-container {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                margin-bottom: 20px;

            }

            .form-container .field-container .field {
                padding: 7px;
                background-color: #eee;
                border: none;

            }

            .form-container .centered-div .submit-btn {
                padding: 5px;
                font-size: 15px;
                background-color: crimson;
                color: white;
                border: none;
                border-radius: 3px;


            }
        }

        /** end of bigger screen **/

        .eye-btn {
            cursor: pointer;
        }

        .centered-div {
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
    <title>Correct Leg</title>

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



    <div class="title">CUSTOMER ACCOUNT</div>


    <div class="centered-div">
        <img src="../img/correctleg-logo.png" class="image" alt="image">
    </div>

    <!-- form container start -->
    <div class="form-container">
        <?php if (isset($_GET['email_exist'])) {
        ?>
            <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                <span class="alert-link">email address</span> already exist
            </div>
        <?php } ?>

        <?php if (isset($_GET['error'])) {
        ?>
            <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                An <span class="alert-link">error occurred!</span> try
            </div>
        <?php } ?>
        <?php if (isset($_GET['passwords_do_not_match'])) {
        ?>
            <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                <span class="alert-link">passwords do not match!</span>
            </div>
        <?php } ?>


        <form action="" method="POST" onsubmit="return validateForm()">
            <br>

            <div class="field-container">
                <input type="text" class="field" name="firstname" placeholder="Firstname" style="width:50%;margin-right:10px;" required>
                <input type="text" class="field" name="lastname" placeholder="Lastname" style="width:50%;" required>
            </div>

            <div class="field-container">
                <input type="text" disabled="true" class="field" placeholder="+234" style="width:30%;margin-right:10px;">
                <input type="tel" class="field phone" name="phone" placeholder="E.g 80xxxxxxx" style="width:70%;" required>
            </div>

            <div class="field-container">
                <input type="email" class="field" name="email" placeholder="Email Address" style="width:100%;" required>
            </div>

            <div class="field-container">
                <input type="password" class="field" name="password" placeholder="Password" style="width:50%;margin-right:10px;" required>
                <input type="password" class="field" name="confirmpassword" placeholder="Confirm password" style="width:50%;" required>
            </div>


            <br>

            <input type="text" name="checkout" value="<?php if (isset($_GET['checkout'])) {
                                                            echo "yes";
                                                        } ?>" style="display:none;">

            <div class="centered-div">
                <button type="submit" class="submit-btn" name="submit" value="submit">CREATE ACCOUNT</button>
            </div>
            <div style="width:100%;text-align:center;padding:10px;font-size:13px;">Already have an account? <a href="login" style="color:crimson;">Login here</a></div>
            <br>



        </form>
    </div>
    <!-- form container end -->













    <?php

    if (isset($_POST['submit'])) {


        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

        $uniqueid = uniqid();
        $image = "../customerimages/defaultimage.png";
        $time = time();
        $date = date("d-m-y");
        $a = date("h");
        $b = $a - 1;
        $c = date("i A");
        $timeview = $b . ":" . $c;
        $status = "inactive";
        $cwallet = 0;
        $new = "yes";
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM customers WHERE email=?;";
        $result = $db->prepareStatement($sql, array($email));
        $numrows = mysqli_num_rows($result);
        if ($numrows == 0) {

            if ($password == $confirmpassword) {

                $sql1 = "INSERT INTO customers (uniqueid, firstname, lastname, phone, email, password, image, time, date, timeview, status, cwallet, new) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                // $result1 = mysqli_query($conn, $sql1);
                $result1 = $db->prepareStatement($sql1, array($uniqueid, $firstname, $lastname, $phone, $email, $hashed, $image, $time, $date, $timeview, $status, $cwallet, $new));

                // if ($result1) {
                $sql2 = "SELECT * FROM customers WHERE uniqueid='$uniqueid';";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                $_SESSION['id'] = $row2['uniqueid'];

                // send_customer_welcome_email($_SESSION['id']);
                echo '<script>
                window.location.href="profile?isnewsignup=true";
                </script>';
                //     } else {
                //         echo '<script>
                // window.location.href="signup?error=true";
                // </script>';
                //     }
            } else {
                echo '<script>
            window.location.href="signup?passwords_do_not_match=true";
            </script>';
            }
        } else {
            echo '<script>
            window.location.href="signup?email_exist=true";
            </script>';
        }
    }


    /*
    session_unset();
    session_destroy();
*/


    ?>







































    <!-- footer start -->
    <?php include 'footer.php'; ?>
    <!-- footer end -->


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/jquery.nice-select.min.js"></script> -->
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        function validateForm() {
            if ($(".phone").val().length != 10) {
                alert("Phone number must be 10 characters e.g 80xxxxxxxx");

                return false;
            } else if ($(".phone").val().charAt(0) == "0") {
                alert("First number cannot be '0' e.g 80xxxxxxxx");
                return false;
            } else {
                return true;
            }
        }


        var eye_closed = true;

        $(".eye-btn").click(function() {
            if (eye_closed == true) {
                $(".eye-btn").removeClass("fa-eye-slash");
                $(".eye-btn").addClass("fa-eye");
                $(".password").attr("type", "text")
                eye_closed = false;
            } else {
                $(".eye-btn").addClass("fa-eye-slash");
                $(".eye-btn").removeClass("fa-eye");
                $(".password").attr("type", "password")
                eye_closed = true;
            }
        })
    </script>
</body>

</html>