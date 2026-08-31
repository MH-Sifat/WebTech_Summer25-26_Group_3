<?php
include "../Controller/admin-dashboard-controller.php";
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
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
    /*border-radius: 10px;*/
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

a:hover {
  text-decoration: underline;
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
<div class="navbar">
<p><a href="./admin-management 1.php">Management</a></p>
<p><a href="./admin-profile 1.php">Update Profile</a></p>
<p><a href="../Controller/logout.php">Logout</a></p>
</div>
<div class="container">
<h1>Admin Dashboard</h1>

<form method="post" action="">
<fieldset>
<legend>System Statistics</legend>
<table>
<tr><td>Total Users:</td><td><?php echo $total_users; ?></td></tr>
<tr><td>Total Job Seekers:</td><td><?php echo $total_job_seekers; ?></td></tr>
<tr><td>Total Employers:</td><td><?php echo $total_employers; ?></td></tr>
<tr><td>Total Jobs:</td><td><?php echo $total_jobs; ?></td></tr>
<tr><td>Total Applications:</td><td><?php echo $total_applications; ?></td></tr>
</table>
</fieldset>
</form>
</div>

</body>
</html>