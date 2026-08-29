<?php
include "../Controller/admin-profile-controller.php";
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Admin Profile</title>
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
input[type="email"],
input[type="tel"],
input[type="password"]{
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
    width: 40%;
    color: white;
    border: none;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
}

input[type="reset"]{
    align-items: center;
    width: 40%;
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
<h1>Admin Profile</h1>
<div class="navbar">
<p><a href="./admin-dashboard 1.php">Dashboard</a></p>
<p><a href="./admin-management 1.php">Management</a></p>
<p><a href="../Controller/logout.php">Logout</a></p>
</div>
<form method="post" action="" onsubmit="return collectData()">
<fieldset>
<legend>Admin Profile Information</legend>
<table>
<tr><td><label for="name">Full Name:</label></td><td><input type="text" id="name" name="name" value="<?php echo $name; ?>"></td></tr>
<tr><td><label for="email">Email:</label></td><td><input type="email" id="email" name="email" value="<?php echo $email; ?>"></td></tr>
<tr><td><label for="phone">Phone:</label></td><td><input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>"></td></tr>
<tr><td><label for="password">New Password:</label></td><td><input type="password" id="password" name="password" value="<?php echo $password; ?>"></td></tr>
<tr><td><label for="confirmPassword">Confirm New Password:</label></td><td><input type="password" id="confirmPassword" name="confirmPassword" value="<?php echo $confirmPassword; ?>"></td></tr>
</table>
<input type="submit" id="update" name="update" value="Update Profile">
</fieldset>
</form>
</div>


<script>function collectData() {
  let name = document.getElementById('name').value.trim();
  let email = document.getElementById('email').value.trim();
  let phone = document.getElementById('phone').value.trim();
  let password = document.getElementById('password').value.trim();
  let confirmPassword = document.getElementById('confirmPassword').value.trim();
  let valid = true;
  let errorMessage = '';
  if (name === '') {
    valid = false;
    errorMessage += 'Name is required.\n';
  }
  if (email === '') {
    valid = false;
    errorMessage += 'Email is required.\n'; 
}
  if (phone === '') {
    valid = false;
    errorMessage += 'Phone is required.\n';
  }
  if (password === '') {
    valid = false;
    errorMessage += 'Password is required.\n';
  }
  if (confirmPassword === '') {
    valid = false;
    errorMessage += 'Confirm Password is required.\n';
  }
  if (name.length < 2 || name.length > 100) {
    valid = false;
    errorMessage += 'Name must be between 2 and 100 characters.\n';
  }
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    valid = false;
    errorMessage += 'Email is not valid.\n';
  }
  if (!/^\+?[0-9]{7,15}$/.test(phone)) {
    valid = false;
    errorMessage += 'Phone number is not valid.\n';
  }
  if (password.length < 6 || password.length > 50) {
    valid = false;
    errorMessage += 'Password must be between 6 and 50 characters.\n';
  }
  if (confirmPassword.length < 6 || confirmPassword.length > 50) {
    valid = false;
    errorMessage += 'Confirm Password must be between 6 and 50 characters.\n';
  }
  if (password !== '' && confirmPassword !== '' && password !== confirmPassword) {
    valid = false;
    errorMessage += 'Passwords do not match.\n';
  }
  if (!valid) {
    alert(errorMessage);
  }
  return valid;
}
</script>

</body>
</html>