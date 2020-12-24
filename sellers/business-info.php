<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/sellers.class.php';

if (!isset($_SESSION['id'])) {
    echo '<script>
window.location.href="login";
</script>';
}

if (!seller_is_logged_in($_SESSION['id'])) {
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

            .success-container {
                width: 90%;
                margin: auto;
            }

            .login-title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 20px;
                text-align: center;
            }

            .form-container {
                width: 90%;
                margin: auto;
                margin-top: 20px;
                margin-bottom: 50px;
            }

            .switching-btn-container {
                width: 100%;

            }

            .switching-btn {
                padding: 5px;
                background-color: #eee;
                border: none;
                width: 30%;
                font-size: 15px;
                color: crimson;
                opacity: 0.7;

            }

            .active {
                background-color: crimson;
                color: white;
                opacity: 1;
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

            .field {
                padding: 10px;
                background-color: white;
                border: none;
                border-bottom: 2px solid lightgrey;
                width: 90%;
                margin: auto;
            }

            .submit-btn {
                width: 80%;
                padding: 10px;
                background-color: crimson;
                border: none;
                color: white;
                width: 200px;
                font-size: 18px;
            }
        }

        /** end of smaller screen **/
















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .success-container {
                width: 40%;
                margin: auto;
            }

            .login-title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 30px;
                text-align: center;
            }

            .form-container {
                width: 500px;
                margin: auto;
                margin-top: 20px;
                margin-bottom: 50px;
            }

            .switching-btn-container {
                width: 100%;
                display: flex;
                justify-content: center;
                padding: 10px;
                margin-top: 20px;

            }

            .switching-btn {
                padding: 5px;
                background-color: white;
                border: none;
                width: ;
                font-size: 22px;
                margin-right: 10px;
                color: crimson;
                opacity: 0.7;

            }

            .active {
                color: crimson;
                opacity: 1;
                font-weight: bold;
                border-radius: 50px;
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

            .field {
                padding: 10px;
                background-color: white;
                border: none;
                border-bottom: 2px solid lightgrey;
                width: 90%;
                margin: auto;
            }

            .submit-btn {
                width: 80%;
                padding: 10px;
                background-color: crimson;
                border: none;
                color: white;
                width: 200px;
                font-size: 18px;
            }
        }

        /** end of bigger screen **/
    </style>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg</title>

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


    <!-- switch btns container start -->
    <div class="switching-btn-container">
        <button class="switching-btn">1. Seller Account <i class="fa fa-angle-double-right"></i></button>
        <button class="switching-btn active">2. Business information <i class="fa fa-angle-double-right"></i></button>
        <button class="switching-btn" style="color:grey;">3. Bank Account</button>
    </div>
    <!-- switching btns container end -->





    <div class="login-title">BUSINESS INFOMATION</div>
    <div class="alert alert-success success-container" style="font-size:15px;">
        welcome <span class="alert-link"><?php echo $seller->getDetail($sessionid, "firstname"); ?></span>,<br>
        Account <span class="alert-link">successfully created!</span> kindly fill out your business information
    </div>

    <!-- form container start -->
    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <?php if (isset($_GET['error'])) {
            ?>
                <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                    An <span class="alert-link">error occurred!</span> try
                </div>
            <?php } ?>

            <label style="font-weight:bold;font-size:15px;">Business Logo(optional):</label><br>
            <div style="width:100%;display:flex;justify-content:center;">
                <div class="images-box fakeimg">
                    <i class="fa fa-camera"></i>
                </div>
            </div>

            <input class="realimg image" id="" accept="image/*" name="image" type="file" style="display:none ;">
            <br>
            <label style="font-weight:bold;font-size:15px;">Company/Store Name:</label>
            <input type="text" class="form-control" name="companyname" placeholder="" required>
            <br>

            <!-- <label style="font-weight:bold;font-size:15px;">Business Reg. No: (if available)</label>
            <input type="text" class="form-control" name="regno" placeholder="">
            <br> -->

            <!-- <label style="font-weight:bold;font-size:15px;">Products Available:</label>
            <input type="text" class="form-control" name="productsavailable" placeholder="E.g slippers, shoes ect.." required>
            <br> -->

            <br>
            <!-- <label style="font-weight:bold;font-size:18px;">Address</label>
        <textarea class="form-control" placeholder=""></textarea>
        <br> -->


            <label style="font-weight:bold;font-size:15px;">Country:</label><br>
            <select class="form-control country" id="sel1" name="country" style="width:100%;" required>
                <option value="">[SELECT COUNTRY]</option>
                <option>Nigeria</option>
                <option>Ghana</option>
                <option>South Africa</option>
                <option>Kenya</option>
                <option>Egypt</option>
                <option>Rwanda</option>
            </select>
            <br><br><br>

            <label style="font-weight:bold;font-size:15px;">Region:</label><br>
            <select class="form-control regions" id="sel1" name="state" style="width:100%;" required>
                <option value="">No country selected..</option>
            </select>
            <br>


            <label style="font-weight:bold;font-size:15px;">Gender:</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" name="gender" value="Male" class="form-check-input" required>Male
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" name="gender" value="Female" class="form-check-input" required>Female
                </label>
            </div>
            <br>




            <label style="font-weight:bold;font-size:15px;">Website Address: (optional)</label>
            <input type="text" class="form-control" name="website_url" placeholder="https://yourwebsite.com">
            <br>




            <div style="width:100%;display:flex;justify-content:center;">
                <button type="submit" class="submit-btn" name="submit" value="continuebtn">SAVE & CONTINUE</button>
            </div>


        </form>
    </div>
    <!-- form container end -->
















    <?php


    if (isset($_POST['submit'])) {


        $companyname = mysqli_real_escape_string($db->conn, $_POST['companyname']);

        $country = mysqli_real_escape_string($db->conn, $_POST['country']);
        $region = mysqli_real_escape_string($db->conn, $_POST['state']);
        $gender = mysqli_real_escape_string($db->conn, $_POST['gender']);
        $website_url = mysqli_real_escape_string($db->conn, $_POST['website_url']);

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
        if ($filename == "") {
            $logo = $default_logo;
        } else {
            $logo = "businesslogos/" . $filename;
        }


        if ($seller->haveBusinessDetails($_SESSION['id'])) {
            ///$result = $db->setQuery("UPDATE businessdetails SET logo='$logo', companyname='$companyname', country='$country', region='$region', gender='$gender', website_url='$website_url' WHERE sellerid='$seller_id';");
            $result = $db->prepareStatement("UPDATE businessdetails SET logo=?, companyname=?, country=?, region=?, gender=?, website_url=? WHERE sellerid=?;", array($logo, $companyname, $country, $region, $gender, $website_url, $sessionid));

            $admin->goToPage("bank-info", "business_details_updated");
        } else {
            // $sql = "INSERT INTO businessdetails (sellerid, logo, companyname, country, region, gender, website_url) VALUES ('$sessionid', '$logo', '$companyname', '$country', '$region', '$gender', '$website_url');";
            // $result = mysqli_query($conn, $sql);
            $result = $db->prepareStatement("INSERT INTO businessdetails (sellerid, logo, companyname, country, region, gender, website_url) VALUES (?, ?, ?, ?, ?, ?, ?);", array($sessionid, $logo, $companyname, $country, $region, $gender, $website_url));
            $admin->goToPage("bank-info", "business_details_updated");
        }
    }













    ?>


































    <!-- footer start -->
    <?php include 'footer.php'; ?>
    <!-- footer end -->


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>-->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        // image 1 start 
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
        // image 1 end 









        function validateForm() {
            var image = $(".image").val();
            var country = $(".country").val();
            var region = $(".region").val();

            if (country == "Select Country") {
                alert("please select a country");
                return false;

            } else if (region == "Please Select...") {
                alert("please select a region");
                return false;
            } else {
                return true;
            }
        }
    </script>
</body>

</html>