<?php

$database = new db();
$connection = $database->connection();

$employer_id = $_SESSION['id'] ?? 0;

$sql_jobs = "SELECT id, title, location, job_type, salary, status, created_at FROM job_postings WHERE employer_id = $employer_id ORDER BY created_at DESC";
$jobs_result = $connection->query($sql_jobs);
$total_jobs = $jobs_result->num_rows;

// all job posted by specific employer
if ($total_jobs > 0) {
    while ($job = $jobs_result->fetch_assoc()) {
        echo "<span style='color:blue;font-weight:bold'>Job Title: </span>" . $job['title'] . "<br>";
        echo "<span style='color:blue;font-weight:bold'>Location: </span>" . $job['location'] . "<br>";
        echo "<span style='color:blue;font-weight:bold'>Job Type: </span>" . $job['job_type'] . "<br>";
        echo "<span style='color:blue;font-weight:bold'>Salary: </span>" . $job['salary'] . "<br>";
        echo "<span style='color:blue;font-weight:bold'>Status: </span>" . $job['status'] . "<br>";
        echo "<br>";
    }
} 
else {
    echo "No job listings available.<br>";
}


?>