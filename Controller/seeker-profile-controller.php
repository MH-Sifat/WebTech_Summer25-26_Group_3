<?php

include "../Model/db.php";

session_start();


$database = new db();
$connection = $database->connection();

$job_seeker_id = $_SESSION['id'];

// current user data
$sql = "SELECT * FROM users WHERE id = $job_seeker_id AND user_type = 'job_seeker'";
$result = $connection->query($sql);
$user_data = $result->fetch_assoc();

// initialize data from database
$name = $user_data['full_name'] ?? '';
$email = $user_data['email'] ?? '';
$phone = $user_data['phone'] ?? '';
$education = $user_data['education'] ?? '';
$skills = $user_data['skills'] ?? '';
$experience = $user_data['experience'] ?? '';
$cv_file = $user_data['cv_file'] ?? '';


$valid = true;


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=trim($_POST["name"] ?? "");
    $email=trim($_POST["email"] ?? "");
    $phone=trim($_POST["phone"] ?? "");
    $education=trim($_POST["education"] ?? "");
    $skills=trim($_POST["skills"] ?? "");
    $experience=trim($_POST["experience"] ?? "");
    $file=$_FILES["cv"] ?? [];


    if(!empty($name) && strlen($name)>=3 && strlen($name)<=50 && preg_match('/^[a-zA-Z\s]+$/', $name)) {
        ////echo "Name: ".$name;
        echo "<br>";
    } else {
        echo "Name must be valid, at least 3 characters long, and cannot exceed 50 characters.\n";
        $valid = false;
    }
    if(!empty($email) && preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
       // echo "E-mail: ".$email;
       // echo "<br>";
    } else {
       echo "E-mail is not valid\n";
       $valid = false;
    }
    if(!empty($phone) && preg_match('/^\d{11}$/', $phone)) {
        //echo "Phone: ".$phone;
       // echo "<br>";
    } else {
       echo "Phone number must be a valid 11-digit number\n";
       $valid = false;
    }
    if(!empty($education)) {
        // echo "Education: ".$education;
        // echo "<br>";
    } else {
       echo "Education is required\n";
       $valid = false;
    }
    if(!empty($skills)) {
        // echo "Skills: ".$skills;
       //  echo "<br>";
    } else {
       echo "Skills are required\n";
       $valid = false;
    }
    if(!empty($experience)) {
        // echo "Experience: ".$experience;
       //  echo "<br>";
    } else {
       echo "Experience is required\n";
       $valid = false;
    }
    
    if($valid) {
     
        $cv_path= $cv_file;
        if($file)
        {
            $uploaddirectory="../Uploads/";
            $cv_path=$uploaddirectory.basename($file["name"]);
            move_uploaded_file($file["tmp_name"], $cv_path);
        }
        
        $database= new db();
        $connection=$database->connection();
        $result=$database->updateJobSeekerProfile($connection, "users", $job_seeker_id, $name, $email, $phone, $education, $skills, $experience, $cv_path);
        if($result)
        {
             $_SESSION['full_name'] = $name;
             $_SESSION['profile_updated'] = true;
                
            Header("Location:../View/seeker-profile.php");
        }
        else{
            echo "please try again";
        }

    }
}