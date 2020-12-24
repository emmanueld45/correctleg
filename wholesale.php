<?php
session_start();
include 'dbconn.php';
include 'functions.php';

include 'classes/database.class.php';
include 'classes/admin.class.php';
include 'classes/products.class.php';

//$sessionid = $_SESSION['id'];
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
            .hero__categories {
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
                position: relative;
                top: 50px !important;
                border: none !important;
            }

            .hero__search__form {}

            .hero__search__phone {
                display: none;
            }
        }

        /** end of smaller screen **/

















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .login-btn {
                display: none;
            }
        }

        /** end of bigger screen **/
    </style>



    <meta charset="UTF-8">
    <meta name="description" content="Buy Footwears at affordable prices" />
    <meta name="keywords" content="Correctleg, foot wears, online shop, Nigerian online shop" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wholesale - Correctleg</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/mystyle.css" type="text/css">
    <link rel="stylesheet" href="css/components.css" type="text/css">

    <!-- og graph start -->
    <meta property="og:url" content="https://correctleg.com" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Nigeria's Largest Onine Market Place For Foot Wear" />
    <meta property="og:description" content="Buy awesome foot wears at affordable prices." />
    <meta property="og:image" content="https://correctleg.com/banners/banner1.jpg" />
    <!-- og graph end -->
</head>


<body>
    <!-- Page Preloder -->
    <?php include 'loader.php'; ?>



    <!-- header start -->
    <?php include 'header.php'; ?>
    <!-- header end -->


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/footbanner1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>WholeSale</h2>
                        <div class="breadcrumb__option">
                            <a href="./">Home</a>
                            <span>wholesale</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->





















































    <!-- carousel product component start --->

    <?php
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $limit = 20;
    $previous_limits = ($page * $limit) - $limit;


    $result = $db->setQuery("SELECT * FROM wholesaleproduct WHERE status='active' ORDER BY RAND() LIMIT $previous_limits, $limit;");
    $numrows = mysqli_num_rows($result);
    if ($numrows != 0) {
    ?>
        <br>
        <section class="product-component">
            <div class="component-title" style="background-color:grey;color:white;">Wholesale <i class="fa fa-flag"></i></div>
            <div class="component-container">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['price_per_dozen'] == "empty") {
                        $price = $row['price_per_set'];
                    } else {
                        $price = $row['price_per_dozen'];
                    }

                ?>
                    <a href="wholesale-product?i=<?php echo $row['uniqueid']; ?>" class="box">
                        <!-- <span class="label">30% off</span> -->
                        <div class="centered-div">
                            <img src="<?php echo $row['image1']; ?>" alt="image">
                        </div>
                        <div class="product-name"><?php echo $row['name']; ?></div>
                        <div class="stars-container">
                            <i class="fa fa-star star active"></i>
                            <i class="fa fa-star star active"></i>
                            <i class="fa fa-star star active"></i>
                            <i class="fa fa-star star"></i>
                            <i class="fa fa-star star"></i>
                        </div>
                        <div class="product-price">
                            <span class="new-price"><span>&#8358</span><?php echo number_format($price); ?></span>

                        </div>
                    </a>
                <?php
                }
                ?>
                <div class="pagination-component">
                    <?php $product->getPagination($numrows, $limit, "wholesale?"); ?>
                </div>

            </div>
        </section>
    <?php
    } else {
        echo "<br><div class='alert alert-info' style='width:90%;margin:auto;text-align:center;'>No Wholesale products yet!</div>";
    }
    ?>
    <!-- product component end --->



























    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>
    <!-- Footer Section End -->

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