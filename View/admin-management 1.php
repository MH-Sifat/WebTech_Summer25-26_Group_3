<?php
include "../Controller/admin-management-controller.php";
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Admin Management</title>
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
<h1>Admin Management</h1>
<div class="navbar">

<p><a href="./admin-dashboard 1.php">Dashboard</a></p>
<p><a href="./admin-profile 1.php">Update Profile</a></p>
<p><a href="./login 2.php">Logout</a></p>
</div>

<form method="post" action="" onsubmit="return collectData()"> 
<fieldset>
<legend>Manage Users</legend>
<table>
<tr><td>Name</td><td>Email</td><td>Role</td><td>Status</td><td>Action</td></tr>
<tr><td colspan="5">No users available.</td></tr>
</table>
</fieldset>
<fieldset>
<legend>Manage Jobs</legend>
<table>
<tr><td>Job Title</td><td>Employer</td><td>Posted</td><td>Status</td><td>Action</td></tr>
<tr><td colspan="5">No jobs available.</td></tr>
</table>
</fieldset>
</form>
</div>
<script>function collectData() {

}
</script>

</body>
</html>