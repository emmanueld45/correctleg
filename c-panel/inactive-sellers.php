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

            .seller-img {
                width: 40px;
                height: 40px;
                border-radius: 40px;
            }





        }

        /** end of smaller screen **/















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .seller-img {
                width: 50px;
                height: 50px;
                border-radius: 50px;
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
                <h1 class="mt-4">Sellers</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>



                <!-- start of switch btns container -->
                <div class="switch-btns-container">
                    <a href='active-sellers.php' class="switch-btns" style="width:50%;">Active</a>
                    <a href='inactive-sellers.php' class="switch-btns active" style="width:50%;">In-active</a>
                </div>
                <!-- end of  btns container -->




                <?php
                $sql = "SELECT * FROM sellers WHERE status='inactive';";
                $result = mysqli_query($conn, $sql);
                $numrows = mysqli_num_rows($result);

                ?>


                <!-- table start -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-users mr-1"></i>Sellers
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Start date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($numrows != 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td><img src="<?php echo $row['image']; ?>" class="seller-img"></td>
                                                <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                                <td><a href="view-seller.php?seller_id=<?php echo $row['uniqueid']; ?>">view details</a></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phone']; ?></td>
                                                <td><?php echo $row['date'] . " " . $row['timeview']; ?></td>
                                                <td><a href="sellers-handler.php?activate_seller=true&seller_id=<?php echo $row['uniqueid']; ?>" class="btn btn-success">activate</a></td>


                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<div style='width:100%;'>
                                        <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'><i class='fa fa-user'></i></div>
                                        <div style='width:100%;padding:10px;text-align:center;font-size:60px;color:lightgrey'>No Inactive sellers yet!</div>
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
    if (isset($_GET['seller_activated'])) {
        echo "<div class='alert alert-success' style='position:fixed;top:0px;right:10px;z-index:10000;'>
seller <span class='alert-link'>successfully activated!</span>
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