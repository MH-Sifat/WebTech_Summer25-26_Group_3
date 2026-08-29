<?php

include "../Model/db.php";

session_start();
$keyword="";
$location="";
$jobType="";
$valid = true;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keyword=trim($_POST['keyword'] ?? "");
    $location=trim($_POST['location'] ?? "");
    $jobType=trim($_POST["jobType"] ?? "");
    if(empty($keyword) && empty($location) && empty($jobType)) {
        echo "Please enter at least one search criteria.";
        $valid = false;
    } else {
       // echo "Search Criteria:<br>";
        if(!empty($keyword)) {
          //  echo "Keyword: ".$keyword."<br>";
        }
        if(!empty($location)) {
        //    echo "Location: ".$location."<br>";
        }
        if(!empty($jobType)) {
         //   echo "Job Type: ".$jobType."<br>";
        }
    }
    if($valid) {
        $database = new db();
        $connection = $database->connection();
        $result = $database->searchJobs($connection, "job_postings", $keyword, $location, $jobType);
        
        $total_jobs = $result->num_rows;

        // all jobs after search
    if ($total_jobs > 0) {
         while ($job = $result->fetch_assoc())
         {
         echo "<span style='color:blue;font-weight:bold;'>Job Title: </span>" .$job['title']. "<br>";
         echo "<span style='color:blue;font-weight:bold;'>Company: </span>" .$job['company_name']. "<br>";
         echo "<span style='color:blue;font-weight:bold;'>Location: </span>" .$job['location']. "<br>";
         echo "<span style='color:blue;font-weight:bold;'>Job Type: </span>" .$job['job_type']. "<br>";
         echo "<span style='color:blue;font-weight:bold;'>Salary: </span>" .$job['salary']. "<br>";
         echo "<span style='color:blue;font-weight:bold;'>Description: </span>".$job['description']. "...<br>";
         echo "<span style='color:blue;font-weight:bold;'>Deadline: </span>" .$job['application_deadline']. "<br>";
         echo "<form method='post' action='../Controller/apply.php' style='margin-top:10px;'>";
         echo "<input type='hidden' name='job_id'  id='job_id' value='" . $job['id'] . "'>";
         echo "<input type='submit' value ='Apply' style='background-color:blue; color:white; border:none;width:20%; padding:8px 5px; border-radius:5px; cursor:pointer;'>";
         echo "</form>";
        }
    } 
    else {
    echo "No jobs found matching your search criteria.";
    }
}

}