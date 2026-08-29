<?php
include "../Model/db.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['job_id'])) {
    $job_id = $_POST['job_id'];
    $job_seeker_id = $_SESSION['id'];
    
    $database = new db();
    $connection = $database->connection();
    
    $result = $database->applyJob($connection, "applications", $job_id, $job_seeker_id);
    
    if ($result) {
        echo "Application submitted successfully!";
        Header("Location:../View/jobs 1.php");

    } else {
        echo "You have already applied for this job.";
        Header("Location:../View/jobs 1.php");
    }


}
?>