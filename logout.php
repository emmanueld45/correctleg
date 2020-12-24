<?php
session_start();
session_unset();
session_destroy();


setcookie("email", $email, time() - 7776000);


setcookie("password", $password, time() - 7776000);

header('location: ./');
