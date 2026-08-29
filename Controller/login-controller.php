<?php
session_start();
$email = "";
$password = "";
$remember = "";
$valid = true;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $remember = isset($_POST["remember"]);

    if(!empty($email) && preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
        echo "E-mail: ".$email;
        echo "<br>";
    } else {
        echo "E-mail is not valid";
        echo "<br>";
        $valid = false;
    }

    if(!empty($password) && strlen($password)>=6) {
        echo "Password is valid";
        echo "<br>";
    } else {
        echo "Password must be at least 6 characters long";
        echo "<br>";
        $valid = false;
    }

    if($valid) {
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email;
        if($remember) {
            $_SESSION['remember'] = true;
        } else {
            $_SESSION['remember'] = false;
        }
        $message = "Login successful!";
        echo $message;
    }
}
?>
 