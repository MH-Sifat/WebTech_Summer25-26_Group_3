<?php
include "../Controller/employer-profile-controller.php";
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Employer Profile</title>
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
input[type="url"],
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
<div class="navbar">
<p><a href="./employer-dashboard 1.php">Dashboard</a></p>
<p><a href="./employer-management 1.php">Manage Jobs</a></p>
<p><a href="../Controller/logout.php">Logout</a></p>
</div>
<div class="container">
<h1>Employer Profile</h1>

<form method="post" action="" onsubmit="return collectData()">
<fieldset>
<legend>Company Information</legend>
<table>
<tr><td><label for="companyName">Company Name:</label></td><td><input type="text" id="companyName" name="companyName" value="<?php echo $companyName; ?>" ></td></tr>
<tr><td><label for="email">Company Email:</label></td><td><input type="email" id="email" name="email" value="<?php echo $email; ?>" ></td></tr>
<tr><td><label for="phone">Phone:</label></td><td><input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" ></td></tr>
<tr><td><label for="website">Website:</label></td><td><input type="text" id="website" name="website" value="<?php echo $website; ?>" ></td></tr>
<tr><td><label for="industry">Industry:</label></td><td><input type="text" id="industry" name="industry" value="<?php echo $industry; ?>" ></td></tr>
<tr><td><label for="description">Company Description:</label></td><td><textarea id="description" name="description" rows="5" cols="30"><?php echo $description; ?> </textarea></td></tr>
</table>
<input type="submit" id="update" name="update" value="Update Profile">

</fieldset>
</form>
</div>


<script>function collectData() {
  let companyName = document.getElementById('companyName').value.trim();
  let email = document.getElementById('email').value.trim();
  let phone = document.getElementById('phone').value.trim();
  let website = document.getElementById('website').value.trim();
  let industry = document.getElementById('industry').value.trim();
  let description = document.getElementById('description').value.trim();
  let valid = true;
  let errorMessage = '';
  if (companyName === '') {
    errorMessage += 'Company Name is required.\n';
    valid = false;
  } else if (companyName.length < 2 || companyName.length > 100) {
    errorMessage += 'Company Name must be between 2 and 100 characters.\n';
    valid = false;
  }
  if (email === '') {
    errorMessage += 'Company Email is required.\n';
    valid = false;
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    errorMessage += 'Company Email is not valid.\n';
    valid = false;
  }
  if (phone === '') {
    errorMessage += 'Phone is required.\n';
    valid = false;
  } else if (!/^\+?[0-9]{7,15}$/.test(phone)) {
    errorMessage += 'Phone number is not valid.\n';
    valid = false;
  }
  if (website === '') {
    errorMessage += 'Website is required.\n';
    valid = false;
  } else if (!/^(https?:\/\/)?([\w-]+(\.[\w-]+)+)(\/[\w-]*)*(\?.*)?(#.*)?$/.test(website)) {
    errorMessage += 'Website URL is not valid.\n';
    valid = false;
  }
  if (industry === '') {
    errorMessage += 'Industry is required.\n';
    valid = false;
  } else if (industry.length < 2 || industry.length > 50) {
    errorMessage += 'Industry must be between 2 and 50 characters.\n';
    valid = false;
  }
  if (description === '') {
    errorMessage += 'Company Description is required.\n';
    valid = false;
  } else if (description.length < 10 || description.length > 200) {
    errorMessage += 'Company Description must be between 10 and 200 characters.\n';
    valid = false;
  }
  if (!valid) {
    alert(errorMessage);
  }
  return valid;
  
}</script>

</body>
</html>