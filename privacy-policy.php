<?php
session_start();
include 'dbconn.php';
include 'functions.php';

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

            .login-btn {
                display: block;
                font-size: 19px;
                color: crimson;
                height: 35px;

                line-height: 33px;
                text-align: center;
                border: 1px solid crimson;
                cursor: pointer;
                position: absolute;
                right: 15px;
                top: 22px;
                padding-right: 5px;
                padding-left: 5px;
            }

            .humberger__open {
                display: none !important;
            }


            .head-container {
                width: 90%;
                margin: auto;
                padding: 10px;
                font-weight: bold;
                font-size: 20px;
                text-align: center;
                font-family: Arial, Helvetica, sans-serif;
                border-bottom: 1px solid lightgrey;
                margin-bottom: 10px;
            }

            .main-content-area {
                width: 90%;
                margin: auto;
                padding: 10px;
                font-family: Arial, Helvetica, sans-serif;

            }

            .header-title {
                font-family: Arial, Helvetica, sans-serif;
                color: crimson;
                margin-bottom: 10px;
            }

            .header-title-small {
                font-family: Arial, Helvetica, sans-serif;
                color: crimson;
                margin-bottom: 10px;
                font-size: 15px;
            }


            .para {
                line-height: 1.9;
                font-family: Arial, Helvetica, sans-serif;
            }

            .sub-section {
                width: 90%;
                padding: 10px;
                background-color: #eee;
                float: right;
                margin-bottom: 50px;

            }

        }

        /** end of smaller screen **/















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .login-btn {
                display: none;
            }

            .head-container {
                width: 90%;
                margin: auto;
                padding: 10px;
                font-weight: bold;
                font-size: 30px;
                text-align: center;
                font-family: Arial, Helvetica, sans-serif;
                border-bottom: 1px solid lightgrey;
                margin-bottom: 10px;
            }

            .main-content-area {
                width: 75%;
                margin: auto;
                padding: 10px;
                font-family: Arial, Helvetica, sans-serif;

            }

            .header-title {
                font-family: Arial, Helvetica, sans-serif;
                color: crimson;
                margin-bottom: 10px;
            }

            .header-title-small {
                font-family: Arial, Helvetica, sans-serif;
                color: crimson;
                margin-bottom: 10px;
                font-size: 17px;
            }


            .para {
                line-height: 1.9;
                font-family: Arial, Helvetica, sans-serif;
            }

            .sub-section {
                width: 90%;
                padding: 10px;
                background-color: #eee;
                float: right;
                margin-bottom: 50px;

            }

        }

        /** end of bigger screen **/
    </style>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg - Privacy Policy</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <!-- <link rel="stylesheet" href="css/nice-select.css" type="text/css" /> -->
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/mystyle.css" type="text/css" />
    <link rel="stylesheet" href="css/cart.css" type="text/css" />
</head>

<body style="font-family: Arial, Helvetica, sans-serif !important;">
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>







    <!-- header start -->
    <?php include 'header.php'; ?>
    <!-- header end -->


    <!-- start of head container -->
    <div class="head-container">
        Privacy Policy Notice
    </div>
    <!-- end of head container -->


    <!-- main content area start -->
    <div class="main-content-area">

        <h4 class="header-title">About this policy</h4>

        <p class="para">This Privacy policy document provides information on how Correctleg.com collects and processes
            your personal data when you visit our website or mobile applications.</p>


        <p class="para">We respect your privacy and take the protection of personal information very seriously.
            The purpose of this policy is to describe the way we collect, store, use and protect information that can be associated
            with a specific natural or juristic person and can be used to identify that person (“personal information”). Personal information: </p>

        <!-- sub section start -->
        <div class="sub-section">

            <h4 class="header-title-small">includes:</h4>
            <ul class="para">
                <li>Certain information collected on registration (see below); </li>
                <li>and optional information that you voluntarily provide to us (see below).</li>
            </ul>
            <br>
            <h4 class="header-title-small">excludes:</h4>
            <ul class="para">
                <li>information that has been made anonymous so that it does not identify a specific person; </li>
                <li>permanently de-identified information that does not relate or cannot be traced back to you specifically; </li>
                <li>non-personal statistical information collected and compiled by us and information that you have provided voluntarily in an open,
                    public environment or forum including (without limitation) any blog, chat room, community, classifieds or discussion board.
                    Because the information has been disclosed in a public forum,
                    it is no longer confidential and does not constitute personal information subject to protection under this policy.</li>
            </ul>
        </div>
        <!-- sub section end -->




        <h4 class="header-title">Acceptance of terms </h4>

        <p class="para">You must accept all the terms of this policy when you register for any of our services.
            If you do not agree with anything in this policy, then you may not register for and use any of the services.
            You may not access our website or use our services if you are younger than 18 years old or do not have legal capacity to conclude legally binding contracts.
            By accepting this policy, you are deemed to have read, understood, accepted, and agreed to be bound by all its terms.</p>



        <br>
        <h4 class="header-title">Audience </h4>

        <p class="para">This policy applies to all visitors to our website and customers who have subscribed to the services we offer (“you” and “your”). </p>



        <br>
        <h4 class="header-title">Data Contoller </h4>

        <p class="para">The data controller of this website is the Correctleg.com whose office is situated at Elzazi plaza, Odili Road, Port Harcourt. </p>


        <br>
        <h4 class="header-title">Changes </h4>

        <p class="para">We may change the terms of this policy at any time.
            We will notify you of any changes by placing a notice in a prominent place on the website or by email.
            If you do not agree with the change you must stop using the services.
            If you continue to use the services following notification of a change to the terms,
            the changed terms will apply to you and you will be deemed to have accepted such terms. </p>


        <br>
        <h4 class="header-title">Obtaining </h4>

        <p class="para">We collect information to provide better services to all those with whom we deal. </p>


        <!-- sub section start -->
        <div class="sub-section">

            <p class="para"><b>When you register:</b> you register on correctleg.com, you will no longer
                be anonymous to us as you will provide us with personal information.
                This personal information will include:</p>
            <ul class="para">
                <li> Name, surname, address, gender</li>
                <li> email address, telephone number</li>
                <li> Unique user ID, password </li>
            </ul>

        </div>
        <!-- sub section end -->



        <h4 class="header-title">Voluntary Details </h4>

        <p class="para">You may also provide additional information on anoptional basis (“optional information”).
            This includes content or product that you decide to upload or download from our website or when you enter competitions,
            take part in promos, participate in surveys,
            register and subscribe for certain additional services, or otherwise use the optional features and feature of the website. </p>



        <br>
        <h4 class="header-title">Device Information </h4>

        <p class="para">We may collect device-specific information
            (such as your hardware model, operating system version, unique device identifiers,
            and mobile network information including phone number).</p>


        <br>
        <h4 class="header-title">Obtaining from browser </h4>

        <p class="para">We automatically receive and record Internet usage information on our hosting company’s server logs from your browser,
            such as your internet protocol address (“IP Address”), browsing habits, click patterns, version of software installed,
            system type, screen resolutions, coloureffects, plug-ins, language settings, cookie preferences, search engine keywords,
            JavaScript enablement, the content and pages that you access on the website, and the dates and times that you visit the website,
            paths taken, and time spent on sites and pages within the website (“usage information”).
            Please note that other websites visited before entering our website might place personal information within your URL during a visit to it,
            and we have no control over such websites. Accordingly,
            a subsequent website that collects URL information may log some personal information.</p>



        <br>
        <h4 class="header-title">Cookies </h4>

        <p class="para">A cookie is a small text files containing a string of alphanumeric characters sent to your computer with your permission
            to collect certain usage information. We use session cookies (which disappear after you close your browser)
            and persistent cookies (which remain after you close your browser which can be removed manually)
            and may be used by your browser on subsequent visits to our website.
            Our approved third parties (search engines, measurement and analytics services providers, social media and advertising companies)
            may also set cookies when you use our online shopping feature.
            Third parties include search engines, providers of measurement and analytics services, social media networks and advertising companies.</p>
        <br>
        <p class="para"> We use information gathered by cookies to improve the website, such as:</p>

        <!-- sub section start -->
        <div class="sub-section">
            <ul>
                <li> Identifying visitors, your preferences and subscriptions</li>
                <li>counting the number of visitors</li>
                <li>Sending you customized messages, newsletters and promo messages with respect to your interests</li>
            </ul>

        </div>
        <!-- sub section end -->


        <h4 class="header-title">Information Usage </h4>

        <p class="para">You may also provide additional information on anoptional basis (“optional information”).
            This includes content or product that you decide to upload or download from our website or when you enter competitions,
            take part in promos, participate in surveys,
            register and subscribe for certain additional services, or otherwise use the optional features and feature of the website. </p>


        <p class="para">We may use your email address to inform you about our business,
            such as letting you know about upcoming events or changes to our business. We use the information we collect from our Site to provide,
            maintain, protect and improve it, complying with our legal obligations,
            including verifying your identity where necessary and to protect our users.
            We may use information collected from cookies and other technologies to improve your user experience and the overall quality of our Site. </p>



        <h4 class="header-title">Sharing </h4>

        <p class="para">We may share your personal information with an affiliate,
            in which case we will seek to require the affiliates to honor this privacy policy. </p>


        <p class="para">Our service providers under contract who help with parts of our business operations (fraud prevention, bill collection,
            processing payments,sales and marketing, content transmission, technology services, logistics, Banking partners, data analysis,
            customer service, assessing and managing credit risk). </p>

        <p class="para">Our contracts dictate that these service providers only use your
            information in connection with the services they perform for us and not for their own benefit.</p>



        <!-- sub section start -->
        <div class="sub-section">

            <p class="para"><span style="color:crimson;">Law enforcement:</span> We may disclose personal information if required: </p>
            <ul class="para">
                <li> by a subpoena or court order; </li>
                <li> to comply with any law;</li>
                <li> to protect the safety of any individual or the general public; </li>
                <li>to prevent violation of our terms of service. </li>
            </ul>

            <br>
            <p class="para"><span style="color:crimson;">Selling:</span>We will not sell personal data. No personal information will be disclosed to anyone except as stated in this privacy policy. </p>

            <p class="para"><span style="color:crimson;">Marketing Reasons:</span>We may disclose aggregate statistics (information about the customer population in general terms) about the personal information to advertisers or business partners</p>

            <p class="para"><span style="color:crimson;">Transfer of ownership:</span>If we undergo a change in ownership, or a merger with, acquisition by,
                or sale of assets to, another entity, we may assign our rights to the personal information we process to a successor,
                purchaser, or separate entity. We will disclose the transfer on the website.
                If you are concerned about your personal information migrating to a new owner, you may request us to delete your personal information. </p>

            <p class="para"><span style="color:crimson;">Employees:</span>We may need to disclose personal data to some employees that will require the personal information based on their jobs.</p>


        </div>
        <!-- sub section end -->





        <h4 class="header-title" style="clear:both;">Security of personal infomation </h4>

        <p class="para">We protect your personal information using computer safeguards such as firewalls and data encryption
            to protect personal information, and we authorize access to personal information only
            for those employees who require it to fulfill their job responsibilities.
            We have put in measures in place to deal with any suspected personal data breach
            and will notify you and any applicable regulator of a breach where we are legally required to do so. </p>



        <h4 class="header-title" style="clear:both;">Retention of personal infomation </h4>

        <p class="para">We will only retain your personal information for as long as it is
            necessary to fulfill the purposes mentioned above, unless: </p>

        <!-- sub section start -->
        <div class="sub-section">
            <ul class="para">
                <li>retention of the record is required or authorized by law; or</li>
                <li>you have consented to the retention of the record. </li>
            </ul>
        </div>
        <!-- sub section end -->

        <p class="para" style="clear:both;">During the period of retention,
            we will continue to abide our non-disclosure obligations and will not share or sell your personal information. </p>





        <h4 class="header-title" style="clear:both;"> Transfers of personal information outside Nigeria </h4>

        <p class="para">We may transmit or transfer personal information outside Nigeria to a foreign country.
            Personal information may be stored on servers located outside Nigeria in a foreign country whose
            laws protecting personal information may not be as stringent as the laws in Nigeria.
            You consent to us processing your personal information in a foreign country
            whose laws regarding processing of personal information may be less stringent. </p>



        <h4 class="header-title" style="clear:both;"> Updating or removing </h4>

        <p class="para">You may choose to correct or update the personal information you have submitted to us,
            by clicking the menu in any of the pages on our website. </p>


        <h4 class="header-title" style="clear:both;"> Your Legal Rights </h4>

        <p class="para">As an individual you may exercise your right to access the data held about you by this company
            by submitting your request in writing to the data controller.
            Although all reasonable efforts will be made to </p>

        <p class="para">keep your information updated, you are kindly requested to inform us of any change
            referring to the personal data held by the association. In any case if you consider
            that certain information about you is inaccurate, you may request rectification of such data. You also have the right to request
            the blocking or erasure of data which has been processed unlawfullyand unsubscribe from our emails and newsletters.</p>





        <h4 class="header-title" style="clear:both;"> Limitation </h4>

        <p class="para">We are not responsible for, give no warranties, nor make any representations in respect of the
            privacy policies or practices of any third party websites. </p>


        <h4 class="header-title" style="clear:both;"> Enquiries </h4>

        <p class="para">If you have any questions or concerns about the way in which we handle personal informationor you wish
            to exercise your legal rights in respect of your personal data, please contact us.























    </div>
    <!-- main content area end -->



    <!-- footer start -->

    <?php include 'footer.php'; ?>
    <!-- footer end -->
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/jquery.nice-select.min.js"></script> -->
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>

    <script>


    </script>
</body>

</html>