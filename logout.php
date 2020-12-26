<?php
session_start();
session_unset();
session_destroy();


setcookie("email", "", time() - 7776000);

setcookie("password", "", time() - 7776000);

setcookie("customer_id", "", time() - 86400);


header('location: ./');
