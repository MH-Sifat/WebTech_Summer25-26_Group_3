<?php
include "../Controller/register-controller.php";
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
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
    max-width: 650px;
    margin: 0 auto;
    background-color:white;
    padding: 30px;
    border-radius: 30px;
    box-shadow: 0 2px 2px;}

h1{
    color: blue;
    text-align: center;
    margin-bottom: 30px;
    font-size: 26px;
}

h2{
    color: black;
}

form{
    display: flex;
}

fieldset{
    border-radius: 30px;
    padding: 10px;
    background-color: lightskyblue;
}

legend{
    padding: 0 10px;
    color:black;
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
    display: inline-block;
    color: black;
    font-size: 18px;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"],
input[type="email"]{
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid;
    border-radius: 10px;
    background-color:white;
    font-size: 14px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}

a{
    color: black;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
}

input[type="radio"],
input[type="checkbox"]{
    cursor: pointer;
    vertical-align: middle;
}

input[type="radio"] + label,
input[type="checkbox"] + label{
    display: inline-flex;
    align-items: center;
    cursor: pointer;
    margin-right: 20px;
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
<h1>Job Recruitment Portal</h1>
<h2>Signup</h2>
<form method="post" action="" onsubmit="return collectData()">
<fieldset>
<legend>User Information</legend>
<table>
<tr><td><label for="name">Full Name:</label></td><td><input type="text" id="name" name="name" placeholder="Enter your Name" required></td></tr>
<tr><td><label for="email">Email:</label></td><td><input type="email" id="email" name="email" placeholder="Enter your Email" required></td></tr>
<tr><td><label for="password">Password:</label></td><td><input type="password" id="password" name="password" placeholder="Enter your Password" required></td></tr>
<tr><td><label for="confirmPassword">Confirm Password:</label></td><td><input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your Password" required></td></tr>
<tr><td>Account Type:</td><td><input type="radio" id="jobSeeker" name="role" value="job_seeker"><label for="jobSeeker">Job Seeker</label><input type="radio" id="employer" name="role" value="employer"><label for="employer">Employer</label></td></tr>
</table>
<input type="checkbox" id="condition" name="condition" value="1">
<label for="condition">I Agree to the Terms and Conditions</label>
<br><br>
<input type="submit" id="signup" name="signup" value="Signup">
<input type="reset" id="reset" name="reset" value="Reset">
</fieldset>

</form>
<p>Already have an account? <a href="./login 2.php">Login</a></p>
</div>


<script>function collectData() {
  let name = document.getElementById("name").value.trim();
  let email = document.getElementById("email").value.trim();
  let password = document.getElementById("password").value;
  let confirmPassword = document.getElementById("confirmPassword").value;
  let role = document.querySelector('input[name="role"]:checked');
  let condition = document.getElementById("condition").checked;
  let valid = true;
  let message = "";
  if(name === "") {
    message += "Name is required.\n";
    valid = false;
  }
  if(email === "") {
    message += "Email is required.\n";
    valid = false;
  }
  if(password === "") {
    message += "Password is required.\n";
    valid = false;
  }
  if(confirmPassword === "") {
    message += "Confirm Password is required.\n";
    valid = false;
  }
  if(password !== confirmPassword) {
    message += "Passwords do not match.\n";
    valid = false;
  }
  if(!role) {
    message += "Please select an account type.\n";
    valid = false;
  }
  if(!condition) {
    message += "You must agree to the Terms and Conditions.\n";
    valid = false;
  }
  if(name.length < 3) {
    message += "Name must be at least 3 characters long.\n";
    valid = false;
  }
  if(password.length < 6) {
    message += "Password must be at least 6 characters long.\n";
    valid = false;
  }
  if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    message += "Please enter a valid email address.\n";
    valid = false;
  }
  if(!/^[a-zA-Z\s]+$/.test(name)) {
    message += "Name can only contain letters and spaces.\n";
    valid = false;
  }
  if(!valid) {
    alert(message);
  }
  return valid;
  
}</script>

</body>
</html>