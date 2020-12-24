<?php
session_start();
include '../dbconn.php';


include '../classes/database.class.php';
include '../classes/customers.class.php';
include '../classes/admin.class.php';
include '../classes/products.class.php';


if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($db->conn, $_POST['email']);
    $password = mysqli_real_escape_string($db->conn, $_POST['password']);


    $sql = "SELECT * FROM customers WHERE email=?;";
    $result = $db->prepareStatement($sql, array($email));

    if (!$result) {
        $admin->goToPage("login", "error");
    } else {

        $numrows = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if ($numrows != 0) {

            $hashed = $row['password'];

            if (PASSWORD_VERIFY($password, $hashed)) {

                $_SESSION['password'] = $row['password'];

                $_SESSION['firstname'] = $row['firstname'];

                $_SESSION['lastname'] = $row['lastname'];

                $_SESSION['id'] = $row['uniqueid'];

                setcookie("customer_id", $_SESSION['id'], time() + 86400);

                if ($_POST['checkout'] == "yes") {
                    $admin->goToPage("../checkout", "referral=login");
                } else {
                    $admin->goToPage("profile", "login_success");
                }
                echo '<script>
        window.location.href="profile";
        </script>';
            } else {
                echo '<script>
    window.location.href="login?incorrect_password=true";
    </script>';
            }
        } else {
            echo '<script>
    window.location.href="login?email_does_not_exist=true";
    </script>';
        }
    }
}




if (isset($_GET['view_saved_item']) and isset($_SESSION['id']) and $customer->customerIsLoggedIn($_SESSION['id'])) {
    $admin->goToPage("saved-items", "");
}


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
                margin-bottom: 15px;

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
                margin-bottom: 15px;

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



    <a href="../index.php" style="position:absolute;top:5px;left:5px;padding:5px;color:crimson;font-weight:bold;font-size:19px;text-shadow:2px 2px 2px lightgrey;">CORRECT<span style="color:black;">LEG</span></a>

    <div class="title">LOGIN CUSTOMER ACCOUNT</div>


    <div class="centered-div">
        <img src="../img/correctleg-logo.png" class="image" alt="image">
    </div>

    <!-- form container start -->
    <div class="form-container">


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

            <?php if (isset($_GET['incorrect_password'])) {
            ?>
                <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                    <span class="alert-link">incorrect password!</span>
                </div>
            <?php } ?>

            <?php if (isset($_GET['password_updated'])) {
            ?>
                <div class="alert alert-success" style="font-size:15px;margin-top:5px;">
                    <span class="alert-link">password updated successfully!</span>
                    Kindly login below
                </div>
            <?php } ?>
            <?php
            if (isset($_GET['checkout'])) {
                echo "<div class='alert alert-info'>
                You have to login below or <a href='signup?checkout' style='font-weight:600;text-decoration:underline;'>Create an account</a> to checkout
                </div>";
            }
            ?>

            <br>
            <label style="font-weight:600;font-size:;">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="" required>
            <br>

            <label style="font-weight:600;font-size:;">Password</label>
            <div style="width:100%;display:flex;flex-flow:row nowrap;border:1px solid #ced4da;;border-radius:.25rem;">
                <div style="width:90%;">
                    <input type="password" name="password" class="form-control password" style="border:none;" placeholder="">
                </div>
                <div style="width:10%;display:flex;justify-content:center;align-items:center;"><i class="fa fa-eye-slash eye-btn"></i></div>
            </div>
            <br>
            <input type="text" name="checkout" value="<?php if (isset($_GET['checkout'])) {
                                                            echo "yes";
                                                        } ?>" style="display:none;">

            <div class="centered-div">
                <button type="submit" class="submit-btn" name="submit" value="loginaccount">LOGIN ACCOUNT</button>
            </div>
            <div style="width:100%;text-align:center;padding:10px;font-size:13px;">Don't have an account? <a href="signup" style="color:crimson;">Register here</a></div>
            <br>


        </form>
    </div>
    <!-- form container end -->























































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