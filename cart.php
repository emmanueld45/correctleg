<?php
session_start();
include 'dbconn.php';
include 'functions.php';
include 'classes/database.class.php';
include 'classes/admin.class.php';
include 'classes/products.class.php';

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

            .cart-img {
                width: 100px;
                height: 100px;
            }
        }

        /** end of smaller screen **/

        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .cart-img {
                width: 130px;
                height: 130px;
            }
        }

        /** end of bigger screen **/
    </style>

    <meta charset="UTF-8">
    <meta name="description" content="Correctleg">
    <meta name="keywords" content="Online shopping, shoes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correctleg | Cart</title>

    <!-- Google Font -->
    <!-- <link href="//fonts.googleapis.com/css?family=Oswald:300,400,500,600&display=swap" rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&display=swap" rel="stylesheet" /> -->
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
    <link rel="stylesheet" href="css/mystyle.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>









    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/footbanner1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th style="font-size:14px;" class="shoping__product">Products</th>
                                    <th style="font-size:14px;">Price</th>
                                    <th style="font-size:14px;">Quantity</th>
                                    <th style="font-size:14px;">Total</th>
                                    <th style="font-size:14px;"></th>
                                </tr>
                            </thead>
                            <tbody>













                                <?php
                                if (isset($_SESSION['cart'])) {
                                    $items = $_SESSION['cart'];
                                    $cart_total_price = 0;
                                    foreach ($items as $item) {
                                ?>

                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="<?php echo $item['item_image']; ?>" alt="" class="cart-img">
                                                <h5><?php echo $item['item_name']; ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <span>&#8358</span><?php echo number_format($item['item_price']); ?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <!-- <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="">
                                                </div>
                                            </div> -->
                                                <span>x<?php echo $item['how_many']; ?></span>
                                            </td>
                                            <td class="shoping__cart__total">
                                                <span>&#8358</span><?php echo number_format($item['item_price'] * $item['how_many']); ?>
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span id="<?php echo $item['item_id']; ?>" class="icon_close remove-cart-item-btn"></span>
                                            </td>
                                        </tr>

                                <?php
                                        $item_subtotal =  $item['item_price'] * $item['how_many'];
                                        $cart_total_price += $item_subtotal;
                                        if (!isset($_SESSION['coupon_amount'])) {
                                            $_SESSION['cart_total'] = $cart_total_price;
                                        }
                                        // $_SESSION['cart_total'] = 0;
                                    }
                                } else {
                                    $cart_total_price = 0;
                                    echo "<h2 style='color:crimson'>No item in cart yet!</h2>";
                                }
                                ?>





























                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <!-- <a href="./" class="primary-btn">CONTINUE SHOPPING</a> -->
                        <!-- <a href="./" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            CONTINUE SHOPPING</a> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <!-- <h5>Discount Codes</h5> -->
                            <?php
                            if (isset($_GET['coupon_added'])) {
                                echo "<div class='alert alert-success alert-link'>Coupon successfully added</div>";
                            }

                            if (isset($_GET['coupon_invalid'])) {
                                echo "<div class='alert alert-danger alert-link'>Coupon is invalid</div>";
                            }
                            ?>
                            <!-- <form action="" method="POST">
                                <input type="text" name="coupon_code" placeholder="Enter your coupon code" required>
                                <button type="submit" name="validate_coupon" class="site-btn">APPLY COUPON</button>
                            </form> -->
                            <?php
                            if (isset($_POST['validate_coupon'])) {
                                $coupon_code = mysqli_real_escape_string($db->conn, $_POST['coupon_code']);
                                if ($product->couponIsValid($coupon_code)) {
                                    $_SESSION['cart_total'] = $_SESSION['cart_total'] - $product->getCouponAmount($coupon_code);
                                    $product->markCouponAsUsed($coupon_code);
                                    $_SESSION['coupon_amount'] = $product->getCouponAmount($coupon_code);
                                    $admin->goToPage("cart", "coupon_added");
                                } else {
                                    $admin->goToPage("cart", "coupon_invalid");
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span><span><?php echo number_format($cart_total_price); ?></span>&#8358</span></li>
                            <li>Total <span><span><?php echo number_format($_SESSION['cart_total']); ?></span>&#8358</span></span></li>
                        </ul>
                        <a href="checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>
    <!-- Footer Section End -->


    <!-- bottom nav start-->
    <?php include 'bottom-nav.php'; ?>
    <!-- bottom nav start-->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/banner-handler.js"></script>

    <script>
        $(".remove-cart-item-btn").click(function() {
            var item_id = $(this).attr("id");
            remove_cart_item = "yes";
            $.ajax({

                url: "cart-handler.php",
                method: "POST",
                async: false,
                data: {
                    "remove_cart_item": remove_cart_item,
                    "item_id": item_id,

                },
                success: function(data) {

                    window.location.href = "cart.php?cart_item_removed=true";

                }

            });

        });
    </script>
</body>

</html>