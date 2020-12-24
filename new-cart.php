<?php
session_start();

include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/admin.class.php';
include 'classes/products.class.php';
include 'classes/customers.class.php';

?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>CorrectLeg - Cart</title>

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
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>

    <br>

    <!-- header start -->
    <?php include 'header.php'; ?>
    <!-- header end -->



    <!--== CART WRAPPRT START===-->
    <section class="cart-wrapper">


        <?php
        if (isset($_COOKIE['cl_cart']) and count(json_decode($_COOKIE['cl_cart'])) != 0) {
            $cart = json_decode($_COOKIE['cl_cart']);
        ?>
            <section class="cart-container">

                <?php
                foreach ($cart as $item) {
                    $item = (array) $item;
                    $item_id = $item['item_id'];

                    $price = $product->getCartItemMainPriceBasedOnSizeVariationAndPromotionId($item_id, $item['item_size'], $item['promotion_id']);
                ?>
                    <div class="box">
                        <div class="row1">
                            <img src="<?php echo $product->getDetail($item_id, 'image1'); ?>" alt="">
                        </div>
                        <div class="row2">
                            <span class="name"><?php echo $product->shortenLength($product->getDetail($item_id, 'name'), 20, '...'); ?></span>
                            <span item_id="<?php echo $item_id; ?>" class="size">Size: <?php echo $item['item_size']; ?></span>
                            <span class="price"><span>&#8358</span><span item_id="<?php echo $item_id; ?>" class='item-price' item_value='<?php echo $price; ?>' how_many='<?php echo $item['how_many']; ?>' item_price='<?php echo $price; ?>'><?php echo number_format($price * $item['how_many']); ?></span></span>
                            <!-- <span item_id="<?php echo $item_id; ?>" class="">Qty: <?php echo $item['how_many']; ?></span> -->
                            <div item_id="<?php echo $item_id; ?>" promotion_id="<?php echo $item['promotion_id'] ?>" class="promotion-id" style='display:;'></div>
                        </div>
                        <div class="row3">
                            <button item_id="<?php echo $item_id; ?>" class="save-icon"><i class='fa fa-heart stroke-transparent'></i></button>
                            <button item_id="<?php echo $item_id; ?>" class="delete-icon"><i class='fa fa-trash'></i></button>

                            <button item_id="<?php echo $item_id; ?>" class="plus"><i class='fa fa-plus-circle'></i></button>
                            <button item_id="<?php echo $item_id; ?>" class="quantity" value="<?php echo $item['how_many']; ?>"><?php echo $item['how_many']; ?></button>
                            <button item_id="<?php echo $item_id; ?>" class="minus" style='opacity:;'><i class='fa fa-minus-circle'></i></button>
                        </div>
                    </div>

                <?php
                }
                ?>




            </section>

            <section class="summary-container">


                <div class="details mt-2">
                    <span class="right" style='color:crimson;font-weight:600;'><span>&#8358</span><span class='cart-total-price'>10,740</span></span>
                    <span class="left"><b>Total</b></span>
                </div>
                <div class="checkout-container">
                    <a href="new-checkout" class="checkout-btn">CHECKOUT</a>
                    <a href="tel:08162383712" class="call-btn">CALL TO ORDER</a>
                </div>
            </section>
        <?php
        } else {
        ?>

            <section class="empty-cart-container">
                <div class='box'>
                    <div class="centered-div"><i class='fa fa-shopping-cart icon'></i></div>
                    <div class="message mt-2">You haven't added any item to your cart yet!</div>
                    <div class="centered-div mt-2">
                        <a href="./" class="continue-shopping-btn">Continue shopping <i class='fa fa-angle-double-right'></i></a>
                    </div>
                </div>
            </section>
    </section>
<?php
        }
?>
<!--== CART WRAPPRT END===-->


<!-- carousel product component start --->
<?php
if (isset($_SESSION['recent_products']) and count($_SESSION['recent_products']) > 1) {
    $x = count($_SESSION['recent_products']) - 1;
?>
    <section class="carousel-product-component">
        <div class="component-title" style="">Recently viewed</div>
        <div class="component-container recently-viewed-carousel owl-carousel owl-theme">
            <?php
            for ($i = 0; $i < count($_SESSION['recent_products']); $i++) {
                $recent_item_id = $_SESSION['recent_products'][$x];

            ?>
                <a href="product?i=<?php echo $recent_item_id; ?>" class="box">
                    <!-- <span class="label">30% off</span> -->
                    <div class="centered-div">
                        <img src="<?php echo $product->getDetail($recent_item_id, "image1"); ?>">
                    </div>
                    <div class="product-name"><?php echo $product->getDetail($recent_item_id, "name"); ?></div>
                    <div class="stars-container">
                        <i class="fa fa-star star active"></i>
                        <i class="fa fa-star star active"></i>
                        <i class="fa fa-star star active"></i>
                        <i class="fa fa-star star"></i>
                        <i class="fa fa-star star"></i>
                    </div>
                    <div class="product-price">
                        <span class="new-price"><span>&#8358</span><?php echo number_format($product->getDetail($recent_item_id, "price")); ?></span>
                        <span class="old-price"><span>&#8358</span><?php echo number_format($product->getDetail($recent_item_id, "old_price")); ?></span>
                    </div>
                </a>
            <?php

                $x--;
            }
            ?>

        </div>
    </section>
<?php
}
?>
<!-- carousel product component end --->









































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
    $('.recently-viewed-carousel').owlCarousel({
        // loop: true,
        // autoplay: true,
        autoplayTimeout: 5000,
        mouseDrag: true,
        margin: 10,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })

    $(".plus").click(function() {
        var item_id = $(this).attr("item_id");
        var how_many = parseInt($(".quantity[item_id=" + item_id + "]").val());
        var promotion_id = $(".promotion-id[item_id=" + item_id + "]").attr("promotion_id");
        var item_size = $(".size[item_id=" + item_id + "]").val();
        var item_price = parseInt($(".item-price[item_id=" + item_id + "]").attr("item_price"));
        var increase_cart_item_quantity = "yes";
        //console.log(promotion_id)
        $.ajax({

            url: "new-cart-handler.php",
            method: "POST",
            async: false,
            data: {
                "increase_cart_item_quantity": increase_cart_item_quantity,
                "item_id": item_id,
                "item_size": item_size,
                "how_many": how_many,
                "promotion_id": promotion_id
            },
            success: function(data) {
                console.log(data)
                $(".plus[item_id=" + item_id + "]").css("opacity", "1");
                $(".minus[item_id=" + item_id + "]").css("opacity", "1");
                if (data == "available") {
                    // console.log(how_many)
                    how_many += 1;
                    $(".quantity[item_id=" + item_id + "]").val(how_many);
                    $(".quantity[item_id=" + item_id + "]").html(how_many);
                    var formatted_item_price = new Intl.NumberFormat().format(how_many * item_price)
                    $(".item-price[item_id=" + item_id + "]").html(formatted_item_price);
                    $(".item-price[item_id=" + item_id + "]").attr("how_many", how_many)

                    get_total_cart_item_price()
                } else {
                    $(".plus[item_id=" + item_id + "]").css("opacity", "0.3");
                }
            }

        });
    })




    $(".minus").click(function() {
        var item_id = $(this).attr("item_id");
        var how_many = parseInt($(".quantity[item_id=" + item_id + "]").val());
        var promotion_id = $(".promotion-id[item_id=" + item_id + "]").attr("promotion_id");
        var item_size = $(".size[item_id=" + item_id + "]").val();
        var item_price = parseInt($(".item-price[item_id=" + item_id + "]").attr("item_price"));
        var decrease_cart_item_quantity = "yes";
        // console.log(promotion_id)
        $.ajax({

            url: "new-cart-handler.php",
            method: "POST",
            async: false,
            data: {
                "decrease_cart_item_quantity": decrease_cart_item_quantity,
                "item_id": item_id,
                "item_size": item_size,
                "how_many": how_many,
                "promotion_id": promotion_id
            },
            success: function(data) {
                //console.log(data)
                $(".minus[item_id=" + item_id + "]").css("opacity", "1");
                $(".plus[item_id=" + item_id + "]").css("opacity", "1");
                if (data == "available") {
                    // console.log(how_many)
                    how_many -= 1;
                    $(".quantity[item_id=" + item_id + "]").val(how_many);
                    $(".quantity[item_id=" + item_id + "]").html(how_many);

                    var formatted_item_price = new Intl.NumberFormat().format(how_many * item_price)
                    $(".item-price[item_id=" + item_id + "]").html(formatted_item_price);
                    $(".item-price[item_id=" + item_id + "]").attr("how_many", how_many)

                    get_total_cart_item_price()

                } else {
                    $(".minus[item_id=" + item_id + "]").css("opacity", "0.3");
                }
            }

        });
    })

    var cart_total_price = 0;

    // var prices = document.getElementsByClassName("item-price");
    // for (i = 0; i < prices.length; i++) {
    //     var price = parseInt(prices[i].getAttribute("item_value"));
    //     var how_many = parseInt(prices[i].getAttribute("how_many"));
    //     cart_total_price += (price * how_many);

    // }
    var formatted_cart_total_price = new Intl.NumberFormat().format(cart_total_price)
    $(".cart-total-price").html(formatted_cart_total_price);

    function get_total_cart_item_price(price, operation) {
        var get_total_cart_item_amount = "yes";
        $.ajax({

            url: "new-cart-handler.php",
            method: "POST",
            async: false,
            data: {
                "get_total_cart_item_amount": get_total_cart_item_amount,
            },
            success: function(data) {
                // console.log(data)
                var formatted_cart_total_price = new Intl.NumberFormat().format(data)
                $(".cart-total-price").html(formatted_cart_total_price);
            }

        });
    }
    get_total_cart_item_price()
</script>
</body>

</html>