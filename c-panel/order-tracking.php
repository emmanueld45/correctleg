<?php
session_start();
include '../dbconn.php';
include '../functions.php';

$orderid = $_GET['orderid'];

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



            .send-message-container {
                width: 100%;
                margin: auto;
                margin-bottom: 40px;
                padding: 10px;
                background-color: #eee;
            }



            .tracking-messages-container {
                width: 100%;
                margin: auto;
            }

            .tracking-messages-box {
                padding: 10px;
                border: 1px solid lightgrey;
                margin-bottom: 20px;
            }

            .tracking-messages-box .time {
                color: grey;
                display: block;
            }


        }

        /** end of smaller screen **/















































        /** start of bigger screen*/
        @media only screen and (min-width: 690px) {
            .mobile-view-container {
                display: none;
            }

            .send-message-container {
                width: 500px;
                margin: auto;
                margin-bottom: 40px;
                padding: 10px;
                background-color: #eee;
            }



            .tracking-messages-container {
                width: 500px;
                margin: auto;
            }

            .tracking-messages-box {
                padding: 10px;
                border: 1px solid lightgrey;
                margin-bottom: 20px;
            }

            .tracking-messages-box .time {
                color: grey;
                display: block;
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
                <h1 class="mt-4">Order Tracking</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">OrderID: <?php echo $orderid; ?></li>
                </ol>




                <div class="send-message-container">

                    <?php
                    if (isset($_GET['message_sent'])) {
                        echo "<div class='alert alert-success' style='font-weight:bold;'> Message update has been sent! <i class='fa fa-check'></i></div>";
                    }

                    if (isset($_GET['message_not_sent'])) {
                        echo "<div class='alert alert-danger' style='font-weight:bold;'> Error! message not sent, try again</div>";
                    }

                    if (isset($_GET['message_removed'])) {
                        echo "<div class='alert alert-success' style='font-weight:bold;'> Message removed successfully! <i class='fa fa-check'></i></div>";
                    }

                    if (isset($_GET['message_not_removed'])) {
                        echo "<div class='alert alert-danger' style='font-weight:bold;'> Error! message was not removed, try again</div>";
                    }
                    ?>

                    <form action="" method="POST">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="">

                        <label for="content">Content</label>
                        <textarea name="content" id="" class="form-control"></textarea>
                        <br>
                        <button type="submit" name="submit" class="btn btn-success">Send update</button>
                    </form>
                </div>




                <div class="tracking-messages-container">


                    <?php
                    $sql = "SELECT * FROM order_tracking_details WHERE orderid='$orderid' ORDER BY id DESC;";
                    $result = mysqli_query($conn, $sql);
                    $numrows = mysqli_num_rows($result);

                    if ($numrows != 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <div class="tracking-messages-box">
                                <h4><?php echo $row['title']; ?></h4>
                                <span class="time"><?php echo $row['timeview'] . ", " . $row['date']; ?></span>
                                <div><?php echo $row['content']; ?></div>
                                <br>
                                <a href="order-tracking.php?remove_message=true&messageid=<?php echo $row['id']; ?>&orderid=<?php echo $orderid; ?>" class="btn btn-danger">remove</a>

                            </div>
                    <?php
                        }
                    } else {
                        echo "No tracking update has been sent yet!";
                    }
                    ?>



                </div>







            </div>
        </main>
        <!-- footer start -->
        <?php include 'footer.php'; ?>
        <!-- footer end -->
    </div>
    </div>










    <?php


    if (isset($_POST['submit'])) {

        $title = $_POST['title'];

        $content = $_POST['content'];

        $status = 0;
        $time = time();
        $date = date("d-m-y");
        $a = date("h");
        $b = $a - 1;
        $c = date("i A");
        $timeview = $b . ":" . $c;
        $new = "yes";

        $sql = "INSERT INTO order_tracking_details (orderid, title, content, time, date, status, new, timeview) VALUES ('$orderid', '$title', '$content', '$time', '$date', '$status', '$new', '$timeview');";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
          window.location.href="order-tracking.php?orderid=' . $orderid . '&message_sent=true";
          </script>';
        } else {
            echo '<script>
            window.location.href="order-tracking.php?orderid=' . $orderid . '&message_not_sent=true";
            </script>';
        }
    }





    if (isset($_GET['remove_message'])) {
        $messageid = $_GET['messageid'];
        $orderid = $_GET['orderid'];

        $sql = "DELETE FROM order_tracking_details WHERE id='$messageid';";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
            window.location.href="order-tracking.php?orderid=' . $orderid . '&message_removed=true";
            </script>';
        } else {
            echo '<script>
            window.location.href="order-tracking.php?orderid=' . $orderid . '&message_not_removed=true";
            </script>';
        }
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