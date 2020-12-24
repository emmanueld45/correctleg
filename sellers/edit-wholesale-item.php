<?php
session_start();
include '../dbconn.php';
include '../functions.php';

$sessionid = $_SESSION['id'];

$item_id = $_GET['i'];

$sql = "SELECT * FROM wholesaleproduct WHERE uniqueid='$item_id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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

            label {
                font-weight: bold;
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
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body class="mybody">
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>


    <!-- start of mobile view -->
    <div class="mobile-view-container" style="background-color:;">


        <!-- header start -->
        <div class="fixed-head sticky-top">
            <i class="fa fa-angle-left back-btn"></i> Edit Item <i class="fa fa-edit" style="color:grey;"></i>(WHOLESALE)
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
                        product <span class="alert-link">uploaded successfully!</span>
                        <a href="my-wholesale-items.php" style="color:crimson;"><u>view items <i class="fa fa-angle-double-right"></i></u></a>
                    </div>
                <?php } ?>


                <!-- item name -->
                <label style="font-weight:600;">Item Name <span style="color:red;">*</span></label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
                <br>

                <!--item decrition -->
                <label style="font-weight:600;">Item Description <span style="color:red;">*</span></label>
                <textarea class="form-control" name="description" required><?php echo $row['description']; ?></textarea>
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


                </div>
                <input class="realimgm1" id="" accept="image/*" name="image1" type="file" style="display:none ;">
                <input class="realimgm2" id="" accept="image/*" name="image2" type="file" style="display: none;">
                <input class="realimgm3" id="" accept="image/*" name="image3" type="file" style="display: none;">





                <!-- for & type-->
                <div style="width:100%;display:flex;flex-flow:row nowrap;margin-top:10px;padding-left:10px;">
                    <span class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;font-weight:600;">For <span style="color:red;">*</span></span>
                    <span class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Type <span style="color:red;">*</span></span>
                </div>

                <div style="width:100%;display:flex;flex-flow:row nowrap;">
                    <select class="form-control item-is-for" name="itemisfor" style="width:;margin-right:10px;" required>
                        <?php echo "<option>" . $row['itemisfor'] . "</option>"; ?>
                        <option>Men</option>
                        <option>Women</option>
                        <option>Kids</option>
                    </select>


                    <select class="form-control item-type" name="itemtype" style="width:;" required>
                        <?php echo "<option>" . $row['itemtype'] . "</option>"; ?>
                        <?php
                        $sql1 = "SELECT * FROM footwear_type WHERE item_is_for='Men';";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $item_type = $row1['item_type'];
                            echo "<option>$item_type</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>


                <!-- size & color-->
                <div style="width:100%;display:flex;flex-flow:row nowrap;padding-left:10px;">
                    <span class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;font-weight:600;">Size (optional)</span>
                    <!-- <span class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Color (optional)</span> -->
                </div>

                <div style="width:100%;display:flex;flex-flow:row nowrap;">
                    <select class="form-control item-size" name="itemsize" style="width:;margin-right:10px;" required>
                        <?php echo "<option>" . $row['size'] . "</option>"; ?>
                        <?php
                        $sql1 = "SELECT * FROM footwear_size WHERE item_is_for='Men';";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $item_size = $row1['item_size'];
                            echo "<option>$item_size</option>";
                        }
                        ?>
                    </select>


                    <!-- <select class="form-control" name="itemcolor" style="width:;" required>
                        <?php include '../utilities/colors.php'; ?>
                    </select> -->
                </div>
                <br>

                <!-- pricing -->
                <label style="font-weight:600;">Pricing <span style="color:red;">*</span></label><br>
                <div class='form-check-inline'>
                    <label class="form-check-label">
                        <input type='radio' class='form-check-input per-dozen' name='pricing' value='per_dozen' checked>Per Dozen
                    </label>
                </div>
                <div class='form-check-inline'>
                    <label class='form-check-label'>
                        <input type='radio' class='form-check-input per-set' name='pricing' value='per_set'>Per Set
                    </label>
                </div>

                <!-- per dozen container-->
                <div class="per-dozen-container" style="width:80%;padding:10px;background-color:crimson;">
                    <br>
                    <label>Price per dozen:</label>
                    <input type="text" class="form-control" name="price_per_dozen" placeholder="Enter price per dozen">
                </div>
                <!-- per set container-->
                <div class="per-set-container" style="display:none;width:80%;padding:10px;background-color:crimson;">
                    <br>
                    <label>Price per set:</label>
                    <input type="text" class="form-control" name="price_per_set" placeholder="Enter price">
                    <br>
                    <label>How many per set:</label>
                    <select class="form-control" name="howmany_per_set" id="">
                        <?php
                        $x = 2;
                        while ($x < 1000) {
                            echo "<option>$x</option>";
                            $x++;
                        }
                        ?>
                    </select>
                </div>
                <br><br>

                <!-- brand name -->
                <label style="font-weight:600;">Item Brand Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="brandname" required>
                <br>



                <div style="width:100%;padding:10px;display:flex;justify-content:center;">
                    <button type="submit" name="uploaditem" class="upload-item-btn" name="uploaditem">Upload item</button>
                </div>

            </form>
        </div>
        <!-- form container end -->







    </div>
    <!-- end of mobile view -->














































































































    <?php

    $sql = "SELECT * FROM wholesaleproduct WHERE uniqueid='$item_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>



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


                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">NEW ITEM (WHOLESALE)<i class="fa fa-edit" style="color:grey;"></i></div>
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
                                product <span class="alert-link">uploaded successfully!</span>
                                <a href="my-wholesale-items.php" style="color:crimson;"><u>view items <i class="fa fa-angle-double-right"></i></u></a>
                            </div>
                        <?php } ?>


                        <!-- item name -->
                        <label style="font-weight:600;">Item Name <span style="color:red;">*</span></label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                        <br>

                        <!--item decrition -->
                        <label style="font-weight:600;">Item Description <span style="color:red;">*</span></label>
                        <textarea class="form-control" name="description" required><?php echo $row['description']; ?></textarea>
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


                        </div>
                        <input class="realimgd1" id="" accept="image/*" name="image1" type="file" style="display:none ;">
                        <input class="realimgd2" id="" accept="image/*" name="image2" type="file" style="display: none;">
                        <input class="realimgd3" id="" accept="image/*" name="image3" type="file" style="display: none;">





                        <!-- for & type-->
                        <div style="width:100%;display:flex;flex-flow:row nowrap;margin-top:10px;padding-left:10px;">
                            <span class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;font-weight:600;">For <span style="color:red;">*</span></span>
                            <span class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Type <span style="color:red;">*</span></span>
                        </div>

                        <div style="width:100%;display:flex;flex-flow:row nowrap;">
                            <select class="form-control item-is-for" name="itemisfor" style="width:;margin-right:10px;" required>
                                <option><?php echo $row['itemisfor']; ?></option>
                                <option>Men</option>
                                <option>Women</option>
                                <option>Kids</option>
                            </select>


                            <select class="form-control item-type" name="itemtype" style="width:;" required>
                                <option><?php echo $row['itemtype']; ?></option>
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
                            <!-- <span class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Color (optional)</span> -->
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


                            <!-- <select class="form-control" name="itemcolor" style="width:;" required>
        <?php include '../utilities/colors.php'; ?>
    </select> -->
                        </div>
                        <br>

                        <!-- pricing -->
                        <label style="font-weight:600;">Pricing <span style="color:red;">*</span></label><br>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input per-dozen" name="pricing" value="per_dozen" checked>Per Dozen
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input per-set" name="pricing" value="per_set">Per Set
                            </label>
                        </div>

                        <!-- per dozen container-->
                        <div class="per-dozen-container" style="width:80%;padding:10px;background-color:crimson;">
                            <br>
                            <label>Price per dozen:</label>
                            <input type="text" class="form-control" name="price_per_dozen" placeholder="Enter price per dozen">
                        </div>
                        <!-- per set container-->
                        <div class="per-set-container" style="display:none;width:80%;padding:10px;background-color:crimson;">
                            <br>
                            <label>Price per set:</label>
                            <input type="text" class="form-control" name="price_per_set" placeholder="Enter price">
                            <br>
                            <label>How many per set:</label>
                            <select class="form-control" name="howmany_per_set" id="">
                                <?php
                                $x = 2;
                                while ($x < 1000) {
                                    echo "<option>$x</option>";
                                    $x++;
                                }
                                ?>
                            </select>
                        </div>
                        <br><br>

                        <!-- brand name -->
                        <label style="font-weight:600;">Item Brand Name <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="brandname" required>
                        <br>



                        <div style="width:100%;padding:10px;display:flex;justify-content:center;">
                            <button type="submit" name="uploaditem" class="upload-item-btn" name="uploaditem">Upload item</button>
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
        $pricing = mysqli_real_escape_string($conn, $_POST['pricing']);
        $price_per_dozen = mysqli_real_escape_string($conn, $_POST['price_per_dozen']);
        $price_per_set = mysqli_real_escape_string($conn, $_POST['price_per_set']);
        $howmany_per_set = mysqli_real_escape_string($conn, $_POST['howmany_per_set']);
        $brandname = mysqli_real_escape_string($conn, $_POST['brandname']);


        if ($pricing == "per_dozen") {
            $price_per_set = "empty";
            $howmany_per_set = "empty";
        } else if ($pricing == "per_set") {
            $price_per_dozen = "empty";
        }



        $time = time();
        $date = date("d-m-y");
        $status = "inactive";
        $productcode = create_product_code();


        $filename1 = $_FILES['image1']['name'];
        if ($filename1 != "") {
            $filetmpname1 = $_FILES['image1']['tmp_name'];
            $filedestination1 = "../productimages/" . $filename1;
            $move = move_uploaded_file($filetmpname1, $filedestination1);
            $image1 = "productimages/" . $filename1;
        } else {
            $image1 = "empty";
        }


        $filename2 = $_FILES['image2']['name'];
        if ($filename2 != "") {
            $filetmpname2 = $_FILES['image2']['tmp_name'];
            $filedestination2 = "../productimages/" . $filename2;
            $move = move_uploaded_file($filetmpname2, $filedestination2);
            $image2 = "productimages/" . $filename2;
        } else {
            $image2 = "empty";
        }


        $filename3 = $_FILES['image3']['name'];
        if ($filename3 != "") {
            $filetmpname3 = $_FILES['image3']['tmp_name'];
            $filedestination3 = "../productimages/" . $filename3;
            $move = move_uploaded_file($filetmpname3, $filedestination3);
            $image3 = "productimages/" . $filename3;
        } else {
            $image3 = "empty";
        }

        $sql = "INSERT INTO wholesaleproduct (uniqueid, sellerid, name, description, image1, image2, image3, itemisfor, itemtype, size, brandname, time, date, status, productcode, price_per_dozen, price_per_set, howmany_per_set) VALUES ('$uniqueid', '$sessionid', '$name', '$description', '$image1', '$image2', '$image3', '$itemisfor', '$itemtype', '$itemsize', '$brandname', '$time', '$date', '$status', '$productcode', '$price_per_dozen', '$price_per_set', '$howmany_per_set');";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
window.location.href="add-new-wholesale.php?upload_success=true&i=' . $uniqueid . '";
</script>';
        } else {
            echo '<script>
            window.location.href="add-new-wholesale.php?upload_failure=true";
            </script>';
        }
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





        /***** DESKTOP IMAGE SCRIPT END  */







        function validateMobileForm() {
            var image1 = $(".realimgm1").val();
            var image2 = $(".realimgm2").val();
            var image3 = $(".realimgm3").val();


            //   if (image1 == "" && image2 == "" && image3 == "") {
            if (image1 == "") {
                alert("Please add at least the first image to continue..")
                return false;
            } else {
                alert("form submitted")
                return true;
            }
        }



        function validateDesktopForm() {
            var image1 = $(".realimgd1").val();
            var image2 = $(".realimgd2").val();
            var image3 = $(".realimgd3").val();


            //   if (image1 == "" && image2 == "" && image3 == "") {
            if (image1 == "") {
                alert("Please add at least one image to continue..")
                return false;
            } else {
                alert("form submitted")
                return true;
            }
        }















        /** PRICING SCRIPT START** */

        //per dozen
        $(".per-dozen").click(function() {
            if ($(this).prop("checked")) {
                $(".per-dozen-container").show();
                $(".per-set-container").hide();

            }
        });

        //per set
        $(".per-set").click(function() {
            if ($(this).prop("checked")) {
                $(".per-dozen-container").hide();
                $(".per-set-container").show();

            }
        });
        /*** PRICING SCRIPT END *** */
    </script>
</body>

</html>