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
                if (isset($_GET['admin_created'])) {

                    echo "
                    <div class='alert alert-success'>Admin added successfully!</div>
                          ";
                }


                if (isset($_GET['admin_made_super'])) {

                    echo "
                    <div class='alert alert-success'>Admin successfully made super!</div>
                          ";
                }


                if (isset($_GET['admin_deleted'])) {

                    echo "
                    <div class='alert alert-danger alert-link'>Admin deleted!</div>
                          ";
                }

                ?>






















                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                <b> Create admin </b>
                            </div>
                            <div class="card-body">

                                <div class="form-container" style="background-color:#1c294a;;padding:10px;color:white;">
                                    <form action="" method="POST">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control username" name="username" required>
                                        <br>

                                        <label for="">Password</label>
                                        <input type="text" class="form-control password" name="password" required>
                                        <br>

                                        <label for="">Make super admin?</label>
                                        <select class="form-control" name="is_super_admin">
                                            <option>no</option>
                                            <option>yes</option>
                                        </select>
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

                $result = $db->setQuery("SELECT * FROM admins WHERE is_super_admin='no';");
                $numrows = mysqli_num_rows($result);
                $x = 0;

                ?>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        <?php echo $numrows; ?> Categories
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    if ($numrows != 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $x++;
                                    ?>
                                            <tr>
                                                <td><?php echo $x; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo "<a href='admins.php?delete_admin=true&id=" . $row['id'] . "' class='btn btn-danger'>delete?</a>"; ?></td>
                                                <td><?php echo "<a href='admins.php?make_super_admin=true&id=" . $row['id'] . "' class='btn btn-success'>make super?</a>"; ?></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>















                <?php

                if (isset($_POST['submit'])) {


                    $username = mysqli_real_escape_string($db->conn, $_POST['username']);
                    $password = mysqli_real_escape_string($db->conn, $_POST['password']);
                    $is_super_admin = mysqli_real_escape_string($db->conn, $_POST['is_super_admin']);

                    $admin->createAdmin($username, $password, $is_super_admin);

                    $admin->goToPage("admins", "admin_created");
                }


                if (isset($_GET['delete_admin'])) {


                    $id = $_GET['id'];

                    $db->setQuery("DELETE FROM admins WHERE id='$id';");
                    $admin->goToPage("admins", "admin_deleted");
                }



                if (isset($_GET['make_super_admin'])) {


                    $id = $_GET['id'];

                    $admin->setAdminsDetail($id, "is_super_admin", "yes");
                    $admin->goToPage("admins", "admin_made_super");
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