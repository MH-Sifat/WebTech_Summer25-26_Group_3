<?php
include "../Controller/login-controller.php";
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
    box-shadow: 0 2px 2px;
}

h1{
    color: blue;
    text-align: center;
    margin-bottom: 30px;
    font-size: 26px;
}

h2{
    padding-bottom: 10px;
    color: black;
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

input[type="email"],
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

input[type="checkbox"]{
    cursor: pointer;
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

a{
    color: black;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    
}
    </style>
</head>
<body>
<div class="container">
<h1>Job Recruitment Portal</h1>
<h2>Login</h2>
<form method="post" action="" onsubmit="return collectData()">
<fieldset>
<legend>Login Information</legend>
<table>
<tr><td><label for="email">Email:</label></td><td><input type="email" id="email" name="email" placeholder="Enter your Email" required></td></tr>
<tr><td><label for="password">Password:</label></td><td><input type="password" id="password" name="password" placeholder="Enter your Password" required></td></tr>
<tr><td><label for="remember">Remember Me:</label></td><td><input type="checkbox" id="remember" name="remember"></td></tr>
</table>
<input type="submit" id="login" name="login" value="Login">
<input type="reset" id="reset" name="reset" value="Reset">
</fieldset>

</form>
<p>Don't have an account? <a href="./register 1.php">Signup</a></p>
</div>


<script>function collectData() {
  let email = document.getElementById("email").value.trim();
  let password = document.getElementById("password").value.trim();
  let remember = document.getElementById("remember").checked;
  let valid = true;
  let errorMessage = "";
  if (email === "") {
    valid = false;
    errorMessage += "Email is required.\n";
  }
  if (password === "") {
    valid = false;
    errorMessage += "Password is required.\n";
  }
  if (email !== "" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    valid = false;
    errorMessage += "Invalid email format.\n";
  }
  if (password !== "" && password.length < 6) {
    valid = false;
    errorMessage += "Password must be at least 6 characters long.\n";
  }
  if (!valid) {
    alert(errorMessage);
  }
  return valid;

}</script>

</body>
</html>