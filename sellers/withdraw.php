<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/sellers.class.php';

include '../classes/admin.class.php';
include '../classes/products.class.php';


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


            .form-container {
                width: 90%;
                padding: 10px;
                margin: auto;

                background-color: #eee;
                border: 1px solid lightgrey;
                margin-top: 10px;
            }

            .withdraw-btn {
                width: 80%;
                padding: 7px;
                background-color: crimson;
                color: white;
                border: none;
            }

            .history-container {
                width: 100%;
                margin-top: 50px;

            }

            .history-container .box {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 5px;
                font-size: 13px;
            }

            .history-container .box .left {
                width: 33%;
            }

            .history-container .box .middle {
                width: 33%;
            }

            .history-container .box .right {
                width: 33%;
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
                padding: 10px;
                margin: auto;

                background-color: #eee;
                border: 1px solid lightgrey;
                margin-top: 30px;
            }

            .withdraw-btn {
                width: 80%;
                padding: 7px;
                background-color: crimson;
                color: white;
                border: none;
            }

            .history-container {
                width: 100%;
                margin-top: 50px;

            }

            .history-container .box {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 5px;
                font-size: 15px;
            }

            .history-container .box .left {
                width: 33%;
            }

            .history-container .box .middle {
                width: 33%;
            }

            .history-container .box .right {
                width: 33%;
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
    <div class="mobile-view-container" style="">

        <!-- header start -->
        <div class="fixed-head sticky-top">
            <i class="fa fa-angle-left back-btn"></i> Withdraw
        </div>
        <!-- header end -->






        <!-- form container start =-->
        <div class="form-container">
            <?php
            if (isset($_GET['withdrawal_sent'])) {
                echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i> Withdrawal request <span class='alert-link'> successfully sent</span> We will contact you soon.</div>";
            }
            ?>
            <?php
            if (isset($_GET['insufficient_fund'])) {
                echo "<div class='alert alert-danger'>Sorry! you dont have <span class='alert-link'>sufficient</span> fund in your active balance</div>";
            }
            ?>

            <?php
            if (isset($_GET['error'])) {
                echo "<div class='alert alert-warning'>Sorry! an <span class='alert-link'>error ocurred</span> try again.</div>";
            }
            ?>
            <div class="alert alert-success" style="font-size:15px;">Active balance: <span>&#8358</span><?php echo number_format(get_seller_detail($sessionid, "activebalance")); ?></div>

            <form action="" method="POST" onsubmit="return validateMobileForm()">
                <label for="">Amount:</label><br>
                <input type="text" name="amount" class="form-control mobile-amount" required><br>
                <div style="display:flex;justify-content:center;">
                    <input type="submit" name="submit" class="withdraw-btn" value="Withdraw">
                </div>
            </form>
        </div>
        <!-- form container end -->


        <!-- history container start --->
        <?php
        $result = $db->setQuery("SELECT * FROM withdrawals WHERE sellerid='$sessionid';");
        $numrows = mysqli_num_rows($result);
        if ($numrows != 0) {
        ?>
            <div class="history-container">

                <div class="box" style="background-color:crimson;color:white;">
                    <div class="left">Amount</div>
                    <div class="middle">Status</div>
                    <div class="right">Date</div>
                </div>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="box">
                        <div class="left"><b>1.</b> <span>&#8358</span><?php echo $row['amount']; ?></div>
                        <div class="middle"><?php if ($row['status'] == "pending") {
                                                echo "<span style='color:orange'>pending</span>";
                                            } else if ($row['status'] == "settled") {
                                                echo "<span style='color:mediumseagreen;'>settled!</span>";
                                            } ?></div>
                        <div class="right"><?php echo $row['date'] . ", " . $db->format_time($row['time']); ?></div>
                    </div>
                <?php
                }
                ?>

            </div>
        <?php
        }
        ?>
        <!--- history container end --->




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




                <!-- form container start =-->
                <div class="form-container">
                    <?php
                    if (isset($_GET['withdrawal_sent'])) {
                        echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i> Withdrawal request <span class='alert-link'> successfully sent</span> We will contact you soon.</div>";
                    }
                    ?>
                    <?php
                    if (isset($_GET['insufficient_fund'])) {
                        echo "<div class='alert alert-danger'>Sorry! you dont have <span class='alert-link'>sufficient</span> fund in your active balance</div>";
                    }
                    ?>

                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-warning'>Sorry! an <span class='alert-link'>error ocurred</span> try again.</div>";
                    }
                    ?>
                    <div class="alert alert-success" style="font-size:15px;">Active balance: <span>&#8358</span><?php echo number_format(get_seller_detail($sessionid, "activebalance")); ?></div>

                    <form action="" method="POST" onsubmit="return validateDesktopForm()">
                        <label for="">Amount:</label><br>
                        <input type="text" name="amount" class="form-control desktop-amount" required><br>
                        <div style="display:flex;justify-content:center;">
                            <input type="submit" name="submit" class="withdraw-btn" value="Withdraw">
                        </div>
                    </form>
                </div>
                <!-- form container end -->





                <!-- history container start --->
                <?php
                $result = $db->setQuery("SELECT * FROM withdrawals WHERE sellerid='$sessionid';");
                $numrows = mysqli_num_rows($result);
                if ($numrows != 0) {
                ?>
                    <div class="history-container">

                        <div class="box" style="background-color:crimson;color:white;">
                            <div class="left">Amount</div>
                            <div class="middle">Status</div>
                            <div class="right">Date</div>
                        </div>

                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="box">
                                <div class="left"><b>1.</b> <span>&#8358</span><?php echo $row['amount']; ?></div>
                                <div class="middle"><?php if ($row['status'] == "pending") {
                                                        echo "<span style='color:orange'>pending</span>";
                                                    } else if ($row['status'] == "settled") {
                                                        echo "<span style='color:mediumseagreen;'>settled!</span>";
                                                    } ?></div>
                                <div class="right"><?php echo $row['date'] . ", " . $db->format_time($row['time']); ?></div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                <?php
                }
                ?>
                <!--- history container end --->




            </div>
            <!-- right side end -->




        </div>
        <!-- main area container end -->








    </div>
    <!-- end of desktop view -->




    <?php


    if (isset($_POST['submit'])) {

        $amount = $_POST['amount'];
        $status = "pending";
        $time = time();
        $date = date("d-m-y");
        $a = date("h");
        $b = $a - 1;
        $c = date("i A");
        $timeview = $b . ":" . $c;

        if ($amount > get_seller_detail($sessionid, "activebalance")) {
            echo '<script>
            window.location.href="withdraw.php?insufficient_fund=true";
            </script>';
        } else {
            $seller->updateDetail($sessionid, "activebalance", $amount, "-");
            $seller->updateDetail($sessionid, "pendingwithdrawals", $amount, "+");
            $sql = "INSERT INTO withdrawals (sellerid, amount, status, date, time, timeview) VALUES ('$sessionid', '$amount', '$status', '$date', '$time', '$timeview');";
            $result = mysqli_query($conn, $sql);

            if ($result) {


                echo '<script>
                window.location.href="withdraw.php?withdrawal_sent=true";
                </script>';
            } else {
                echo '<script>
                window.location.href="withdraw.php?error=true";
                </script>';
            }
        }
    }






    ?>


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


    <script>
        var seller_have_bank_details = "<?php

                                        if (seller_have_bank_details($sessionid)) {
                                            echo "yes";
                                        } else {
                                            echo "no";
                                        }
                                        ?>";
        // $(".back-btn").click(function() {
        //     window.history.back();
        // });

        function validateMobileForm() {
            if (seller_have_bank_details == "no") {
                //var confirm = confirm("You have not added your bank details yet! would you like to add your bank details?");
                if (confirm("You have not added your bank details yet! would you like to add your bank details?")) {
                    window.location.href = "bank-details";
                }
                return false;
            } else
            if (isNaN($(".mobile-amount").val())) {
                alert("Only numbers allowed");
                return false;
            } else {
                return true;
            }
        }

        function validateDesktopForm() {
            if (seller_have_bank_details == "no") {
                //var confirm = confirm("You have not added your bank details yet! would you like to add your bank details?");
                if (confirm("You have not added your bank details yet! would you like to add your bank details?")) {
                    window.location.href = "bank-details";
                }
                return false;
            } else
            if (isNaN($(".desktop-amount").val())) {
                alert("Only numbers allowed");
                return false;
            } else {
                return true;
            }
        }
    </script>
</body>

</html>