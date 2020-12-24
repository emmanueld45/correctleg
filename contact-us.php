<?php
include 'dbconn.php';
include 'functions.php';


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

            .login-btn {
                display: block;
                font-size: 19px;
                color: crimson;
                height: 35px;

                line-height: 33px;
                text-align: center;
                border: 1px solid crimson;
                cursor: pointer;
                position: absolute;
                right: 15px;
                top: 22px;
                padding-right: 5px;
                padding-left: 5px;
            }

            .humberger__open {
                display: none !important;
            }


        }

        /** end of smaller screen **/















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .login-btn {
                display: none;
            }


        }

        /** end of bigger screen **/
    </style>

    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CorrectLeg | Contact Us</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/mystyle.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>



    <!-- header start -->
    <?php include 'header.php'; ?>
    <!-- header end -->



    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/footbanner1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone" style="color:crimson;"></span>
                        <h4>Phone</h4>
                        <p>+01-3-8888-6868</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt" style="color:crimson;"></span>
                        <h4>Address</h4>
                        <p>60-49 Road Trans Amadi</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt" style="color:crimson;"></span>
                        <h4>Open time</h4>
                        <p>10:00 am to 23:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt" style="color:crimson;"></span>
                        <h4>Email</h4>
                        <p>hello@correctleg.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin --
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49116.39176087041!2d-86.41867791216099!3d39.69977417971648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca48c841038a1%3A0x70cfba96bf847f0!2sPlainfield%2C%20IN%2C%20USA!5e0!3m2!1sen!2sbd!4v1586106673811!5m2!1sen!2sbd" height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>Port-Harcourt</h4>
                <ul>
                    <li>Phone: +12-345-6789</li>
                    <li>Add: 16 Creek Ave. Farmingdale, NY</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="name" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="email" placeholder="Your Email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <input type="text" name="phone" placeholder="Your Phone">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea name="message" placeholder="Your message"></textarea>
                        <button type="submit" name="submit" class="site-btn">SEND MESSAGE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->


    <?php
    if (isset($_GET['message_not_sent'])) {
        echo "<div class='alert alert-danger' style='position:fixed;top:0px;right:10px;z-index:10000;'>
An error ocurred.. <span class='alert-link'>message not sent! try again..</span>
</div>";
    }
    ?>



    <?php
    if (isset($_GET['message_sent'])) {
        echo "<div class='alert alert-success' style='position:fixed;top:0px;right:10px;z-index:10000;'>
 <span class='alert-link'>Message sent successfully!</span>
</div>";
    }
    ?>



    <?php

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $phone = $_POST['phone'];

        $status = "new";
        $sql = "INSERT INTO contactform (name, phone, email, message, status) VALUES ('$name', '$phone', '$email', '$message', '$status');";
        $send = mysqli_query($conn, $sql);

        if ($send) {
            echo '<script>
            window.location.href="contact-us.php?message_sent=true";
            </script>';
        } else {
            echo '<script>
            window.location.href="contact-us.php?message_not_sent=true";
            </script>';
        }
    }











    ?>










    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>
    <!-- Footer Section End -->

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