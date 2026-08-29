<?php

$database = new db();
$connection = $database->connection();



$sql_jobs = "SELECT j.id, j.title, j.status, j.created_at, u.full_name as employer_name FROM job_postings j JOIN users u ON j.employer_id = u.id ORDER BY j.created_at DESC";
$jobs_result = $connection->query($sql_jobs);
$total_jobs = $jobs_result->num_rows;

if($total_jobs > 0){
    while($job = $jobs_result->fetch_assoc()){
       echo "<span  style='color:blue;font-weight:bold'>Job Title: </span>" . $job['title'] ."<br>" ;
       echo "<span  style='color:blue;font-weight:bold'>Employer: </span>" . $job['employer_name'] ."<br>"  ;
       echo "<span  style='color:blue;font-weight:bold'>Posted: </span>" . $job['created_at'] ."<br>" ;
       echo "<span  style='color:blue;font-weight:bold'>Status: </span>" . $job['status'] ."<br>" ;
       echo "<br>";
    }
} 
else {
    echo "No jobs found.";
}
?>