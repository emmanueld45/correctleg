<?php
include '../classes/database.class.php';
include '../classes/products.class.php';


// $product->getStar(3, "<i class='fa fa-stars' style='color:orange;font-size:14px;'></i>");


/*** HOW TO SELECT DATA ***/
$id = "5";
$sql = "SELECT * FROM product WHERE id=?";
$stmt = mysqli_stmt_init($db->conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "Sql statement failed";
} else {
    //  Bind parameters to the place holder
    mysqli_stmt_bind_param($stmt, "s", $id);

    // run paramters inside database
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['name'];
    }
}
