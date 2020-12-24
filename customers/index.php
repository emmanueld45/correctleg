
<?php
session_start();
include '../dbconn.php';
include '../functions.php';
include '../classes/admin.class.php';


if (!isset($_SESSION['id'])) {
    $admin->goToPage("login", "profile");
} else if (customer_is_logged_in($_SESSION['id'])) {
    $admin->goToPage("profile", "login_success");
} else {
    $admin->goToPage("login", "profile");
}
?>