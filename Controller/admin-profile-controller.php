<?php
session_start();
$name="";
$email= "";
$phone= "";
$password= "";
$confirmPassword= "";
$valid = true;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $confirmPassword = trim($_POST["confirmPassword"] ?? "");

    if(!empty($name) && strlen($name) >= 2 && strlen($name) <= 100) {
        echo "Name: ".$name;
        echo "<br>";
    } else {
        echo "Name must be between 2 and 100 characters.\n";
        $valid = false;
    }

    if(!empty($email) && preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
        echo "Email: ".$email;
        echo "<br>";
    } else {
        echo "Email is not valid.\n";
        $valid = false;
    }

    if(!empty($phone) && preg_match('/^\+?[0-9]{7,15}$/', $phone)) {
        echo "Phone: ".$phone;
        echo "<br>";
    } else {
        echo "Phone number is not valid.\n";
        $valid = false;
    }
    if(!empty($password) && strlen($password) >= 6 && strlen($password) <= 50) {
        echo "Password: ".$password;
        echo "<br>";
    } else {
        echo "Password must be between 6 and 50 characters.\n";
        $valid = false;
    }

    if(!empty($confirmPassword) && strlen($confirmPassword) >= 6 && strlen($confirmPassword) <= 50) {
        echo "Confirm Password: ".$confirmPassword;
        echo "<br>";
    } else {
        echo "Confirm Password must be between 6 and 50 characters.\n";
        $valid = false;
    }

    if ($password !== '' && $confirmPassword !== '' && $password !== $confirmPassword) {
        echo "Passwords do not match.\n";
        $valid = false;
    }
    if($valid){
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['password'] = $password;
        $message = "Profile updated successfully!";
    }
}
