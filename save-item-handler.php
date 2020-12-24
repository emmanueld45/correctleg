<?php
session_start();
include 'dbconn.php';
include 'functions.php';

if (isset($_POST['save_item'])) {

    $item_id = $_POST['item_id'];

    if (isset($_SESSION['id'])) {

        $sessionid = $_SESSION['id'];

        if (!customer_have_saved_item($sessionid, $item_id)) {
            save_item($sessionid, $item_id);
            echo "itemsaved";
        } else {
            echo "itemalreadysaved";
        }
    } else {
        echo "loginfirst";
    }
}
