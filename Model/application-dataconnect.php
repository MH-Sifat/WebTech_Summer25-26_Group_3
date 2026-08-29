<?php
include "../Model/db.php";


session_start(); 

$database = new db();
$connection = $database->connection();

$job_seeker_id = $_SESSION['id'] ?? 0;

//  job seeker applyed jobs details
$sql_applications = "SELECT a.id as application_id, a.job_id, a.status, a.applied_date, j.title, u.company_name FROM applications a JOIN job_postings j ON a.job_id = j.id JOIN users u ON j.employer_id = u.id  WHERE a.job_seeker_id = $job_seeker_id ORDER BY a.applied_date DESC";
$applications_result = $connection->query($sql_applications);
$total_applications = $applications_result->num_rows;


if($total_applications > 0){
    while($application = $applications_result->fetch_assoc()){
       echo "<span  style='color:blue;font-weight:bold'>Job Title: </span>" . $application['title'] ."<br>" ;
       echo "<span  style='color:blue;font-weight:bold'>Company: </span>" . $application['company_name'] ."<br>"  ;
       echo "<span  style='color:blue;font-weight:bold'>Applied Date: </span>" . $application['applied_date'] ."<br>" ;
       echo "<span  style='color:blue;font-weight:bold'>Status: </span>" . $application['status'] ."<br>" ;
       echo "<br>";
    }
} 
else {
    echo "No applications found.";
}

?>