<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/orders.class.php';
include '../classes/products.class.php';
include '../classes/sellers.class.php';



if (!isset($_SESSION['admin_id'])) {
    $admin->goToPage("login", "invalid_admin");
}



$admin_id = $_SESSION['admin_id'];

$order_id = $_GET['order_id'];
$item_id = $_GET['item_id'];
?>
<!DOCTYPE html>
<html lang="en">

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



        }

        /** end of smaller screen **/















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            /*** RECEIPT START *** */
            .receipt-container {
                width: 80%;
                border: 1px solid lightgrey;
            }

            .receipt-container .header {
                width: 100%;
                height: 90px;
                background-color: crimson;
                padding: 10px;
                border: 1px solid lightgrey;
            }

            .receipt-container .header .logo {
                width: 70px;
                height: 70px;
                border-radius: 70px;
            }

            .receipt-container .header .details-container {
                float: right;
                color: white;
            }

            .receipt-container .receipt-title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                color: #111;
                font-size: 20px;
                text-align: center;
                margin-top: 10px;
                margin-bottom: 20px;
            }

            .receipt-container .billing-details {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 10px 20px;
            }

            .receipt-container .billing-details .row1 {
                width: 50%;

                padding-bottom: 10px;
            }

            .receipt-container .billing-details .row1 .detail {
                display: block;
                margin-bottom: 5px;
                max-width: 200px;
            }

            .receipt-container .billing-details .row2 {
                background-color: ;
                width: 50%;
                padding-bottom: 10px;
            }

            .receipt-container .billing-details .row2 .product-image {
                width: 200px;
                max-height: 200px;
                object-fit: cover;
                float: right;
            }

            .receipt-container .product-details {
                width: 95%;
                margin: auto;
            }

            .receipt-container .product-details table {
                width: 100%;
            }

            .receipt-container .product-details table thead {
                width: 100%;
                background-color: crimson;
                color: white;
                padding: 10px;
            }


            .receipt-container .product-details table thead th {
                padding: 5px;
                text-align: center;
            }

            .receipt-container .product-details table tbody {
                width: 100%;
            }

            .receipt-container .product-details table tbody tr {
                width: 100%;
                border-bottom: 1px solid #eee;
            }

            .receipt-container .product-details table tbody tr td {
                padding: 10px 5px;
                text-align: center;
            }


            .receipt-container .note-details {
                width: 95%;
                margin: auto;
                margin-top: 60px;
                padding: 5px 0px;
            }

            .receipt-container .footer-credit {
                width: 95%;
                margin: auto;
                padding: 5px 0px;
                text-align: right;
                color: grey;
            }

            /*** RECEIPT END *** */







            /*** DELIVERY RECEIPT START *** */
            .delivery-receipt-container {
                width: 80%;
                border: 1px solid lightgrey;
            }

            .delivery-receipt-container .header {
                width: 100%;
                height: 90px;
                background-color: crimson;
                padding: 10px;
                border: 1px solid lightgrey;
            }

            .delivery-receipt-container .header .logo {
                width: 70px;
                height: 70px;
                border-radius: 70px;
            }

            .delivery-receipt-container .header .details-container {
                float: right;
                color: white;
            }

            .delivery-receipt-container .receipt-title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                color: #111;
                font-size: 20px;
                text-align: center;
                margin-top: 10px;
                margin-bottom: 20px;
            }

            .delivery-receipt-container .billing-details {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 10px 20px;
            }

            .delivery-receipt-container .billing-details .row1 {
                width: 50%;

                padding-bottom: 10px;
            }

            .delivery-receipt-container .billing-details .row1 .detail {
                display: block;
                margin-bottom: 5px;
                max-width: 250px;
            }

            .delivery-receipt-container .billing-details .row2 {
                background-color: ;
                width: 50%;
                padding-bottom: 10px;
            }

            .delivery-receipt-container .billing-details .row2 .product-image {
                width: 200px;
                max-height: 200px;
                object-fit: cover;
                float: right;
            }

            .delivery-receipt-container .product-details {
                width: 95%;
                margin: auto;
            }

            .delivery-receipt-container .product-details table {
                width: 100%;
            }

            .delivery-receipt-container .product-details table thead {
                width: 100%;
                background-color: crimson;
                color: white;
                padding: 10px;
            }


            .delivery-receipt-container .product-details table thead th {
                padding: 5px;
                text-align: center;
            }

            .delivery-receipt-container .product-details table tbody {
                width: 100%;
            }

            .delivery-receipt-container .product-details table tbody tr {
                width: 100%;
                border-bottom: 1px solid #eee;
            }

            .delivery-receipt-container .product-details table tbody tr td {
                padding: 10px 5px;
                text-align: center;
            }


            .delivery-receipt-container .note-details {
                width: 95%;
                margin: auto;
                margin-top: 60px;
                padding: 5px 0px;
            }

            .delivery-receipt-container .signature-details {
                width: 95%;
                margin: auto;
                margin-top: 30px;
                margin-bottom: 30px;
                display: flex;
                flex-flow: row nowrap;

            }

            .delivery-receipt-container .signature-details .row1 {
                width: 50%;
            }

            .delivery-receipt-container .signature-details .row1 .title {
                font-size: 15px;
            }

            .delivery-receipt-container .signature-details .row1 input {
                border: none;
                border-bottom: 1px solid lightgrey;
            }

            .delivery-receipt-container .signature-details .row2 {
                width: 50%;
            }

            .delivery-receipt-container .signature-details .row2 .title {
                font-size: 15px;
            }

            .delivery-receipt-container .signature-details .row2 input {
                border: none;
                border-bottom: 1px solid lightgrey;
            }

            .delivery-receipt-container .footer-credit {
                width: 95%;
                margin: auto;
                padding: 5px 0px;
                text-align: right;
                color: grey;
            }

            /*** DELIVERY RECEIPT END *** */

        }

        /** end of bigger screen **/



        @media print {

            /*** RECEIPT START ** */
            .receipt-container {
                width: 80%;
                border: 1px solid lightgrey;
            }

            .receipt-container .header {
                width: 100%;
                height: 90px;
                background-color: crimson;
                padding: 10px;
                border: 1px solid lightgrey;
            }

            .receipt-container .header .logo {
                width: 70px;
                height: 70px;
                border-radius: 70px;
            }

            .receipt-container .header .details-container {
                float: right;
                color: white;
            }

            .receipt-container .receipt-title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                color: #111;
                font-size: 20px;
                text-align: center;
                margin-top: 10px;
                margin-bottom: 20px;
            }

            .receipt-container .billing-details {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 10px 20px;
            }

            .receipt-container .billing-details .row1 {
                width: 50%;

                padding-bottom: 10px;
            }

            .receipt-container .billing-details .row1 .detail {
                display: block;
                margin-bottom: 5px;
                max-width: 200px;
            }

            .receipt-container .billing-details .row2 {
                background-color: ;
                width: 50%;
                padding-bottom: 10px;
            }

            .receipt-container .billing-details .row2 .product-image {
                width: 200px;
                max-height: 200px;
                object-fit: cover;
                float: right;
            }

            .receipt-container .product-details {
                width: 95%;
                margin: auto;
            }

            .receipt-container .product-details table {
                width: 100%;
            }

            .receipt-container .product-details table thead {
                width: 100%;
                background-color: crimson;
                color: white;
                padding: 10px;
            }


            .receipt-container .product-details table thead th {
                padding: 5px;
                text-align: center;
            }

            .receipt-container .product-details table tbody {
                width: 100%;
            }

            .receipt-container .product-details table tbody tr {
                width: 100%;
                border-bottom: 1px solid #eee;
            }

            .receipt-container .product-details table tbody tr td {
                padding: 10px 5px;
                text-align: center;
            }


            .receipt-container .note-details {
                width: 95%;
                margin: auto;
                margin-top: 60px;
                padding: 5px 0px;
            }

            .receipt-container .footer-credit {
                width: 95%;
                margin: auto;
                padding: 5px 0px;
                text-align: right;
                color: grey;
            }

            /***  RECEIPT END *** */


            /*** DELIVERY RECEIPT START *** */
            .delivery-receipt-container {
                width: 80%;
                border: 1px solid lightgrey;
            }

            .delivery-receipt-container .header {
                width: 100%;
                height: 90px;
                background-color: crimson;
                padding: 10px;
                border: 1px solid lightgrey;
            }

            .delivery-receipt-container .header .logo {
                width: 70px;
                height: 70px;
                border-radius: 70px;
            }

            .delivery-receipt-container .header .details-container {
                float: right;
                color: white;
            }

            .delivery-receipt-container .receipt-title {
                width: 100%;
                padding: 10px;
                font-weight: bold;
                color: #111;
                font-size: 20px;
                text-align: center;
                margin-top: 10px;
                margin-bottom: 20px;
            }

            .delivery-receipt-container .billing-details {
                width: 100%;
                display: flex;
                flex-flow: row nowrap;
                padding: 10px 20px;
            }

            .delivery-receipt-container .billing-details .row1 {
                width: 50%;

                padding-bottom: 10px;
            }

            .delivery-receipt-container .billing-details .row1 .detail {
                display: block;
                margin-bottom: 5px;
                max-width: 250px;
            }

            .delivery-receipt-container .billing-details .row2 {
                background-color: ;
                width: 50%;
                padding-bottom: 10px;
            }

            .delivery-receipt-container .billing-details .row2 .product-image {
                width: 200px;
                max-height: 200px;
                object-fit: cover;
                float: right;
            }

            .delivery-receipt-container .product-details {
                width: 95%;
                margin: auto;
            }

            .delivery-receipt-container .product-details table {
                width: 100%;
            }

            .delivery-receipt-container .product-details table thead {
                width: 100%;
                background-color: crimson;
                color: white;
                padding: 10px;
            }


            .delivery-receipt-container .product-details table thead th {
                padding: 5px;
                text-align: center;
            }

            .delivery-receipt-container .product-details table tbody {
                width: 100%;
            }

            .delivery-receipt-container .product-details table tbody tr {
                width: 100%;
                border-bottom: 1px solid #eee;
            }

            .delivery-receipt-container .product-details table tbody tr td {
                padding: 10px 5px;
                text-align: center;
            }


            .delivery-receipt-container .note-details {
                width: 95%;
                margin: auto;
                margin-top: 60px;
                padding: 5px 0px;
            }


            .delivery-receipt-container .signature-details {
                width: 95%;
                margin: auto;
                margin-top: 30px;
                margin-bottom: 30px;
                display: flex;
                flex-flow: row nowrap;

            }

            .delivery-receipt-container .signature-details .row1 {
                width: 50%;
            }

            .delivery-receipt-container .signature-details .row1 .title {
                font-size: 15px;
            }

            .delivery-receipt-container .signature-details .row1 input {
                border: none;
                border-bottom: 1px solid lightgrey;
            }

            .delivery-receipt-container .signature-details .row2 {
                width: 50%;
            }

            .delivery-receipt-container .signature-details .row2 .title {
                font-size: 15px;
            }

            .delivery-receipt-container .signature-details .row2 input {
                border: none;
                border-bottom: 1px solid lightgrey;
            }


            .delivery-receipt-container .footer-credit {
                width: 95%;
                margin: auto;
                padding: 5px 0px;
                text-align: right;
                color: grey;
            }

            /*** DELIVERY RECEIPT END *** */

        }
    </style>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Item receipt</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed" id="body">

    <?php
    include 'sidebar.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Item Receipt: </h1>
                <h3 class="mt-4">OrderID: <?php echo $order_id; ?></h3>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>





                <!--===RECEIPT START ===--->

                <?php
                $result = $db->setQuery("SELECT * FROM orderproducts WHERE orderid='$order_id' AND productid='$item_id';");
                $row = mysqli_fetch_assoc($result);
                ?>


                <section id="receipt-wrapper">
                    <section class="receipt-container">
                        <div class="header">
                            <img src="../img/correctleg-logo.png" alt="logo" class="logo">
                            <div class="details-container">
                                <span class="orderid"><b>OrderID:</b> <?php echo $order_id; ?></span><br>
                                <span>CorrectLeg.com</span>
                            </div>
                        </div>

                        <div class="receipt-title"><u>Order Receipt</u></div>
                        <table style="width:100%;">
                            <thead>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr class="billing-details">
                                    <td class="row1">
                                        <h5><u>Bill From:</u></h5>
                                        <span class="detail">CorrectLeg.com</span>
                                        <span class="detail">Nigeria</span>
                                        <span class="detail">09034123537</span>
                                        <span class="detail">hello@correctLeg.com</span>
                                    </td>
                                    <td class="row2">
                                        <img src="../<?php echo $product->getDetail($row['productid'], "image1"); ?>" alt="" class="product-image">
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <table style="width:100%;">
                            <thead>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr class="billing-details">
                                    <td class="row1">
                                        <?php
                                        $result1 = $db->setQuery("SELECT * FROM ordercustomerdetailS WHERE orderid='$order_id';");
                                        $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                        <h5><u>Bill To:</u></h5>
                                        <span class="detail"><?php echo $row1['firstname'] . " " . $row1['lastname']; ?></span>
                                        <span class="detail"><?php echo $row1['address1']; ?></span>
                                        <!-- <span class="detail"><?php if ($row1['address2'] != "Not added") {
                                                                        echo $row1['address2'];
                                                                    } ?></span> -->
                                        <span class="detail"><?php echo $row1['region']; ?></span>

                                    </td>
                                    <td class="row2">

                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <section class="product-details">
                            <table>
                                <thead>
                                    <th style="text-align:left;">Item</th>
                                    <th>Quantity</th>
                                    <th>Unit cost</th>
                                    <th>Line total</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align:left;"><?php echo $product->getDetail($item_id, "name"); ?></td>
                                        <td><?php echo $row['howmany']; ?></td>
                                        <td> <span>&#8358</span><?php echo number_format($row['price']); ?></td>
                                        <td><span>&#8358</span><?php echo number_format($row['howmany'] * $row['price']); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left;"></td>
                                        <td></td>
                                        <td> <b>TOTAL:</b></td>
                                        <td><b><span>&#8358</span><?php echo number_format($row['howmany'] * $row['price']); ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>

                        <section class="note-details">
                            <h6>Notes/memo</h6>
                            <p>Free shipping with 10 days money back garantee</p>
                        </section>

                        <section class="footer-credit">
                            <i>correctleg.com... largest online footwear marketplace in Africa</i>
                        </section>

                    </section>
                </section>

                <div class="print-btn-container mt-3">
                    <button class="btn btn-primary print-btn">PRINT <i class="fa fa-download"></i></button>
                </div>

                <!---=== RECEIPT END ===--->


















                <br><br>
                <!--===DELIVERY RECEIPT START ===--->

                <?php
                $result = $db->setQuery("SELECT * FROM orderproducts WHERE orderid='$order_id' AND productid='$item_id';");
                $row = mysqli_fetch_assoc($result);
                ?>


                <section id="delivery-receipt-wrapper">
                    <section class="delivery-receipt-container">
                        <div class="header">
                            <img src="../img/correctleg-logo.png" alt="logo" class="logo">
                            <div class="details-container">
                                <span class="orderid"><b>OrderID:</b> <?php echo $order_id; ?></span><br>
                                <span>CorrectLeg.com</span>
                            </div>
                        </div>

                        <div class="receipt-title"><u>Delivery Receipt</u></div>
                        <table style="width:100%;">
                            <thead>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr class="billing-details">
                                    <td class="row1">
                                        <h5><u>Bill From:</u></h5>
                                        <span class="detail">CorrectLeg.com</span>
                                        <span class="detail">Nigeria</span>
                                        <span class="detail">09034123537</span>
                                        <span class="detail">hello@correctLeg.com</span>
                                    </td>
                                    <td class="row2">
                                        <img src="../<?php echo $product->getDetail($row['productid'], "image1"); ?>" alt="" class="product-image">
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <table style="width:100%;">
                            <thead>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr class="billing-details">
                                    <td class="row1">
                                        <?php
                                        $result1 = $db->setQuery("SELECT * FROM ordercustomerdetailS WHERE orderid='$order_id';");
                                        $row1 = mysqli_fetch_assoc($result1);
                                        ?>
                                        <h5><u>Delivery Address:</u></h5>
                                        <span class="detail">Name: <?php echo $row1['firstname'] . " " . $row1['lastname']; ?></span>
                                        <span class="detail">Phone: <?php echo $row1['phone']; ?></span>
                                        <?php
                                        if ($order->getDetail($order_id, "deliverymethod") == "Door") {
                                        ?>
                                            <h6><i>*Note: Door step delivery</i></h6>
                                            <span class="detail"><?php echo $row1['address1']; ?></span>
                                            <span class="detail"><?php if ($row1['address2'] != "Not added") {
                                                                        echo "Alternative address: " . $row1['address2'];
                                                                    } ?></span>
                                            <span class="detail"><?php echo $row1['region']; ?></span>
                                        <?php
                                        } else {

                                            $station_id = $order->getPickupStationId($order_id);

                                            echo "<h6><i>*Note: Pickup station delivery</i></h6>";
                                            echo "<span class='detail'><b>Pickup station:</b><br> " . $order->getPickupStationDetail($station_id, "station") . "</span>";
                                            echo "<span class='detail'>" . $order->getPickupStationDetail($station_id, "state") . "</span>";
                                        }
                                        ?>

                                    </td>
                                    <td class="row2">

                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <section class="product-details">
                            <table>
                                <thead>
                                    <th style="text-align:left;">Item</th>
                                    <th>Quantity</th>
                                    <th>Unit cost</th>
                                    <th>Line total</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align:left;"><?php echo $product->getDetail($item_id, "name"); ?></td>
                                        <td><?php echo $row['howmany']; ?></td>
                                        <td> <span>&#8358</span><?php echo number_format($row['price']); ?></td>
                                        <td><span>&#8358</span><?php echo number_format($row['howmany'] * $row['price']); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left;"></td>
                                        <td></td>
                                        <td> <b>TOTAL:</b></td>
                                        <td><b><span>&#8358</span><?php echo number_format($row['howmany'] * $row['price']); ?></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>

                        <section class="note-details">
                            <h6>Notes/memo</h6>
                            <p>Free shipping with 10 days money back garantee</p>
                        </section>


                        <table style="width:100%;">
                            <thead>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                <tr class="signature-details">
                                    <td class="row1">
                                        <span class="title">Customer sign:</span>
                                        <input type="text">
                                    </td>
                                    <td class="row2">
                                        <span class="title">Agent sign:</span>
                                        <input type="text">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <section class="footer-credit">
                            <i>correctleg.com... largest online footwear marketplace in Africa</i>
                        </section>

                    </section>
                </section>

                <div class="print-btn-container mt-3">
                    <button class="btn btn-primary delivery-print-btn">PRINT <i class="fa fa-download"></i></button>
                </div>

                <!---=== DELIVERY RECEIPT END ===--->





            </div>
        </main>
        <!-- footer start -->
        <?php include 'footer.php'; ?>
        <!-- footer end -->
    </div>
    </div>




    <?php
    if (isset($_GET['item_deactivated'])) {
        echo "<div class='alert alert-danger' style='position:fixed;top:0px;right:10px;z-index:10000;'>
item <span class='alert-link'>successfully deactivated!</span>
</div>";
    }
    ?>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script> -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>

    <script>
        $(".print-btn").click(function() {
            var windowContent = document.getElementById("body").innerHTML;
            var receiptContent = document.getElementById("receipt-wrapper").innerHTML;

            document.body.innerHTML = receiptContent;
            window.print();
            document.body.innerHTML = windowContent;

        })


        $(".delivery-print-btn").click(function() {
            var windowContent = document.getElementById("body").innerHTML;
            var receiptContent = document.getElementById("delivery-receipt-wrapper").innerHTML;

            document.body.innerHTML = receiptContent;
            window.print();
            document.body.innerHTML = windowContent;

        })
    </script>
</body>

</html>