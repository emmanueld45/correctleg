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

            .images-box {
                width: 100px;
                height: 100px;
                border-radius: 2px;
                border: 1px solid lightgrey;
                margin-right: 10px;
                margin-bottom: 10px;
                white-space: nowrap;
                text-align: center;

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

            .crop-moda-img {
                width: 200px;
                height: 200px;
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
                margin-bottom: 70px;
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
    <link rel="stylesheet" href="../css/cropper.min.css" type="text/css" />
</head>

<body class="mybody">
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>

    <!-- start of mobile view -->
    <div class="mobile-view-container" style="background-color:;">


        <!-- header start -->
        <div class="fixed-head sticky-top">
            <i class="fa fa-angle-left back-btn"></i> New Item <i class="fa fa-edit" style="color:grey;"></i>
        </div>
        <!-- header end -->




        <!-- form container start -->
        <div class="form-container">
            <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateMobileForm()">

                <?php if (isset($_GET['error'])) {
                ?>
                    <div style="width:100%;display:flex;justify-content:center;">
                        <img src="../img/badsign2.png" style="width:100px;height:100px;">
                    </div>
                    <div class="alert alert-danger" style="font-size:15px;margin-top:5px;text-align:center;">
                        An <span class="alert-link">error occurred!</span> try again
                    </div>
                <?php } ?>
                <?php if (isset($_GET['upload_success'])) {
                ?>
                    <div style="width:100%;display:flex;justify-content:center;">
                        <img src="../img/goodsign1.png" style="width:100px;height:100px;">
                    </div>
                    <div class="alert alert-success" style="font-size:15px;margin-top:5px;text-align:center;">
                        product <span class="alert-link">uploaded successfully!</span><br>
                        Your product have been submitted for review by our review team and would be activated once reviewed. but in the mean time only you can view your product.
                        <a href="my-retail-items" style="color:crimson;"><u>view item <i class="fa fa-angle-double-right"></i></u></a>
                    </div>
                <?php } ?>

                <?php
                if (isset($_GET['image_too_large'])) {
                    echo "<div class='alert alert-danger' style='font-weight:bold;text-align:center;font-size:13px;'>" . $_GET['message'] . ", kindly upload images less than 4mb.. <a class='back-btn' style='cursor:pointer;color:royalblue;text-decoration:underline;'>retry?</a></div>";
                }
                ?>


                <!-- item name -->
                <label style="font-weight:600;">Item Name <span style="color:red;">*</span></label>
                <input type="text" name="name" class="form-control" required>
                <br>

                <!--item decrition -->
                <label style="font-weight:600;">Item Description <span style="color:red;">*</span></label>
                <textarea class="form-control" name="description" required></textarea>
                <br>

                <!-- images -->
                <!-- item name -->
                <label style="font-weight:600;">Item Images <span style="color:red;">*</span></label>
                <div style="width:100%;padding:10px;display:flex;flex-flow:row wrap;overflow-x:scroll;">

                    <div class="images-box fakeimgm1">
                        <i class="fa fa-camera"></i>
                    </div>

                    <div class="images-box fakeimgm2">
                        <i class="fa fa-camera"></i>
                    </div>

                    <div class="images-box fakeimgm3">
                        <i class="fa fa-camera"></i>
                    </div>

                    <div class="images-box fakeimgm4">
                        <i class="fa fa-camera"></i>
                    </div>

                    <div class="images-box fakeimgm5">
                        <i class="fa fa-camera"></i>
                    </div>


                </div>
                <input class="realimgm1 image" id="" display=".fakeimgm1" accept="image/*" name="image1" type="file" style="display:none ;">
                <input class="realimgm2 image" id="" accept="image/*" name="image2" type="file" style="display: none;">
                <input class="realimgm3 image" id="" accept="image/*" name="image3" type="file" style="display: none;">
                <input class="realimgm4 image" id="" accept="image/*" name="image4" type="file" style="display: none;">
                <input class="realimgm5 image" id="" accept="image/*" name="image5" type="file" style="display: none;">





                <!-- for & type-->
                <div style="width:100%;display:flex;flex-flow:row nowrap;margin-top:10px;padding-left:10px;">
                    <span class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;font-weight:600;">For <span style="color:red;">*</span></span>
                    <span class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Type <span style="color:red;">*</span></span>
                </div>

                <div style="width:100%;display:flex;flex-flow:row nowrap;">
                    <select class="form-control item-is-for" name="itemisfor" style="width:;margin-right:10px;" required>
                        <option>Men</option>
                        <option>Women</option>
                        <option>Kids</option>
                    </select>


                    <select class="form-control item-type" name="itemtype" style="width:;" required>
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
                    <select class="form-control item-size" name="itemsize" style="width:;margin-right:10px;" required>
                        <?php
                        $sql = "SELECT * FROM footwear_size WHERE item_is_for='Men';";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $item_size = $row['item_size'];
                            echo "<option>$item_size</option>";
                        }
                        ?>
                    </select>


                    <select class="form-control" name="itemcolor" style="width:;" required>
                        <?php include '../utilities/colors.php'; ?>
                    </select>
                </div>
                <br>

                <!-- brand name -->
                <label style="font-weight:600;">Item Brand Name (optional)<span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="brandname">
                <br>

                <!-- Amount in stock -->
                <label style="font-weight:600;">How many available? <span style="color:red;">*</span></label>
                <select class="form-control" name="howmany" style="width:;" required>
                    <?php $x = 1;
                    while ($x < 100) {
                        echo "<option>$x</option>";
                        $x++;
                    }

                    ?>
                </select>
                <br>

                <!--old  price -->
                <label style="font-weight:600;">Old Price <span style="color:red;">*</span></label>
                <input type="text" name="old_price" class="form-control price m-old-price" required>
                <br>

                <!-- price -->
                <label style="font-weight:600;">New Price <span style="color:red;">*</span></label>
                <input type="text" name="price" class="form-control price m-new-price" required>
                <br>

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


                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">NEW ITEM (RETAIL)<i class="fa fa-edit" style="color:grey;"></i></div>
                <div class="alert alert-info" style="width:350px;">Kindly fill the form below to add a new item to your <span class="alert-link">CorrectLeg</span> store</div>
                <!-- form container start -->
                <div class="form-container">

                    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateDesktopForm()">
                        <?php if (isset($_GET['error'])) {
                        ?>
                            <div style="width:100%;display:flex;justify-content:center;">
                                <img src="../img/badsign2.png" style="width:100px;height:100px;">
                            </div>
                            <div class="alert alert-danger" style="font-size:15px;margin-top:5px;text-align:center;">
                                An <span class="alert-link">error occurred!</span> try again
                            </div>
                        <?php } ?>
                        <?php if (isset($_GET['upload_success'])) {
                        ?>
                            <div style="width:100%;display:flex;justify-content:center;">
                                <img src="../img/goodsign1.png" style="width:100px;height:100px;">
                            </div>
                            <div class="alert alert-success" style="font-size:15px;margin-top:5px;text-align:center;">
                                product <span class="alert-link">uploaded successfully!</span><br>
                                Your product have been submitted for review by our review team and would be activated once reviewed. but in the mean time only you can view your product.
                                <a href="my-retail-items" style="color:crimson;"><u>view item <i class="fa fa-angle-double-right"></i></u></a>
                            </div>
                        <?php } ?>
                        <?php
                        if (isset($_GET['image_too_large'])) {
                            echo "<div class='alert alert-danger' style='font-weight:bold;text-align:center;'>" . $_GET['message'] . ", kindly upload images less than 4mb.. <a class='back-btn' style='cursor:pointer;color:royalblue;text-decoration:underline;'>retry?</a></div>";
                        }
                        ?>
                        <!-- item name -->
                        <label style="font-weight:600;">Item Name <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="name" required>
                        <br>

                        <!--item decrition -->
                        <label style="font-weight:600;">Item Description <span style="color:red;">*</span></label>
                        <textarea class="form-control" name="description" required></textarea>
                        <br>

                        <!-- images -->
                        <!-- item name -->
                        <label style="font-weight:600;">Item Images <span style="color:red;">*</span></label>
                        <div style="width:100%;padding:10px;display:flex;flex-flow:row wrap;overflow-x:scroll;">

                            <div class="images-box fakeimgd1">
                                <i class="fa fa-camera"></i>
                            </div>

                            <div class="images-box fakeimgd2">
                                <i class="fa fa-camera"></i>
                            </div>

                            <div class="images-box fakeimgd3">
                                <i class="fa fa-camera"></i>
                            </div>

                            <div class="images-box fakeimgd4">
                                <i class="fa fa-camera"></i>
                            </div>

                            <div class="images-box fakeimgd5">
                                <i class="fa fa-camera"></i>
                            </div>

                        </div>

                        <input class="realimgd1 image" id="" accept="image/*" name="image1" type="file" style="display:none ;">
                        <input class="realimgd2 image" id="" accept="image/*" name="image2" type="file" style="display: none;">
                        <input class="realimgd3 image" id="" accept="image/*" name="image3" type="file" style="display: none;">
                        <input class="realimgd4 image" id="" accept="image/*" name="image4" type="file" style="display: none;">
                        <input class="realimgd5 image" id="" accept="image/*" name="image5" type="file" style="display: none;">

                        <!-- for & type-->
                        <div style="width:100%;display:flex;flex-flow:row nowrap;margin-top:10px;padding-left:10px;">
                            <span class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;font-weight:600;">For <span style="color:red;">*</span></span>
                            <span class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Type <span style="color:red;">*</span></span>
                        </div>

                        <div style="width:100%;display:flex;flex-flow:row nowrap;">
                            <select class="form-control item-is-for" name="itemisfor" style="width:;margin-right:10px;" required>
                                <option>Men</option>
                                <option>Women</option>
                                <option>Kids</option>
                            </select>


                            <select class="form-control item-type" name="itemtype" style="width:;" required>
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
                            <select class="form-control item-size" name="itemsize" style="width:;margin-right:10px;" required>
                                <?php
                                $sql = "SELECT * FROM footwear_size WHERE item_is_for='Men';";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $item_size = $row['item_size'];
                                    echo "<option>$item_size</option>";
                                }
                                ?>
                            </select>


                            <select class="form-control" name="itemcolor" style="width:;" required>
                                <?php include '../utilities/colors.php'; ?>
                            </select>
                        </div>
                        <br>

                        <!-- brand name -->
                        <label style="font-weight:600;">Item Brand Name (optional) <span style="color:red;">*</span></label>
                        <input type="text" name="brandname" class="form-control">
                        <br>

                        <!-- Amount in stock -->
                        <label style="font-weight:600;">How many available? <span style="color:red;">*</span></label>
                        <select class="form-control" name="howmany" style="width:;" required>
                            <?php $x = 1;
                            while ($x < 100) {
                                echo "<option>$x</option>";
                                $x++;
                            }

                            ?>
                        </select>
                        <br>

                        <!--old  price -->
                        <label style="font-weight:600;">Old Price <span style="color:red;">*</span></label>
                        <input type="text" name="old_price" class="form-control price d-old-price" required>
                        <br>

                        <!-- price -->
                        <label style="font-weight:600;">New Price <span style="color:red;">*</span></label>
                        <input type="text" name="price" class="form-control price d-new-price" required>
                        <br>

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







    <!-- Button to Open the Modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cropModal">
        Open modal
    </button> -->

    <!-- The Modal -->
    <div class="modal fade" id="cropModal" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="centered-div">
                        <img src="" alt="" class="crop-modal-img">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                </div>

            </div>
        </div>
    </div>



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

        $time = time();
        $date = date("d-m-y");
        $status = "inactive";
        $productcode = create_product_code();
        $exclusive = "no";
        $views = 31;
        $stars = 3;

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
                $admin->goToPage("add-new-retail", "image_too_large&message=image+1+was+too+large");
            }
        } else {
            $image1 = "empty";
        }


        $filename2 = $_FILES['image2']['name'];
        if ($filename2 != "") {
            if ($_FILES['image2']['size'] < $max_file_size) {
                $filetmpname2 = $_FILES['image2']['tmp_name'];
                $filedestination2 = "../productimages/" . $uniqueid . $filename2;
                $move = move_uploaded_file($filetmpname2, $filedestination2);
                $image2 = "productimages/" . $uniqueid . $filename2;
            } else {
                $admin->goToPage("add-new-retail", "image_too_large&message=image+2+was+too+large");
            }
        } else {
            $image2 = "empty";
        }



        $filename3 = $_FILES['image3']['name'];
        if ($filename3 != "") {
            if ($_FILES['image3']['size'] < $max_file_size) {
                $filetmpname3 = $_FILES['image3']['tmp_name'];
                $filedestination3 = "../productimages/" . $uniqueid . $filename3;
                $move = move_uploaded_file($filetmpname3, $filedestination3);
                $image3 = "productimages/" . $uniqueid . $filename3;
            } else {
                $admin->goToPage("add-new-retail", "image_too_large&message=image+3+too+large");
            }
        } else {
            $image3 = "empty";
        }


        $filename4 = $_FILES['image4']['name'];
        if ($filename4 != "") {
            if ($_FILES['image4']['size'] < $max_file_size) {
                $filetmpname4 = $_FILES['image4']['tmp_name'];
                $filedestination4 = "../productimages/" . $uniqueid . $filename4;
                $move = move_uploaded_file($filetmpname4, $filedestination4);
                $image4 = "productimages/" . $uniqueid . $filename4;
            } else {
                $admin->goToPage("add-new-retail", "image_too_large&message=image+4+was+too+large");
            }
        } else {
            $image4 = "empty";
        }

        $filename5 = $_FILES['image5']['name'];
        if ($filename5 != "") {
            if ($_FILES['image5']['size'] < $max_file_size) {
                $filetmpname5 = $_FILES['image5']['tmp_name'];
                $filedestination5 = "../productimages/" . $uniqueid . $filename5;
                $move = move_uploaded_file($filetmpname5, $filedestination5);
                $image5 = "productimages/" . $uniqueid . $filename5;
            } else {
                $admin->goToPage("add-new-retail", "image_too_large&message=image+5+was+too+large");
            }
        } else {
            $image5 = "empty";
        }


        if ($old_price == "") {
            $old_price = "empty";
        }

        if ($brandname == "") {
            $brandname = "empty";
        }




        $sql = "INSERT INTO product (uniqueid, sellerid, name, description, image1, image2, image3, image4, image5, itemisfor, itemtype, color, size, brandname, howmany, price, old_price, time, date, status, productcode, exclusive, views, stars) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $result = $db->prepareStatement($sql, array($uniqueid, $sessionid, $name, $description, $image1, $image2, $image3, $image4, $image5, $itemisfor, $itemtype, $itemcolor, $itemsize, $brandname, $howmany, $price, $old_price, $time, $date, $status, $productcode, $exclusive, $views, $stars));
        // $result = mysqli_query($conn, $sql);

        //         echo '<script>
        // window.location.href="add-new-retail.php?upload_success=true&i=' . $uniqueid . '";
        // </script>';
        $admin->goToPage("", "upload_success&i=$uniqueid");
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
    <script src="../js/cropper.min.js"></script>



    <script>
        var price;
        $(".price").keyup(function(e) {
            //price = $(this).val().replace(/,/g, "");
            if (isNaN($(this).val())) {
                $(this).val(price)
            } else {
                //$(this).val(price)
                price = $(this).val();
            }

        })

        // var images = document.getElementsByClassName("image");
        // for (i = 0; i < images.length; i++) {
        //     images[i].addEventListener('change', (e) => {
        //         $("#cropModal").fadeIn();
        //         var result = document.querySelector(e.target.getAttribute("display"));
        //         console.log(e.target.getAttribute("display"))
        //         if (e.target.files.length) {
        //             // start file reader
        //             const reader = new FileReader();
        //             reader.onload = (e) => {
        //                 if (e.target.result) {
        //                     // create new image
        //                     let img = document.createElement('img');
        //                     img.id = 'image';
        //                     img.src = e.target.result
        //                     // clean result before
        //                     result.innerHTML = "";
        //                     // append new image
        //                     result.appendChild(img);
        //                     // show save btn and options

        //                     // init cropper
        //                     cropper = new Cropper(img);
        //                 }
        //             };
        //             reader.readAsDataURL(e.target.files[0]);
        //         }
        //     });
        // }
        /***** MOBILE IMAGE SCRIPT START */


        // image 1 start 
        $(".fakeimgm1").click(function() {
            $(".realimgm1").click();

        });

        $(".realimgm1").change(function() {
            //alert(event.src)

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


            if (image1 == "") {
                alert("Please add at least the first image to continue..")
                return false;
            } else if (parseInt($(".m-new-price").val()) > parseInt($(".m-old-price").val())) {
                alert("New price should be less than old price!  'New price' should be the current selling price for your item, while 'old price' should be previous higher amount it was sold for. this is to encourage customers purchase your product.")
                return false;
            } else {
                // alert("form submitted")
                return true;
            }
        }



        function validateDesktopForm() {
            var image1 = $(".realimgd1").val();
            var image2 = $(".realimgd2").val();
            var image3 = $(".realimgd3").val();


            if (image1 == "") {
                alert("Please add at least the first image to continue..")
                return false;
            } else if (parseInt($(".d-new-price").val()) > parseInt($(".d-old-price").val())) {
                alert("New price should be less than old price!  'New price' should be the current selling price for your item, while 'old price' should be previous higher amount it was sold for. this is to encourage customers purchase your product.")
                return false;
            } else {
                //  alert("form submitted")
                return true;
            }
        }
    </script>
</body>

</html>