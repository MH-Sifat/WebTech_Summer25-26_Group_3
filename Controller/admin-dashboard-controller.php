<?php

session_start();

$total_users = "";
$total_job_seekers = "";
$total_employers = "";
$total_jobs = "";
$total_applications = "";

$valid = true;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $total_users = trim($_POST["total_users"] ?? "");
    $total_job_seekers = trim($_POST["total_job_seekers"] ?? "");
    $total_employers = trim($_POST["total_employers"] ?? "");
    $total_jobs = trim($_POST["total_jobs"] ?? "");
    $total_applications = trim($_POST["total_applications"] ?? "");


    if(!empty($total_users) && is_numeric($total_users) && $total_users >= 0) {

        echo "Total Users: ".$total_users;
        echo "<br>";

    } else {

        echo "Total Users must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($total_job_seekers) && is_numeric($total_job_seekers) && $total_job_seekers >= 0) {

        echo "Total Job Seekers: ".$total_job_seekers;
        echo "<br>";

    } else {

        echo "Total Job Seekers must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($total_employers) && is_numeric($total_employers) && $total_employers >= 0) {

        echo "Total Employers: ".$total_employers;
        echo "<br>";

    } else {

        echo "Total Employers must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($total_jobs) && is_numeric($total_jobs) && $total_jobs >= 0) {

        echo "Total Jobs: ".$total_jobs;
        echo "<br>";

    } else {

        echo "Total Jobs must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($total_applications) && is_numeric($total_applications) && $total_applications >= 0) {

        echo "Total Applications: ".$total_applications;
        echo "<br>";

    } else {

        echo "Total Applications must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if($valid) {

        $_SESSION['admin_dashboard_valid'] = true;

        $_SESSION['total_users'] = $total_users;
        $_SESSION['total_job_seekers'] = $total_job_seekers;
        $_SESSION['total_employers'] = $total_employers;
        $_SESSION['total_jobs'] = $total_jobs;
        $_SESSION['total_applications'] = $total_applications;

        $message = "Admin dashboard data is valid!";

        echo $message;
    }
}
?>
