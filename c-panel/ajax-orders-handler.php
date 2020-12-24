<?php
include '../dbconn.php';
include '../functions.php';


if (isset($_POST['set_old_orders'])) {
    set_admin_new_orders_to_old();
}
