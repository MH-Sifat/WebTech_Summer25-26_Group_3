<?php
include "../Model/db.php";
session_start();

$database = new db();
$connection = $database->connection();

$job_seeker_id = $_SESSION['id'] ?? 0;

// job seeker information
$sql = "SELECT id, full_name, email FROM users WHERE id = $job_seeker_id AND user_type = 'job_seeker'";
$result = $connection->query($sql);
$job_seeker_data = $result->fetch_assoc();

// total applications
$sql_total = "SELECT COUNT(*) FROM applications WHERE job_seeker_id = $job_seeker_id";
$result_total = $connection->query($sql_total);
$total_applications = $result_total->fetch_row()[0];

// pending applications
$sql_pending = "SELECT COUNT(*) FROM applications WHERE job_seeker_id = $job_seeker_id AND status = 'pending'";
$result_pending = $connection->query($sql_pending);
$pending_applications = $result_pending->fetch_row()[0];

// shortlisted applications
$sql_shortlisted = "SELECT COUNT(*) FROM applications WHERE job_seeker_id = $job_seeker_id AND status = 'shortlisted'";
$result_shortlisted = $connection->query($sql_shortlisted);
$shortlisted_applications = $result_shortlisted->fetch_row()[0];

// Get accepted applications
$sql_accepted = "SELECT COUNT(*) FROM applications WHERE job_seeker_id = $job_seeker_id AND status = 'accepted'";
$result_accepted = $connection->query($sql_accepted);
$accepted_applications = $result_accepted->fetch_row()[0];

// Get rejected applications
$sql_rejected = "SELECT COUNT(*) FROM applications WHERE job_seeker_id = $job_seeker_id AND status = 'rejected'";
$result_rejected = $connection->query($sql_rejected);
$rejected_applications = $result_rejected->fetch_row()[0];

?>