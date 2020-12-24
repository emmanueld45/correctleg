<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
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
                height: 40px;
                font-size: 15px;
                background-color: crimson;
                color: white;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);

            }


            .promotions-container {
                width: 100%;
                display: flex;
                flex-flow: row wrap;
                margin-top: 20px;
            }

            .promotions-container .promotion-box {
                width: 80%;
                margin: auto;
                margin-bottom: 20px;
                background-color: ;
                border: 1px solid lightgrey;
            }

            .promotions-container .promotion-box .centered-div img {
                width: 100%;
                height: auto;
            }

            .promotions-container .promotion-box .name {
                width: 100%;
                font-weight: 600;
                font-size: 15px;
                padding: 5px;
            }

            .promotions-container .promotion-box .description {
                width: 100%;
                color: grey;
                font-size: 14px;
                padding: 5px;
            }

            .promotions-container .promotion-box .centered-div .open-btn {
                width: 90%;
                display: block;
                text-align: center;
                padding: 5px;
                background-color: crimson;
                color: white;
                border: none;
                border-radius: 50px;
                box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
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




            .promotions-container {
                width: 100%;
                display: flex;
                flex-flow: row wrap;
                margin-top: 20px;
            }

            .promotions-container .promotion-box {
                width: 200px;
                margin-right: 20px;
                margin-bottom: 20px;
                background-color: ;
                border: 1px solid lightgrey;
            }

            .promotions-container .promotion-box .centered-div img {
                width: 100%;
                height: auto;
            }

            .promotions-container .promotion-box .name {
                width: 100%;
                font-weight: 600;
                font-size: 15px;
                padding: 5px;
            }

            .promotions-container .promotion-box .description {
                width: 100%;
                color: grey;
                font-size: 14px;
                padding: 5px;
            }

            .promotions-container .promotion-box .centered-div .open-btn {
                width: 90%;
                display: block;
                text-align: center;
                padding: 5px;
                background-color: crimson;
                color: white;
                border: none;
                border-radius: 50px;
                box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
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
            <i class="fa fa-angle-left back-btn"></i> Promotions
        </div>
        <!-- header end -->




        <!-- start of promotions container -->
        <div class="promotions-container">

            <?php
            $result = $db->setQuery("SELECT * FROM promotions ORDER BY id DESC;");
            $numrows = mysqli_num_rows($result);
            if ($numrows != 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

                    <!-- box 1-->
                    <div class="promotion-box">
                        <div class="centered-div">
                            <img src="../<?php echo $row['image']; ?>" alt="">
                        </div>
                        <div class="name"><?php echo $row['name']; ?></div>
                        <div class="description"><?php echo $product->shortenLength($row['description'], 30, "..."); ?></div>
                        <div class="centered-div mb-3">
                            <a href="promotion-select-item?i=<?php echo $row['uniqueid']; ?>" class="open-btn">Open</a>
                        </div>
                    </div>




            <?php

                }
            } else {


                echo "<div style='width:100%;'>

                <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-flag'></i></div>
                <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey'>Sorry! No promotions available yet!
                <br>Try again later
                </div>

            

                </div>";
            }
            ?>









        </div>
        <!-- end of promotion container -->







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

                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">PROMOTIONS</div>

                <!-- start of promotions container -->
                <div class="promotions-container">

                    <?php
                    $result = $db->setQuery("SELECT * FROM promotions ORDER BY id DESC;");
                    $numrows = mysqli_num_rows($result);
                    if ($numrows != 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                            <!-- box 1-->
                            <div class="promotion-box">
                                <div class="centered-div">
                                    <img src="../<?php echo $row['image']; ?>" alt="">
                                </div>
                                <div class="name"><?php echo $row['name']; ?></div>
                                <div class="description"><?php echo $product->shortenLength($row['description'], 30, "..."); ?></div>
                                <div class="centered-div mb-3">
                                    <a href="promotion-select-item?i=<?php echo $row['uniqueid']; ?>" class="open-btn">Open</a>
                                </div>
                            </div>




                    <?php

                        }
                    } else {


                        echo "<div style='width:100%;'>

    <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-flag'></i></div>
    <div style='width:100%;padding:10px;text-align:center;font-size:19px;color:grey'>Sorry! No promotions available yet!
    <br>Try again later
    </div>



    </div>";
                    }
                    ?>









                </div>
                <!-- end of promotion container -->






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