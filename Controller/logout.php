<?php

session_start();
$_SESSION = array();

session_destroy();

if (isset($_COOKIE["remember_user"])) {
    setcookie("remember_user", "", time() - 3600, "/");
}

header("Location: ../View/login 2.php");
exit();
?>