<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';

$sessionid = $_SESSION['id'];

$bank = "";
$accountname = "";
$accountnumber = "";
$accounttype = "";

if (seller_have_bank_details($sessionid)) {
    $sql = "SELECT * FROM bankdetails WHERE sellerid='$sessionid';";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    $bank = $row['bank'];
    $accountname = $row['accountname'];
    $accountnumber = $row['accountnumber'];
    $accounttype = $row['accounttype'];
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
                border-bottom: 1px solid lightgrey;
                background-color: white;
            }

            .form-container {
                width: 90%;
                margin: auto;
            }

            .submit-btn {
                width: 90%;
                padding: 8px;
                background-color: crimson;
                color: white;
                border: none;
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
                /* height: 200px; */
            }

            .items-box {
                width: 100%;
                height: 50px;
                padding: 10px;
                color: grey;
            }

            .form-container {
                width: 50%;
                margin: auto;
            }

            .submit-btn {
                width: 90%;
                padding: 8px;
                background-color: crimson;
                color: white;
                border: none;
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
    <div class="mobile-view-container" style="background-color:#eee;height:100%;">

        <!-- header start -->
        <?php include 'header.php'; ?>
        <!-- header end -->





        <!-- form container start -->
        <div class="form-container">
            <form action="" method="POST">
                <?php if (isset($_GET['bank_details_updated'])) {
                ?>
                    <div class="alert alert-success" style="font-size:15px;margin-top:5px;">
                        Bank details <span class="alert-link">successfully updated!</span>
                    </div>
                <?php } ?>

                <?php if (isset($_GET['error'])) {
                ?>
                    <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                        An <span class="alert-link">error occurred!</span> try again
                    </div>
                <?php } ?>

                <br>
                <label style="font-weight:bold;font-size:18px;">Bank</label><br>
                <select class="form-control bank-name" id="sel1" name="bank" style="" required>
                    <?php if ($bank != "") {
                        echo "<option>$bank</option>";
                    } ?>
                    <option value="">[Select bank]</option>
                    <option>Bank</option>
                    <option>First Bank of Nigeria</option>
                    <option>Zenith Bank</option>
                    <option>Standard Chartered Bank</option>
                    <option>Fidelity Bank</option>
                    <option>United Bank for Africa</option>
                    <option>Access Bank</option>
                    <option>CitiBank</option>
                    <option>Unity Bank</option>
                    <option>Ecobank Plc</option>
                    <option>Stanbic IBTC Bank</option>
                    <option>Wema Bank</option>
                    <option>Enterprise Bank</option>
                    <option>Diamond Bank</option>
                    <option>SunTrust Bank</option>
                    <option>Heritage</option>
                    <option>GTBank Plc</option>
                    <option>Union Bank</option>
                    <option>Sterling Bank</option>
                    <option>Skye Bank</option>
                    <option>Keystone Bank</option>
                    <option>First City Monument Bank</option>
                </select>

                <br>

                <label style="font-weight:bold;font-size:18px;">Account Number</label>
                <input type="tel" class="form-control account-number" name="accountnumber" maxlength="10" minlength="10" value="<?php echo $accountnumber; ?>" placeholder="" required>
                <br>

                <label style="font-weight:bold;font-size:18px;">Account Name*</label>
                <input type="tel" class="form-control account-name" name="accountname" readonly value="<?php echo $accountname; ?>" placeholder="" required>
                <div class="account-name-status"></div>
                <br>

                <label style="font-weight:bold;font-size:18px;">Account type</label><br>
                <select class="form-control" id="sel1" name="accounttype" style="" required>
                    <?php if ($accounttype != "") {
                        echo "<option>$accounttype</option>";
                    } ?>
                    <option value="">Please select..</option>
                    <option>Savings</option>
                    <option>Current</option>

                </select>
                <br>

                <div style="width:100%;display:flex;justify-content:center;">
                    <button type="submit" class="submit-btn save-btn" style="display:none;" name="submit">SAVE</button>
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
            <div class="col-sm-8">


                <!-- form container start -->
                <div class="form-container">
                    <form action="" method="POST">
                        <?php if (isset($_GET['bank_details_updated'])) {
                        ?>
                            <div class="alert alert-success" style="font-size:15px;margin-top:5px;">
                                Bank details <span class="alert-link">successfully updated!</span>
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['error'])) {
                        ?>
                            <div class="alert alert-danger" style="font-size:15px;margin-top:5px;">
                                An <span class="alert-link">error occurred!</span> try again
                            </div>
                        <?php } ?>

                        <br>
                        <label style="font-weight:bold;font-size:18px;">Bank</label><br>
                        <select class="form-control d-bank-name" id="sel1" name="bank" style="" required>
                            <?php if ($bank != "") {
                                echo "<option>$bank</option>";
                            } ?>
                            <option value="">[Select bank]</option>
                            <option>Bank</option>
                            <option>First Bank of Nigeria</option>
                            <option>Zenith Bank</option>
                            <option>Standard Chartered Bank</option>
                            <option>Fidelity Bank</option>
                            <option>United Bank for Africa</option>
                            <option>Access Bank</option>
                            <option>CitiBank</option>
                            <option>Unity Bank</option>
                            <option>Ecobank Plc</option>
                            <option>Stanbic IBTC Bank</option>
                            <option>Wema Bank</option>
                            <option>Enterprise Bank</option>
                            <option>Diamond Bank</option>
                            <option>SunTrust Bank</option>
                            <option>Heritage</option>
                            <option>GTBank Plc</option>
                            <option>Union Bank</option>
                            <option>Sterling Bank</option>
                            <option>Skye Bank</option>
                            <option>Keystone Bank</option>
                            <option>First City Monument Bank</option>
                        </select>

                        <br>
                        <label style="font-weight:bold;font-size:18px;">Account Number</label>
                        <input type="tel" class="form-control d-account-number" maxlength="10" minlength="10" name="accountnumber" value="<?php echo $accountnumber; ?>" placeholder="" required>
                        <br>

                        <label style="font-weight:bold;font-size:18px;">Account Name*</label>
                        <input type="tel" class="form-control d-account-name" readonly name="accountname" value="<?php echo $accountname; ?>" placeholder="" required>
                        <div class="d-account-name-status"></div>
                        <br>


                        <label style="font-weight:bold;font-size:18px;">Account type</label><br>
                        <select class="form-control d-account-type" id="sel1" name="accounttype" style="" required>
                            <?php if ($accounttype != "") {
                                echo "<option>$accounttype</option>";
                            } ?>
                            <option value="">Please select..</option>
                            <option>Savings</option>
                            <option>Current</option>

                        </select>
                        <br>

                        <div style="width:100%;display:flex;justify-content:center;">
                            <button type="submit" class="submit-btn d-save-btn" style="display:none;" name="submit">SAVE</button>
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

    if (isset($_POST['submit'])) {


        $bank = $_POST['bank'];
        $accountname = $_POST['accountname'];
        $accountnumber = $_POST['accountnumber'];
        $accounttype = $_POST['accounttype'];

        if (!seller_have_bank_details($sessionid)) {
            $sql = "INSERT INTO bankdetails (sellerid, bank, accountname, accountnumber, accounttype) VALUES ('$sessionid', '$bank', '$accountname', '$accountnumber', '$accounttype');";
            $result = mysqli_query($conn, $sql);
        } else {
            $sql = "UPDATE bankdetails SET bank='$bank', accountname='$accountname', accountnumber='$accountnumber', accounttype='$accounttype' WHERE sellerid='$sessionid';";
            $result = mysqli_query($conn, $sql);
        }

        if ($result) {
            echo '<script>
window.location.href="bank-details.php?bank_details_updated=true";
</script>';
        } else {
            echo '<script>
        window.location.href="bank-details.php?error=true";
        </script>';
        }
    }











    ?>






    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


    <script>
        function get_bank_code(bank_name) {

            if (bank_name == "Bank") {
                return "044";
            } else if (bank_name == "First Bank of Nigeria") {
                return "011";
            } else if (bank_name == "Zenith Bank") {
                return "057";
            } else if (bank_name == "Standard Chartered Bank") {
                return "068";
            } else if (bank_name == "Fidelity Bank") {
                return "070";
            } else if (bank_name == "CitiBank") {
                return "023";
            } else if (bank_name == "Unity Bank") {
                return "215";
            } else if (bank_name == "Ecobank Plc") {
                return "050";
            } else if (bank_name == "Stanbic IBTC Bank") {
                return "221";
            } else if (bank_name == "Wema Bank") {
                return "035";
            } else if (bank_name == "Enterprise Bank") {
                return "084";
            } else if (bank_name == "Diamond Bank") {
                return "063";
            } else if (bank_name == "SunTrust Bank") {
                return "100";
            } else if (bank_name == "Heritage") {
                return "030";
            } else if (bank_name == "GTBank Plc") {
                return "058";
            } else if (bank_name == "Union Bank") {
                return "032";
            } else if (bank_name == "Sterling Bank") {
                return "232";
            } else if (bank_name == "Skye Bank") {
                return "076";
            } else if (bank_name == "Keystone Bank") {
                return "082";
            } else if (bank_name == "First City Monument Bank") {
                return "214";
            } else if (bank_name == "United Bank for Africa") {
                return "033";
            } else if (bank_name == "Access Bank") {
                return "044";
            } else {
                return "0";
            }
        }


        /*** FOR MOBILE START ** */
        $(".account-number").keyup(function() {
            $(".account-name-status").html("<span style='font-size:13px;color:crimson;'>fetching account details..</span>");
            if ($(".bank-name").val() == "") {
                alert("Kindly choose a bank!");
                $(".account-number").val("");
            } else if ($(this).val().length == 10) {
                console.log("Getting account name..")
                console.log($(".account-number").val())
                console.log($(".bank-name").val())
                fetch_mobile_account_details();
            }
        })

        function fetch_mobile_account_details() {

            var get_account_details = "yes";
            var account_number = $(".account-number").val();
            var account_bank = get_bank_code($(".bank-name").val());

            $.ajax({

                url: "ajax-get-account-details.php",
                method: "POST",
                async: false,
                data: {
                    "get_account_details": get_account_details,
                    "account_number": account_number,
                    "account_bank": account_bank
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.status == "success") {
                        console.log("account name gotten");

                        $(".account-name").val(data.account_name);

                        $(".save-btn").show();
                        $(".account-name-status").html("<span style='font-size:13px;color:mediumseagreen;'>account details fetched <i class='fa fa-check-circle'></i></span>");

                    } else {
                        console.log(data)
                        console.log("faild to get accont name");
                        $(".save-btn").hide();
                        $(".account-name").val("");
                        $(".account-name-status").html("<span style='font-size:13px;color:red;'>we could not fetch your account details, try again!</span>");


                    }
                }

            });

        }


        /*** FOR MOBILE END  */
















        /*** FOR DESKTOP START ** */
        $(".d-account-number").keyup(function() {
            $(".d-account-name-status").html("<span style='font-size:13px;coolor:crimson;'>fetching account details..</span>");
            if ($(".d-bank-name").val() == "") {
                alert("Kindly choose a bank!");
                $(".d-account-number").val("");
            } else if ($(this).val().length == 10) {
                console.log("Getting account name..")
                console.log($(".d-account-number").val())
                console.log($(".d-bank-name").val())
                fetch_desktop_account_details();
            }
        })

        function fetch_desktop_account_details() {

            var get_account_details = "yes";
            var account_number = $(".d-account-number").val();
            var account_bank = get_bank_code($(".d-bank-name").val());

            $.ajax({

                url: "ajax-get-account-details.php",
                method: "POST",
                async: false,
                data: {
                    "get_account_details": get_account_details,
                    "account_number": account_number,
                    "account_bank": account_bank
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.status == "success") {
                        console.log("account name gotten");
                        $(".d-account-name").val(data.account_name);
                        $(".d-save-btn").show();
                        $(".d-account-name-status").html("<span style='font-size:13px;color:mediumseagreen;'> account details fetched <i class='fa fa-check-circle'></i></span>");

                    } else {
                        console.log(data)
                        console.log("failed to get accont name");
                        $(".d-save-btn").hide();
                        $(".d-account-name").val("");
                        $(".d-account-name-status").html("<span style='font-size:13px;color:red;'>we could not fetch your account details try again!</span>");


                    }
                }

            });

        }


        /*** FOR DESKTOP END  */
    </script>
</body>

</html>