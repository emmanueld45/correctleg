<?php
session_start();

include '../classes/database.class.php';
include '../classes/admin.class.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PageProfit control panel</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login C-Panel</h3>
                                    <?php
                                    if (isset($_GET['incorrect_details'])) {
                                        echo "<div class='alert alert-danger'>Incorrect login details</div>";
                                    }

                                    ?>
                                </div>
                                <div class="card-body">

                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Username</label>
                                            <input class="form-control py-4" name="username" id="inputEmailAddress" type="text" placeholder="Enter username" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                        </div>

                                        <div style="display:flex;width:100%;justify-content:center;">
                                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                        </div>
                                        <!-- <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div> -->
                                        <!-- <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <a class="btn btn-primary" href="index.html">Login</a>
                                            </div> -->
                                    </form>
                                </div>
                                <!-- <div class="card-footer text-center">
                                    <div class="small">
                                        <a href="register.html">Need an account? Sign up!</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!-- <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid">
            <div
              class="d-flex align-items-center justify-content-between small"
            >
              <div class="text-muted">Copyright &copy; Your Website 2020</div>
              <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div> -->
    </div>








    <?php


    if (isset($_POST['submit'])) {

        $username = mysqli_real_escape_string($db->conn, $_POST['username']);
        $password = mysqli_real_escape_string($db->conn, $_POST['password']);

        $result = $db->setQuery("SELECT * FROM admins WHERE username='$username';");
        $numrows = mysqli_num_rows($result);


        if ($numrows != 0) {

            $row = mysqli_fetch_assoc($result);

            if (PASSWORD_VERIFY($password, $row['password'])) {


                $_SESSION['admin_id'] = $row['id'];
                $admin->goToPage("./", "login_success");
            } else {
                $admin->goToPage("login", "incorrect_details");
            }
        } else {
            $admin->goToPage("login", "incorrect_details");
        }
    }


    ?>









    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>