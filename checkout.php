<?php
session_start();

include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/admin.class.php';
include 'classes/products.class.php';
include 'classes/customers.class.php';

if (!isset($_SESSION['id'])) {
    $admin->goToPage("customers/login", "checkout");
} else if (!$customer->customerIsLoggedIn($_SESSION['id'])) {
    $admin->goToPage("customers/login", "checkout");
}

if (!isset($_COOKIE['cl_cart'])) {
    $admin->goToPage("./", "invalid_checkout");
} else {
    $cart = json_decode($_COOKIE['cl_cart']);
    if (count($cart) == 0) {
        $admin->goToPage("./", "invalid_checkout");
    }
}
$session_id = $_SESSION['id'];
if ($customer->haveShippingAddress($session_id)) {
    $result = $db->setQuery("SELECT * FROM shippingaddress WHERE customerid='$session_id';");
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $region = $row['region'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $email = $row['email'];
    $phone = $row['phone'];
    $additionalphone = $row['additionalphone'];
} else {
    $firstname = "";
    $lastname = "";
    $region = "";
    $address1 = "";
    $address2 = "";
    $email = "";
    $phone = "";
    $additionalphone = "";
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>CorrectLeg - Checkout</title>

    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet" /> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Css Styles -->

    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/mystyle.css" type="text/css" />
    <link rel="stylesheet" href="css/root.css" type="text/css" />
    <link rel="stylesheet" href="css/components.css" type="text/css" />


    <style>
        * {
            margin: 0;
            padding: 0;
        }

        /** start of other stylings **/

        /** end of other stylings **/

        /** start of  smaller screen*/
        @media only screen and (max-width: 690px) {}

        /** end of smaller screen **/

        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {}

        /** end of bigger screen **/


        input[type='radio']:after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: -2px;
            left: -1px;
            position: relative;
            background-color: lightgrey;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid #eee;
        }

        input[type='radio']:checked:after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: -2px;
            left: -1px;
            position: relative;
            background-color: crimson;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid pink;
        }
    </style>

</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>


    <section class="checkout-header sticky-top">
        <span class="header-text">CORRECT<span style="color: crimson;">LEG</span></span>
        <button style="float:right;color:white;border:none;background-color:black;"><i class="fa fa-shield" style="color:orange;font-size:20px;position:relative;top:3px;"></i> secure checkout</button>
    </section>

    <!--== CHECKOUT WRAPPRT START===-->
    <section class="checkout-wrapper">

        <!-- left start --->
        <section class="left">

            <div class="checkout-custom-box">
                <div class="header"><i class='fa fa-check-circle address-icon' style='color:mediumseagreen;font-size:20px;'></i> &nbsp; &nbsp; ADDRESS DETAILS <?php if ($customer->haveShippingAddress($session_id)) {
                                                                                                                                                                    echo "<span class='change-address-btn' data-toggle='modal' data-target='#changeAddressModal'>CHANGE</span>";
                                                                                                                                                                } ?></div>
                <div class="body">
                    <?php
                    if ($customer->haveShippingAddress($session_id)) {
                    ?>
                        <span class='detail' style='color:black;'><b><?php echo $firstname . " " . $lastname; ?></b></span>
                        <span class='detail'><?php echo $address1; ?></span>
                        <span class='detail'><?php if ($address2 != "Not added") {
                                                    echo $address2;
                                                } ?></span>
                        <span class='detail'><?php echo $region; ?></span>
                        <span class='detail'><?php echo $phone; ?></span>
                        <span class='detail'><?php if ($additionalphone != "Not added") {
                                                    echo $additionalphone;
                                                } ?></span>
                    <?php
                    } else {
                    ?>
                        <span class="detail">You have not added a shipping address yet!</span>
                        <span class='' style='padding:3px 6px;border:1px solid crimson;color:crimson;border-radius:3px;font-size:14p;x' data-toggle='modal' data-target='#changeAddressModal'>Click to add Adress</span>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="checkout-custom-box mt-3">
                <div class="header"><i class='fa fa-check-circle payment-icon' style='color:lightgrey;font-size:20px;'></i> &nbsp; &nbsp; PAYMENT METHOD </div>
                <div class="body">
                    <div class="payment-method-container">
                        <div class="box">
                            <input type="radio" name='payment_method' class="pay-online" style="cursor:pointer;color:crimson;background-color:crimson;"> Pay Online
                            <div class="info">Make online payment Make online payment Make online payment</div>
                        </div>

                        <div class="box">
                            <input type="radio" name='payment_method' class="pay-on-delivery" style="cursor:pointer;"> Pay on Delivery
                            <div class="info">Make online payment Make online payment Make online payment</div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- left end --->


        <!-- right start --->
        <section class="right">


            <div class="checkout-custom-box">
                <div class="header"><i class='fa fa-shopping-cart' style='color:lightgrey;font-size:20px;'></i> &nbsp; &nbsp; <b>YOUR ORDER (<?php if ($product->getTotalNumItemsInCart() == 1) {
                                                                                                                                                    echo $product->getTotalNumItemsInCart() . " item";
                                                                                                                                                } else {
                                                                                                                                                    echo $product->getTotalNumItemsInCart() . " items";
                                                                                                                                                } ?> )</b> </div>
                <div class="body">

                    <div class='ordered-items-container'>
                        <?php
                        foreach ($cart as $item) {
                            $item = (array) $item;
                            $item_id = $item['item_id'];

                            $price = $product->getCartItemMainPriceBasedOnSizeVariationAndPromotionId($item_id, $item['item_size'], $item['promotion_id']);
                        ?>
                            <div class="box">
                                <div class='row1'>
                                    <img src="<?php echo $product->getDetail($item_id, 'image1'); ?>" alt="">
                                </div>
                                <div class="row2">
                                    <span class="name"><?php echo $product->getDetail($item_id, 'name'); ?></span>
                                    <span class="price"><span>&#8358</span><?php echo number_format($price * $item['how_many']); ?></span>
                                    <span class="quantity">Qty: <?php echo $item['how_many']; ?></span>
                                </div>
                            </div>
                        <?php
                        }
                        ?>


                    </div>

                    <section class="price-container">
                        <div class="box">
                            <span class="price-title">Subtotal</span> <span class="price-value"><span>&#8358</span><?php echo number_format($product->getTotalCartItemPrice()); ?></span>
                        </div>
                        <div class="box">
                            <span class="price-title">Delivery fee</span> <span class="price-value"><span>&#8358</span>0</span>
                        </div>
                        <div class="box" style='border-bottom:1px solid #eee;'>
                            <span class="price-title"><b>Total</b></span> <span class="price-value"><b><span>&#8358</span><?php echo number_format($product->getTotalCartItemPrice()); ?></b></span>
                        </div>
                    </section>

                    <section class="place-order-btn-container">
                        <button class="place-order-btn">PLACE ORDER</button>
                    </section>
                    <section class="modify-cart-btn-container">
                        <a href="cart" class="modify-cart-btn">MODIFY CART</a>
                    </section>
                </div>
            </div>

        </section>
        <!-- right end -->



        <!-- Change address modal start -->
        <div class="modal fade" id="changeAddressModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Shipping Address</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" method="POST">
                            <section class="change-address-container">
                                <div class="field-container">
                                    <div class="form-control mr-2 title">Firstname</div>
                                    <div class="form-control title">Lastname</div>
                                </div>
                                <div class="field-container">
                                    <input type="text" name="firstname" value="<?php echo $firstname; ?>" class='form-control mr-2' required>
                                    <input type="text" name="lastname" value="<?php echo $lastname; ?>" class='form-control' required>
                                </div>
                                <br>

                                <label for="">Region</label>
                                <div class="field-container">
                                    <select id="" name="region" class="form-control" required>
                                        <?php
                                        if ($region != "") {
                                            echo "<option>$region</option>";
                                        }
                                        ?>
                                        <?php include 'utilities/states.php'; ?>
                                    </select>
                                </div>
                                <br>

                                <label for="">Address 1</label>
                                <div class="field-container">
                                    <input type="text" name="address1" value="<?php echo $address1; ?>" class='form-control' required>
                                </div>
                                <br>

                                <label for="">Address 2 (optional)</label>
                                <div class="field-container">
                                    <input type="text" name="address2" value="<?php echo $address2; ?>" class='form-control'>
                                </div>
                                <br>

                                <label for="">Email</label>
                                <div class="field-container">
                                    <input type="text" name="email" value="<?php echo $email; ?>" class='form-control' required>
                                </div>
                                <br>

                                <div class="field-container">
                                    <div class="form-control mr-2 title">Phone</div>
                                    <div class="form-control title">Phone2</div>
                                </div>
                                <div class="field-container">
                                    <input type="number" name="phone" value="<?php echo $phone; ?>" class='form-control mr-2' required>
                                    <input type="number" name="additionalphone" value="<?php echo $additionalphone; ?>" class='form-control' placeholder="(optional)">
                                </div>
                                <div class="centered-div mt-3">
                                    <button class="change-address-btn" name="change_address">Save changes</button>
                                </div>
                            </section>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Change address modal end --->

    </section>
    <!--== CHECKOUT WRAPPER END===-->







    <?php
    if (isset($_POST['change_address'])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $region = $_POST['region'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $additionalphone = $_POST['additionalphone'];

        if ($additionalphone == "") {
            $additionalphone = "Not added";
        }

        if ($address2 == "") {
            $address2 = "Not added";
        }

        if ($customer->haveShippingAddress($session_id)) {
            $sql = "UPDATE shippingaddress SET firstname=?, lastname=?, region=?, address1=?, address2=?, email=?, phone=?, additionalphone=? WHERE customerid=?;";
            $result = $db->prepareStatement($sql, array($firstname, $lastname, $region, $address1, $address2, $email, $phone, $additionalphone, $session_id));
            $admin->goToPage("checkout", "address_changed");
        } else {
            $status = "default";
            $sql = "INSERT INTO shippingaddress (customerid, firstname, lastname, region, address1, address2, email, phone, additionalphone, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $result = $db->prepareStatement($sql, array($session_id, $firstname, $lastname, $region, $address1, $address2, $email, $phone, $additionalphone, $status));
            $admin->goToPage("checkout", "address_created");
        }
    }
    ?>












    <div class="click-loader">
        <img src="img/loader2.gif" alt="">
    </div>



    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/jquery.nice-select.min.js"></script> -->
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <form>
        <script src="https://checkout.flutterwave.com/v3.js"></script>
        <!-- <button type="button" onClick="makePayment()">Pay Now</button> -->
    </form>


    <script>
        var have_shipping_address = "<?php if ($customer->haveShippingAddress($session_id)) {
                                            echo "yes";
                                        } else {
                                            echo "no";
                                        } ?>";
        var payment_method;
        $(".pay-online").click(function() {
            payment_method = "pay online";
        })
        $(".pay-on-delivery").click(function() {
            payment_method = "pay on deivery";
        })
        $(".place-order-btn").click(function() {
            if (have_shipping_address == "yes") {
                if ($(".pay-online").prop("checked")) {
                    process_online_payment();
                } else if ($(".pay-on-delivery").prop("checked")) {
                    // alert("Processing order: " + payment_method)
                    show_click_loader();
                    window.location.href = "order-handler";
                } else {
                    // alert("Kindly select a payment method")
                    show_site_alert("Kindly select a payment method");
                }
            } else {
                alert("Please add a shipping address to continue..")
            }
        });





        function process_online_payment() {
            var check_items_have_available_quantities = "yes";
            $.ajax({

                url: "ajax-payment-handler.php",
                method: "POST",
                async: false,
                data: {
                    "check_items_have_available_quantities": check_items_have_available_quantities,

                },
                success: function(data) {
                    var data = JSON.parse(data);
                    //console.log(data)
                    if (data.status == "yes") {
                        makePayment();
                    } else if (data.status == "no") {
                        window.location.href = "cart?item_unavailable=true&message=" + data.message;
                    }
                }

            });
        }
    </script>



    <script>
        function makePayment() {


            var online_payment = "yes";


            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-695b71775b6e018436b3a53074cef91a-X",
                tx_ref: "hooli-tx-1920bbtyt",
                amount: <?php echo $product->getTotalCartItemPrice(); ?>,
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
                    email: "<?php echo $email; ?>",
                    phone_number: "<?php echo $phone; ?>",
                    name: "<?php echo $firstname . " " . $lastname; ?>"
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
                                "amount": <?php echo $product->getTotalCartItemPrice(); ?>,
                                "tx_ref": tx_ref,
                            },
                            success: function(data) {
                                // console.log("AJax request has been made to payment handler");
                                // console.log("payment ajax request was successful! and data: " + data)
                                if (JSON.parse(data).status == "success") {

                                    show_click_loader();
                                    // make an ajax call to handle the online payments and put them in sessions
                                    window.location.href = "order-handler";


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