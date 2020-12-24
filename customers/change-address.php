<?php
session_start();
include '../dbconn.php';
include '../functions.php';

$sessionid = $_SESSION['id'];

$firstname = "";
$lastname = "";
$phone = "";
$additionalphone = "";
$email = "";
$address1 = "";
$address2 = "";
$region = "";

if (customer_have_shipping_address($sessionid)) {
    // echo " Customer have shipping address";
    $row = get_customer_shipping_address($sessionid);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $phone = $row['phone'];
    $additionalphone = $row['additionalphone'];
    $email = $row['email'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $region = $row['region'];
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
                width: 97%;
                background-color: white;

                margin: auto;
                margin-top: 10px;
            }

            .save-address-btn {
                width: 80%;
                padding: 8px;
                background-color: crimson;
                color: white;
                border: none;
                font-size: 17px;
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

            .save-address-btn {
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
    <!-- <link rel="stylesheet" href="css/nice-select.css" type="text/css" /> -->
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
            <i class="fa fa-angle-left back-btn"></i> Update Address
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
                    <input type="text" class="form-control col-sm-6 col-xs-6" name="firstname" style="margin-right:7px !important;" value="<?php echo $firstname; ?>" placeholder="" required>
                    <input type="text" class="form-control col-sm-6 col-xs-6" name="lastname" style="" value="<?php echo $lastname; ?>" placeholder="" required>
                </div>
                <br>



                <!-- Phone Numbers-->
                <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                    <div class="" style="margin-right:7px !important;width:45%;">Phone No.</div>
                    <div class="" style="width:45%;padding-left:10px;">Additional No.(optional)</div>
                </div>
                <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">
                    <input type="text" class="form-control col-sm-6 col-xs-6" name="phone" style="margin-right:7px !important;" value="<?php echo $phone; ?>" placeholder="" required>
                    <input type="text" class="form-control col-sm-6 col-xs-6" name="additionalphone" style="" value="<?php echo $additionalphone; ?>" placeholder="">
                </div>
                <br>

                <!-- address1 -->
                <div style="width:100%;padding:10px;">
                    <label>Address 1</label>
                    <input type="text" class="form-control" name="address1" value="<?php echo $address1; ?>" required>
                </div>

                <!-- address2 -->
                <div style="width:100%;padding:10px;">
                    <label>Address 2(optional)</label>
                    <input type="text" class="form-control" name="address2" value="<?php echo $address2; ?>">
                </div>




                <!-- Region & Email-->
                <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                    <div class="" style="margin-right:40px !important;width:45%;">Region</div>
                    <div class="" style="margin-right:0px !important;width:45%;">Email</div>

                </div>

                <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">

                    <!-- region -->
                    <select class="form-control col-sm-6 col-xs-6" name="region" style="margin-right:7px !important;" required>
                        <?php
                        if ($region != "") {
                            echo "<option selected='selected'>$region</option>";
                        } else {
                            echo "<option selected='selected' value=''>Please select</option>";
                        }
                        ?>
                        <option><?php include '../utilities/states.php'; ?></option>
                    </select>
                    <input type="email" class="form-control col-sm-6 col-xs-6" name="email" value="<?php echo $email; ?>" required>
                </div>

                <br>
                <!-- save btn -->
                <div style="width:100%;display:flex;justify-content:center;margin-bottom:100px;">
                    <button type="submit" class="save-address-btn" name="submit">Save Address</button>
                </div>







            </form>
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


                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">UPDATE ADDRESS</div>
                <!-- start of address container -->
                <div class="form-container">


                    <form action="" method="POST">

                        <!-- firstname and last name-->
                        <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                            <div class="" style="margin-right:7px !important;width:45%;">FirstName</div>
                            <div class="" style="width:45%;padding-left:10px;">LastName</div>
                        </div>
                        <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">
                            <input type="text" class="form-control col-sm-6 col-xs-6" name="firstname" style="margin-right:7px !important;" value="<?php echo $firstname; ?>" placeholder="" required>
                            <input type="text" class="form-control col-sm-6 col-xs-6" name="lastname" style="" value="<?php echo $lastname; ?>" placeholder="" required>
                        </div>
                        <br>



                        <!-- Phone Numbers-->
                        <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                            <div class="" style="margin-right:7px !important;width:45%;">Phone No.</div>
                            <div class="" style="width:45%;padding-left:10px;">Additional No.(optional)</div>
                        </div>
                        <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">
                            <input type="text" class="form-control col-sm-6 col-xs-6" name="phone" style="margin-right:7px !important;" value="<?php echo $phone; ?>" placeholder="" required>
                            <input type="text" class="form-control col-sm-6 col-xs-6" name="additionalphone" style="" value="<?php echo $additionalphone; ?>" placeholder="">
                        </div>
                        <br>

                        <!-- address1 -->
                        <div style="width:100%;padding:10px;">
                            <label>Address 1</label>
                            <input type="text" class="form-control" name="address1" value="<?php echo $address1; ?>" required>
                        </div>

                        <!-- address2 -->
                        <div style="width:100%;padding:10px;">
                            <label>Address 2(optional)</label>
                            <input type="text" class="form-control" name="address2" value="<?php echo $address2; ?>">
                        </div>




                        <!-- Region & Email-->
                        <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                            <div class="" style="margin-right:40px !important;width:45%;">Region</div>
                            <div class="" style="margin-right:0px !important;width:45%;">Email</div>

                        </div>

                        <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">

                            <!-- region -->
                            <select class="form-control col-sm-6 col-xs-6" name="region" style="margin-right:7px !important;" required>
                                <?php
                                if ($region != "") {
                                    echo "<option selected='selected'>$region</option>";
                                } else {
                                    echo "<option selected='selected' value=''>Please select</option>";
                                }
                                ?>
                                <option><?php include '../utilities/states.php'; ?></option>
                            </select>
                            <input type="email" class="form-control col-sm-6 col-xs-6" name="email" value="<?php echo $email; ?>" required>
                        </div>

                        <br>
                        <!-- save btn -->
                        <div style="width:100%;display:flex;justify-content:center;margin-bottom:100px;">
                            <button type="submit" class="save-address-btn" name="submit">Save Address</button>
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



    <?php if (isset($_GET['address_updated'])) { ?>
        <div class="alert alert-success update-success-box" style="position:fixed;top:10px;right:10px;z-index:1100;display:;">
            Address <span class="alert-link">updated!</span>
        </div>
    <?php }  ?>

    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger update-error-box" style="position:fixed;top:10px;right:10px;z-index:1100;display:;">
            An <span class="alert-link">error occurred!</span>
        </div>
    <?php } ?>

    <?php
    if (isset($_POST['submit'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $additionalphone = $_POST['additionalphone'];
        if ($additionalphone == "") {
            $additionalphone = "Not added";
        }
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        if ($address2 == "") {
            $address2 = "Not added";
        }
        $region = $_POST['region'];

        if (customer_have_shipping_address($sessionid)) {
            $sql = "UPDATE shippingaddress SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', additionalphone='$additionalphone', address1='$address1', address2='$address2', region='$region' WHERE customerid='$sessionid';";
            $update = mysqli_query($conn, $sql);
        } else {
            $sql = "INSERT INTO shippingaddress (customerid, firstname, lastname, phone, additionalphone, email, address1, address2, region, status) VALUES ('$sessionid', '$firstname', '$lastname', '$phone', '$additionalphone', '$email', '$address1', '$address2', '$region', '$status');";
            $update =  mysqli_query($conn, $sql);
        }

        if ($update) {
            echo '<script>
   window.location.href="change-address.php?address_updated=true";
    </script>';
        } else {
            echo '<script>
            window.location.href="change-address.php?error=true";
    </script>';
        }
    }
    ?>

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
        $(".back-btn").click(function() {
            window.history.back();

        });
    </script>

</body>

</html>