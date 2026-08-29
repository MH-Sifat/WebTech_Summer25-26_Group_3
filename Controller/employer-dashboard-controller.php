<?php

include "../Model/db.php";

session_start();


$database = new db();
$connection = $database->connection();

// employer ID 
$employer_id = $_SESSION['id'] ?? 0;

// company information
$sql = "SELECT company_name, industry, email FROM users WHERE id = $employer_id AND user_type = 'employer'";
$result = $connection->query($sql);
$employer_data = $result->fetch_assoc();

// active jobs 
$sql_active = "SELECT COUNT(*) FROM job_postings WHERE employer_id = $employer_id AND status = 'open'";
$result_active = $connection->query($sql_active);
$active_jobs = $result_active->fetch_row()[0];

// Get total applicants for this employer's jobs
$sql_applicants = "SELECT COUNT(*) FROM applications a JOIN job_postings j ON a.job_id = j.id WHERE j.employer_id = $employer_id";
$result_applicants = $connection->query($sql_applicants);
$total_applicants = $result_applicants->fetch_row()[0];

?>