<?php
session_start();
include '../dbconn.php';
include '../functions.php';

$sessionid = $_SESSION['id'];

$logo = "businesslogos/default-business-logo.png";
$companyname = "";
$regno = "";
$productsavailable = "";
$tin = "";
$country = "";
$region = "";
$gender = "";
$website_url = "";

if (seller_have_business_details($sessionid)) {
    $sql = "SELECT * FROM businessdetails WHERE sellerid='$sessionid';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $logo = $row['logo'];
    $companyname = $row['companyname'];
    // $regno = $row['regno'];
    // $productsavailable = $row['productsavailable'];
    // $tin = $row['tin'];
    $country = $row['country'];
    $region = $row['region'];
    $gender = $row['gender'];
    $website_url = $row['website_url'];
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


            .fixed-head {
                width: 100%;
                padding: 10px;
                height: 50px;
                font-size: 20px;
                background-color: crimson;
                color: white;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.4);

            }


            .col-xs-6 {
                width: 45% !important;

            }


            .form-container {
                width: 90%;
                background-color: white;

                margin: auto;
                margin-top: 10px;
            }

            .save-details-btn {
                width: 80%;
                padding: 10px;
                background-color: crimson;
                color: white;
                border: none;
                font-size: 19px;
            }


            .images-box {
                width: 100px;
                height: 100px;
                border-radius: 100px;
                border: 1px solid lightgrey;
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
                border-radius: 100px;
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
                background-color: white;

                margin: auto;
                margin-top: 10px;
            }

            .save-details-btn {
                width: 80%;
                padding: 10px;
                background-color: crimson;
                color: white;
                border: none;
                font-size: 19px;
            }

            .images-box {
                width: 100px;
                height: 100px;
                border-radius: 100px;
                border: 1px solid lightgrey;
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
                border-radius: 100px;
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

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>


    <!-- start of mobile view -->
    <div class="mobile-view-container" style="background-color:;height:100%;">

        <!-- header start -->
        <div class="fixed-head sticky-top">
            <i class="fa fa-angle-left back-btn"></i> Business Details
        </div>
        <!-- header end -->



        <!-- start of address container -->
        <div class="form-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <label style="font-weight:bold;font-size:15px;">Business Logo(optional):</label><br>
                <div style="width:100%;display:flex;justify-content:center;">
                    <div class="images-box fakeimg">
                        <?php if ($logo != "businesslogos/default-business-logo.png") {
                            echo "<img src='../$logo' class='thumb-image'>";
                        } else {
                            echo " <i class='fa fa-camera'></i>";
                        }
                        ?>
                    </div>
                </div>

                <input class="realimg image" id="" accept="image/*" name="image" type="file" style="display:none ;">

                <br>
                <label style="font-weight:bold;font-size:15px;">Company Name</label>
                <input type="text" class="form-control" name='companyname' placeholder="" value="<?php echo $companyname; ?>" required>
                <br>

                <!-- <label style="font-weight:bold;font-size:15px;">Business Reg. Number(optional)</label>
                <input type="text" class="form-control" name='regno' value="<?php echo $regno; ?>" placeholder="">
                <br>

                <label style="font-weight:bold;font-size:15px;">Products Available</label>
                <input type="tel" class="form-control" name='productsavailable' value="<?php echo $productsavailable; ?>" placeholder="E.g shoes, slippers..">
                <br> -->


                <!-- country & city-->
                <div style="width:100%;display:flex;flex-flow:row nowrap;margin-top:10px;">
                    <button class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;font-weight:600;">country <span style="color:red;">*</span></button>
                    <button class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Region <span style="color:red;">*</span></button>
                </div>

                <div style="width:100%;display:flex;flex-flow:row nowrap;">
                    <select class="form-control" name='country' style="width:;margin-right:10px;" required>
                        <?php
                        if ($country != "") {
                            echo "<option>$country</option>";
                        }
                        ?>
                        <?php include '../utilities/countries.php'; ?>
                    </select>


                    <select class="form-control" style="width:;" name='region' required>
                        <?php
                        if ($region != "") {
                            echo "<option>$region</option>";
                        }
                        ?>
                        <?php include '../utilities/states.php'; ?>
                    </select>
                </div>
                <br>




                <label style="font-weight:bold;font-size:15px;">Gender</label>

                <?php
                if ($gender == "Male") {
                    echo "<div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Male' checked>Male</div>
                <div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Female'>Female</div>";
                } else if ($gender == "Female") {
                    echo "<div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Male'>Male</div>
                <div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Female' checked>Female</div>";
                } else {
                    echo "<div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Male' required>Male</div>
                <div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Female' required>Female</div>";
                }
                ?>
                <br>


                <label style="font-weight:bold;font-size:15px;">Website Address (optional)</label>
                <input type="tel" class="form-control" name="website_url" value="<?php if ($website_url == "empty") {
                                                                                        echo "";
                                                                                    } else {
                                                                                        echo $website_url;
                                                                                    } ?>" placeholder="https://yourwebsite.com">
                <br>


                <!-- <label style="font-weight:bold;font-size:15px;">TIN (optional)</label>
                <input type="tel" class="form-control" name="tin" value="<?php echo $tin; ?>" placeholder="">
                <br> -->


                <!-- save btn -->
                <div style="width:100%;display:flex;justify-content:center;margin-bottom:100px;">
                    <button type="submit" class="save-details-btn" name="submit">Save</button>
                </div>



            </form>
        </div>
        <!-- end of address container -->






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


                <div style="width:100%;padding:10px;font-weight:600;font-size:20px;">BUSINESS DETAILS</div>
                <!-- start of address container -->
                <div class="form-container">



                    <form action="" method="POST" enctype="multipart/form-data">
                        <label style="font-weight:bold;font-size:15px;">Business Logo(optional):</label><br>
                        <div style="width:100%;display:flex;justify-content:center;">
                            <div class="images-box fakeimgd">
                                <?php if ($logo != "businesslogos/default-business-logo.png") {
                                    echo "<img src='../$logo' class='thumb-image'>";
                                } else {
                                    echo " <i class='fa fa-camera'></i>";
                                }
                                ?>
                            </div>
                        </div>

                        <input class="realimgd image" id="" accept="image/*" name="image" type="file" style="display:none ;">

                        <br>
                        <label style="font-weight:bold;font-size:15px;">Company/Store Name</label>
                        <input type="text" class="form-control" name='companyname' placeholder="" value="<?php echo $companyname; ?>" required>
                        <br>

                        <!-- <label style="font-weight:bold;font-size:15px;">Business Reg. Number(optional)</label>
                        <input type="text" class="form-control" name='regno' value="<?php echo $regno; ?>" placeholder="">
                        <br> -->

                        <!-- <label style="font-weight:bold;font-size:15px;">Products Available</label>
                        <input type="tel" class="form-control" name='productsavailable' value="<?php echo $productsavailable; ?>" placeholder="E.g shoes, slippers..">
                        <br> -->


                        <!-- country & city-->
                        <div style="width:100%;display:flex;flex-flow:row nowrap;margin-top:10px;">
                            <button class="form-control" style="width:;border:none;background-color:white;padding:0px;margin-right:10px;font-weight:600;">country <span style="color:red;">*</span></button>
                            <button class="form-control" style="width:;border:none;background-color:white;padding:0px;font-weight:600;">Region <span style="color:red;">*</span></button>
                        </div>

                        <div style="width:100%;display:flex;flex-flow:row nowrap;">
                            <select class="form-control country" name='country' style="width:;margin-right:10px;" required>
                                <?php
                                if ($country != "") {
                                    echo "<option>$country</option>";
                                } else {
                                    echo " <option value=''>[SELECT COUNTRY]</option>";
                                }
                                ?>
                                <option>Ghana</option>
                                <option>South Africa</option>
                                <option>Kenya</option>
                                <option>Nigeria</option>
                                <option>Egypt</option>
                                <option>Rwanda</option>
                            </select>


                            <select class="form-control regions" style="width:;" name='region' required>
                                <?php
                                if ($region != "") {
                                    echo "<option>$region</option>";
                                } else {
                                    echo " <option value=''>No country selected..</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <br>




                        <label style="font-weight:bold;font-size:15px;">Gender</label>

                        <?php
                        if ($gender == "Male") {
                            echo "<div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Male' checked>Male</div>
                <div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Female'>Female</div>";
                        } else if ($gender == "Female") {
                            echo "<div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Male'>Male</div>
                <div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Female' checked>Female</div>";
                        } else {
                            echo "<div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Male' required>Male</div>
                <div style='padding:10px;'><input type='radio' class='form-check-input' name='gender' value='Female' required>Female</div>";
                        }
                        ?>
                        <br>


                        <label style="font-weight:bold;font-size:15px;">Website Address (optional)</label>
                        <input type="tel" class="form-control" name="website_url" value="<?php if ($website_url == "empty") {
                                                                                                echo "";
                                                                                            } else {
                                                                                                echo $website_url;
                                                                                            } ?>" placeholder="https://yourwebsite.com">
                        <br>

                        <!-- <label style="font-weight:bold;font-size:15px;">TIN (optional)</label>
                        <input type="tel" class="form-control" name="tin" value="<?php echo $tin; ?>" placeholder="">
                        <br> -->


                        <!-- save btn -->
                        <div style="width:100%;display:flex;justify-content:center;margin-bottom:100px;">
                            <button type="submit" class="save-details-btn" name="submit">Save</button>
                        </div>



                    </form>


                </div>
                <!-- end of address container -->




            </div>
            <!-- right side end -->




        </div>
        <!-- main area container end -->








    </div>
    <!-- end of desktop view -->






    <?php



    if (isset($_POST['submit'])) {


        $companyname = $_POST['companyname'];
        // $regno = $_POST['regno'];
        //  $productsavailable = $_POST['productsavailable'];
        $country = $_POST['country'];
        $region = $_POST['region'];
        $gender = $_POST['gender'];
        $website_url = $_POST['website_url'];

        if ($website_url == "") {
            $website_url = "empty";
        }

        $filename = $_FILES['image']['name'];

        if ($filename != "") {
            $filetmpname = $_FILES['image']['tmp_name'];
            $filedestination = "../businesslogos/" . $filename;
            $move = move_uploaded_file($filetmpname, $filedestination);
        }

        $default_logo = "businesslogos/default-business-logo.jpg";

        // image opertaion to find when a user has selected a logo or if he hasn;t and then inputting the correct value
        if ($filename == "") {
            if ($logo == "businesslogos/default-business-logo.jpg") {
                $logo = $default_logo;
            } else {
                $logo = $logo;
            }
        } else {
            $logo = "businesslogos/" . $filename;
        }


        if (!seller_have_business_details($sessionid)) {
            // $sql = "INSERT INTO businessdetails (sellerid, logo, companyname, regno, productsavailable, country, region, gender, tin) VALUES ('$sessionid', '$logo', '$companyname', '$regno', '$productsavailable', '$country', '$region', '$gender', '$tin');";
            $sql = "INSERT INTO businessdetails (sellerid, logo, companyname, country, region, gender, website_url) VALUES ('$sessionid', '$logo', '$companyname', '$country', '$region', '$gender', '$website_url');";
            $result = mysqli_query($conn, $sql);
        } else {
            // $sql = "UPDATE businessdetails SET logo='$logo', companyname='$companyname', regno='$regno', productsavailable='$productsavailable', country='$country', region='$region', gender='$gender', tin='$tin' WHERE sellerid='$sessionid';";
            $sql = "UPDATE businessdetails SET logo='$logo', companyname='$companyname', country='$country', region='$region', gender='$gender', website_url='$website_url' WHERE sellerid='$sessionid';";
            $result = mysqli_query($conn, $sql);
        }

        if ($result) {
            echo '<script>
window.location.href="business-details.php?business_details_updated=true";
</script>';
        } else {
            echo '<script>
        window.location.href="business-details.php?error=true";
        </script>';
        }
    }







    ?>



    <?php if (isset($_GET['business_details_updated'])) { ?>
        <div class="alert alert-success update-success-box" style="position:fixed;top:10px;right:10px;z-index:1100;display:;">
            Details <span class="alert-link">updated!</span>
        </div>
    <?php }  ?>

    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger update-error-box" style="position:fixed;top:10px;right:10px;z-index:1100;display:;">
            An <span class="alert-link">error occurred!</span>
        </div>
    <?php } ?>

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
        // image mobile start 
        $(".fakeimg").click(function() {
            $(".realimg").click();

        });

        $(".realimg").change(function() {
            //alert(event.src)
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimg");
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
                $(".fakeimg").html("<i class='fa fa-camera'></i>");
            }
        });
        // image mobile end 











        // image desktop start 
        $(".fakeimgd").click(function() {
            $(".realimgd").click();

        });

        $(".realimgd").change(function() {
            //alert(event.src)
            if ($(this).val() != "") {
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.querySelector(".fakeimgd");
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
                $(".fakeimgd").html("<i class='fa fa-camera'></i>");
            }
        });
        // image desktop end 
    </script>


    <script>

    </script>
</body>

</html>