<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';


if (!isset($_SESSION['admin_id'])) {
    $admin->goToPage("login", "invalid_admin");
}



$admin_id = $_SESSION['admin_id'];

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
                <h1 class="mt-4">Orders</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>



                <!-- start of switch btns container -->
                <div class="switch-btns-container">
                    <a href="active-orders.php" class="switch-btns" style="width:30%;">Active</a>
                    <a href="settled-orders.php" class="switch-btns" style="width:30%;">Settled</a>
                    <a href="cancelled-orders.php" class="switch-btns active" style="width:30%;">Cancelled</a>
                </div>
                <!-- end of  btns container -->





                <?php
                $sql = "SELECT * FROM orders WHERE status='Cancelled';";
                $result = mysqli_query($conn, $sql);
                $numrows = mysqli_num_rows($result);

                ?>


                <!-- table start -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-envelope mr-1"></i>Cancelled Orders
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>OrderID</th>
                                        <th>View customer</th>
                                        <th>View items</th>
                                        <th>Delivery Method</th>
                                        <th>Payment Method</th>
                                        <th>Coupon Amount</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($numrows != 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $row['orderid']; ?></td>
                                                <td><a href="view-customer.php?customer_id=<?php echo $row['customerid']; ?>">View customer</a></td>
                                                <td><a href="view-order-item.php?order_id=<?php echo $row['orderid']; ?>">View items</a></td>
                                                <td><?php echo $row['deliverymethod']; ?></td>
                                                <td><?php echo $row['paymentmethod']; ?></td>
                                                <td><span>&#8358</span><?php echo $row['coupon_amount']; ?></td>
                                                <td><span>&#8358</span><?php echo $row['total_amount']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td><?php echo $row['date'] . ", " . $row['timeview'] . ", " . $db->format_time($row['time']); ?></td>
                                                <td>
                                                    <form action="orders-handler.php" method="GET">
                                                        <select class="form-control" name="action" style="display:inline-block;">
                                                            <option value="Activate">Activate order</option>
                                                            <option value="Settle">Settle order</option>


                                                        </select>
                                                        <input type="text" name="order_id" value="<?php echo $row['orderid']; ?>" style="display:none;">
                                                        <button class="btn btn-success" style="display:inline-block">Apply</button>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<div style='width:100%;'>
                                        <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-envelope'></i></div>
                                        <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'>No Cancelled Orders yet!</div>
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