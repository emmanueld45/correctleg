<?php
session_start();

include '../dbconn.php';
include '../functions.php';

include '../classes/database.class.php';
include '../classes/admin.class.php';

if (isset($_POST['update_new_admin_orders'])) {
    $db->setQuery("UPDATE orders SET adminnew='no' WHERE adminnew='yes';");
}
