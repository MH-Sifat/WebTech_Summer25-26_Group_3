<?php

session_start();

$job_title = "";
$company = "";
$date_applied = "";
$status = "";

$valid = true;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $job_title = trim($_POST["job_title"] ?? "");
    $company = trim($_POST["company"] ?? "");
    $date_applied = trim($_POST["date_applied"] ?? "");
    $status = trim($_POST["status"] ?? "");


    if(!empty($job_title) && strlen($job_title)>=2 && strlen($job_title)<=100) {

        echo "Job Title: ".$job_title;
        echo "<br>";

    } else {

        echo "Job Title is required and must be between 2 and 100 characters.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($company) && strlen($company)>=2 && strlen($company)<=100) {

        echo "Company: ".$company;
        echo "<br>";

    } else {

        echo "Company name is required and must be between 2 and 100 characters.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($date_applied) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_applied)) {

        echo "Date Applied: ".$date_applied;
        echo "<br>";

    } else {

        echo "Date Applied must be a valid date.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($status) && preg_match('/^[a-zA-Z\s]+$/', $status)) {

        echo "Status: ".$status;
        echo "<br>";

    } else {

        echo "Status is required and must contain only letters and spaces.";
        echo "<br>";

        $valid = false;
    }


    if($valid) {

        $_SESSION['application_valid'] = true;

        $_SESSION['job_title'] = $job_title;
        $_SESSION['company'] = $company;
        $_SESSION['date_applied'] = $date_applied;
        $_SESSION['status'] = $status;

        $message = "Application data is valid!";

        echo $message;
    }
}
?>