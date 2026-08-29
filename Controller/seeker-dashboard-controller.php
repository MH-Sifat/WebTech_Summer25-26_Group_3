<?php
session_start();

$name = "";
$email = "";
$profile_completion = "";
$total_applications = "";
$pending = "";
$shortlisted = "";
$rejected = "";

$valid = true;


if($_SERVER["REQUEST_METHOD"] == "POST") {
       
 $name = trim($_POST["name"] ?? "");
 $email = trim($_POST["email"] ?? "");
 $profile_completion = trim($_POST["profile_completion"] ?? "");
  $total_applications = trim($_POST["total_applications"] ?? "");
   $pending = trim($_POST["pending"] ?? "");
    $shortlisted = trim($_POST["shortlisted"] ?? "");
    $rejected = trim($_POST["rejected"] ?? "");


        if(!empty($name) && strlen($name)>=3 && strlen($name)<=50 && preg_match('/^[a-zA-Z\s]+$/', $name)) {

                      echo "Name: ".$name;
        echo "<br>";

        } else {

        echo "Name must be valid, at least 3 characters long, and cannot exceed 50 characters.";
        echo "<br>";

        $valid = false;
    }
     

    if(!empty($email) && preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {

        echo "E-mail: ".$email;
        echo "<br>";

    } else {

        echo "E-mail is not valid";
        echo "<br>";

        $valid = false;
    }

    if(!empty($profile_completion) && is_numeric($profile_completion) && $profile_completion >= 0 && $profile_completion <= 100) {

        echo "Profile Completion: ".$profile_completion."%";
        echo "<br>";

    } else {

        echo "Profile completion must be a number between 0 and 100.";
        echo "<br>";

        $valid = false;
    }
     if(!empty($total_applications) && is_numeric($total_applications) && $total_applications >= 0) {

        echo "Total Applications: ".$total_applications;
        echo "<br>";

    } else {

        echo "Total applications must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($pending) && is_numeric($pending) && $pending >= 0) {

        echo "Pending: ".$pending;
        echo "<br>";

    } else {

        echo "Pending applications must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($shortlisted) && is_numeric($shortlisted) && $shortlisted >= 0) {

        echo "Shortlisted: ".$shortlisted;
        echo "<br>";

    } else {

        echo "Shortlisted applications must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($rejected) && is_numeric($rejected) && $rejected >= 0) {

        echo "Rejected: ".$rejected;
        echo "<br>";

    } else {

        echo "Rejected applications must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if($valid) {

        $_SESSION['dashboard_valid'] = true;

        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['profile_completion'] = $profile_completion;
        $_SESSION['total_applications'] = $total_applications;
        $_SESSION['pending'] = $pending;
        $_SESSION['shortlisted'] = $shortlisted;
        $_SESSION['rejected'] = $rejected;

        $message = "Dashboard data is valid!";

        echo $message;
    }
}
?>

