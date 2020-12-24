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

            .item-img {
                width: 70px;
                height: 70px;
            }


        }

        /** end of smaller screen **/















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .item-img {
                width: 100px;
                height: 100px;
            }

        }

        /** end of bigger screen **/
    </style>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Control panel</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <?php
    include 'sidebar.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">OrderID: <?php echo $order_id; ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>







                <?php
                $sql = "SELECT * FROM orderproducts WHERE orderid='$order_id';";
                $result = mysqli_query($conn, $sql);
                $numrows = mysqli_num_rows($result);



                ?>


                <!-- table start -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-shopping-cart mr-1"></i>Ordered items
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>View</th>
                                        <th>Seller</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($numrows != 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $item_id = $row['productid'];

                                            $sql1 = "SELECT * FROM product WHERE uniqueid='$item_id';";
                                            $result1 = mysqli_query($conn, $sql1);
                                            $numrows1 = mysqli_num_rows($result1);
                                            $row1 = mysqli_fetch_assoc($result1);
                                    ?>
                                            <tr>
                                                <td><img src="../<?php echo $row1['image1']; ?>" class="item-img"></td>
                                                <td><?php echo $row1['name']; ?></td>
                                                <td><a href="view-item.php?item_id=<?php echo $item_id; ?>">View item</a></td>
                                                <td><a href="view-seller.php?seller_id=<?php echo $product->getDetail($item_id, "sellerid"); ?>">Visit seller</a></td>
                                                <td><?php echo $row['howmany']; ?></td>
                                                <td><?php echo "<span>&#8358</span>" . number_format($row['price']); ?></td>
                                                <td><?php echo "<span>&#8358</span>" . number_format($row['howmany'] * $row['price']); ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($row['status'] == "Active") {
                                                        echo "<a href='orders-handler.php?remove_item=true&item_id=$item_id&order_id=$order_id' class='btn btn-danger'>remove</a>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($row['status'] == "Active") {
                                                        echo "<a href='orders-handler?mark_as_settled=true&item_id=$item_id&order_id=$order_id' class='btn btn-success'>Settle?</a></td>";
                                                    } else {
                                                        echo "<a href='orders-handler?mark_as_active=true&item_id=$item_id&order_id=$order_id' class='btn btn-danger'>Undo?</a></td>";
                                                    }
                                                    ?>
                                                <td><a href="view-order-item-receipt?order_id=<?php echo $order_id; ?>&item_id=<?php echo $item_id; ?>" class="btn btn-info">Receipt </a></td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<div style='width:100%;'>
                                        <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-shopping-cart'></i></div>
                                        <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'>No Active items yet!</div>
                                        </div>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- table end -->


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

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>