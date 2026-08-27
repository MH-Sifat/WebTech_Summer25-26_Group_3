<?php
include "../Controller/jobs-controller.php";
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Find Jobs</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    background-color: white;
    padding: 20px;
    line-height: 1.5;
}

.container{
    max-width: 800px;
    margin: 0 auto;
    background-color:white;
    padding: 30px;
    border-radius: 10px;
}

.navbar {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    background-color: blue;
    padding: 12px 20px;
    margin: 20px 0 30px;
    border-radius: 10px;
}

.navbar p {
    margin: 0;
}

.navbar a {
    display: block;
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 15px;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}
h1{
    color: white;
    text-align: center;
    font-size: 30px;
}

form{
    display: flex;
}

fieldset{
    border-radius: 30px;
    padding: 30px;
    margin-bottom: 30px;
    background-color: white;
}

legend{
    background-color: blue;
    padding: 0 10px;
    color: white;
    font-weight: bold;
    font-size: 20px;
}

table{
    width: auto;
}

tr{
    margin-bottom: 10px;
}

td{
    padding: 6px;
}

label{
    display: flex;
    color: black;
    font-size: 18px;
    margin-bottom: 5px;
}

input[type="text"],
select{
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid;
    border-radius: 10px;
    background-color:white;
    font-size: 14px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

input[type="submit"]{
    align-items: center;
    background-color: blue;
    width: 100%;
    color: white;
    border: none;
    padding: 20px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
}
    </style>
</head>
<body>
<div class="container">
<h1>Find Jobs</h1>
<div class="navbar">
<p><a href="./seeker-dashboard.php">Dashboard</a></p>
<p><a href="./applications 1.php">My Applications</a></p>
<p><a href="./seeker-profile.php">Update Profile</a></p>
<p><a href="./login 2.php">Logout</a></p>
</div>
<form method="post" action="" onsubmit="return collectData()">
<fieldset>
<legend>Search Jobs</legend>
<table>
<tr><td><label for="keyword">Keyword:</label></td><td><input type="text" id="keyword" name="keyword" placeholder="Enter job title or keyword"></td></tr>
<tr><td><label for="location">Location:</label></td><td><input type="text" id="location" name="location" placeholder="Enter location"></td></tr>
<tr><td><label for="jobType">Job Type:</label></td><td><select id="jobType" name="jobType"><option value="">Select Job Type</option><option value="full_time">Full Time</option><option value="part_time">Part Time</option><option value="internship">Internship</option><option value="remote">Remote</option></select></td></tr>
</table>
<input type="submit" id="search" name="search" value="Search">

</fieldset>
</form>
<h2>Available Jobs</h2>
<p>No jobs available.</p>
</div>


<script>function collectData() {
  let keyword = document.getElementById('keyword').value.trim();
  let location = document.getElementById('location').value.trim();
  let jobType = document.getElementById('jobType').value;
  let valid = true;
  let errorMessage = '';
  if (keyword === '' && location === '' && jobType === '') {
    valid = false;
    errorMessage = 'Please enter at least one search criteria.';
  }
  if (keyword.length > 100) {
    valid = false;
    errorMessage = 'Keyword must be less than 100 characters.';
  }
  if (location.length > 100) {
    valid = false;
    errorMessage = 'Location must be less than 100 characters.';
  }
  if (jobType !== '' && !['full_time', 'part_time', 'internship', 'remote'].includes(jobType)) {
    valid = false;
    errorMessage = 'Invalid job type selected.';
  }
  if (!valid) {
    alert(errorMessage);
  }
  return valid;

}</script>

</body>
</html>