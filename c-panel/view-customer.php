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


$customer_id = $_GET['customer_id'];
$image = "customerimages/defaultimage.png";

if ($customer_id != "Unknown") {
    $firstname = get_customer_detail($customer_id, "firstname");
    $lastname = get_customer_detail($customer_id, "lastname");
    $email = get_customer_detail($customer_id, "email");
    $phone = get_customer_detail($customer_id, "phone");
}
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


            .details-container {
                width: 50%;
                margin: auto;
                border: 1px solid lightgrey;
                padding: 10px;
            }

            .image {
                width: 100px;
                height: 100px;
                border-radius: 100px;
            }

            label {
                font-weight: 600;
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
                <h1 class="mt-4">Customer details</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>



                <!-- details container start -->
                <div class="details-container">

                    <div style="width:100%;display:flex;justify-content:center;">
                        <img src="../<?php echo $image; ?>" class="image">
                    </div>

                    <!-- personal details start -->
                    <div class="card" style="margin-top:10px;">
                        <div class="card-header" style="font-weight:600;">PERSONAL DETAILS</div>
                        <div class="card-body">
                            <?php
                            if ($customer_id == "Unknown") {
                                echo "UNKNOWN CUSTOMER";
                            } else {
                            ?>
                                <label>Name: </label>
                                <p><?php echo $firstname . " " . $lastname; ?></p>

                                <label>Phone: </label>
                                <p><?php echo $phone; ?></p>

                                <label>Email: </label>
                                <p><?php echo $email; ?></p>


                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-- personal details end -->








                    <!-- order details start -->
                    <div class="card" style="margin-top:20px;">
                        <div class="card-header" style="font-weight:600;">ORDER DETAILS</div>
                        <div class="card-body">

                            <label>Name: </label>
                            <p><?php echo $firstname . " " . $lastname; ?></p>

                            <label>Phone: </label>
                            <p><?php echo $phone; ?></p>

                            <label>Email: </label>
                            <p><?php echo $email; ?></p>



                        </div>
                    </div>
                    <!-- order details end -->





                </div>
                <!-- details container end -->


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