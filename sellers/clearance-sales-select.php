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
                font-size: 13px;
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

            .order-container {
                width: 100%;
                padding: 10px;

            }


            .order-box {
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
                border-bottom: 1px solid lightgrey;
            }


            .order-box-left {
                width: 30%;

            }

            .order-box-right {
                width: 70%;
                padding: 10px;

            }

            .order-img {
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




            .order-container {
                width: 100%;
                padding: 10px;

            }


            .order-box {
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: center;
                border-bottom: 1px solid lightgrey;
            }


            .order-box-left {
                width: 20%;

            }

            .order-box-right {
                width: 80%;
                padding: 10px;

            }

            .order-img {
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
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>


    <!-- start of mobile view -->
    <div class="mobile-view-container">

        <!-- header start -->
        <div class="fixed-head sticky-top">
            <i class="fa fa-angle-left back-btn"></i> Clearance Sales
        </div>
        <!-- header end -->

        <!-- start of nave btns container-->
        <div class="nav-btns-container">
            <a href="clearance-sales-select.php" class="nav-btns active">Select</a>
            <a href="clearance-sales-added.php" class="nav-btns">Items Added</a>

        </div>

        <!-- end of nav btns container -->



        <!-- start of order container -->
        <div class="order-container">

            <?php

            $x = 0;
            $sql = "SELECT * FROM product WHERE sellerid='$sessionid';";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);
            if (clearance_sale_is_on()) {
                if ($numrows != 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (!item_is_on_clearance_sale($row['uniqueid'])) {
                            $x++;
            ?>

                            <!-- box 1-->
                            <div class="order-box">
                                <div class="order-box-left">
                                    <img src="../<?php echo $row['image1']; ?>" class="order-img">
                                </div>
                                <div class="order-box-right">
                                    <span style="font-weight:600;font-size:17px;"><?php echo $row['name']; ?> </span><br>
                                    <i class="fa fa-star" style="color:orange;font-size:13px;"></i>
                                    <i class="fa fa-star" style="color:orange;font-size:13px;"></i>
                                    <i class="fa fa-star" style="color:orange;font-size:13px;"></i><br>
                                    <!-- <button style="color:white;font-size:13px;background-color:grey;padding:3px;border:none;">New</button><br> -->
                                    <span style="color: #7fad39;font-size:17px;"><span>&#8358</span><?php echo number_format($row['price']); ?></span>
                                    <button class="btn select-btn select-btn<?php echo $row['uniqueid']; ?>" id="<?php echo $row['uniqueid']; ?>" itemimage="../<?php echo $row['image1']; ?>" style="border:1px solid crimson;color:crimson;float:right;">select</button>
                                    <button class="btn selected-btn<?php echo $row['uniqueid']; ?>" style="display:none;background-color:white;border:1px solid grey;color:grey;border-radius:3px;float:right;">selected <i class="fa fa-check"></i></button>
                                </div>
                            </div>

            <?php
                        }
                    }

                    if ($x == 0) {
                        echo "<div style='width:100%;'>

                        <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-check-circle'></i></div>
                        <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey'>All your items has been added to clearance sale.. No item left here!
                        
                        </div>
                    
                       
                    
                        </div>";
                    }
                } else {
                    echo "<div style='width:100%;'>

<div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-shopping-cart'></i></div>
<div style='width:100%;padding:10px;text-align:center;font-size:19px;'>You have not added any item to your store yet!</div>

<a href='add-new-choose.php'>
<div style='width:100%;padding:10px;display:flex;justify-content:center;'>
<button style='padding:10px;background-color:crimson;color:white;border:none;border-radius:3px;box-shadow:0px 2px 5px rgba(0, 0, 0, 0.3);font-size:17px;'>Add item</button>
</div>
</a>

</div>";
                }
            } else {


                echo "<div style='width:100%;'>

    <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-flag'></i></div>
    <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey'>Sorry! Clearance sale has not been activated for now!
    <br>Try again later
    </div>

   

    </div>";
            }
            ?>









        </div>
        <!-- end of order container -->





        <!-- verify modal start -->
        <div class="verify-modal-background"></div>

        <div class="verify-modal">
            <button class="verify-modal-close-btn"><i class="fa fa-times"></i></button>
            <div class="verify-modal-header">Clearance sale Agreement</div>
            <div style="width:100%;display:flex;justify-content:center;">
                <img src="../img/foot1.jpg" class="verify-modal-img">
            </div>
            <div class="verify-modal-message">
                This item would be sold at the discount percentage(%) you specity on our clearance sale promotion!<br>
                No extra fees would be charged on any order from this item
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
                    <option value="0.3">-30% off</option>
                    <option value="0.4">-40% off</option>
                    <option value="0.5">-50% off</option>
                    <option value="0.6">-60% off</option>
                    <option value="0.7">-70% off</option>
                    <option value="0.8">-80% off</option>
                    <option value="0.9">-90% off</option>
                </select>
            </div>
            <div style="width:100%;padding:10px;height:70px;">
                <button class="btn verify-modal-cancel-btn">Cancel</button>
                <button class="btn btn-danger verify-modal-approve-btn">Approve</button>
            </div>
        </div>
        <!-- verify modal end -->

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

                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">CLEARANCE SALES</div>

                <!-- start of nave btns container-->
                <div class="nav-btns-container">
                    <a href="clearance-sales-select.php" class="nav-btns active">Select</a>
                    <a href="clearance-sales-added.php" class="nav-btns">Items Added</a>

                </div>


                <!-- end of nav btns container -->


                <!-- start of order container -->
                <div class="order-container">


                    <?php

                    $x = 0;
                    $sql = "SELECT * FROM product WHERE sellerid='$sessionid';";
                    $result = mysqli_query($conn, $sql);
                    $numrows = mysqli_num_rows($result);
                    if (clearance_sale_is_on()) {
                        if ($numrows != 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if (!item_is_on_clearance_sale($row['uniqueid'])) {
                                    $x++;
                    ?>

                                    <!-- box 1-->
                                    <div class="order-box">
                                        <div class="order-box-left">
                                            <img src="../<?php echo $row['image1']; ?>" class="order-img">
                                        </div>
                                        <div class="order-box-right">
                                            <span style="font-weight:600;font-size:17px;"><?php echo $row['name']; ?> </span><br>
                                            <i class="fa fa-star" style="color:orange;font-size:13px;"></i>
                                            <i class="fa fa-star" style="color:orange;font-size:13px;"></i>
                                            <i class="fa fa-star" style="color:orange;font-size:13px;"></i><br>
                                            <!-- <button style="color:white;font-size:13px;background-color:grey;padding:3px;border:none;">New</button><br> -->
                                            <span style="color: #7fad39;font-size:17px;"><span>&#8358</span><?php echo number_format($row['price']); ?></span>
                                            <button class="btn select-btn select-btn<?php echo $row['uniqueid']; ?>" id="<?php echo $row['uniqueid']; ?>" itemimage="../<?php echo $row['image1']; ?>" style="border:1px solid crimson;color:crimson;float:right;">select</button>
                                            <button class="btn selected-btn<?php echo $row['uniqueid']; ?>" style="display:none;background-color:white;border:1px solid grey;color:grey;border-radius:3px;float:right;">selected <i class="fa fa-check"></i></button>
                                        </div>
                                    </div>

                    <?php
                                }
                            }

                            if ($x == 0) {
                                echo "<div style='width:100%;'>
        
                                <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-check-circle'></i></div>
                                <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey'>All your items has been added to clearance sale.. No item left here!
                               
                                </div>
                            
                               
                            
                                </div>";
                            }
                        } else {
                            echo "<div style='width:100%;'>

                <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-shopping-cart'></i></div>
                <div style='width:100%;padding:10px;text-align:center;font-size:19px;'>You have not added any item to your store yet!</div>

                <a href='add-new-choose.php'>
                <div style='width:100%;padding:10px;display:flex;justify-content:center;'>
                <button style='padding:10px;background-color:crimson;color:white;border:none;border-radius:3px;box-shadow:0px 2px 5px rgba(0, 0, 0, 0.3);font-size:17px;'>Add item</button>
                </div>
                </a>

                </div>";
                        }
                    } else {


                        echo "<div style='width:100%;'>

                        <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-flag'></i></div>
                        <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey'>Sorry! Clearance sale has not been activated for now!
                        <br>Try again later
                        </div>
        
                       
        
                        </div>";
                    }
                    ?>





                </div>
                <!-- end of order container -->




                <!-- verify modal start -->
                <div class="verify-modal-background"></div>

                <div class="verify-modal">
                    <button class="verify-modal-close-btn"><i class="fa fa-times"></i></button>
                    <div class="verify-modal-header">Clearance sale Agreement</div>
                    <div style="width:100%;display:flex;justify-content:center;">
                        <img src="../img/foot1.jpg" class="verify-modal-img">
                    </div>
                    <div class="verify-modal-message">
                        This item would be sold at 20% discount rate on our clearance sale promotion!<br>
                        No extra fees would be charged on any order from this item
                        <br>
                        <label style="font-weight:bold;">How many is available?</label><br>
                        <select class="form-control how-many-desktop" name="howmany">
                            <?php
                            $x = 1;
                            while ($x < 1000) {
                                echo "<option>$x</option>";
                                $x++;
                            }

                            ?>
                        </select>

                        <label style="font-weight:bold;margin-top:15px;">Discount percentage(%)</label><br>
                        <select class="form-control discount-percentage-desktop" name="discount_percentage">
                            <option value="0.3">-30% off</option>
                            <option value="0.4">-40% off</option>
                            <option value="0.5">-50% off</option>
                            <option value="0.6">-60% off</option>
                            <option value="0.7">-70% off</option>
                            <option value="0.8">-80% off</option>
                            <option value="0.9">-90% off</option>
                        </select>
                    </div>
                    <div style="width:100%;padding:10px;height:70px;">
                        <button class="btn verify-modal-cancel-btn">Cancel</button>
                        <button class="btn btn-danger verify-modal-approve-btn">Approve</button>
                    </div>
                </div>
                <!-- verify modal end -->


            </div>
            <!-- right side end -->




        </div>
        <!-- main area container end -->








    </div>
    <!-- end of desktop view -->


    <input type="text" class="how-many-value" value="1" style="display:none;">


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
        // alert("ya")
        var item_image;
        var item_id;
        var howmany = 1;
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
            $(".how-many-value").val(howmany);
        });

        $(".discount-percentage").change(function() {
            discount_percentage = $(this).val();
        });


        $(".how-many-desktop").change(function() {
            howmany = $(this).val();
            $(".how-many-value").val(howmany);
        });

        $(".discount-percentage-desktop").change(function() {
            discount_percentage = $(this).val();
        });

        $(".verify-modal-approve-btn").click(function() {
            var add_to_clearance_item = "yes";

            //  alert(howmany)
            $.ajax({
                url: "ajax-clearance-sale-handler.php",
                method: "POST",
                async: false,
                data: {
                    add_to_clearance_item: add_to_clearance_item,
                    item_id: item_id,
                    howmany: howmany,
                    discount_percentage: discount_percentage
                },
                success: function(data) {
                    // alert(data)
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