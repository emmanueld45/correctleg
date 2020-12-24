<?php
session_start();

include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/products.class.php';


if (!isset($_SESSION['admin_id'])) {
    $admin->goToPage("login", "invalid_admin");
}



$admin_id = $_SESSION['admin_id'];

$page_name = "Promotions";
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
                if (isset($_GET['promotion_created'])) {

                    echo "
                    <div class='alert alert-success'>promotion created successfully!</div>
                          ";
                }

                if (isset($_GET['promotion_edited'])) {

                    echo "
                    <div class='alert alert-success'>promotion  edited successfully!</div>
                          ";
                }




                if (isset($_GET['promotion_deleted'])) {

                    echo "
                    <div class='alert alert-danger alert-link'>promotion deleted!</div>
                          ";
                }

                ?>






















                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                <b> Create promotion </b>
                            </div>
                            <div class="card-body">

                                <?php
                                if (!isset($_GET['edit_promotion'])) {


                                ?>
                                    <div class="form-container" style="background-color:#1c294a;;padding:10px;color:white;">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" name="name" required>
                                            <br>

                                            <label for="">Image</label>
                                            <input type="file" class="form-control" name="image" required>
                                            <br>

                                            <label for="">Description</label>
                                            <textarea name="description" id="" class="form-control" required></textarea>
                                            <br>

                                            <label for="">Min discount(%)</label>
                                            <input type="text" class="form-control" name="min_discount" required>
                                            <br>

                                            <label for="">Max discount(%)</label>
                                            <input type="text" class="form-control" name="max_discount" required>
                                            <br>

                                            <label for="">Registration end</label>
                                            <input type="text" class="form-control" name="registration_end" required>
                                            <br>

                                            <label for="">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                            <br>

                                            <button type="submit" name="create_promotion" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar mr-1"></i>
                                <b>Edit Promotion</b>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_GET['edit_promotion'])) {
                                    $promotion_id = $_GET['promotion_id'];
                                ?>
                                    <div class="form-container" style="background-color:#1c294a;;padding:10px;color:white;">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" value="<?php echo $product->getPromotionDetail($promotion_id, "name"); ?>" name="name" required>
                                            <br>

                                            <label for="">Image</label>
                                            <input type="file" class="form-control" name="image" value="<?php echo $product->getPromotionDetail($promotion_id, "image"); ?>">
                                            <br>

                                            <label for="">Description</label>
                                            <textarea name="description" class="form-control" id="" required><?php echo $product->getPromotionDetail($promotion_id, "description"); ?></textarea>
                                            <br>

                                            <label for="">Min discount(%)</label>
                                            <input type="text" class="form-control" value="<?php echo $product->getPromotionDetail($promotion_id, "min_discount"); ?>" name="min_discount" required>
                                            <br>

                                            <label for="">Max discount(%)</label>
                                            <input type="text" class="form-control" name="max_discount" value="<?php echo $product->getPromotionDetail($promotion_id, "max_discount"); ?>" required>
                                            <br>

                                            <label for="">Registration end</label>
                                            <input type="text" class="form-control" name="registration_end" value="<?php echo $product->getPromotionDetail($promotion_id, "registration_end"); ?>" required>
                                            <br>

                                            <label for="">Status</label>
                                            <select name="status" id="" class="form-control">
                                                <option><?php echo $product->getPromotionDetail($promotion_id, "status"); ?></option>
                                                <option value="">---</option>
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                            <br>

                                            <input type="text" value="<?php echo $promotion_id; ?>" name="promotion_id" style="display:none;">

                                            <button type="submit" name="edit_promotion" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>









                <?php

                $result = $db->setQuery("SELECT * FROM promotions ORDER BY id DESC;");
                $numrows = mysqli_num_rows($result);
                $x = 0;

                ?>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        <?php echo $numrows; ?> Promotions
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>uniqueid</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Min Discount</th>
                                        <th>Max Discount</th>
                                        <th>Description</th>
                                        <th>Registration End</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    if ($numrows != 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $x++;
                                    ?>
                                            <tr>
                                                <td><?php echo $x; ?></td>
                                                <td><?php echo $row['uniqueid']; ?></td>
                                                <td><img src="../<?php echo $row['image']; ?>" style="width:100px;height:100px;"></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['min_discount']; ?></td>
                                                <td><?php echo $row['max_discount']; ?></td>
                                                <td><?php echo $product->shortenLength($row['description'], 30, "..."); ?></td>
                                                <td><?php echo $row['registration_end']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td><?php echo "<a href='promotions?delete_promotion=true&promotion_id=" . $row['uniqueid'] . "' class='btn btn-danger'>delete?</a>"; ?></td>
                                                <td><?php echo "<a href='promotions?edit_promotion=true&promotion_id=" . $row['uniqueid'] . "' class='btn btn-success'>edit?</a>"; ?></td>
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

                if (isset($_POST['create_promotion'])) {


                    $name = mysqli_real_escape_string($db->conn, $_POST['name']);
                    $description = mysqli_real_escape_string($db->conn, $_POST['description']);
                    $min_discount = mysqli_real_escape_string($db->conn, $_POST['min_discount']);
                    $max_discount = mysqli_real_escape_string($db->conn, $_POST['max_discount']);
                    $registration_end = mysqli_real_escape_string($db->conn, $_POST['registration_end']);
                    $status = mysqli_real_escape_string($db->conn, $_POST['status']);

                    $uniqueid = uniqid();

                    $filename = $_FILES['image']['name'];
                    if ($filename != "") {
                        $filetmpname = $_FILES['image']['tmp_name'];
                        $filedestination = "../promotion_images/" . $uniqueid . $filename;
                        $move = move_uploaded_file($filetmpname, $filedestination);
                        $image = "promotion_images/" . $uniqueid . $filename;
                    } else {
                        $image = "empty";
                    }


                    $result = $db->prepareStatement("INSERT INTO promotions (uniqueid, name, image, description, min_discount, max_discount, registration_end, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?);", array($uniqueid, $name, $image, $description, $min_discount, $max_discount, $registration_end, $status));
                    $admin->goToPage("promotions", "promotion_created");
                }







                if (isset($_POST['edit_promotion'])) {

                    $name = mysqli_real_escape_string($db->conn, $_POST['name']);
                    $description = mysqli_real_escape_string($db->conn, $_POST['description']);
                    $min_discount = mysqli_real_escape_string($db->conn, $_POST['min_discount']);
                    $max_discount = mysqli_real_escape_string($db->conn, $_POST['max_discount']);
                    $registration_end = mysqli_real_escape_string($db->conn, $_POST['registration_end']);
                    $status = mysqli_real_escape_string($db->conn, $_POST['status']);
                    $promotion_id = mysqli_real_escape_string($db->conn, $_POST['promotion_id']);

                    $uniqueid = uniqid();

                    $filename = $_FILES['image']['name'];
                    if ($filename != "") {
                        $filetmpname = $_FILES['image']['tmp_name'];
                        $filedestination = "../promotion_images/" . $uniqueid . $filename;
                        $move = move_uploaded_file($filetmpname, $filedestination);
                        $image = "promotion_images/" . $uniqueid . $filename;
                    } else {
                        $image = $product->getPromotionDetail($promotion_id, "image");
                    }


                    $result = $db->prepareStatement("UPDATE promotions SET name=?, image=?, description=?, min_discount=?, max_discount=?, registration_end=?, status=? WHERE uniqueid='$promotion_id';", array($name, $image, $description, $min_discount, $max_discount, $registration_end, $status));
                    $admin->goToPage("promotions", "promotion_edited");
                }

                if (isset($_GET['delete_promotion'])) {


                    $promotion_id = $_GET['promotion_id'];

                    $db->setQuery("DELETE FROM promotions WHERE uniqueid='$promotion_id';");

                    $db->setQuery("DELETE FROM promotion_products WHERE promotion_id='$promotion_id';");
                    $admin->goToPage("promotions", "promotion_deleted");
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