<?php
session_start();
include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';
include '../classes/sellers.class.php';
include '../classes/products.class.php';



if (isset($_GET['mark_settled'])) {

    $withdrawal_id = $_GET['withdrawal_id'];
    $seller_id = $_GET['seller_id'];
    $amount = $_GET['amount'];

    $sql = "UPDATE withdrawals SET status='settled' WHERE id='$withdrawal_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        //remove_from_seller_active_balance($seller_id, $amount);

        $seller->updateDetail($seller_id, "pendingwithdrawals", $amount, "-");
        echo '<script>
        window.location.href="settled-withdrawals.php?withdrawal_settled=true";
        </script>';
    } else {
        echo '<script>
        window.location.href="pending-withdrawals.php?withdrawal_not_settled=true";
        </script>';
    }
}















if (isset($_GET['mark_pending'])) {

    $withdrawal_id = $_GET['withdrawal_id'];
    $seller_id = $_GET['seller_id'];
    $amount = $_GET['amount'];

    $sql = "UPDATE withdrawals SET status='pending' WHERE id='$withdrawal_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {

        $seller->updateDetail($seller_id, "pendingwithdrawals", $amount, "+");
        echo '<script>
        window.location.href="pending-withdrawals.php?withdrawal_pending=true";
        </script>';
    } else {
        echo '<script>
        window.location.href="settled-withdrawals.php?withdrawal_not_pending=true";
        </script>';
    }
}
