<?php
include "../Controller/employer-dashboard-controller.php";
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Employer Dashboard</title>
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
    </style>
</head>
<body>
<div class="container">
<h1>Employer Dashboard</h1>
<div class="navbar">
<p><a href="./employer-management 1.php">Manage Jobs</a></p>
<p><a href="./employer-profile 1.php">Update Company Profile</a></p>
<p><a href="../Controller/logout.php">Logout</a></p>
</div>
<form method="post" action="">
<fieldset>
<legend>Company Information</legend>
<table>
<tr><td>Company Name:</td><td><?php echo $employer_data['company_name'] ?? "";?></td></tr>
<tr><td>Industry:</td><td><?php echo $employer_data['industry'] ?? ""; ?></td></tr>
<tr><td>Email:</td><td><?php echo $employer_data['email'] ?? ""; ?></td></tr>
</table>
</fieldset>
<fieldset>
<legend>Job Statistics</legend>
<table>
<tr><td>Active Jobs:</td><td><?php echo $active_jobs; ?></td></tr>
<tr><td>Total Applicants:</td><td><?php echo $total_applicants; ?></td></tr>
</table>
</fieldset>
</form>
</div>


</body>
</html>