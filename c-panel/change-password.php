<?php
session_start();

include '../classes/database.class.php';
include '../classes/admin.class.php';

if (!isset($_SESSION['admin_id'])) {
    $admin->goToPage("login", "invalid_admin");
}



$admin_id = $_SESSION['admin_id'];

$page_name = "Admins";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $page_name; ?> - <?php echo $website_name; ?></title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
























    <?php include 'sidebar.php'; ?>



    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"><?php echo $page_name; ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?php echo $page_name; ?></li>
                </ol>


                <?php
                if (isset($_GET['password_changed'])) {

                    echo "
                    <div class='alert alert-success'>Password changed successfully!</div>
                          ";
                }


                if (isset($_GET['old_password_incorrect'])) {

                    echo "
                    <div class='alert alert-danger'>Old password is incorrect!</div>
                          ";
                }


                if (isset($_GET['passwords_do_not_match'])) {

                    echo "
                    <div class='alert alert-danger alert-link'>Passwords do not match!</div>
                          ";
                }

                ?>






















                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                <b> Change password </b>
                            </div>
                            <div class="card-body">

                                <div class="form-container" style="background-color:#1c294a;;padding:10px;color:white;">
                                    <form action="" method="POST">
                                        <label for="">Old password</label>
                                        <input type="password" class="form-control username" name="old_password" required>
                                        <br>

                                        <label for="">New password</label>
                                        <input type="password" class="form-control password" name="new_password" required>
                                        <br>

                                        <label for="">Repeat password</label>
                                        <input type="password" class="form-control password" name="repeat_password" required>
                                        <br>


                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                <b></b>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>









                <?php



                if (isset($_POST['submit'])) {

                    $old_password = mysqli_real_escape_string($db->conn, $_POST['old_password']);
                    $new_password = mysqli_real_escape_string($db->conn, $_POST['new_password']);
                    $repeat_password = mysqli_real_escape_string($db->conn, $_POST['repeat_password']);

                    if (PASSWORD_VERIFY($old_password, $admin->getAdminsDetail($admin_id, "password"))) {

                        if ($new_password == $repeat_password) {

                            $hashed = password_hash($new_password, PASSWORD_DEFAULT);
                            $admin->setAdminsDetail($admin_id, "password", $hashed);
                            $admin->goToPage("change-password", "password_changed");
                        } else {
                            $admin->goToPage("change-password", "passwords_do_not_match");
                        }
                    } else {
                        $admin->goToPage("change-password", "old_password_incorrect");
                    }
                }

















                ?>









            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your <?php echo $website_name; ?> 2020</div>
                    <div>
                        <!-- <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a> -->
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>