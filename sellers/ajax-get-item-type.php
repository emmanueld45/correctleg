<?php
include '../dbconn.php';
include '../functions.php';


if (isset($_POST['itemOptions'])) {

    if ($_POST['itemOptions'] == "type") {

        $item_is_for = $_POST['item_is_for'];

        $sql = "SELECT * FROM footwear_type WHERE item_is_for='$item_is_for';";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $item_type = $row['item_type'];
            echo "<option>$item_type</option>";
        }
    }



    if ($_POST['itemOptions'] == "size") {
        $item_is_for = $_POST['item_is_for'];

        $sql = "SELECT * FROM footwear_size WHERE item_is_for='$item_is_for';";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $item_size = $row['item_size'];
            echo "<option>$item_size</option>";
        }
    }
}
