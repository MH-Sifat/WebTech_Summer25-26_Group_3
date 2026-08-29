<?php
include "../Model/db.php";

session_start();
$email = "";
$password = "";
$remember = false;
$valid = true;

if(isset($_COOKIE["remember_user"]))
{
    $email = $_COOKIE["remember_user"];
    $remember = true;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $remember = isset($_POST["remember"]) &&  $_POST["remember"] === "1";

    if(!empty($email) && preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
       // echo "E-mail: ".$email;
       // echo "<br>";
    } else {
        echo "E-mail is not valid";
        echo "<br>";
        $valid = false;
    }

    if(!empty($password) && strlen($password)>=6) {
       // echo "Password is valid";
       // echo "<br>";
    } else {
        echo "Password must be at least 6 characters long";
        echo "<br>";
        $valid = false;
    }

    if($valid) {
        $database = new db();
        $connection=$database->connection();
        $result=$database->CheckUser($connection, "users", $email, $password);
        if($result->num_rows>0)
        {
            $row = $result->fetch_assoc();
        
            if($row['user_type'] == 'admin') {
               Header("Location:../View/admin-dashboard 1.php");
            } 
            if($row['user_type'] == 'employer') {
               Header("Location:../View/employer-dashboard 1.php");
            } 
            if($row['user_type'] == 'job_seeker') {
              Header("Location:../View/seeker-dashboard.php");
            }

             // Set session
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $row['id'];
            $_SESSION['full_name'] = $row['full_name'];
            $_SESSION['user_type'] = $row['user_type'];


            if($remember) {
             setcookie("remember_user", $email, time()+ 86400*30, "/");
            } else {
             setcookie("remember_user", "", time()-3600, "/");
            }
        }
        else
        {
           echo "Invalid Email or Password";
        }
        
    }
}
?>

