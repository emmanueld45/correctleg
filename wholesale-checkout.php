<?php
session_start();
include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/admin.class.php';
include 'classes/products.class.php';

if (!isset($_GET['i'])) {
    $admin->goToPage("./", "invalid_product");
}

$item_id = mysqli_real_escape_string($conn, $_GET['i']);

if (!$product->wholesaleProductExist($item_id)) {
    $admin->goToPage("./", "invalid_product");
}



$sql = "SELECT * FROM wholesaleproduct WHERE uniqueid='$item_id';";
$result = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$image1 = $row['image1'];
$image2 = $row['image2'];
$image3 = $row['image3'];
$name = $row['name'];
$description = $row['description'];
$itemisfor = $row['itemisfor'];
$size = $row['size'];
$itemtype = $row['itemtype'];
$brandname = $row['brandname'];
$price_per_dozen = $row['price_per_dozen'];
$price_per_set = $row['price_per_set'];
$howmany_per_set = $row['howmany_per_set'];
$sellerid = $row['sellerid'];
$item_id = $row['uniqueid'];

if ($row['price_per_dozen'] == "empty") {
    $price = $row['price_per_set'];
    $pricing_type = "per_set";
    $howmany = $row['howmany_per_set'];
    $pricing_type_text = "Sets";
} else {
    $price = $row['price_per_dozen'];
    $pricing_type = "per_dozen";
    $howmany = 12;
    $pricing_type_text = "Dozens";
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

            .fixed-header {
                width: 100%;
                height: 50px;
                padding: 10px;
                background-color: black;
                box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
            }

            .header-text {
                font-weight: bold;
                color: white;
                font-size: 20px;
            }

            .indicator-container {
                width: 100%;

                display: flex;
                flex-flow: row nowrap;

            }

            .indicator-btn {
                padding: 5px;
                background-color: white;
                border: none;
                color: grey;
            }

            .active {
                background-color: crimson;
                color: white;
                border-radius: 50px;
                line-height: 0px;
            }

            .main-content-area {
                margin-top: 10px;
            }


            .item-details-container {
                width: 90%;
                margin: auto;
                margin-bottom: 15px;
            }

            .address-details-container {
                width: 90%;
                margin: auto;
                margin-bottom: 15px;
            }

            .order-btn {
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

            .fixed-header {
                width: 100%;
                height: 60px;
                padding: 10px;
                background-color: black;
                box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
            }

            .header-text {
                font-weight: bold;
                color: white;
                font-size: 25px;
            }


            .indicator-container {
                width: 600px;
                margin: auto;
                display: flex;
                flex-flow: row nowrap;
                margin-bottom: 40px;

            }

            .indicator-btn {
                padding: 5px;
                background-color: white;
                border: none;
                color: grey;
                font-size: 18px;
            }

            .active {
                background-color: crimson;
                color: white;
                border-radius: 50px;
                line-height: 0px;
            }

            .main-content {
                width: 70%;
                margin: auto;
            }

            .main-content-area {
                width: 500px;
                margin: auto;
                margin-top: 10px;
                background-color: ;
            }

            .item-details-container {
                width: 100%;
                margin: auto;
                margin-bottom: 15px;
            }

            .address-details-container {
                width: 100%;
                margin: auto;
                margin-bottom: 15px;
            }

            .order-btn {
                width: 80%;
                padding: 10px;
                background-color: crimson;
                color: white;
                border: none;
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
    <title>Correct Leg</title>

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
    <link rel="stylesheet" href="css/mystyle.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>




    <!-- header start -->
    <div class="fixed-header sticky-top">
        <span class="header-text">CORRECT<span style="color: crimson;">LEG</span></span>
        <!-- <button style="float:right;"><i class="fa fa-shopping-cart"></i></button> -->
        <button style="float:right;color:white;border:none;background-color:black;"><i class="fa fa-shield" style="color:orange;font-size:20px;position:relative;top:3px;"></i> secure checkout</button>
    </div>
    <!-- header end -->



    <!-- indicator container start -->
    <div class="indicator-container">

        <div class="form-control" style="display:flex;justify-content:center;border:none;">
            <button class="indicator-btn active">WHOLESALE</button>
        </div>

        <!-- <div class="form-control" style="display:flex;justify-content:center;border:none;">
            <button class="indicator-btn">DELIVERY</button>
        </div>

        <div class="form-control" style="display:flex;justify-content:center;border:none;">
            <button class="indicator-btn">PAYMENT</button>
        </div> -->

    </div>
    <!-- indicator container end -->



    <!-- start of main content area -->
    <div class="main-content">
        <form action="" method="POST">
            <div class="main-content-area">




                <!-- item details container start -->
                <div class="item-details-container">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-check-circle" style="color:lightgrey;"></i> <span style="font-weight:bold;">1. Product details</span></div>

                        <div class="card-body">

                            <!-- items container start -->
                            <div style="width:100%;bottom:1px solid lightgrey;">

                                <div style="width:100%;padding:0px;height:65px;">
                                    <img src="<?php echo $row['image1']; ?>" style="width:50px;height:50px;float:left;">
                                    <span style="float:right;position:relative;top:15px;margin-left:80px;"><span>&#8358</span><?php echo number_format($price); ?></span>

                                </div>


                            </div>
                            <!-- items container end -->

                            <!-- pricing type start-->
                            <div style="width:100%;margin-top:5px;">
                                <span style="float:left;font-weight:bold;">Pricing Type:</span>
                                <span style="float:right;position:relative;"><?php echo "(" . $howmany . " items)" . $pricing_type; ?></span>
                                <input type="text" name="pricing_type" value="<?php echo $pricing_type; ?>" style="display:none;">
                            </div>

                            <!-- pricing type end -->

                            <!-- howmany start-->
                            <br>
                            <div style="width:80%;margin:auto;background-color:crimson;color:white;padding:10px;margin-top:15px;">
                                <label>How Many <?php echo $pricing_type_text; ?> Do You Want?</label>
                                <select class="form-control" class="how-many" onchange="sel(this)" name="howmany" id="">
                                    <?php $x = 1;
                                    while ($x < 100) {
                                        echo "<option>$x</option>";
                                        $x++;
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- howmany end -->



                            <!-- total end -->
                            <br>
                            <div class="" style="margin-top:10px;">
                                <span style="float:left;font-weight:bold;">Total:</span>
                                <span class="" style="float:right;position:relative;color:crimson;font-weight:bold;"><?php echo "<span>&#8358</span><span class='total-price-display'>" . number_format($price) . "</span>"; ?></span>
                                <input type="text" class="original-price" value="<?php echo $price; ?>" style="display:none;">
                                <input type="text" class="total-price" name="total_price" value="<?php echo $price; ?>" style="display:none;">
                            </div>
                            <!-- total start -->

                        </div>

                    </div>
                </div>
                <!-- item details container end -->


                <!-- address details start -->
                <div class="address-details-container">

                    <div class="card">
                        <div class="card-header"><i class="fa fa-check-circle" style="color:lightgrey;"></i> <span style="font-weight:600;">2. Shipping Address</span> </div>
                        <div class="card-body">


                            <!-- fullname -->
                            <div style="width:100%;padding:10px;">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="fullname" value="" required>
                            </div>




                            <!-- Phone Numbers-->
                            <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                                <div class="" style="margin-right:7px !important;width:45%;">Phone No.</div>
                                <div class="" style="width:45%;padding-left:10px;">Additional No.(optional)</div>
                            </div>
                            <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">
                                <input type="text" class="form-control col-sm-6 col-xs-6" name="phone" style="margin-right:7px !important;" value="" placeholder="" required>
                                <input type="text" class="form-control col-sm-6 col-xs-6" name="additionalphone" style="" value="" placeholder="">
                            </div>
                            <br>

                            <!-- address1 -->
                            <div style="width:100%;padding:10px;">
                                <label>Address 1</label>
                                <input type="text" class="form-control" name="address1" value="" required>
                            </div>




                            <!-- Region & Email-->
                            <div style="width:100%;padding:10px;display:flex;flex-flow: row nowrap;">
                                <div class="" style="margin-right:40px !important;width:45%;">Region</div>
                                <div class="" style="margin-right:0px !important;width:45%;">Email</div>

                            </div>

                            <div style="width:100%;padding:0px;display:flex;flex-flow: row nowrap;">

                                <!-- region -->
                                <select class="form-control col-sm-6 col-xs-6" name="region" style="margin-right:7px !important;" required>

                                    <option><?php include 'utilities/states.php'; ?></option>
                                </select>
                                <input type="email" class="form-control col-sm-6 col-xs-6" name="email" value="" required>
                            </div>
                            <br>



                            <div style="width:100%;display:flex;justify-content:center;">
                                <button type="submit" name="submit" class="order-btn">PLACE ORDER</button>
                            </div>


                        </div>

                    </div>

                </div>
                <br><br>
                <!-- address details end -->





            </div>
        </form>
    </div>
    <!-- end of main content area -->






























    <!-- Address details modal start  -->
    <?php include 'shipping-address-modal.php'; ?>
    <!-- address details modal end -->












    <?php



    if (isset($_POST['submit'])) {


        $pricing_type = $_POST['pricing_type'];
        $howmany = $_POST['howmany'];
        $total_price = $_POST['total_price'];


        $fullname = $_POST['fullname'];

        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $additionalphone = $_POST['additionalphone'];
        $address1 = $_POST['address1'];

        $region = $_POST['region'];

        $status = "Active";
        $time = time();
        $date = date("d-m-y");
        $a = date("h");
        $b = $a - 1;
        $c = date("i A");
        $timeview = $b . ":" . $c;

        $rand = RAND(10000000, 99000000);
        $orderid = "cl-" . $rand;

        // insert into wholesale order table
        $sql = "INSERT INTO wholesaleorders (orderid, productid, sellerid, fullname, phone, additionalphone, email, address1, region, pricing_type, howmany, price, total_price, status, time, date, timeview) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $result = $db->prepareStatement($sql, array($orderid, $item_id, $sellerid, $fullname, $phone, $additionalphone, $email, $address1, $region, $pricing_type, $howmany, $price, $total_price, $status, $time, $date, $timeview));




        // set details in session
        $_SESSION['order_id'] = $orderid;
        $_SESSION['order_fullname'] = $fullname;

        $_SESSION['order_email'] = $email;
        $_SESSION['order_phone'] = $phone;
        $_SESSION['order_additionalphone'] = $additionalphone;
        $_SESSION['order_region'] = $region;
        $_SESSION['order_address1'] = $address1;
        $_SESSION['order_address2'] = $address2;

        $admin->goToPage("wholesale-order-status", "order_placed");
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
        //   alert("ya")
        /* $('.how-many').on('change', function() {
             alert(this.value);
         }); */

        function sel(howmany) {
            howmany = howmany.value;
            var original_price = $(".original-price").val();
            total_price = howmany * original_price;
            $(".total-price").val(total_price);
            $(".total-price-display").html(new Intl.NumberFormat().format(total_price));
        }

        // var number = 12000;
        //  console.log(new Intl.NumberFormat().format(number));
    </script>
</body>

</html>