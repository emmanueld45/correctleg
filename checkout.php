<?php
session_start();
include 'dbconn.php';
include 'functions.php';
include 'classes/database.class.php';
include 'classes/admin.class.php';
include 'classes/products.class.php';
include 'classes/customers.class.php';



if (!isset($_SESSION['cart'])) {
    $admin->goToPage("./", "checkout_error");
}

if (count($_SESSION['cart']) == 0) {
    $admin->goToPage("./", "checkout_error");
}

if (!isset($_SESSION['id'])) {
    $admin->goToPage("customers/login", "checkout");
}
$firstname = "";
$lastname = "";
$phone = "";
$additionalphone = "";
$email = "";
$address1 = "";
$address2 = "";
$region = "";

$shipping_fee = 0;

if (isset($_SESSION['id'])) {
    $sessionid = $_SESSION['id'];

    if ($customer->customerIsLoggedIn($sessionid)) {
        //echo "Customer is logged in";

        if ($customer->haveShippingAddress($sessionid)) {
            // echo " Customer have shipping address";
            $row = $customer->getShippingAddress($sessionid);
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $phone = $row['phone'];
            $additionalphone = $row['additionalphone'];
            $email = $row['email'];
            $address1 = $row['address1'];
            $address2 = $row['address2'];
            $region = $row['region'];
        }
    } else {
        //  echo "no customer";
    }
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

            .main-area-container {
                margin-top: -50px;
            }

            .header-text {
                font-weight: bold;
                color: white;
                font-size: 16px;
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

            .col-xs-6 {
                width: 45% !important;
            }

            .delivery-method-container {
                padding: 10px;
                background-color: lightgrey;
                border: 1px solid grey;
                margin-bottom: 10px;
            }

            .payment-method-container {
                padding: 10px;
                background-color: lightgrey;
                border: 1px solid grey;

            }

            .station-container {
                width: 100%;
                padding: 10px;

            }

            .station-box {
                width: 100%;
                padding: 10px;
                display: flex;
                flex-flow: row nowrap;
                border-bottom: 1px solid lightgrey;
                margin-bottom: 10px;
                cursor: pointer;

            }

            .station-box:hover {
                background-color: rgba(0, 0, 0, 0.2);
            }

            .station-box-left {
                width: 20%;
            }

            .station-box-right {
                width: 80%;
            }

            .confirm-order-btn-online {
                width: 100%;
                padding: 10px;
                background-color: crimson;
                color: white;
                border: none;
                font-weight: 600;
                font-size: 15px;
                font-weight: bold;
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


            .main-area-container {
                width: 80% !important;
                margin: auto !important;
            }

            .delivery-method-container {
                padding: 10px;
                background-color: lightgrey;
                border: 1px solid grey;
                margin-bottom: 10px;
            }

            .payment-method-container {
                padding: 10px;
                background-color: lightgrey;
                border: 1px solid grey;

            }



            .station-container {
                width: 100%;
                padding: 10px;

            }

            .station-box {
                width: 100%;
                padding: 10px;
                display: flex;
                flex-flow: row nowrap;
                border-bottom: 1px solid lightgrey;
                margin-bottom: 10px;
                cursor: pointer;


            }

            .station-box:hover {
                background-color: rgba(0, 0, 0, 0.2);
            }

            .station-box-left {
                width: 20%;
            }

            .station-box-right {
                width: 80%;
            }

            .confirm-order-btn-online {
                width: 100%;
                padding: 10px;
                background-color: crimson;
                color: white;
                border: none;
                font-weight: 600;
                font-size: 15px;
                font-weight: bold;
            }

        }

        /** end of bigger screen **/

        input {
            border: 1px solid lightgrey !important;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="description" content="CorrectLeg - Buy cheap and correct foot wears">
    <meta name="keywords" content="Foot wear, online shopping, online store">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CorrectLeg | Checkout</title>

    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/components.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->

    <!-- Breadcrumb Section Begin --
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <!-- header start -->
    <div class="fixed-header sticky-top">
        <span class="header-text">CORRECT<span style="color: crimson;">LEG</span></span>
        <button style="float:right;color:white;border:none;background-color:black;"><i class="fa fa-shield" style="color:orange;font-size:20px;position:relative;top:3px;"></i> secure checkout</button>
    </div>
    <!-- header end -->


    <!-- Checkout Section Begin -->
    <section class="checkout spad main-area-container">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div> -->
            <div class="checkout__form">
                <h4>Shipping Details</h4>
                <form action="" method="POST" onsubmit="return validateOrderForm()">
                    <div class="row">
                        <!-- start of right side -->
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" class="firstname" name="firstname" value="<?php echo $firstname; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" class="lastname" name="lastname" value="<?php echo $lastname; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Region<span>*</span></p>
                                <!-- <input type="text" value="Nigeria" disabled> -->
                                <select class="form-control region" name="region" required>
                                    <?php
                                    if ($region != "") {
                                        echo "<option>$region</option>";
                                    }
                                    ?>
                                    <?php include 'utilities/states.php'; ?>
                                </select>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address1" placeholder="Street Address" class="checkout__input__add address1" value="<?php echo $address1; ?>" required>
                                <input type="text" name="address2" placeholder="Apartment, suite, unite ect (optinal)" class="address2" value="<?php echo $address2; ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="text" name="email" class="email" value="<?php echo $email; ?>" required>
                            </div>
                            <!-- <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text">
                            </div> -->
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" class="phone" value="<?php echo $phone; ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="checkout__input">
                                        <p>Additional Phone(optional)<spanspan>
                                        </p>
                                        <input type="text" name="additionalphone" class="additionalphone" value="<?php echo $additionalphone; ?>">
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- end of left side -->














                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <!-- <ul>
                                    <li>Vegetable’s Package <span>$75.99</span></li>
                                    <li>Fresh Vegetable <span>$151.99</span></li>
                                    <li>Organic Bananas <span>$53.99</span></li>
                                </ul> -->
                                <!-- items container start -->
                                <div style="width:100%;bottom:1px solid lightgrey;">


                                    <?php
                                    $items = $_SESSION['cart'];
                                    foreach ($items as $item) {
                                        //echo "<br> id =" . $item['item_id'] . ": price = " . $item['item_price'] . ": image = " . $item['item_image'] . ": name = " . $item['item_name'] . ": howmany = x" . $item['how_many'] . "<br>";
                                    ?>
                                        <div style="width:100%;padding:0px;height:65px;">
                                            <img src="<?php echo $item['item_image']; ?>" style="width:50px;height:50px;float:left;">
                                            <span style="float:right;position:relative;top:15px;margin-left:80px;"><span>&#8358</span><?php echo number_format($item['item_price'] * $item['how_many']); ?></span>
                                            <span style="float:right;position:relative;top:15px;color:grey;">x<?php echo $item['how_many']; ?></span>
                                        </div>
                                    <?php } ?>


                                </div>
                                <!-- items container end -->

                                <div class="checkout__order__subtotal">Subtotal <span><?php echo number_format($_SESSION['cart_total']); ?></span><span>&#8358</span></div>
                                <div class="checkout__order__subtotal" style="font-size:15px;font-weight:normal;">Shipping fee <span class="shipping-fee-display"><?php echo $shipping_fee; ?></span><span>&#8358</span></div>
                                <div class="checkout__order__total">Total <span class="cart-total-display"><?php echo number_format($_SESSION['cart_total'] + $shipping_fee); ?></span><span>&#8358</span></div>

                                <div class="delivery-method-container">
                                    <div style="width:100%;padding:5px;text-align:center;font-weight:bold;border-bottom:1px solid rgba(200, 200, 200);">Delivery Method</div>
                                    <input type="radio" name="delivery_method" class="door" value="Door" checked> Door step delivery<br>
                                    <!-- <input type="radio" name="delivery_method" class="pickup" value="Pickup"> Pick-Up station delivery -->
                                    <div class="">
                                        <p class="station-address-display"></p>
                                    </div>
                                </div>





                                <!-- Pickup station modal start  -->
                                <div class="modal fade" id="pickupStations">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">

                                                <span style="font-weight:600;font-size:20px;"> Pick-up stations near you!</span>

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body start -->
                                            <div class="modal-body">

                                                <!-- select station  container end -->
                                                <div class="select-station-state-container">
                                                    <select class="form-control pickup-region" name="pickupstate">
                                                        <option>Select region..</option>
                                                        <option>Rivers</option>
                                                        <option>Lagos</option>
                                                        <option>Abuja</option>
                                                    </select>
                                                </div>
                                                <!-- select station container start-->


                                                <!-- select station container -->

                                                <div class="station-container">



                                                </div>
                                                <!-- station container end -->


                                            </div>
                                            <!-- modal body end -->

                                        </div>
                                    </div>
                                </div>
                                <!-- pickup station modal end -->





                                <div class="payment-method-container">
                                    <div style="width:100%;padding:5px;text-align:center;font-weight:bold;border-bottom:1px solid rgba(200, 200, 200);">Payment Method</div>
                                    <input type="radio" class="onlinepay" value="onlinepayment" name="payment_method" checked> Pay Online<br>
                                    <input type="radio" class="deliverypay" value="deliverypayment" name="payment_method"> Pay On Delivery

                                </div>

                                <!-- confirm order btn start -->
                                <div style="width:100%;padding:10px;display:flex;justify-content:center;margin-top:10px;">
                                    <span class="confirm-order-btn-online site-btn" onclick="validateOnlineForm()" style="text-align:center;cursor:pointer;">PLACE ORDER <i class="fa fa-check-circle"></i></span>
                                </div>
                                <!-- confirm order btn end -->

                                <input type="text" class="shipping-fee" name="shipping_fee" value="0" style="display:none;">
                                <input type="text" name="cart_total" class="cart-total" value="<?php echo $_SESSION['cart_total']; ?>" style="display:none;">

                                <button type="submit" class="confirm-order-btn site-btn" name="submit" style="font-size:15px;display:none;">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->

    <!-- Footer Section End -->




    <button class="pickup-btn" data-toggle="modal" data-target="#pickupStations" style="display:none;">click</button>




    <?php

    if (isset($_POST['submit'])) {

        $_SESSION['order_firstname'] = mysqli_real_escape_string($db->conn, $_POST['firstname']);
        $_SESSION['order_lastname'] =  mysqli_real_escape_string($db->conn, $_POST['lastname']);
        $_SESSION['order_phone'] =  mysqli_real_escape_string($db->conn, $_POST['phone']);
        $_SESSION['order_additionalphone'] =  mysqli_real_escape_string($db->conn, $_POST['additionalphone']);
        $_SESSION['order_email'] =  mysqli_real_escape_string($db->conn, $_POST['email']);
        $_SESSION['order_address1'] =  mysqli_real_escape_string($db->conn, $_POST['address1']);
        $_SESSION['order_address2'] =  mysqli_real_escape_string($db->conn, $_POST['address2']);
        $_SESSION['order_region'] =  mysqli_real_escape_string($db->conn, $_POST['region']);
        $_SESSION['cart_total'] =  mysqli_real_escape_string($db->conn, $_POST['cart_total']);
        $_SESSION['delivery_method'] =  mysqli_real_escape_string($db->conn, $_POST['delivery_method']);
        $_SESSION['payment_method'] =  mysqli_real_escape_string($db->conn, $_POST['payment_method']);
        //$_SESSION['delivery_station'] = $_POST['station'];
        $_SESSION['order_shipping_fee'] =  mysqli_real_escape_string($db->conn, $_POST['shipping_fee']);

        if ($_POST['delivery_method'] == "Pickup") {
            $_SESSION['delivery_station'] =  mysqli_real_escape_string($db->conn, $_POST['station']);
        }








        $firstname =  mysqli_real_escape_string($db->conn, $_POST['firstname']);
        $lastname =  mysqli_real_escape_string($db->conn, $_POST['lastname']);
        $phone =  mysqli_real_escape_string($db->conn, $_POST['phone']);
        $additionalphone =  mysqli_real_escape_string($db->conn, $_POST['additionalphone']);
        if ($additionalphone == "") {
            $additionalphone = "Not added";
        }
        $email =  mysqli_real_escape_string($db->conn, $_POST['email']);
        $address1 =  mysqli_real_escape_string($db->conn, $_POST['address1']);
        $address2 =  mysqli_real_escape_string($db->conn, $_POST['address2']);
        if ($address2 == "") {
            $address2 = "Not added";
        }
        $region =  mysqli_real_escape_string($db->conn, $_POST['region']);
        $status = "Default";

        if (isset($_SESSION['id'])) {
            $sessionid = $_SESSION['id'];


            if ($customer->customerIsLoggedIn($sessionid)) {
                // if (!customer_have_shipping_address($sessionid)) {
                if ($customer->haveShippingAddress($sessionid)) {
                    $sql = "INSERT INTO shippingaddress (customerid, firstname, lastname, phone, additionalphone, email, address1, address2, region, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                    $db->prepareStatement($sql, array($sessionid, $firstname, $lastname, $phone, $additionalphone, $email, $address1, $address2, $region, $status));
                    mysqli_query($conn, $sql);
                }
            }
        } else {
        }
        //     echo '<script>
        // window.location.href="order-handler.php";
        // </script>';
        $admin->goToPage("order-handler", "");
    }















    ?>
    <div class="click-loader">
        <img src="img/loader2.gif" alt="">
    </div>


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>


    <script>
        // set shipping fee when region change start

        // automatically set shipping fee in case a customer is logged in and has a region different from Rivers
        var region = $(".region").val();
        var cart_total = $(".cart-total").val();

        if (region == "Rivers") {
            $(".shipping-fee").val(0);
            $(".shipping-fee-display").html(0);

        } else {
            $(".shipping-fee").val(500);
            $(".shipping-fee-display").html(500);
            cart_total = parseInt(cart_total) + parseInt(500);
            $(".cart-total-display").html(new Intl.NumberFormat().format(cart_total));
            $(".cart-total").val(cart_total);
        }


        $(".region").change(function() {
            var region = $(this).val();
            var cart_total = $(".cart-total").val();

            if (region == "Rivers") {
                if ($(".shipping-fee").val() == 0) {
                    $(".shipping-fee").val(0);
                    $(".shipping-fee-display").html(0);
                } else if ($(".shipping-fee").val() == 500) {
                    $(".shipping-fee").val(0);
                    $(".shipping-fee-display").html(0);
                    cart_total = parseInt(cart_total) - parseInt(500);
                    $(".cart-total-display").html(new Intl.NumberFormat().format(cart_total));
                    $(".cart-total").val(cart_total);
                }

            } else {
                if ($(".shipping-fee").val() == 500) {
                    $(".shipping-fee").val(500);
                    $(".shipping-fee-display").html(500);
                } else {
                    $(".shipping-fee").val(500);
                    $(".shipping-fee-display").html(500);
                    cart_total = parseInt(cart_total) + parseInt(500);
                    $(".cart-total-display").html(new Intl.NumberFormat().format(cart_total));
                    $(".cart-total").val(cart_total);
                }
            }
        });
        // set shipping fee when region change end







        /***** DELIVERY METHOD START*** */


        // if pickup radio btn is checked then show the select station modal
        $(".pickup").click(function() {
            if ($(this).prop("checked")) {
                $(".pickup-btn").click();
            }
        });

        // if door radio btn is checked then change the html of the delivery summary
        $(".door").click(function() {
            if ($(this).prop("checked")) {
                $(".station-address-display").html("(Door delivery selected)");
            }
        });






        $(".pickup-region").change(function() {
            var region = $(this).val();
            var getstation = "yes";
            $.ajax({

                url: "ajax-get-pickup-station.php",
                method: "POST",
                async: false,
                data: {
                    "getstation": getstation,
                    "region": region,
                },
                success: function(data) {

                    $(".station-container").html(data);

                }

            });

        });




        function station_detail(location) {
            $(".station-address-display").html("<span style='color:black;font-weight:600;font-size:20px;'>Pick-Up Location:</span><br>" + location.id);
            $(".close").click();
        }

        // check if pickup radio btn was clicked but no station was selected
        function validateOrderForm() {

            if ($(".pickup").prop("checked")) {
                if ($(".station").prop("checked")) {
                    // alert("pickup is checked and station is selected")
                    return true;
                } else {
                    alert("pickup delivery is selected but you have not choosen a pickup station.. Kindly click on 'pickup' again to select a pickup station")
                    return false;
                }

            } else {

                show_click_loader();
                return true;
            }
        }

        /***** DELIVERY METHOD END*** */











        /***** PAYMENT METHOD START*** */


        // Show the deliverypay confrim btn
        $(".deliverypay").click(function() {
            if ($(this).prop("checked")) {
                $(".confirm-order-btn-online").hide();
                $(".confirm-order-btn").show();

            }
        });


        // Show the online pay confrim btn
        $(".onlinepay").click(function() {
            if ($(this).prop("checked")) {
                $(".confirm-order-btn").hide();
                $(".confirm-order-btn-online").show();

            }
        });


        // validate online payment form before calling paystack start
        function validateOnlineForm() {
            var payment_method = "onlinepayment";
            var firstname = $(".firstname").val();
            var lastname = $(".lastname").val();
            var region = $(".region").val();
            var address1 = $(".address1").val();
            var address2 = $(".address2").val();
            var email = $(".email").val();
            var phone = $(".phone").val();
            var additionalphone = $(".additionalphone").val();
            if (firstname == "" || lastname == "" || region == "" || address1 == "" || phone == "" || email == "") {
                alert("Please fill the fields marked with '*' ")
            } else {

                if ($(".pickup").prop("checked")) {
                    if ($(".station").prop("checked")) {
                        // alert("pickup is checked and station is selected")
                        //payWithPaystack();
                        makePayment();
                    } else {
                        alert("pickup delivery is selected but you have not choosen a pickup station.. Kindly click on 'pickup' again to select a pickup station")
                        return false;
                    }

                } else {
                    //payWithPaystack();
                    makePayment();
                }

            }
        }
        // validate online payment form before calling paystack end
        function payWithPaystack() {
            var station = 0;
            ///
            if ($(".door").prop("checked")) {
                var delivery_method = "Door";
            } else {
                var delivery_method = "Pickup"
                station = $(".station").val();
                // alert(station)

            }
            var payment_method = "onlinepayment";
            var firstname = $(".firstname").val();
            var lastname = $(".lastname").val();
            var region = $(".region").val();
            var address1 = $(".address1").val();
            var address2 = $(".address2").val();
            var email = $(".email").val();
            var phone = $(".phone").val();
            var additionalphone = $(".additionalphone").val();
            var cart_total = $(".cart-total").val();
            var shipping_fee = $(".shipping-fee").val();

            var online_payment = "yes";

            //  alert(firstname + " " + lastname + " " + email + " " + phone + " " + address1 + " " + address2)

            ////
            var handler = PaystackPop.setup({
                key: 'pk_test_567c942464ebac2d29a9f387669a3e56c0e79f2b',
                email: email,
                amount: cart_total + "00",
                currency: "NGN",
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

                callback: function(response) {
                    //  alert('success. transaction ref is ' + response.reference);

                    // make an ajax call to handle the online payments
                    $.ajax({

                        url: "ajax-online-payment-handler.php",
                        method: "POST",
                        async: false,
                        data: {
                            "online_payment": online_payment,
                            "firstname": firstname,
                            "lastname": lastname,
                            "address1": address1,
                            "address2": address2,
                            "region": region,
                            "phone": phone,
                            "additionalphone": additionalphone,
                            "email": email,
                            "delivery_method": delivery_method,
                            "station": station,
                            "payment_method": payment_method,
                            "shipping_fee": shipping_fee,
                        },
                        success: function(data) {

                            window.location.href = "order-handler.php?paidonline=true";

                        }

                    });


                },
                onClose: function() {
                    alert('window closed');
                }
            });
            handler.openIframe();
        }
        /**** PAYMENT METHOD END  */
    </script>











    <form>
        <script src="https://checkout.flutterwave.com/v3.js"></script>
        <!-- <button type="button" onClick="makePayment()">Pay Now</button> -->
    </form>

    <script>
        function makePayment() {

            var station = 0;
            ///
            if ($(".door").prop("checked")) {
                var delivery_method = "Door";
            } else {
                var delivery_method = "Pickup"
                station = $(".station").val();
                // alert(station)

            }
            var payment_method = "onlinepayment";
            var firstname = $(".firstname").val();
            var lastname = $(".lastname").val();
            var region = $(".region").val();
            var address1 = $(".address1").val();
            var address2 = $(".address2").val();
            var email = $(".email").val();
            var phone = $(".phone").val();
            var additionalphone = $(".additionalphone").val();
            var cart_total = $(".cart-total").val();
            var shipping_fee = $(".shipping-fee").val();

            var online_payment = "yes";


            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-695b71775b6e018436b3a53074cef91a-X",
                tx_ref: "hooli-tx-1920bbtyt",
                amount: cart_total,
                currency: "NGN",
                country: "NG",
                payment_options: "card, mobilemoneyghana, ussd",
                // redirect_url: // specified redirect URL
                //     "https://callbacks.piedpiper.com/flutterwave.aspx?ismobile=34",
                meta: {
                    consumer_id: 23,
                    consumer_mac: "92a3-912ba-1192a",
                },
                customer: {
                    email: email,
                    phone_number: phone,
                    name: firstname + " " + lastname,
                },
                callback: function(data) {
                    // console.log(data);
                    // console.log(data.status)
                    // console.log(data.tx_ref);

                    // Make an AJAX call to your server with the reference to verify the transaction
                    // console.log("Payment has been made!");
                    // console.log(data);
                    if (data.status == "successful") {
                        var process_online_payment = "yes";
                        var tx_ref = data.tx_ref;
                        $.ajax({

                            url: "ajax-payment-handler.php",
                            method: "POST",
                            async: false,
                            data: {
                                "process_online_payment": process_online_payment,
                                "amount": cart_total,
                                "tx_ref": tx_ref,
                            },
                            success: function(data) {
                                // console.log("AJax request has been made to payment handler");
                                // console.log("payment ajax request was successful! and data: " + data)
                                if (JSON.parse(data).status == "success") {

                                    // make an ajax call to handle the online payments and put them in sessions
                                    $.ajax({

                                        url: "ajax-online-payment-handler.php",
                                        method: "POST",
                                        async: false,
                                        data: {
                                            "online_payment": online_payment,
                                            "firstname": firstname,
                                            "lastname": lastname,
                                            "address1": address1,
                                            "address2": address2,
                                            "region": region,
                                            "phone": phone,
                                            "additionalphone": additionalphone,
                                            "email": email,
                                            "delivery_method": delivery_method,
                                            "station": station,
                                            "payment_method": payment_method,
                                            "shipping_fee": shipping_fee,
                                        },
                                        success: function(data) {
                                            show_click_loader();
                                            window.location.href = "order-handler.php?paidonline=true";

                                        }

                                    });


                                } else if (JSON.parse(data).status == "failed") {
                                    alert("payment failed");
                                }
                            }

                        });
                    } else {
                        alert("Error in processing payment!");
                    }
                },
                onclose: function() {
                    // close modal

                },
                customizations: {
                    title: "CorrectLeg Order Payment",
                    description: "Payment for order",
                    logo: "https://sellers.correctleg.com/img/correctleg-logo.png",
                },
            });
        }
    </script>
</body>

</html>