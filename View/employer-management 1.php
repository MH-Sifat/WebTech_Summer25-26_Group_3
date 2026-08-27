<?php
include "../Controller/employer-management-controller.php";
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Employer Management</title>
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
input[type="date"],
select,
textarea{
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
    width: 20%;
    color: white;
    border: none;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
}

input[type="reset"]{
    align-items: center;
    width: 20%;
    background-color: grey;
    color: white;
    border: none;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
}
    </style>
</head>
<body>
<div class="container">
<h1>Employer Management</h1>
<div class="navbar">
<p><a href="./employer-dashboard 1.php">Dashboard</a></p>
<p><a href="./employer-profile 1.php">Company Profile</a></p>
<p><a href="./login 2.php">Logout</a></p>
</div>
<form method="post" action="" onsubmit="return collectData()">
<fieldset>
<legend>Post a Job</legend>
<table>
<tr><td><label for="title">Job Title:</label></td><td><input type="text" id="title" name="title"></td></tr>
<tr><td><label for="location">Location:</label></td><td><input type="text" id="location" name="location"></td></tr>
<tr><td><label for="jobType">Job Type:</label></td><td><select id="jobType" name="jobType"><option value="">Select Job Type</option><option value="full_time">Full Time</option><option value="part_time">Part Time</option><option value="internship">Internship</option><option value="remote">Remote</option></select></td></tr>
<tr><td><label for="salary">Salary:</label></td><td><input type="text" id="salary" name="salary"></td></tr>
<tr><td><label for="description">Job Description:</label></td><td><textarea id="description" name="description" rows="5" cols="30"></textarea></td></tr>
<tr><td><label for="requirements">Requirements:</label></td><td><textarea id="requirements" name="requirements" rows="5" cols="30"></textarea></td></tr>
<tr><td><label for="deadline">Application Deadline:</label></td><td><input type="date" id="deadline" name="deadline"></td></tr>
</table>
<input type="submit" id="post" name="post" value="Post Job">
<input type="reset" id="reset" name="reset" value="Reset">
</fieldset>
</form>
<h2>My Job Listings</h2>
<p>No job listings available.</p>
<h2>Applicants</h2>
<p>No applicants available.</p>
</div>

<script>function collectData() {
  let title = document.getElementById('title').value.trim();
  let location = document.getElementById('location').value.trim();
  let jobType = document.getElementById('jobType').value.trim();
  let salary = document.getElementById('salary').value.trim();
  let description = document.getElementById('description').value.trim();
  let requirements = document.getElementById('requirements').value.trim();
  let deadline = document.getElementById('deadline').value.trim();
  let valid = true;
  let errorMessage = '';
  if (title === '') {
    valid = false;
    errorMessage += 'Job Title is required.\n';
  }
  if (location === '') {
    valid = false;
    errorMessage += 'Location is required.\n';
  }
  if (jobType === '') {
    valid = false;
    errorMessage += 'Job Type is required.\n';
  }
  if (salary === '') {
    valid = false;
    errorMessage += 'Salary is required.\n';
  }
  if (description === '') {
    valid = false;
    errorMessage += 'Job Description is required.\n';
  }
  if (requirements === '') {
    valid = false;
    errorMessage += 'Requirements are required.\n';
  }
  if (deadline === '') {
    valid = false;
    errorMessage += 'Application Deadline is required.\n';
  }
  if (title.length < 2 || title.length > 100) {
    valid = false;
    errorMessage += 'Job Title must be between 2 and 100 characters.\n';
  }
  if (location.length < 2 || location.length > 100) {
    valid = false;
    errorMessage += 'Location must be between 2 and 100 characters.\n';
  }
  if (salary.length < 1 || salary.length > 20) {
    valid = false;
    errorMessage += 'Salary must be between 1 and 20 characters.\n';
  }
  if (salary !== '' && !/^\d+(\.\d{1,2})?$/.test(salary)) {
    valid = false;
    errorMessage += 'Salary must be a valid number.\n';
  }
  if (description.length < 10 || description.length > 1000) {
    valid = false;
    errorMessage += 'Job Description must be between 10 and 1000 characters.\n';
  }
  if (requirements.length < 10 || requirements.length > 1000) {
    valid = false;
    errorMessage += 'Requirements must be between 10 and 1000 characters.\n';
  }
  if (deadline !== '' && !/^\d{4}-\d{2}-\d{2}$/.test(deadline)) {
    valid = false;
    errorMessage += 'Application Deadline must be in YYYY-MM-DD format.\n';
  }
  if (!valid) {
    alert(errorMessage);
  }
  return valid;

}</script>

</body>
</html>