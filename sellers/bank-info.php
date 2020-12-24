<?php
session_start();
include '../dbconn.php';
include 'functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/sellers.class.php';

if (!isset($_SESSION['id'])) {
    echo '<script>
window.location.href="login";
</script>';
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

            .login-title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 18px;
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

            .skip-btn {
                color: crimson;
                border-bottom: 1px dotted crimson;
                font-size: 14px;
                float: right;
            }

            .skip-btn:hover {
                color: crimson;
                opacity: 0.8;
            }


        }

        /** end of smaller screen **/
















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }


            .login-title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 20px;
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
                background-color: ;
                border: none;
                width: ;
                font-size: 22px;
                margin-right: 10px;
                color: crimson;
                opacity: 0.7;

            }

            .active {
                background-color: crimson;
                color: white;
                opacity: 1;
                font-weight: bold;
                /* border-radius: 50px; */
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

            .skip-btn {
                color: crimson;
                border-bottom: 1px dotted crimson;
                font-size: 15px;
                float: right;
            }

            .skip-btn:hover {
                color: crimson;
                opacity: 0.8;
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
        <button class="switching-btn">2. Business information <i class="fa fa-angle-double-right"></i></button>
        <button class="switching-btn active">3. Bank Account</button>
    </div>
    <!-- switching btns container end -->





    <div class="login-title">BANK DETAILS <i class="fa fa-bank"></i></div>

    <!-- form container start -->
    <div class="form-container">
        <form action="" method="POST" onsubmit="return validateForm()">
            <?php if (isset($_GET['business_details_updated'])) {
            ?>
                <div class="alert alert-success" style="font-size:15px;margin-top:5px;">
                    Business details <span class="alert-link">successfully updated!</span>
                </div>
            <?php } ?>
            <br>
            <label style="font-weight:bold;font-size:18px;">Bank</label><br>
            <select class="form-control bank-name" id="sel1" name="bank" style="" required>
                <option value="">[Select bank]</option>
                <!-- <option>Bank</option> -->
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
            </select>


            <br>
            <label style="font-weight:bold;font-size:18px;">Account Number</label>
            <input type="tel" class="form-control account-number" name="accountnumber" placeholder="" required>
            <br>

            <label style="font-weight:bold;font-size:18px;">Account Name*</label>
            <input type="text" class="form-control account-name" readonly name="accountname" placeholder="" required>
            <div class="account-name-status"></div>
            <br>



            <label style="font-weight:bold;font-size:18px;">Account type</label><br>
            <select class="form-control" id="sel1" name="accounttype" style="" required>
                <option value="">Please select..</option>
                <option>Savings</option>
                <option>Current</option>

            </select>
            <br>

            <div style="width:100%;display:flex;justify-content:center;">
                <button type="submit" class="submit-btn save-btn" style="display:none;" name="submit">SAVE & FINISH</button>
            </div>


        </form>
        <div class="centered-div">
            <a href="profile" class="skip-btn">Skip this step?</a>
        </div>
    </div>
    <!-- form container end -->









    <?php

    if (isset($_POST['submit'])) {


        $bank = mysqli_real_escape_string($db->conn, $_POST['bank']);
        $accountname = mysqli_real_escape_string($db->conn, $_POST['accountname']);
        $accountnumber = mysqli_real_escape_string($db->conn, $_POST['accountnumber']);
        $accounttype = mysqli_real_escape_string($db->conn, $_POST['accounttype']);

        if ($seller->haveBankDetails($sessionid)) {
            $result = $db->prepareStatement("UPDATE bankdetails SET bank='$bank', accountname='$accountname', accountnumber='$accountnumber', accounttype='$accounttype' WHERE sellerid='$sessionid';", array($bank, $accountname, $accountnumber, $accounttype, $sessionid));
            $admin->goToPage("profile", "is_new_signup");
        } else {
            //  $sql = "INSERT INTO bankdetails (sellerid, bank, accountname, accountnumber, accounttype) VALUES ('$sessionid', '$bank', '$accountname', '$accountnumber', '$accounttype');";
            $result = $db->prepareStatement("INSERT INTO bankdetails (sellerid, bank, accountname, accountnumber, accounttype) VALUES (?, ?, ?, ?, ?);", array($sessionid, $bank, $accountname, $accountnumber, $accounttype));
            $admin->goToPage("profile", "is_new_signup");
        }
    }


















    ?>









































    <!-- footer start -->
    <?php include 'footer.php'; ?>
    <!-- footer end -->


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
        // function validateForm() {
        //     if (isNaN($(".account-number").val())) {
        //         alert("Account number must only contain numbers")
        //         return false;
        //     } else if ($(".account-number").val().length != 10) {
        //         alert("Account number is invalid");
        //         return false;
        //     } else {
        //         return true;
        //     }
        // }






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



        $(".account-number").keyup(function() {
            $(".account-name-status").html("<span style='font-size:13px;color:crimson;'>fetching account details..</span>");
            if ($(".bank-name").val() == "") {
                alert("Kindly choose a bank!");
                $(".account-number").val("");
            } else if ($(this).val().length == 10) {
                console.log("Getting account name..")
                console.log($(".account-number").val())
                console.log($(".bank-name").val())
                fetch_account_details();
            }

            if ($(this).val().length != 10) {
                $(".save-btn").hide();
            }
        })

        function fetch_account_details() {

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
                        console.log("failed to get accont name");
                        $(".save-btn").hide();
                        $(".account-name").val("");
                        $(".account-name-status").html("<span style='font-size:13px;color:red;'>we could not fetch your account details, try again!</span>");


                    }
                }

            });

        }
    </script>
</body>

</html>