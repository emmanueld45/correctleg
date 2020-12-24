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
                <h1 class="mt-4">Retail items</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>



                <!-- start of switch btns container -->
                <div class="switch-btns-container">
                    <a href="active-retail-items.php" class="switch-btns" style="width:50%;">Active</a>
                    <a href="inactive-retail-items.php" class="switch-btns active" style="width:50%;">In-active</a>
                </div>
                <!-- end of  btns container -->



                <?php
                $sql = "SELECT * FROM product WHERE status='inactive';";
                $result = mysqli_query($conn, $sql);
                $numrows = mysqli_num_rows($result);

                ?>


                <!-- table start -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-shopping-cart mr-1"></i>Retail items
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
                                        <th>For</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($numrows != 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><img src="../<?php echo $row['image1']; ?>" class="item-img"></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><a href="view-item.php?item_id=<?php echo $row['uniqueid']; ?>">View item</a></td>
                                                <td><a href="view-seller.php?seller_id=<?php echo get_item_seller_id($row['uniqueid']); ?>">Visit seller</a></td>
                                                <td><?php echo $row['itemisfor']; ?></td>
                                                <td><?php echo "<span>&#8358</span>" . number_format($row['price']); ?></td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><a href="retail-items-handler.php?activate_item=true&item_id=<?php echo $row['uniqueid']; ?>" class="btn btn-success">Activate</a></td>

                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<div style='width:100%;'>
                                        <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-shopping-cart'></i></div>
                                        <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'>No In-Active items yet!</div>
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
    if (isset($_GET['item_activated'])) {
        echo "<div class='alert alert-success' style='position:fixed;top:0px;right:10px;z-index:10000;'>
item <span class='alert-link'>successfully activated!</span>
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