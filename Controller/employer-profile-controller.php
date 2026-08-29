<?php

include "../Model/db.php";

session_start();

$database = new db();
$connection = $database->connection();

$employer_id = $_SESSION['id'];

// employer user data
$sql = "SELECT * FROM users WHERE id = $employer_id AND user_type = 'employer'";
$result = $connection->query($sql);
$user_data = $result->fetch_assoc();

$companyName = $user_data['company_name'] ?? '';
$email = $user_data['email'] ?? '';
$phone = $user_data['phone'] ?? '';
$website = $user_data['company_website'] ?? '';
$industry = $user_data['industry'] ?? '';
$description = $user_data['company_description'] ?? '';

$valid = true;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = trim($_POST["companyName"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $website = trim($_POST["website"] ?? "");
    $industry = trim($_POST["industry"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $password = trim($_POST["password"] ?? "");
    if(!empty($companyName) && strlen($companyName) >= 2 && strlen($companyName) <= 100) {
        // echo "Company Name: ".$companyName;
        // echo "<br>";
    } else {
        echo "Company Name must be between 2 and 100 characters.\n";
        $valid = false;
    }
    if(!empty($email) && preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
        // echo "Company Email: ".$email;
        // echo "<br>";
    } else {
       echo "Company Email is not valid\n";
       $valid = false;
    }
    if(!empty($phone) && preg_match('/^\+?[0-9]{7,15}$/', $phone)) {
       //  echo "Phone: ".$phone;
       //  echo "<br>";
    } else {
       echo "Phone number is not valid\n";
       $valid = false;
    }
    if(!empty($website) && preg_match('/^(https?:\/\/)?([\w-]+(\.[\w-]+)+)(\/[\w-]*)*(\?.*)?(#.*)?$/', $website)) {
      //   echo "Website: ".$website;
       //  echo "<br>";
    } else {
       echo "Website URL is not valid\n";
       $valid = false;
    }
    if(!empty($industry) && strlen($industry) >= 2 && strlen($industry) <= 50) {
       // echo "Industry: ".$industry;
       // echo "<br>";
    } else {
       echo "Industry must be between 2 and 50 characters.\n";
       $valid = false;
    }
    if(!empty($description) && strlen($description) >= 10 && strlen($description) <= 200) {
        // echo "Company Description: ".$description;
       // echo "<br>";
    } else {
       echo "Company Description must be between 10 and 200 characters.\n";
       $valid = false;
    }
   
    if($valid) {
          
        $database = new db();
        $connection = $database->connection();
        $result = $database->updateEmployerProfile($connection, "users", $employer_id, $companyName, $email, $phone, $website, $industry, $description);
        
        if($result)
        {
           $_SESSION['full_name'] = $name;
           $_SESSION['profile_updated'] = true;
    
           Header("Location:../View/employer-profile 1.php");
        }
        else{
            echo "please try again";
        }
       
    }
}