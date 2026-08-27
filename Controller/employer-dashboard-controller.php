<?php

session_start();

$company_name = "";
$industry = "";
$email = "";
$active_jobs = "";
$total_applicants = "";
$jobs_expiring_soon = "";

$valid = true;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $company_name = trim($_POST["company_name"] ?? "");
    $industry = trim($_POST["industry"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $active_jobs = trim($_POST["active_jobs"] ?? "");
    $total_applicants = trim($_POST["total_applicants"] ?? "");
    $jobs_expiring_soon = trim($_POST["jobs_expiring_soon"] ?? "");


    if(!empty($company_name) && strlen($company_name)>=3 && strlen($company_name)<=100 && preg_match('/^[a-zA-Z0-9\s&.,-]+$/', $company_name)) {

        echo "Company Name: ".$company_name;
        echo "<br>";

    } else {

        echo "Company Name must be valid, at least 3 characters long, and cannot exceed 100 characters.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($industry) && strlen($industry)>=2 && strlen($industry)<=50 && preg_match('/^[a-zA-Z\s&-]+$/', $industry)) {

        echo "Industry: ".$industry;
        echo "<br>";

    } else {

        echo "Industry is not valid";
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


    if(!empty($active_jobs) && is_numeric($active_jobs) && $active_jobs >= 0) {

        echo "Active Jobs: ".$active_jobs;
        echo "<br>";

    } else {

        echo "Active Jobs must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($total_applicants) && is_numeric($total_applicants) && $total_applicants >= 0) {

        echo "Total Applicants: ".$total_applicants;
        echo "<br>";

    } else {

        echo "Total Applicants must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if(!empty($jobs_expiring_soon) && is_numeric($jobs_expiring_soon) && $jobs_expiring_soon >= 0) {

        echo "Jobs Expiring Soon: ".$jobs_expiring_soon;
        echo "<br>";

    } else {

        echo "Jobs Expiring Soon must be a valid number.";
        echo "<br>";

        $valid = false;
    }


    if($valid) {

        $_SESSION['dashboard_valid'] = true;

        $_SESSION['company_name'] = $company_name;
        $_SESSION['industry'] = $industry;
        $_SESSION['email'] = $email;
        $_SESSION['active_jobs'] = $active_jobs;
        $_SESSION['total_applicants'] = $total_applicants;
        $_SESSION['jobs_expiring_soon'] = $jobs_expiring_soon;

        $message = "Employer dashboard data is valid!";

        echo $message;
    }
}
?>