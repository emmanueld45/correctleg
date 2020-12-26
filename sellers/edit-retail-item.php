<?php
session_start();
include '../dbconn.php';
include '../functions.php';


include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/products.class.php';


if (!isset($_SESSION['id'])) {
    $admin->goToPage("login", "invalid_seller");
}

if (!$seller->sellerIsLoggedIn($_SESSION['id'])) {
    $admin->goToPage("login", "invalid_seller");
}

$sessionid = $_SESSION['id'];

$item_id = $_GET['i'];

if (isset($_GET['remove_image'])) {
    $image_to_remove = $_GET['remove_image'];

    $db->setQuery("UPDATE product SET $image_to_remove='empty' WHERE uniqueid='$item_id';");
}

$sql = "SELECT * FROM product WHERE uniqueid='$item_id';";
$result = mysqli_query($conn, $sql);
$row10 = mysqli_fetch_assoc($result)
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
                border-bottom: 1px solid lightgrey;
                background-color: white;
                font-size: 20px;
            }


            .mybody {
                background-color: lightgrey;
            }

            .form-container {
                width: 95%;
                margin: auto;
                padding: 10px;
                margin-top: 10px;
                background-color: white;
            }

            .images-box-container {
                position: relative;
            }

            .images-box-container .remove-label {
                position: absolute;
                background-color: black;
                color: white;
                top: 0px;
                right: 0px;
                font-size: 12px;
                z-index: 100;
                padding: 2px 3px;
                opacity: 0.8;

            }

            .images-box {
                width: 100px;
                height: 100px;
                border-radius: 2px;
                border: 1px solid lightgrey;
                margin-right: 10px;
                margin-bottom: 10px;
                white-space: nowrap;
                text-align: center;
                position: relative;

            }



            .images-box i {
                position: relative;
                color: crimson;
                font-size: 40px;
                top: 25px;
                opacity: 0.6;
            }

            .thumb-image {
                width: 100px;
                height: 100px;
            }


            .upload-item-btn {
                width: 80%;
                padding: 10px;
                background-color: crimson;
                color: white;
                border: none;
                border-radius: 3px;

            }


            .variation-container {
                width: 95%;
                margin: auto;
                background-color: #eee;

                display: flex;
                flex-flow: row wrap;
            }

            .variation-container .box {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 5px;
            }

            .variation-container .box .row1 {
                width: 33%;
            }



            .variation-container .box .row2 {
                width: 33%;
            }

            .variation-container .box .row3 {
                width: 33%;
            }

            .variation-container .add-variation-btn-container {
                width: 100%;
                height: 40px;
            }

            .variation-container .add-variation-btn-container .add-variation-btn {
                border: none;
                padding: 5px;
                background-color: crimson;
                color: white;
                border-radius: 3px;
                box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
                float: right;
                margin-right: 10px;
                font-size: 14px;
                text-align: center;
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
                margin-bottom: 10px;
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
                padding: 10px;
                margin-top: 10px;
                background-color: white;
                border: 1px solid lightgrey;
                margin-bottom: 100px;
            }

            .images-box-container {
                position: relative;
            }

            .images-box-container .remove-label {
                position: absolute;
                background-color: black;
                color: white;
                top: 0px;
                right: 0px;
                font-size: 12px;
                z-index: 100;
                padding: 2px 3px;
                opacity: 0.8;
                cursor: pointer;

            }

            .images-box-container .remove-label:hover {
                background-color: crimson;
            }


            .images-box {
                width: 100px;
                height: 100px;
                border-radius: 2px;
                border: 1px solid lightgrey;
                margin-right: 10px;
                margin-bottom: 10px;
                white-space: nowrap;
                text-align: center;
                cursor: pointer;

            }

            .images-box i {
                position: relative;
                color: crimson;
                opacity: 0.6;
                font-size: 40px;
                top: 25px;
            }

            .thumb-image {
                width: 100px;
                height: 100px;
            }

            .upload-item-btn {
                width: 80%;
                padding: 10px;
                background-color: crimson;
                color: white;
                border: none;
                border-radius: 3px;

            }



            .variation-container {
                width: 95%;
                margin: auto;
                background-color: #eee;

                display: flex;
                flex-flow: row wrap;
            }

            .variation-container .box {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 5px;
            }

            .variation-container .box .row1 {
                width: 33%;
            }



            .variation-container .box .row2 {
                width: 33%;
            }

            .variation-container .box .row3 {
                width: 33%;
            }

            .variation-container .add-variation-btn-container {
                width: 100%;
                height: 40px;
            }

            .variation-container .add-variation-btn-container .add-variation-btn {
                border: none;
                padding: 5px;
                background-color: crimson;
                color: white;
                border-radius: 3px;
                box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
                float: right;
                margin-right: 10px;
                font-size: 14px;
                text-align: center;
                cursor: pointer;
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

<body class="mybody">
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>


    <!-- start of mobile view -->
    <div class="mobile-view-container" style="background-color:;">


        <!-- header start -->
        <div class="fixed-head sticky-top">
            <i class="fa fa-angle-left back-btn"></i> Edit Item <i class="fa fa-edit" style="color:grey;"></i>
        </div>
        <!-- header end -->




        <!-- form container start -->
        <div class="form-container">
            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateMobileForm()">

                <?php if (isset($_GET['update_failure'])) {
                ?>
                    <div style="width:100%;display:flex;justify-content:center;">
                        <img src="../img/badsign2.png" style="width:100px;height:100px;">
                    </div>
                    <div class="alert alert-danger" style="font-size:15px;margin-top:5px;text-align:center;">
                        An <span class="alert-link">error occurred!</span> try again
                    </div>
                <?php } ?>
                <?php if (isset($_GET['update_success'])) {
                ?>
                    <div style="width:100%;display:flex;justify-content:center;">
                        <img src="../img/goodsign1.png" style="width:100px;height:100px;">
                    </div>
                    <div class="alert alert-success" style="font-size:15px;margin-top:5px;text-align:center;">
                        product <span class="alert-link"> has been updated successfully!</span><br>
                        <a href="my-retail-items" style="color:crimson;"><u>view items <i class="fa fa-angle-double-right"></i></u></a>
                    </div>
                <?php } ?>
                <?php
                if (isset($_GET['image_too_large'])) {
                    echo "<div class='alert alert-danger' style='font-weight:bold;text-align:center;'>" . $_GET['message'] . ", kindly upload images less than 4mb.. <a class='back-btn' style='cursor:pointer;color:royalblue;text-decoration:underline;'>retry?</a></div>";
                }
                ?>



                <!-- item name -->
                <label style="font-weight:600;">Item Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="<?php echo $row10['name']; ?>" class="form-control" required>
                <br>

                <!--item decrition -->
                <label style="font-weight:600;">Item Description <span style="color:red;">*</span></label>
                <textarea class="form-control" name="description" id="descriptionm" required><?php echo $row10['description']; ?></textarea>
                <br>

                <!-- images -->
                <!-- item name -->
                <label style="font-weight:600;">Item Images <span style="color:red;">*</span></label>
                <div style="width:100%;padding:10px;display:flex;flex-flow:row wrap;overflow-x:scroll;">

                    <div class="images-box-container">
                        <label class="remove-label" id="image1">remove</label>
                        <div class="images-box fakeimgm1">
                            <?php
                            if ($row10['image1'] != "empty") {
                                echo "<img src='../$row10[image1]' class='thumb-image'>";
                            } else {
                                echo "<i class='fa fa-camera'></i>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="images-box-container">
                        <div class="images-box fakeimgm2">
                            <label class="remove-label" id="image2">remove</label>
                            <?php
                            if ($row10['image2'] != "empty") {
                                echo "<img src='../$row10[image2]' class='thumb-image'>";
                            } else {
                                echo "<i class='fa fa-camera'></i>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="images-box-container">
                        <label class="remove-label" id="image3">remove</label>
                        <div class="images-box fakeimgm3">
                            <?php
                            if ($row10['image3'] != "empty") {
                                echo "<img src='../$row10[image3]' class='thumb-image'>";
                            } else {
                                echo "<i class='fa fa-camera'></i>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="images-box-container">
                        <label class="remove-label" id="image4">remove</label>
                        <div class="images-box fakeimgm4">
                            <?php
                            if ($row10['image4'] != "empty") {
                                echo "<img src='../$row10[image4]' class='thumb-image'>";
                            } else {
                                echo "<i class='fa fa-camera'></i>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="images-box-container">
                        <label class="remove-label" id="image5">remove</label>
                        <div class="images-box fakeimgm5">
                            <?php
                            if ($row10['image5'] != "empty") {
                                echo "<img src='../$row10[image5]' class='thumb-image'>";
                            } else {
                                echo "<i class='fa fa-camera'></i>";
                            }
                            ?>
                        </div>
                    </div>

                </div>
                <input class="realimgm1" id="" accept="image/*" name="image1" type="file" value="<?php echo $row10['image1']; ?>" style="display:none ;">
                <input class="realimgm2" id="" accept="image/*" name="image2" type="file" value="<?php echo $row10['image2']; ?>" style="display: none;">
                <input class="realimgm3" id="" accept="image/*" name="image3" type="file" value="<?php echo $row10['image3']; ?>" style="display: none;">
                <input class="realimgm4" id="" accept="image/*" name="image4" type="file" value="<?php echo $row10['image4']; ?>" style="display: none;">
                <input class="realimgm5" id="" accept="image/*" name="image5" type="file" value="<?php echo $row10['image5']; ?>" style="display: none;">





                <!-- for & type-->
                <div style="width:100%;display:flex;flex-flow:row nowrap;margin-top:10px;padding-left:10px;">
                    <span class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;font-weight:600;">For <span style="color:red;">*</span></span>
                    <span class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Type <span style="color:red;">*</span></span>
                </div>

                <div style="width:100%;display:flex;flex-flow:row nowrap;">
                    <select class="form-control item-is-for" name="itemisfor" style="width:;margin-right:10px;" required>
                        <option><?php echo $row10['itemisfor']; ?></option>
                        <option>Men</option>
                        <option>Women</option>
                        <option>Kids</option>
                    </select>


                    <select class="form-control item-type" name="itemtype" style="width:;" required>
                        <option><?php echo $row10['itemtype']; ?></option>
                        <?php
                        $sql = "SELECT * FROM footwear_type WHERE item_is_for='Men';";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $item_type = $row['item_type'];
                            echo "<option>$item_type</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>


                <!-- size & color-->
                <div style="width:100%;display:flex;flex-flow:row nowrap;padding-left:10px;">
                    <span class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;font-weight:600;">Size (optional)</span>
                    <span class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Color (optional)</span>
                </div>

                <div style="width:100%;display:flex;flex-flow:row nowrap;">

                    <input class="form-control item-size" name="itemsize" value="<?php echo $row10['size']; ?>" style="width:;margin-right:10px;" required>


                    <select class="form-control" name="itemcolor" style="width:;" required>
                        <option><?php echo $row10['color']; ?></option>
                        <?php include '../utilities/colors.php'; ?>
                    </select>
                </div>
                <br>

                <!-- brand name -->
                <label style="font-weight:600;">Item Brand Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="brandname" value="<?php if ($row10['brandname'] != "empty") {
                                                                                    echo $row10['brandname'];
                                                                                } ?>">
                <br>

                <!-- Amount in stock -->
                <label style="font-weight:600;">How many available? <span style="color:red;">*</span></label>
                <select class="form-control" name="howmany" style="width:;" required>
                    <option><?php echo $row10['howmany']; ?></option>
                    <?php $x = 1;
                    while ($x < 100) {
                        echo "<option>$x</option>";
                        $x++;
                    }

                    ?>
                </select>
                <br>


                <!-- Add variation -->
                <label style="font-weight:600;">Add variations (optional)</label>
                <div class="variation-container">
                    <div class="box">
                        <div class="row1 p-2">Size</div>
                        <div class="row2 p-2">Price</div>
                        <div class="row3 p-2">Quantity</div>
                    </div>
                    <div class="box">
                        <div class="row1 p-2">
                            <input type="text" class="form-control variation-size-m" placeholder="">
                        </div>
                        <div class="row2 p-2">
                            <input type="number" class="form-control variation-price-m price" placeholder="">
                        </div>
                        <div class="row3 p-2">
                            <select class="form-control variation-quantity-m">
                                <?php
                                for ($i = 1; $i <= 100; $i++) {
                                    echo "<option>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="add-variation-btn-container">
                        <span class="add-variation-btn add-variation-btn-m">Add variation</span>
                    </div>

                    <?php

                    if ($product->productHaveVariation($item_id)) {
                        $variation_result = $db->setQuery("SELECT * FROM product_variations WHERE product_id='$item_id';");
                        while ($variation_row = mysqli_fetch_assoc($variation_result)) {
                            echo "
                   <div class='box' variation_box='" . $variation_row['id'] . "' style='background-color:crimson;color:white;border-bottom:1px solid white;'>
                        <div class='row1 p-1'>" . $variation_row['size'] . "</div>
                        <div class='row2 p-1'><span>&#8358</span>" . number_format($variation_row['price']) . "</div>
                        <div class='row3 p-1'>" . $variation_row['quantity'] . "  <i  class='fa fa-times remove-variation-btn'  onclick='remove_inbuilt_variation(this)' style='float:right;cursor:pointer;' variation_id='" . $variation_row['id'] . "'></i></div>
                    </div>
                         ";
                        }
                    }
                    ?>


                    <?php

                    if (isset($_SESSION['item_variations'])) {
                        foreach ($_SESSION['item_variations'] as $key => $value) {
                            echo "
                         <div class='box' variation_box='" . $value['variation_id'] . "' style='background-color:crimson;color:white;border-bottom:1px solid white;'>
                            <div class='row1 p-1'>" . $value['variation_size'] . "</div>
                            <div class='row2 p-1'><span>&#8358</span>" . number_format($value['variation_price']) . "</div>
                            <div class='row3 p-1'>" . $value['variation_quantity'] . "  <i  class='fa fa-times remove-variation-btn'  onclick='remove_variation(this)' style='float:right;cursor:pointer;' variation_id='" . $value['variation_id'] . "'></i></div>
                        </div>
                            ";
                        }
                    }
                    ?>



                </div>
                <br>


                <!--old  price -->
                <label style="font-weight:600;">Old Price <span style="color:red;">*</span></label>
                <input type="text" name="old_price" class="form-control price" value="<?php echo $row10['old_price']; ?>" required>
                <br>

                <!-- price -->
                <label style="font-weight:600;">Current Price <span style="color:red;">*</span></label>
                <input type="text" name="price" class="form-control price" value="<?php echo $row10['price']; ?>" required>
                <br>
                <input type="text" value="<?php echo $item_id; ?>" name="item_id" style="display:none;">

                <div style="width:100%;padding:10px;display:flex;justify-content:center;">
                    <button type="submit" name="uploaditem" class="upload-item-btn" name="uploaditem">Upload item</button>
                </div>

            </form>
        </div>
        <!-- form container end -->







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
            <div class="col-sm-8" style="background-color:lightgrey;">


                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">Edit ITEM (RETAIL)<i class="fa fa-edit" style="color:grey;"></i></div>
                <div class="alert alert-info" style="width:350px;">Kindly fill the form below to add a new item to your <span class="alert-link">CorrectLeg</span> store</div>
                <!-- form container start -->
                <div class="form-container">

                    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateDesktopForm()">
                        <?php if (isset($_GET['update_failure'])) {
                        ?>
                            <div style="width:100%;display:flex;justify-content:center;">
                                <img src="../img/badsign2.png" style="width:100px;height:100px;">
                            </div>
                            <div class="alert alert-danger" style="font-size:15px;margin-top:5px;text-align:center;">
                                An <span class="alert-link">error occurred!</span> try again
                            </div>
                        <?php } ?>
                        <?php if (isset($_GET['update_success'])) {
                        ?>
                            <div style="width:100%;display:flex;justify-content:center;">
                                <img src="../img/goodsign1.png" style="width:100px;height:100px;">
                            </div>
                            <div class="alert alert-success" style="font-size:15px;margin-top:5px;text-align:center;">
                                product <span class="alert-link">has been updated successfully!</span><br>
                                <a href="my-retail-items" style="color:crimson;"><u>view items <i class="fa fa-angle-double-right"></i></u></a>
                            </div>
                        <?php } ?>
                        <?php
                        if (isset($_GET['image_too_large'])) {
                            echo "<div class='alert alert-danger' style='font-weight:bold;text-align:center;'>" . $_GET['message'] . ", kindly upload images less than 4mb.. <a class='back-btn' style='cursor:pointer;color:royalblue;text-decoration:underline;'>retry?</a></div>";
                        }
                        ?>
                        <!-- item name -->
                        <label style="font-weight:600;">Item Name <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" value="<?php echo $row10['name']; ?>" name="name" required>
                        <br>

                        <!--item decrition -->
                        <label style="font-weight:600;">Item Description <span style="color:red;">*</span></label>
                        <textarea class="form-control" name="description" id="descriptiond" required><?php echo $row10['description']; ?></textarea>
                        <br>

                        <!-- images -->
                        <!-- item name -->
                        <label style="font-weight:600;">Item Images <span style="color:red;">*</span></label>
                        <div style="width:100%;padding:10px;display:flex;flex-flow:row wrap;overflow-x:scroll;">

                            <div class="images-box-container">
                                <label class="remove-label" id="image1">remove</label>
                                <div class="images-box fakeimgd1">
                                    <?php
                                    if ($row10['image1'] != "empty") {
                                        echo "<img src='../$row10[image1]' class='thumb-image'>";
                                    } else {
                                        echo "<i class='fa fa-camera'></i>";
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="images-box-container">
                                <label class="remove-label" id="image2">remove</label>
                                <div class="images-box fakeimgd2">
                                    <?php
                                    if ($row10['image2'] != "empty") {
                                        echo "<img src='../$row10[image2]' class='thumb-image'>";
                                    } else {
                                        echo "<i class='fa fa-camera'></i>";
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="images-box-container">
                                <label class="remove-label" id="image3">remove</label>
                                <div class="images-box fakeimgd3">
                                    <?php
                                    if ($row10['image3'] != "empty") {
                                        echo "<img src='../$row10[image3]' class='thumb-image'>";
                                    } else {
                                        echo "<i class='fa fa-camera'></i>";
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="images-box-container">
                                <label class="remove-label" id="image4">remove</label>
                                <div class="images-box fakeimgd4">
                                    <?php
                                    if ($row10['image4'] != "empty") {
                                        echo "<img src='../$row10[image4]' class='thumb-image'>";
                                    } else {
                                        echo "<i class='fa fa-camera'></i>";
                                    }
                                    ?>
                                </div>
                            </div>


                            <div class="images-box-container">
                                <label class="remove-label" id="image5">remove</label>
                                <div class="images-box fakeimgd5">
                                    <?php
                                    if ($row10['image5'] != "empty") {
                                        echo "<img src='../$row10[image5]' class='thumb-image'>";
                                    } else {
                                        echo "<i class='fa fa-camera'></i>";
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>

                        <input class="realimgd1" id="" accept="image/*" name="image1" type="file" value="<?php echo $row10['image1']; ?>" style="display:none ;">
                        <input class="realimgd2" id="" accept="image/*" name="image2" type="file" value="<?php echo $row10['image2']; ?>" style="display: none;">
                        <input class="realimgd3" id="" accept="image/*" name="image3" type="file" value="<?php echo $row10['image3']; ?>" style="display: none;">
                        <input class="realimgd4" id="" accept="image/*" name="image4" type="file" value="<?php echo $row10['image4']; ?>" style="display: none;">
                        <input class="realimgd5" id="" accept="image/*" name="image5" type="file" value="<?php echo $row10['image5']; ?>" style="display: none;">

                        <!-- for & type-->
                        <div style="width:100%;display:flex;flex-flow:row nowrap;margin-top:10px;padding-left:10px;">
                            <span class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;font-weight:600;">For <span style="color:red;">*</span></span>
                            <span class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Type <span style="color:red;">*</span></span>
                        </div>

                        <div style="width:100%;display:flex;flex-flow:row nowrap;">
                            <select class="form-control item-is-for" name="itemisfor" style="width:;margin-right:10px;" required>
                                <option><?php echo $row10['itemisfor']; ?></option>
                                <option>Men</option>
                                <option>Women</option>
                                <option>Kids</option>
                            </select>


                            <select class="form-control item-type" name="itemtype" style="width:;" required>
                                <option><?php echo $row10['itemtype']; ?></option>
                                <?php
                                $sql = "SELECT * FROM footwear_type WHERE item_is_for='Men';";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $item_type = $row['item_type'];
                                    echo "<option>$item_type</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <br>


                        <!-- size & color-->
                        <div style="width:100%;display:flex;flex-flow:row nowrap;padding-left:10px;">
                            <span class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;font-weight:600;">Size (optional)</span>
                            <span class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Color (optional)</span>
                        </div>

                        <div style="width:100%;display:flex;flex-flow:row nowrap;">
                            <input class="form-control item-size" name="itemsize" value="<?php echo $row10['size']; ?>" style="width:;margin-right:10px;" required>



                            <select class="form-control" name="itemcolor" style="width:;" required>
                                <option><?php echo $row10['color']; ?></option>
                                <?php include '../utilities/colors.php'; ?>
                            </select>
                        </div>
                        <br>

                        <!-- brand name -->
                        <label style="font-weight:600;">Item Brand Name <span style="color:red;">*</span></label>
                        <input type="text" name="brandname" class="form-control" value="<?php if ($row10['brandname'] != "empty") {
                                                                                            echo $row10['brandname'];
                                                                                        } ?>">
                        <br>

                        <!-- Amount in stock -->
                        <label style="font-weight:600;">How many available? <span style="color:red;">*</span></label>
                        <select class="form-control" name="howmany" style="width:;" required>
                            <option><?php echo $row10['howmany']; ?></option>
                            <?php $x = 1;
                            while ($x < 100) {
                                echo "<option>$x</option>";
                                $x++;
                            }

                            ?>
                        </select>
                        <br>



                        <!-- Add variation -->
                        <label style="font-weight:600;">Add variations (optional)</label>
                        <div class="variation-container">
                            <div class="box">
                                <div class="row1 p-2">Size</div>
                                <div class="row2 p-2">Price</div>
                                <div class="row3 p-2">Quantity</div>
                            </div>
                            <div class="box">
                                <div class="row1 p-2">
                                    <input type="text" class="form-control variation-size-d" placeholder="">
                                </div>
                                <div class="row2 p-2">
                                    <input type="number" class="form-control variation-price-d price" placeholder="">
                                </div>
                                <div class="row3 p-2">
                                    <select class="form-control variation-quantity-d">
                                        <?php
                                        for ($i = 1; $i <= 100; $i++) {
                                            echo "<option>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="add-variation-btn-container">
                                <span class="add-variation-btn add-variation-btn-d">Add variation</span>
                            </div>

                            <?php

                            if ($product->productHaveVariation($item_id)) {
                                $variation_result = $db->setQuery("SELECT * FROM product_variations WHERE product_id='$item_id';");
                                while ($variation_row = mysqli_fetch_assoc($variation_result)) {
                                    echo "
                   <div class='box' variation_box='" . $variation_row['id'] . "' style='background-color:crimson;color:white;border-bottom:1px solid white;'>
                        <div class='row1 p-1'>" . $variation_row['size'] . "</div>
                        <div class='row2 p-1'><span>&#8358</span>" . number_format($variation_row['price']) . "</div>
                        <div class='row3 p-1'>" . $variation_row['quantity'] . "  <i  class='fa fa-times remove-variation-btn'  onclick='remove_inbuilt_variation(this)' style='float:right;cursor:pointer;' variation_id='" . $variation_row['id'] . "'></i></div>
                    </div>
                         ";
                                }
                            }
                            ?>


                            <?php

                            if (isset($_SESSION['item_variations'])) {
                                foreach ($_SESSION['item_variations'] as $key => $value) {
                                    echo "
                         <div class='box' variation_box='" . $value['variation_id'] . "' style='background-color:crimson;color:white;border-bottom:1px solid white;'>
                            <div class='row1 p-1'>" . $value['variation_size'] . "</div>
                            <div class='row2 p-1'><span>&#8358</span>" . number_format($value['variation_price']) . "</div>
                            <div class='row3 p-1'>" . $value['variation_quantity'] . "  <i  class='fa fa-times remove-variation-btn'  onclick='remove_variation(this)' style='float:right;cursor:pointer;' variation_id='" . $value['variation_id'] . "'></i></div>
                        </div>
                            ";
                                }
                            }
                            ?>

                        </div>
                        <br>

                        <!--old  price -->
                        <label style="font-weight:600;">Old Price <span style="color:red;">*</span></label>
                        <input type="text" name="old_price" class="form-control price" value="<?php echo $row10['old_price']; ?>" required>
                        <br>

                        <!-- price -->
                        <label style="font-weight:600;">Current Price <span style="color:red;">*</span></label>
                        <input type="text" name="price" class="form-control price" value="<?php echo $row10['price']; ?>" required>
                        <br>

                        <input type="text" value="<?php echo $item_id; ?>" name="item_id" style="display:none;">

                        <div style="width:100%;padding:10px;display:flex;justify-content:center;">
                            <button type="submit" name="uploaditem" class="upload-item-btn">Upload item</button>
                        </div>
                    </form>
                </div>
                <!-- form container end -->


            </div>
            <!-- right side end -->




        </div>
        <!-- main area container end -->








    </div>
    <!-- end of desktop view -->










    <?php



    if (isset($_POST['uploaditem'])) {

        $uniqueid = uniqid();
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $itemisfor = mysqli_real_escape_string($conn, $_POST['itemisfor']);
        $itemtype = mysqli_real_escape_string($conn, $_POST['itemtype']);
        $itemsize = mysqli_real_escape_string($conn, $_POST['itemsize']);
        $itemcolor = mysqli_real_escape_string($conn, $_POST['itemcolor']);
        $brandname = mysqli_real_escape_string($conn, $_POST['brandname']);
        $howmany = mysqli_real_escape_string($conn, $_POST['howmany']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $old_price = mysqli_real_escape_string($conn, $_POST['old_price']);
        $item_id = $_POST['item_id'];

        $time = time();
        $date = date("d-m-y");
        $status = "inactive";
        $productcode = create_product_code();

        $exclusive = "no";
        $uniqueid = uniqid();

        $max_file_size = 4000000;
        // $max_file_size = 1000;


        $filename1 = $_FILES['image1']['name'];
        if ($filename1 != "") {
            if ($_FILES['image1']['size'] < $max_file_size) {
                $filetmpname1 = $_FILES['image1']['tmp_name'];
                $filedestination1 = "../productimages/" . $uniqueid . $filename1;
                $move = move_uploaded_file($filetmpname1, $filedestination1);
                $image1 = "productimages/" . $uniqueid . $filename1;
            } else {
                $admin->goToPage("edit-retail-item", "i=$item_id&image_too_large&message=image+1+was+too+large");
            }
        } else {
            $image1 = $row10['image1'];
        }


        $filename2 = $_FILES['image2']['name'];
        if ($filename2 != "") {
            if ($_FILES['image2']['size'] < $max_file_size) {
                $filetmpname2 = $_FILES['image2']['tmp_name'];
                $filedestination2 = "../productimages/" . $uniqueid . $filename2;
                $move = move_uploaded_file($filetmpname2, $filedestination2);
                $image2 = "productimages/" . $uniqueid . $filename2;
            } else {
                $admin->goToPage("edit-retail-item", "i=$item_id&image_too_large&message=image+2+was+too+large");
            }
        } else {
            $image2 = $row10['image2'];
        }


        $filename3 = $_FILES['image3']['name'];
        if ($filename3 != "") {
            if ($_FILES['image3']['size'] < $max_file_size) {
                $filetmpname3 = $_FILES['image3']['tmp_name'];
                $filedestination3 = "../productimages/" . $uniqueid . $filename3;
                $move = move_uploaded_file($filetmpname3, $filedestination3);
                $image3 = "productimages/" . $uniqueid . $filename3;
            } else {
                $admin->goToPage("edit-retail-item", "i=$item_id&image_too_large&message=image+3+was+too+large");
            }
        } else {
            $image3 = $row10['image3'];
        }

        $filename4 = $_FILES['image4']['name'];
        if ($filename4 != "") {
            if ($_FILES['image4']['size'] < $max_file_size) {
                $filetmpname4 = $_FILES['image4']['tmp_name'];
                $filedestination4 = "../productimages/" . $uniqueid . $filename4;
                $move = move_uploaded_file($filetmpname4, $filedestination4);
                $image4 = "productimages/" . $uniqueid . $filename4;
            } else {
                $admin->goToPage("edit-retail-item", "i=$item_id&image_too_large&message=image+4+was+too+large");
            }
        } else {
            $image4 = $row10['image4'];
        }


        $filename5 = $_FILES['image5']['name'];
        if ($filename5 != "") {
            if ($_FILES['image5']['size'] < $max_file_size) {
                $filetmpname5 = $_FILES['image5']['tmp_name'];
                $filedestination5 = "../productimages/" . $uniqueid . $filename5;
                $move = move_uploaded_file($filetmpname5, $filedestination5);
                $image5 = "productimages/" . $uniqueid . $filename5;
            } else {
                $admin->goToPage("edit-retail-item", "i=$item_id&image_too_large&message=image+5+was+too+large");
            }
        } else {
            $image5 = $row10['image5'];
        }

        if ($old_price == "") {
            $old_price = "empty";
        }

        if ($brandname == "") {
            $brandname = "empty";
        }




        // $sql = "INSERT INTO product (uniqueid, sellerid, name, description, image1, image2, image3, itemisfor, itemtype, color, size, brandname, howmany, price, old_price, time, date, status, productcode, exclusive) VALUES ('$uniqueid', '$sessionid', '$name', '$description', '$image1', '$image2', '$image3', '$itemisfor', '$itemtype', '$itemcolor', '$itemsize', '$brandname', '$howmany', '$price', '$old_price', '$time', '$date', '$status', '$productcode', '$exclusive');";
        // $result = mysqli_query($conn, $sql);

        if (isset($_SESSION['item_variations'])) {
            foreach ($_SESSION['item_variations'] as $key => $value) {
                $product->addVariation($item_id, $value['variation_size'], $value['variation_price'], $value['variation_quantity']);
            }
            unset($_SESSION['item_variations']);
        }

        $sql = "UPDATE product SET name='$name', description='$description', image1='$image1', image2='$image2', image3='$image3', image4='$image4', image5='$image5', itemisfor='$itemisfor', itemtype='$itemtype', color='$itemcolor', size='$itemsize', brandname='$brandname', howmany='$howmany', price='$price', old_price='$old_price' WHERE uniqueid='$item_id';";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            window.location.href="edit-retail-item?update_success=true&i=' . $item_id . '";
            </script>';
        } else {
            echo '<script>
            window.location.href="edit-retail-item?update_failure=true&i=' . $item_id . '";
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
    <script src="../ckeditor/ckeditor.js"></script>



    <script>
        var price;
        $(".price").keyup(function(e) {
            if (isNaN($(this).val())) {
                $(this).val(price)
            } else {
                price = $(this).val();
            }

        })

        $(document).ready(function() {
            // $(".realimgm1").val("yayayaya")
            console.log($(".realimgm1"))
        })
        /***** MOBILE IMAGE SCRIPT START */


        // image 1 start 
        $(".fakeimgm1").click(function() {
            $(".realimgm1").click();

        });

        $(".realimgm1").change(function() {
            //alert(event.src)
            console.log("ya")
            console.log($(this).val())
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimgm1");
                    //output.src = reader.result;
                    output.innerHTML = "";
                    $("<img />", {
                        "src": reader.result,
                        "class": "thumb-image"
                    }).appendTo(output);

                    output.style.display = "block";
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                console.log("image 1 is empty: " + event.target.files[0])
                $(".fakeimgm1").html("<i class='fa fa-camera'></i>");
            }
        });
        // image 1 end 








        // image 2 start 
        $(".fakeimgm2").click(function() {
            $(".realimgm2").click();

        });

        $(".realimgm2").change(function() {
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimgm2");
                    //output.src = reader.result;
                    output.innerHTML = "";
                    $("<img />", {
                        "src": reader.result,
                        "class": "thumb-image"
                    }).appendTo(output);

                    output.style.display = "block";
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                $(".fakeimgm2").html("<i class='fa fa-camera'></i>");
            }
        });
        // image 2 end 





        // image 3 start 
        $(".fakeimgm3").click(function() {
            $(".realimgm3").click();

        });

        $(".realimgm3").change(function() {
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimgm3");
                    //output.src = reader.result;
                    output.innerHTML = "";
                    $("<img />", {
                        "src": reader.result,
                        "class": "thumb-image"
                    }).appendTo(output);

                    output.style.display = "block";
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                $(".fakeimgm3").html("<i class='fa fa-camera'></i>");
            }
        });
        // image 3 end 




        // image 4 start 
        $(".fakeimgm4").click(function() {
            $(".realimgm4").click();

        });

        $(".realimgm4").change(function() {
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimgm4");
                    //output.src = reader.result;
                    output.innerHTML = "";
                    $("<img />", {
                        "src": reader.result,
                        "class": "thumb-image"
                    }).appendTo(output);

                    output.style.display = "block";
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                $(".fakeimgm4").html("<i class='fa fa-camera'></i>");
            }
        });
        // image 4 end 





        // image 5 start 
        $(".fakeimgm5").click(function() {
            $(".realimgm5").click();

        });

        $(".realimgm5").change(function() {
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimgm5");
                    //output.src = reader.result;
                    output.innerHTML = "";
                    $("<img />", {
                        "src": reader.result,
                        "class": "thumb-image"
                    }).appendTo(output);

                    output.style.display = "block";
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                $(".fakeimgm5").html("<i class='fa fa-camera'></i>");
            }
        });
        // image 3 end 






        /***** MOBILE IMAGE SCRIPT END  */













































































        /***** DESKTOP IMAGE SCRIPT START */


        // image 1 start 
        $(".fakeimgd1").click(function() {
            $(".realimgd1").click();

        });

        $(".realimgd1").change(function() {
            //alert(event.src)
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimgd1");
                    //output.src = reader.result;
                    output.innerHTML = "";
                    $("<img />", {
                        "src": reader.result,
                        "class": "thumb-image"
                    }).appendTo(output);

                    output.style.display = "block";
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                $(".fakeimgd1").html("<i class='fa fa-camera'></i>");
            }
        });
        // image 1 end 








        // image 2 start 
        $(".fakeimgd2").click(function() {
            $(".realimgd2").click();

        });

        $(".realimgd2").change(function() {
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimgd2");
                    //output.src = reader.result;
                    output.innerHTML = "";
                    $("<img />", {
                        "src": reader.result,
                        "class": "thumb-image"
                    }).appendTo(output);

                    output.style.display = "block";
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                $(".fakeimgd2").html("<i class='fa fa-camera'></i>");
            }
        });
        // image 2 end 





        // image 3 start 
        $(".fakeimgd3").click(function() {
            $(".realimgd3").click();

        });

        $(".realimgd3").change(function() {
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimgd3");
                    //output.src = reader.result;
                    output.innerHTML = "";
                    $("<img />", {
                        "src": reader.result,
                        "class": "thumb-image"
                    }).appendTo(output);

                    output.style.display = "block";
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                $(".fakeimgd3").html("<i class='fa fa-camera'></i>");
            }
        });
        // image 3 end 



        // image 4 start 
        $(".fakeimgd4").click(function() {
            $(".realimgd4").click();

        });

        $(".realimgd4").change(function() {
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimgd4");
                    //output.src = reader.result;
                    output.innerHTML = "";
                    $("<img />", {
                        "src": reader.result,
                        "class": "thumb-image"
                    }).appendTo(output);

                    output.style.display = "block";
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                $(".fakeimgd4").html("<i class='fa fa-camera'></i>");
            }
        });
        // image 4 end 






        // image 3 start 
        $(".fakeimgd5").click(function() {
            $(".realimgd5").click();

        });

        $(".realimgd5").change(function() {
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimgd5");
                    //output.src = reader.result;
                    output.innerHTML = "";
                    $("<img />", {
                        "src": reader.result,
                        "class": "thumb-image"
                    }).appendTo(output);

                    output.style.display = "block";
                }
                reader.readAsDataURL(event.target.files[0]);
            } else {
                $(".fakeimgd5").html("<i class='fa fa-camera'></i>");
            }
        });
        // image 5 end 






        /***** DESKTOP IMAGE SCRIPT END  */







        function validateMobileForm() {
            var image1 = $(".realimgm1").val();
            var image2 = $(".realimgm2").val();
            var image3 = $(".realimgm3").val();


            // if (image1 == "") {
            //     alert("Please add th first image to continue..")
            //     return false;
            // } else {
            //     // alert("form submitted")
            //     return true;
            // }
        }



        function validateDesktopForm() {
            var image1 = $(".realimgd1").val();
            var image2 = $(".realimgd2").val();
            var image3 = $(".realimgd3").val();


            // if (image1 == "") {
            //     alert(image1)
            //     alert("Please add the first image to continue..")
            //     return false;
            // } else {
            //     // alert("form submitted")
            //     return true;
            // }
        }

        var item_id = "<?php echo $item_id; ?>";
        $(".remove-label").click(function() {
            var image_to_remove = $(this).attr("id");
            window.location.href = "edit-retail-item?i=" + item_id + "&remove_image=" + image_to_remove;
        })





        $(".add-variation-btn-m").click(function() {
            console.log("add variation..")
            var add_variation = "yes";
            $.ajax({

                url: "ajax-variation-handler.php",
                method: "POST",
                async: false,
                data: {
                    "add_variation": add_variation,
                    "variation_size": $(".variation-size-m").val(),
                    "variation_price": $(".variation-price-m").val(),
                    "variation_quantity": $(".variation-quantity-m").val()
                },
                success: function(data) {
                    console.log(data)
                    $(".variation-container").append(data)
                }

            });
        })


        $(".add-variation-btn-d").click(function() {
            console.log("add variation..")
            var add_variation = "yes";
            $.ajax({

                url: "ajax-variation-handler.php",
                method: "POST",
                async: false,
                data: {
                    "add_variation": add_variation,
                    "variation_size": $(".variation-size-d").val(),
                    "variation_price": $(".variation-price-d").val(),
                    "variation_quantity": $(".variation-quantity-d").val()
                },
                success: function(data) {
                    console.log(data)
                    $(".variation-container").append(data)
                }

            });
        })


        function remove_variation(btn) {
            console.log("removing variation..")
            var remove_variation = "yes";
            var variation_id = btn.getAttribute("variation_id")
            console.log(variation_id)
            $.ajax({

                url: "ajax-variation-handler.php",
                method: "POST",
                async: false,
                data: {
                    "remove_variation": remove_variation,
                    "variation_id": variation_id
                },
                success: function(data) {
                    console.log(data)
                    $("[variation_box=" + variation_id + "]").hide();
                }

            });
        }


        function remove_inbuilt_variation(btn) {
            console.log("removing inbuilt variation..")
            var remove_inbuilt_variation = "yes";
            var variation_id = btn.getAttribute("variation_id")
            var item_id = "<?php echo $item_id; ?>";
            console.log(variation_id)
            $.ajax({

                url: "ajax-variation-handler.php",
                method: "POST",
                async: false,
                data: {
                    "remove_inbuilt_variation": remove_inbuilt_variation,
                    "variation_id": variation_id,
                    "item_id": item_id
                },
                success: function(data) {
                    console.log(data)
                    $("[variation_box=" + variation_id + "]").hide();
                }

            });
        }




        CKEDITOR.replace('descriptionm');
        CKEDITOR.replace('descriptiond');
    </script>
</body>

</html>