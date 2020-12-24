<?php
session_start();
session_destroy();


include '../classes/database.class.php';
include '../classes/admin.class.php';


$admin->goToPage("login", "logout_success");
