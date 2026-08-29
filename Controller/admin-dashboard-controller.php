<?php
include "../Model/db.php";

session_start();

$total_users="";
$total_job_seekers="";
$total_employers="";
$total_jobs="";
$total_applications="";


$database = new db();
$connection = $database->connection();

  // total users
    $result = $connection->query("SELECT COUNT(*) FROM users");
    $total_users = $result->fetch_row()[0];
   // total users who are job_seeker
    $result = $connection->query("SELECT COUNT(*) FROM users WHERE user_type = 'job_seeker'");
    $total_job_seekers = $result->fetch_row()[0];
   // total users who are employer
    $result = $connection->query("SELECT COUNT(*) FROM users WHERE user_type = 'employer'");
    $total_employers = $result->fetch_row()[0];
   // total job
    $result = $connection->query("SELECT COUNT(*) FROM job_postings");
    $total_jobs = $result->fetch_row()[0];
   // total application
    $result = $connection->query("SELECT COUNT(*) FROM applications");
    $total_applications = $result->fetch_row()[0];

?>
