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
    <title>CorrectLeg - Control</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <?php include 'sidebar.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <button style="width:50px;height:50px;border-radius:50px;background-color:rgba(0, 0, 0, 0.5);border:none;color:white;float:left;margin-right:10px;"><i class="fa fa-check-circle"></i></button>
                                <span style="position:relative;top:10px;">Active Balance</span><br>
                                <span style="position:relative;top:5px;font-size:20px;font-weight:600;"><span>&#8358</span><?php echo number_format(get_admin_detail("activebalance")); ?></span><br>

                            </div>
                            <!-- <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">
                                <button style="width:50px;height:50px;border-radius:50px;background-color:rgba(0, 0, 0, 0.5);border:none;color:white;float:left;margin-right:10px;"><i class="fa fa-clock"></i></button>
                                <span style="position:relative;top:10px;">Pending Balance</span><br>
                                <span style="position:relative;top:5px;font-size:20px;font-weight:600;"><span>&#8358</span><?php echo number_format(get_admin_detail("pendingbalance")); ?></span><br>

                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <button style="width:50px;height:50px;border-radius:50px;background-color:rgba(0, 0, 0, 0.5);border:none;color:white;float:left;margin-right:10px;"><i class="fa fa-envelope"></i></button>
                                <span style="position:relative;top:10px;">New Orders</span><br>
                                <span style="position:relative;top:5px;font-size:20px;font-weight:600;"><?php echo get_new_admin_orders(); ?></span><br>

                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Danger Card</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div> -->
                </div>


                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                <b> Active balance </b>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_GET['active_balance_updated'])) {
                                    echo "<div class='alert alert-success alert-link'>Admin details updated <i class='fa fa-check'></i></div>";
                                }
                                ?>
                                <div class="form-container" style="background-color:#1c294a;;padding:10px;color:white;">
                                    <form action="" method="POST" onsubmit="return validateAdminForm()">
                                        <label for="">Amount</label>
                                        <input type="tel" class="form-control admin-amount" name="amount" required>
                                        <br>
                                        <label for="">Operation</label>
                                        <select name="operation" class="form-control admin-operation" id="">
                                            <option value="add">Add</option>
                                            <option value="subtract">Subtract</option>
                                        </select>
                                        <br>
                                        <button type="submit" name="update_active_balance" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                <!-- <b>Users</b> -->
                            </div>
                            <!-- <div class="card-body">
                                <div class="form-container" style="background-color:#1c294a;;padding:10px;color:white;">
                                    <?php
                                    if (isset($_GET['users_details_updated'])) {
                                        echo "<div class='alert alert-success alert-link'>Users details updated <i class='fa fa-check'></i></div>";
                                    }
                                    ?>
                                    <form action="" method="POST" onsubmit="return validateUsersForm()">
                                        <label for="">Amount</label>
                                        <input type="text" class="form-control users-amount" name="amount">
                                        <br>
                                        <label for="">Operation</label>
                                        <select name="operation" class="form-control users-operation" id="">
                                            <option value="add">Add</option>
                                            <option value="subtract">Subtract</option>
                                        </select>
                                        <br>
                                        <button type="submit" name="update_users" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>



            </div>
        </main>




        <?php

        if (isset($_POST['update_active_balance'])) {

            $amount = mysqli_real_escape_string($db->conn, $_POST['amount']);
            $operation = mysqli_real_escape_string($db->conn, $_POST['operation']);

            if ($operation == "add") {
                $op = "+";
            } else {
                $op = "-";
            }

            $admin->updateAdminDetail("activebalance", $amount, $op);
            $admin->goToPage("./", "active_balance_updated");
        }





        // if (isset($_POST['update_pending_balance'])) {

        //     $amount = mysqli_real_escape_string($db->conn, $_POST['amount']);
        //     $operation = mysqli_real_escape_string($db->conn, $_POST['operation']);

        //     if ($operation == "add") {
        //         $op = "+";
        //     } else {
        //         $op = "-";
        //     }

        //     $admin->updateAdminDetail("pendingbalance", $amount, $op);
        //     $admin->goToPage("./", "pending_balance_updated");
        // }

        ?>




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




    <script>
        setTimeout(function() {

            var set_old_orders = "yes";
            $.ajax({
                url: "ajax-orders-handler.php",
                method: "POST",
                async: false,
                data: {
                    set_old_orders: set_old_orders,

                },
                success: function(data) {
                    //  alert("sent")
                }
            });

        }, 3000);
    </script>
</body>

</html>