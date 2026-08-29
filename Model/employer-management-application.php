<?php

$database = new db();
$connection = $database->connection();

$employer_id = $_SESSION['id'] ?? 0;

// Get applicants for employer's jobs

$sql_applicants = "SELECT a.*, u.full_name, u.email, j.title as job_title FROM applications a JOIN job_postings j ON a.job_id = j.id JOIN users u ON a.job_seeker_id = u.id WHERE j.employer_id = $employer_id ORDER BY a.applied_date DESC";
$applicants_result = $connection->query($sql_applicants);
$total_applicants = $applicants_result->num_rows;

if ($total_applicants > 0) {
    while ($applicant = $applicants_result->fetch_assoc()) {
        echo "<span style='color:blue;font-weight:bold'>Applicant Name: </span>" . $applicant['full_name'] . "<br>";
        echo "<span style='color:blue;font-weight:bold'>Email: </span>" . $applicant['email'] . "<br>";
        echo "<span style='color:blue;font-weight:bold'>Applied for: </span>" . $applicant['job_title'] . "<br>";
        echo "<span style='color:blue;font-weight:bold'>Applied on: </span>" . date('M d, Y', strtotime($applicant['applied_date'])) . "<br>";
        echo "<span style='color:blue;font-weight:bold'>Status: </span>" . $applicant['status'] . "<br>";
        echo "<br>";
    }
}  
else {
    echo "No applicants available.<br>";
}


?>