<?php

session_start();

$username = "";
$email = "";
$role = "";
$user_status = "";
$job_title = "";
$employer = "";
$posted = "";
$job_status = "";

$valid = true;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $role = trim($_POST["role"] ?? "");
    $user_status = trim($_POST["user_status"] ?? "");
    $job_title = trim($_POST["job_title"] ?? "");
    $employer = trim($_POST["employer"] ?? "");
    $posted = trim($_POST["posted"] ?? "");
    $job_status = trim($_POST["job_status"] ?? "");


    if(!empty($username) && strlen($username)>=3 && strlen($username)<=50 && preg_match('/^[a-zA-Z0-9_]+$/', $username)) {

        echo "Username: ".$username;
        echo "<br>";

    } else {

        echo "Username must be valid, at least 3 characters long, and cannot exceed 50 characters.";
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


    if(!empty($role) && preg_match('/^[a-zA-Z\s]+$/', $role)) {

        echo "Role: ".$role;
        echo "<br>";

    } else {

        echo "Role is required";
        echo "<br>";

        $valid = false;
    }


    if(!empty($user_status) && preg_match('/^[a-zA-Z\s]+$/', $user_status)) {

        echo "User Status: ".$user_status;
        echo "<br>";

    } else {

        echo "User Status is required";
        echo "<br>";

        $valid = false;
    }


    if(!empty($job_title) && strlen($job_title)>=2 && strlen($job_title)<=100) {

        echo "Job Title: ".$job_title;
        echo "<br>";

    } else {

        echo "Job Title is required and must be between 2 and 100 characters.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($employer) && strlen($employer)>=2 && strlen($employer)<=100) {

        echo "Employer: ".$employer;
        echo "<br>";

    } else {

        echo "Employer is required and must be between 2 and 100 characters.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($posted) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $posted)) {

        echo "Posted: ".$posted;
        echo "<br>";

    } else {

        echo "Posted date must be a valid date.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($job_status) && preg_match('/^[a-zA-Z\s]+$/', $job_status)) {

        echo "Job Status: ".$job_status;
        echo "<br>";

    } else {

        echo "Job Status is required";
        echo "<br>";

        $valid = false;
    }


    if($valid) {

        $_SESSION['admin_management_valid'] = true;

        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        $_SESSION['user_status'] = $user_status;

        $_SESSION['job_title'] = $job_title;
        $_SESSION['employer'] = $employer;
        $_SESSION['posted'] = $posted;
        $_SESSION['job_status'] = $job_status;

        $message = "Admin management data is valid!";

        echo $message;
    }
}
?>