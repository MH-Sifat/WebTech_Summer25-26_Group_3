<?php
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
        echo "Search Criteria:<br>";
        if(!empty($keyword)) {
            echo "Keyword: ".$keyword."<br>";
        }
        if(!empty($location)) {
            echo "Location: ".$location."<br>";
        }
        if(!empty($jobType)) {
            echo "Job Type: ".$jobType."<br>";
        }
    }
    if($valid) {
        
    }

}