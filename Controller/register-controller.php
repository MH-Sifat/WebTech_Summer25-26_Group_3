<?php
include "../Model/db.php";

session_start();
$name="";
$email="";
$password= "";
$confirmPassword = "";
$role="";
$condition=false;
$valid = true;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=trim($_POST["name"] ?? "");
    $email=trim($_POST["email"] ?? "");
    $password=trim($_POST["password"] ?? "");
    $confirmPassword=trim($_POST["confirmPassword"] ?? "");
    $role=trim($_POST["role"] ?? "");
    $condition = isset($_POST["condition"]) && $_POST["condition"] === "1";
    if(!empty($name) && strlen($name)>=3 && preg_match('/^[a-zA-Z\s]+$/', $name)) {
      //  echo "Name: ".$name;
      //  echo "<br>";
    } else {
        echo "Name Must be valid and at least 3 Characters\n";
        $valid = false;
    }
    if(!empty($email) && preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
      //  echo "E-mail: ".$email;
      //  echo "<br>";
    } else {
       echo "E-mail is not valid\n";
       $valid = false;
    }
    if(!empty($password) && strlen($password)>=6) {
       // echo "Password: ".$password;
      //  echo "<br>";
    } else {
       echo "Password must be at least 6 characters long\n";
       $valid = false;
    }
    if(!empty($confirmPassword) && $confirmPassword === $password) {
       // echo "Confirm Password: ".$confirmPassword;
       // echo "<br>";
    } else {
       echo "Confirm Password can not be empty and must match the password\n";
       $valid = false;
    }
    if(empty($role)) {
        echo "Please select an account type.\n";
        $valid = false;
    }
    if(!$condition) {
        echo "You must agree to the Terms and Conditions.\n";
        $valid = false;
    }

    if($valid) {
        $_SESSION['registered'] = true;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['role'] = $role;
        $message = "Registration successful!";

        
        $database= new db();
        $connection=$database->connection();
        $result=$database->signup($connection, "users", $name, $email, $password,$role);
        if($result)
        {
           Header("Location:../View/login 2.php");
        }
        else{
            echo "please try again";
        }

    }

}
