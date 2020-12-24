<?php
include 'classes/database.class.php';
include 'classes/products.class.php';
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

            .error-container {
                width: 100%;
            }

            .error-container .centered-div .image {
                width: 60%;
                height: auto;
            }

            .error-container .message {
                width: 100%;
                text-align: center;
                font-size: 14px;
                margin-top: 10px;
                padding: 5px 10px;
            }



        }

        /** end of smaller screen **/
























































































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .error-container {
                width: 100%;
            }

            .error-container .centered-div .image {
                width: 300px;
                height: auto;
            }

            .error-container .message {
                width: 100%;
                text-align: center;
                font-size: 16px;
                margin-top: 10px;
            }

        }

        /** end of bigger screen **/
    </style>
    <meta charset="UTF-8" />
    <meta name="description" content="Ogani Template" />
    <meta name="keywords" content="Ogani, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Correct Leg - Become a seller</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/nice-select.css" type="text/css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/mystyle.css" type="text/css" />

    <link rel="stylesheet" href="css/components.css" type="text/css" />
</head>

<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>



    <?php include 'header.php'; ?>





    <section class="error-container">
        <div class="centered-div">
            <img src="img/404.svg" class="image" alt="">
        </div>
        <div class="message">Sorry, <span style="color:crimson;font-weight:bold;">correctleg</span> couldn't find this page</div>
    </section>




    <br>

    <!--  product component start --->
    <?php
    $result = $db->setQuery("SELECT * FROM product WHERE status='active' ORDER BY RAND() LIMIT 10;");
    $numrows = mysqli_num_rows($result);
    ?>
    <section class="product-component">
        <div class="component-title" style="background-color:grey;color:white;">Recommended for you</div>
        <div class="component-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {

            ?>
                <a href="product?i=<?php echo $row['uniqueid']; ?>" class="box">
                    <!-- <span class="label">30% off</span> -->
                    <div class="centered-div">
                        <img src="<?php echo $row['image1']; ?>" alt="image">
                    </div>
                    <div class="product-name"><?php echo $row['name']; ?></div>
                    <div class="stars-container">
                        <?php echo $product->getStars($row['uniqueid'], "<i class='fa fa-star'  style='color:orange;font-size:13px;'></i>", "<i class='fa fa-star'  style='color:lightgrey;font-size:13px;'></i>"); ?>
                    </div>
                    <div class="product-price">
                        <span class="new-price"><span>&#8358</span><?php echo number_format($row['price']); ?></span>
                        <span class="old-price"><span>&#8358</span><?php echo number_format($row['old_price']); ?></span>
                    </div>
                </a>
            <?php
            }
            ?>

        </div>
    </section>
    <!-- product component end --->













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
</body>

</html>