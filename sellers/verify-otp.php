<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';

if (!isset($_SESSION['tmp_firstname'])) {
    $admin->goToPage("signup", "invalid_verification");
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

            .title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 18px;
                text-align: center;
                margin-top: 50px;
            }

            .title-small {
                width: 100%;
                font-size: 13px;
                color: grey;
                text-align: center;
            }

            .form-container {
                width: 90%;
                margin: auto;
                margin-top: 20px;
                margin-bottom: 50px;
                box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.2);
                padding: 10px;
                border-radius: 5px;
                border-top: 2px solid crimson;
            }




            .form-container .field-container {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                margin-bottom: 15px;
                justify-content: center;

            }

            .form-container .field-container .field {
                padding: 7px;
                background-color: white;
                border: 1px solid lightgrey;
                border-radius: 3px;
                color: #111;
                text-align: center;
                font-size: 25px;
                width: 40px;
                height: 50px;
                margin-right: 10px;
                font-weight: bold;

            }

            .form-container .centered-div .submit-btn {
                padding: 5px;
                font-size: 15px;
                background-color: crimson;
                color: white;
                border: none;
                border-radius: 3px;
                width: 80px;


            }


        }

        /** end of smaller screen **/
















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }


            .title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                font-size: 18px;
                text-align: center;
                margin-top: 50px;
            }

            .title-small {
                width: 100%;
                font-size: 13px;
                color: grey;
                text-align: center;
            }

            .form-container {
                width: 400px;
                margin: auto;
                margin-top: 20px;
                margin-bottom: 50px;
                box-shadow: 2px 4px 10px rgba(0, 0, 0, 0.2);
                padding: 10px;
                border-radius: 5px;
                border-top: 2px solid crimson;
            }




            .form-container .field-container {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                margin-bottom: 15px;
                justify-content: center;

            }

            .form-container .field-container .field {
                padding: 7px;
                background-color: white;
                border: 1px solid lightgrey;
                border-radius: 3px;
                color: #111;
                text-align: center;
                font-size: 25px;
                width: 40px;
                height: 50px;
                margin-right: 10px;
                font-weight: bold;

            }

            .form-container .centered-div .submit-btn {
                padding: 5px;
                font-size: 15px;
                background-color: crimson;
                color: white;
                border: none;
                border-radius: 3px;
                width: 80px;


            }
        }

        /** end of bigger screen **/

        .eye-btn {
            cursor: pointer;
        }

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



    <a href="../" style="position:absolute;top:5px;left:5px;padding:5px;color:crimson;font-weight:bold;font-size:19px;text-shadow:2px 2px 2px lightgrey;">CORRECT<span style="color:black;">LEG</span></a>




    <div class="title">Verify Phone Number</div>
    <div class="title-small">We sent a verification code to <i><?php echo "0" . $_SESSION['main_phone']; ?></i></div>

    <!-- <?php echo $_SESSION['tmp_verification_code']; ?> -->
    <!-- form container start -->
    <div class="form-container">
        <br>

        <div class="field-container">
            <input type="tel" class="field field1">
            <input type="tel" class="field field2">
            <input type="tel" class="field field3">
            <input type="tel" class="field field4">
            <input type="tel" class="field field5">
        </div>





        <div class="centered-div">
            <button type="submit" class="submit-btn verify-btn" name="submit" value="loginaccount">Verify</button>
        </div>
        <div style="width:100%;text-align:center;padding:10px;font-size:13px;">
            Have not gotten code?
            <a class="resend-code-btn" style="color:mediumseagreen;cursor:pointer;">Re-send</a>
            <a class="resend-unavailable-btn" style="color:crimson;display:none;cursor:pointer;">Resend in 60 secs</a>
        </div>
        <br>



    </div>
    <!-- form container end -->



































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
        $(".field1").keyup(function() {
            if ($(this).val() != "") {
                $(".field2").focus();
            }
        });

        $(".field2").keyup(function() {
            if ($(this).val() != "") {
                $(".field3").focus();
            }
        });

        $(".field3").keyup(function() {
            if ($(this).val() != "") {
                $(".field4").focus();
            }
        });

        $(".field4").keyup(function() {
            if ($(this).val() != "") {
                $(".field5").focus();
            }
        });




        $(".verify-btn").click(function() {

            var verification_code = $(".field1").val() + $(".field2").val() + $(".field3").val() + $(".field4").val() + $(".field5").val();
            //  alert(verification_code)
            check_verification_code(verification_code)
        })



        function send_verification_code() {
            var send_verification_code = "yes";
            $.ajax({

                url: "ajax-verification.php",
                method: "POST",
                async: false,
                data: {
                    "send_verification_code": send_verification_code,
                },
                success: function(data) {
                    if (data == "success") {
                        alert("Verification code has been sent again!");
                        $(".resend-code-btn").hide();
                        $(".resend-unavailable-btn").show();
                        start_resend_countdown();
                    }
                }

            });

        }







        function check_verification_code(verification_code) {
            var check_verification_code = "yes";
            $.ajax({

                url: "ajax-verification.php",
                method: "POST",
                async: false,
                data: {
                    "check_verification_code": check_verification_code,
                    "verification_code": verification_code
                },
                success: function(data) {
                    if (data == "success") {
                        window.location.href = "ajax-verification.php?signup_seller";
                    } else if (data == "failed") {
                        alert("Verification code is not correct!")
                    }
                }

            });

        }



        $(".resend-code-btn").click(function() {

            send_verification_code();
            $(this).html("Sending...");
            $(this).hide();
        })

        function start_resend_countdown() {
            var time = 60;
            var interval = setInterval(function() {
                time--;
                $(".resend-unavailable-btn").html("<i>Resend in " + time + " secs </i>");
                //console.log(time)

                if (time <= 0) {
                    clearInterval(interval);
                    $(".resend-unavailable-btn").hide();
                    $(".resend-code-btn").html("resend");
                    $(".resend-code-btn").show();

                }
            }, 1000);
        }


        $(".resend-code-btn").hide();
        $(".resend-unavailable-btn").show();
        start_resend_countdown();
    </script>
</body>

</html>