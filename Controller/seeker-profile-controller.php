<?php
session_start();
$name="";
$email= "";
$phone= "";
$education= "";
$skills= "";
$experience= "";
$password= "";
$valid = true;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=trim($_POST["name"] ?? "");
    $email=trim($_POST["email"] ?? "");
    $phone=trim($_POST["phone"] ?? "");
    $education=trim($_POST["education"] ?? "");
    $skills=trim($_POST["skills"] ?? "");
    $experience=trim($_POST["experience"] ?? "");
    $password=trim($_POST["password"] ?? "");

    if(!empty($name) && strlen($name)>=3 && strlen($name)<=50 && preg_match('/^[a-zA-Z\s]+$/', $name)) {
        echo "Name: ".$name;
        echo "<br>";
    } else {
        echo "Name must be valid, at least 3 characters long, and cannot exceed 50 characters.\n";
        $valid = false;
    }
    if(!empty($email) && preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
        echo "E-mail: ".$email;
        echo "<br>";
    } else {
       echo "E-mail is not valid\n";
       $valid = false;
    }
    if(!empty($phone) && preg_match('/^\d{11}$/', $phone)) {
        echo "Phone: ".$phone;
        echo "<br>";
    } else {
       echo "Phone number must be a valid 11-digit number\n";
       $valid = false;
    }
    if(!empty($education)) {
        echo "Education: ".$education;
        echo "<br>";
    } else {
       echo "Education is required\n";
       $valid = false;
    }
    if(!empty($skills)) {
        echo "Skills: ".$skills;
        echo "<br>";
    } else {
       echo "Skills are required\n";
       $valid = false;
    }
    if(!empty($experience)) {
        echo "Experience: ".$experience;
        echo "<br>";
    } else {
       echo "Experience is required\n";
       $valid = false;
    }
    if(!empty($password) && strlen($password)>=6) {
        echo "Password: ".$password;
        echo "<br>";
    } else {
       echo "Password must be at least 6 characters long\n";
       $valid = false;
    }
    if($valid) {
        $_SESSION['profile_updated'] = true;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['education'] = $education;
        $_SESSION['skills'] = $skills;
        $_SESSION['experience'] = $experience;
        $_SESSION['password'] = $password;
        $message = "Profile updated successfully!";
    }
}