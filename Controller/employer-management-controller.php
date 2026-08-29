<?php
session_start();
$title="";
$location= "";
$jobType= "";
$salary= "";
$description= "";
$requirements= "";
$deadline= "";
$valid = true;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"] ?? "");
    $location = trim($_POST["location"] ?? "");
    $jobType = trim($_POST["jobType"] ?? "");
    $salary = trim($_POST["salary"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $requirements = trim($_POST["requirements"] ?? "");
    $deadline = trim($_POST["deadline"] ?? "");
    if(!empty($title) && strlen($title) >= 2 && strlen($title) <= 100) {
        echo "Job Title: ".$title;
        echo "<br>";
    } else {
        echo "Job Title must be between 2 and 100 characters.\n";
        $valid = false;
    }
    if(!empty($location) && strlen($location) >= 2 && strlen($location) <= 100) {
        echo "Location: ".$location;
        echo "<br>";
    } else {
       echo "Location must be between 2 and 100 characters.\n";
       $valid = false;
    }
    if(!empty($jobType)) {
        echo "Job Type: ".$jobType;
        echo "<br>";
    } else {
       echo "Job Type is required\n";
       $valid = false;
    }
    if(!empty($salary) && strlen($salary) >= 1 && strlen($salary) <= 20 && preg_match('/^\d+(\.\d{1,2})?$/', $salary)) {
        echo "Salary: ".$salary;
        echo "<br>";
    } else {
       echo "Salary must be a valid number between 1 and 20 characters.\n";
       $valid = false;
    }
    if(!empty($description) && strlen($description) >= 10 && strlen($description) <= 1000) {
        echo "Description: ".$description;
        echo "<br>";
    } else {
        echo "Description must be between 10 and 1000 characters.\n";
        $valid = false;
    }
    if(!empty($requirements) && strlen($requirements) >= 10 && strlen($requirements) <= 1000) {
        echo "Requirements: ".$requirements;
        echo "<br>";
    } else {
        echo "Requirements must be between 10 and 1000 characters.\n";
        $valid = false;
    }
    if(!empty($deadline) && preg_match('/^\d{4}-\d{2}-\d{2}$/', $deadline)) {
        echo "Deadline: ".$deadline;
        echo "<br>";
    } else {
        echo "Deadline is required and must be in YYYY-MM-DD format.\n";
        $valid = false;
    }
    if($valid) {
        
    }
}