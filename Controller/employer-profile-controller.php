<?php
session_start();
$companyName="";
$email= "";
$phone= "";
$website= "";
$industry= "";
$description= "";
$password= "";
$valid = true;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = trim($_POST["companyName"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $website = trim($_POST["website"] ?? "");
    $industry = trim($_POST["industry"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $password = trim($_POST["password"] ?? "");
    if(!empty($companyName) && strlen($companyName) >= 2 && strlen($companyName) <= 100) {
        echo "Company Name: ".$companyName;
        echo "<br>";
    } else {
        echo "Company Name must be between 2 and 100 characters.\n";
        $valid = false;
    }
    if(!empty($email) && preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
        echo "Company Email: ".$email;
        echo "<br>";
    } else {
       echo "Company Email is not valid\n";
       $valid = false;
    }
    if(!empty($phone) && preg_match('/^\+?[0-9]{7,15}$/', $phone)) {
        echo "Phone: ".$phone;
        echo "<br>";
    } else {
       echo "Phone number is not valid\n";
       $valid = false;
    }
    if(!empty($website) && preg_match('/^(https?:\/\/)?([\w-]+(\.[\w-]+)+)(\/[\w-]*)*(\?.*)?(#.*)?$/', $website)) {
        echo "Website: ".$website;
        echo "<br>";
    } else {
       echo "Website URL is not valid\n";
       $valid = false;
    }
    if(!empty($industry) && strlen($industry) >= 2 && strlen($industry) <= 50) {
        echo "Industry: ".$industry;
        echo "<br>";
    } else {
       echo "Industry must be between 2 and 50 characters.\n";
       $valid = false;
    }
    if(!empty($description) && strlen($description) >= 10 && strlen($description) <= 200) {
        echo "Company Description: ".$description;
        echo "<br>";
    } else {
       echo "Company Description must be between 10 and 200 characters.\n";
       $valid = false;
    }
    if(!empty($password) && strlen($password) >= 6) {
        echo "Password: ".$password;
        echo "<br>";
    } else {
       echo "Password must be at least 6 characters long.\n";
       $valid = false;
    }
    if($valid) {
        $_SESSION['companyName'] = $companyName;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['website'] = $website;
        $_SESSION['industry'] = $industry;
        $_SESSION['description'] = $description;
        $_SESSION['password'] = $password;
        $message = "Profile updated successfully!";
    }
}