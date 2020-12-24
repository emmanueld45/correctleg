<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/products.class.php';

if (!isset($_GET['i'])) {
    $admin->goToPage("promotions", "invalid_promotion");
}

$promotion_id = mysqli_real_escape_string($db->conn, $_GET['i']);

if (!$product->promotionExist($promotion_id)) {
    $admin->goToPage("promotions", "invalid_promotion");
}

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
                height: 40px;
                font-size: 16px;
                background-color: crimson;
                color: white;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);

            }

            .nav-btns-container {
                width: 90%;
                margin: auto;
                display: flex;
                flex-flow: row nowrap;
                justify-content: center;
                margin-top: 10px;

            }

            .nav-btns {
                width: 50%;
                padding: 5px;
                color: grey;
                border: 1px solid lightgrey;
                background-color: white;
                text-align: center;
            }

            .nav-btns:hover {
                color: crimson;
            }

            .nav-btns.active {
                background-color: crimson;
                color: white;
            }

            .active:hover {
                color: white;
            }

            .item-container {
                width: 100%;
                padding: 10px;

            }


            .item-box {
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
                border-bottom: 1px solid lightgrey;
            }


            .item-box-left {
                width: 30%;

            }

            .item-box-right {
                width: 70%;
                padding: 10px;

            }

            .item-img {
                width: 100px;
                height: 100px;
            }





            .verify-modal-background {
                width: 100%;
                position: fixed;
                top: 0px;
                left: 0px;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.8);
                z-index: 2000;
                display: none;
            }


            .verify-modal {
                width: 80%;
                position: fixed;
                top: 50px;
                left: 10%;

                background-color: white;
                z-index: 2100;
                display: none;
            }

            .verify-modal-close-btn {
                width: 30px;
                height: 30px;
                border-radius: 30px;
                background-color: crimson;
                color: white;
                position: absolute;
                top: -10px;
                right: -10px;
            }

            .verify-modal-header {
                width: 100%;
                padding: 10px;
                text-align: center;
                font-weight: bold;
            }

            .verify-modal-img {
                width: 100px;
                height: 100px;
            }

            .verify-modal-message {
                width: 100%;
                padding: 10px;
                font-size: 13px;
            }


            .verify-modal-cancel-btn {
                background-color: white;
                padding: 10px;
                color: rgb(70, 70, 70);
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.5);
                border: none;
                border-radius: 3px;
                float: left;

            }


            .verify-modal-approve-btn {
                float: right;
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

            .nav-btns-container {
                width: 90%;
                margin: auto;
                display: flex;
                flex-flow: row nowrap;
                justify-content: center;
                margin-top: 10px;

            }

            .nav-btns {
                width: 30%;
                padding: 5px;
                color: grey;
                border: 1px solid lightgrey;
                background-color: white;
                text-align: center;
            }

            .nav-btns:hover {
                color: crimson;
            }

            .nav-btns.active {
                background-color: crimson;
                color: white;
            }

            .active:hover {
                color: white;
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




            .item-container {
                width: 100%;
                padding: 10px;

            }


            .item-box {
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
                border-bottom: 1px solid lightgrey;
            }


            .item-box-left {
                width: 20%;

            }

            .item-box-right {
                width: 80%;
                padding: 10px;

            }

            .item-img {
                width: 120px;
                height: 120px;
            }



            .verify-modal-background {
                width: 100%;
                position: fixed;
                top: 0px;
                left: 0px;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.8);
                z-index: 2000;
                display: none;
            }


            .verify-modal {
                width: 40%;
                position: fixed;
                top: 50px;
                left: 30%;

                background-color: white;
                z-index: 2100;
                display: none;
            }

            .verify-modal-close-btn {
                width: 30px;
                height: 30px;
                border-radius: 30px;
                background-color: crimson;
                color: white;
                position: absolute;
                top: -10px;
                right: -10px;
            }

            .verify-modal-header {
                width: 100%;
                padding: 10px;
                text-align: center;
                font-weight: bold;
            }

            .verify-modal-img {
                width: 100px;
                height: 100px;
            }

            .verify-modal-message {
                width: 100%;
                padding: 10px;
            }


            .verify-modal-cancel-btn {
                background-color: white;
                padding: 10px;
                color: rgb(70, 70, 70);
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.5);
                border: none;
                border-radius: 3px;
                float: left;

            }


            .verify-modal-approve-btn {
                float: right;
            }

        }

        /** end of bigger screen **/
    </style>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg - Promotion select item</title>

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
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>


    <!-- start of mobile view -->
    <div class="mobile-view-container">

        <!-- header start -->
        <div class="fixed-head sticky-top">
            <i class="fa fa-angle-left back-btn"></i> Select item
        </div>
        <!-- header end -->

        <!-- start of nave btns container-->
        <div class="nav-btns-container">
            <a href="promotion-select-item?i=<?php echo $promotion_id ?>" class="nav-btns active">Select</a>
            <a href="promotion-added-item?i=<?php echo $promotion_id ?>" class="nav-btns">Items Added</a>

        </div>

        <!-- end of nav btns container -->



        <!-- start of item container -->
        <div class="item-container">

            <?php
            $result = $db->setQuery("SELECT * FROM product WHERE sellerid='$sessionid';");
            $numrows = mysqli_num_rows($result);
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if (!$product->itemIsInPromotion($promotion_id, $row['uniqueid'])) {
            ?>

                        <!-- box 1-->
                        <div class="item-box">
                            <div class="item-box-left">
                                <img src="../<?php echo $row['image1']; ?>" class="item-img">
                            </div>
                            <div class="item-box-right">
                                <span style="font-weight:600;font-size:17px;"><?php echo $product->shortenLength($row['name'], 17, "..."); ?> </span><br>

                                <?php echo $product->getStars($row['uniqueid'], "<i class='fa fa-star' style='color:orange;font-size:13px;'></i>", "<i class='fa fa-star' style='color:lightgrey;font-size:13px;'></i>") ?>
                                <br>
                                <!-- <button style="color:white;font-size:13px;background-color:grey;padding:3px;border:none;">New</button><br> -->
                                <span style="color: crimson;font-size:17px;font-weight:600;"><span>&#8358</span><?php echo number_format($row['price']); ?></span>
                                <button class="btn select-btn select-btn<?php echo $row['uniqueid']; ?>" id="<?php echo $row['uniqueid']; ?>" itemimage="../<?php echo $row['image1']; ?>" style="border:1px solid crimson;color:crimson;float:right;">select</button>
                                <button class="btn selected-btn<?php echo $row['uniqueid']; ?>" style="display:none;background-color:white;border:1px solid grey;color:grey;border-radius:3px;float:right;">selected <i class="fa fa-check"></i></button>
                            </div>
                        </div>

            <?php
                    }
                }
            } else {


                echo "<div style='width:100%;'>

    <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-flag'></i></div>
    <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey'>No items to select
   
    </div>

   

    </div>";
            }
            ?>









        </div>
        <!-- end of item container -->

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

                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;"><?php echo $product->getPromotionDetail($promotion_id, "name"); ?></div>

                <!-- start of nave btns container-->
                <div class="nav-btns-container">
                    <a href="promotion-select-item?i=<?php echo $promotion_id ?>" class="nav-btns active">Select</a>
                    <a href="promotion-added-item?i=<?php echo $promotion_id ?>" class="nav-btns">Items Added</a>

                </div>

                <!-- end of nav btns container -->



                <!-- start of item container -->
                <div class="item-container">

                    <?php
                    $result = $db->setQuery("SELECT * FROM product WHERE sellerid='$sessionid';");
                    $numrows = mysqli_num_rows($result);
                    if ($numrows != 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if (!$product->itemIsInPromotion($promotion_id, $row['uniqueid'])) {
                    ?>

                                <!-- box 1-->
                                <div class="item-box">
                                    <div class="item-box-left">
                                        <img src="../<?php echo $row['image1']; ?>" class="item-img">
                                    </div>
                                    <div class="item-box-right">
                                        <span style="font-weight:600;font-size:17px;"><?php echo $product->shortenLength($row['name'], 17, "..."); ?> </span><br>

                                        <?php echo $product->getStars($row['uniqueid'], "<i class='fa fa-star' style='color:orange;font-size:13px;'></i>", "<i class='fa fa-star' style='color:lightgrey;font-size:13px;'></i>") ?>
                                        <br>
                                        <!-- <button style="color:white;font-size:13px;background-color:grey;padding:3px;border:none;">New</button><br> -->
                                        <span style="color: crimson;font-size:17px;font-weight:600;"><span>&#8358</span><?php echo number_format($row['price']); ?></span>
                                        <button class="btn select-btn select-btn<?php echo $row['uniqueid']; ?>" id="<?php echo $row['uniqueid']; ?>" itemimage="../<?php echo $row['image1']; ?>" style="border:1px solid crimson;color:crimson;float:right;">select</button>
                                        <button class="btn selected-btn<?php echo $row['uniqueid']; ?>" style="display:none;background-color:white;border:1px solid grey;color:grey;border-radius:3px;float:right;">selected <i class="fa fa-check"></i></button>
                                    </div>
                                </div>

                    <?php
                            }
                        }
                    } else {


                        echo "<div style='width:100%;'>

    <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-flag'></i></div>
    <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey'> No items to select
    
    </div>

   

    </div>";
                    }
                    ?>









                </div>
                <!-- end of item container -->








            </div>
            <!-- right side end -->




        </div>
        <!-- main area container end -->








    </div>
    <!-- end of desktop view -->




    <!-- verify modal start -->
    <div class="verify-modal-background"></div>

    <div class="verify-modal">
        <button class="verify-modal-close-btn"><i class="fa fa-times"></i></button>
        <div class="verify-modal-header"><?php echo $product->getPromotionDetail($promotion_id, "name"); ?></div>
        <div style="width:100%;display:flex;justify-content:center;">
            <img src="../img/foot1.jpg" class="verify-modal-img">
        </div>
        <div class="verify-modal-message">
            <?php echo $product->getPromotionDetail($promotion_id, "description"); ?>
            <br>
            <label style="font-weight:bold;">How many is available?</label><br>
            <select class="form-control how-many" name="howmany">
                <?php
                $x = 1;

                while ($x < 1000) {

                    echo "<option>$x</option>";
                    $x++;
                }

                ?>
            </select>

            <label style="font-weight:bold;margin-top:15px;">Discount percentage(%)</label><br>
            <select class="form-control discount-percentage" name="discount_percentage">
                <?php
                $x = $product->getPromotionDetail($promotion_id, "min_discount") / 100;
                $p = "";
                while ($x < 1) {
                    $p = $x * 100;
                    echo "<option value='$x'>$p% off</option>";
                    $x += 0.1;
                }
                ?>
            </select>
        </div>
        <div style="width:100%;padding:10px;height:70px;">
            <button class="btn verify-modal-cancel-btn">Cancel</button>
            <button class="btn btn-danger verify-modal-approve-btn">Approve</button>
        </div>
    </div>
    <!-- verify modal end -->


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
        var item_image;
        var item_id;
        var howmany = 1;
        var discount_percentage = <?php echo $product->getPromotionDetail($promotion_id, "min_discount") / 100 ?>;
        var promotion_id = "<?php echo $promotion_id; ?>";


        // show verify modal
        $(".select-btn").click(function() {
            // set item image
            item_image = $(this).attr("itemimage");
            $(".verify-modal-img").attr("src", item_image);

            // set item id
            item_id = $(this).attr("id");

            // display modal
            $(".verify-modal-background").fadeIn();
            $(".verify-modal").fadeIn();
        });


        // remove verify modal
        $(".verify-modal-close-btn").click(function() {
            $(".verify-modal-background").fadeOut();
            $(".verify-modal").fadeOut();
        });
        $(".verify-modal-cancel-btn").click(function() {
            $(".verify-modal-background").fadeOut();
            $(".verify-modal").fadeOut();
        });
        $(".verify-modal-background").click(function() {
            $(".verify-modal-background").fadeOut();
            $(".verify-modal").fadeOut();
        });


        // adding item to clearance sale


        $(".how-many").change(function() {
            howmany = $(this).val();
        });

        $(".discount-percentage").change(function() {
            discount_percentage = $(this).val();
        });






        $(".verify-modal-approve-btn").click(function() {
            var add_item = "yes";

            //  alert(howmany)
            $.ajax({
                url: "ajax-promotion-handler.php",
                method: "POST",
                async: false,
                data: {
                    add_item: add_item,
                    item_id: item_id,
                    howmany: howmany,
                    discount_percentage: discount_percentage,
                    promotion_id: promotion_id
                },
                success: function(data) {

                    if (data == "added") {
                        alert("Item has been added");
                        $(".verify-modal-background").fadeOut();
                        $(".verify-modal").fadeOut();
                        $(".select-btn" + item_id).hide();
                        $(".selected-btn" + item_id).show();
                    } else if (data == "error") {
                        alert("An error occurred!");
                    }
                }
            });

        });
    </script>
</body>

</html>