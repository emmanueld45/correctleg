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
                border-bottom: 1px solid lightgrey;
                background-color: white;
            }


            .form-container {
                width: 90%;
                padding: 10px;
                background-color: #eee;
                margin: auto;
            }


            .upload-btn {
                width: 200px;
                padding: 7px;
                border: none;
                background-color: crimson;
                color: white;
            }

            .video-container {
                width: 90%;
                padding: 10px;
                background-color: #eee;
                margin: auto;
            }

            .tour-video {
                width: 100%;
                height: 200px;
            }

            .change-btn {
                width: 200px;
                padding: 7px;
                border: none;
                background-color: crimson;
                color: white;
            }


            .subscribe-container {
                width: 80%;
                margin: auto;
                height: 300px;
                box-shadow: 5px 5px 10px lightgrey;
                background-color: white;
                border-radius: 10px;
                ;
            }

            .subscribe-container .centered-div .icon {
                width: 70px;
                height: 70px;
            }

            .subscribe-container .title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 20px;
                text-align: center;
            }

            .subscribe-container .message {
                width: 100%;
                text-align: center;

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
                margin-bottom: 70px;
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
                padding: 10px;
                background-color: #eee;
                margin: auto;
            }


            .upload-btn {
                width: 200px;
                padding: 7px;
                border: none;
                background-color: crimson;
                color: white;
            }

            .video-container {
                width: 400px;
                padding: 10px;
                background-color: #eee;
                margin: auto;
            }

            .tour-video {
                width: 100%;
                height: 200px;
            }

            .change-btn {
                width: 200px;
                padding: 7px;
                border: none;
                background-color: crimson;
                color: white;
            }


            .subscribe-container {
                width: 350px;
                margin: auto;
                height: 300px;
                box-shadow: 5px 5px 10px lightgrey;
                background-color: white;
                border-radius: 10px;
                ;
            }

            .subscribe-container .centered-div .icon {
                width: 70px;
                height: 70px;
            }

            .subscribe-container .title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 20px;
                text-align: center;
            }

            .subscribe-container .message {
                width: 100%;
                text-align: center;

            }
        }

        /** end of bigger screen **/

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
    <title>Correct Leg - Tour Video</title>

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
    <div class="mobile-view-container" style="">

        <!-- header start -->
        <?php include 'header.php'; ?>
        <!-- header end -->






        <!-- form container start -->
        <?php
        if (seller_is_subscribed($sessionid)) {
            if (!seller_have_tour_video($sessionid)) {
        ?>

                <div class="form-container">
                    <?php if (isset($_GET['upload_failure'])) {
                    ?>
                        <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                            Video <span class="alert-link">failed to upload!</span> try again.
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET['change_failure'])) {
                    ?>
                        <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                            Video <span class="alert-link">failed to change!</span> try again.
                        </div>
                    <?php } ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div style="width:100%;padding:10px;margin-bottom:30px;">
                            <input type="file" name="video" accept="video/*">
                        </div>

                        <div style="width:100%;display:flex;justify-content:center;">
                            <button name="submit" class="upload-btn">Upload Video <i class="fa fa-upload"></i></button>
                        </div>

                    </form>
                </div>
            <?php
            } else {
            ?>

                <div class="video-container">
                    <?php if (isset($_GET['upload_success'])) {
                    ?>
                        <div class="alert alert-success" style="font-size:15px;margin-top:5px;">
                            Video <span class="alert-link">successfully uploaded!</span>
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET['change_success'])) {
                    ?>
                        <div class="alert alert-success" style="font-size:15px;margin-top:5px;">
                            Video <span class="alert-link">successfully changed!</span>
                        </div>
                    <?php } ?>
                    <?php if (isset($_GET['change_failure'])) {
                    ?>
                        <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                            Video <span class="alert-link">failed to change!</span> try again.
                        </div>
                    <?php } ?>
                    <video class="tour-video" controls autoplay>
                        <source src="../<?php echo get_seller_tour_video($sessionid); ?>" type="video/mp4">
                        <source src="../<?php echo get_seller_tour_video($sessionid); ?>" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>

                    <div style="width:100%;padding:10px;text-align:center;color:black;font-weight:bold;">Change video</div>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div style="width:100%;padding:10px;margin-bottom:30px;">
                            <input type="file" name="video" accept="video/*">
                        </div>
                        <div style="width:100%;display:flex;justify-content:center;">
                            <button name="submit-change" class="change-btn">Change Video <i class="fa fa-refresh"></i></button>
                        </div>
                    </form>
                </div>

            <?php
            }
        } else {
            ?>

            <div class="subscribe-container">

                <div class="centered-div">
                    <img src="../img/star3.png" class="icon" alt="">
                </div>
                <div class="title">Go Permium</div>
                <div class="message">
                    You need to activate your seller premium services in other to post a tour video
                </div>
                <div class="centered-div">
                    <button class="btn btn-warning">Go premium</button>
                </div>

            </div>


        <?php
        }
        ?>
        <!-- form container end -->











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



                <!-- form container start -->
                <?php
                if (seller_is_subscribed($sessionid)) {
                    if (!seller_have_tour_video($sessionid)) {
                ?>

                        <div class="form-container">
                            <?php if (isset($_GET['upload_failure'])) {
                            ?>
                                <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                                    Video <span class="alert-link">failed to upload!</span> try again.
                                </div>
                            <?php } ?>
                            <?php if (isset($_GET['change_failure'])) {
                            ?>
                                <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                                    Video <span class="alert-link">failed to change!</span> try again.
                                </div>
                            <?php } ?>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div style="width:100%;padding:10px;margin-bottom:30px;">
                                    <input type="file" name="video" accept="video/*">
                                </div>

                                <div style="width:100%;display:flex;justify-content:center;">
                                    <button name="submit" class="upload-btn">Upload Video <i class="fa fa-upload"></i></button>
                                </div>

                            </form>
                        </div>
                    <?php
                    } else {
                    ?>

                        <div class="video-container">
                            <?php if (isset($_GET['upload_success'])) {
                            ?>
                                <div class="alert alert-success" style="font-size:15px;margin-top:5px;">
                                    Video <span class="alert-link">successfully uploaded!</span>
                                </div>
                            <?php } ?>
                            <?php if (isset($_GET['change_success'])) {
                            ?>
                                <div class="alert alert-success" style="font-size:15px;margin-top:5px;">
                                    Video <span class="alert-link">successfully changed!</span>
                                </div>
                            <?php } ?>
                            <video class="tour-video" controls autoplay>
                                <source src="../<?php echo get_seller_tour_video($sessionid); ?>" type="video/mp4">
                                <source src="../<?php echo get_seller_tour_video($sessionid); ?>" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>

                            <div style="width:100%;padding:10px;text-align:center;color:black;font-weight:bold;">Change video</div>

                            <form action="" method="POST" enctype="multipart/form-data">
                                <div style="width:100%;padding:10px;margin-bottom:30px;">
                                    <input type="file" name="video" accept="video/*">
                                </div>
                                <div style="width:100%;display:flex;justify-content:center;">
                                    <button name="submit-change" class="change-btn">Change Video <i class="fa fa-refresh"></i></button>
                                </div>
                            </form>
                        </div>

                    <?php
                    }
                } else {
                    ?>

                    <div class="subscribe-container">

                        <div class="centered-div">
                            <img src="../img/star3.png" class="icon" alt="">
                        </div>
                        <div class="title">Go Permium</div>
                        <div class="message">
                            You need to activate your seller premium services in other to post a tour video
                        </div>
                        <br>
                        <div class="centered-div">
                            <button class="btn btn-warning">Go premium</button>
                        </div>

                    </div>


                <?php
                }
                ?>
                <!-- form container end -->





            </div>
            <!-- right side end -->




        </div>
        <!-- main area container end -->








    </div>
    <!-- end of desktop view -->












    <?php


    if (isset($_POST['submit'])) {


        $filename = $_FILES['video']['name'];
        $filetmpname = $_FILES['video']['tmp_name'];
        $filedestination = "../tourvideos/" . $filename;
        $move = move_uploaded_file($filetmpname, $filedestination);
        $video = "tourvideos/" . $filename;
        $sellerid = $_SESSION['id'];


        $sql = "INSERT INTO tourvideo (sellerid, video) VALUES ('$sellerid', '$video');";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            window.location.href="tour-video.php?upload_success=true";
            </script>';
        } else {
            echo '<script>
            window.location.href="tour-video.php?upload_failure=true";
            </script>';
        }
    }




























    if (isset($_POST['submit-change'])) {


        $filename = $_FILES['video']['name'];
        $filetmpname = $_FILES['video']['tmp_name'];
        $filedestination = "../tourvideos/" . $filename;
        $move = move_uploaded_file($filetmpname, $filedestination);
        $video = "tourvideos/" . $filename;
        $sellerid = $_SESSION['id'];


        $sql = "UPDATE tourvideo SET video='$video' WHERE sellerid='$sellerid';";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            window.location.href="tour-video.php?change_success=true";
            </script>';
        } else {
            echo '<script>
            window.location.href="tour-video.php?change_failure=true";
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
</body>

</html>