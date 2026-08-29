<?php
include "../Model/db.php";

session_start();

$database = new db();
$connection = $database->connection();

// Get all users (except admins)
$sql = "SELECT id, full_name, email, user_type, status FROM users WHERE user_type != 'admin' ORDER BY created_at DESC";
$users_result = $connection->query($sql);
$total_users = $users_result->num_rows;

if($total_users>0){
    while($user = $users_result->fetch_assoc()){
       echo "<span  style='color:blue;font-weight:bold'>name: </span>" . $user['full_name'] ."<br>" ;
       echo "<span  style='color:blue;font-weight:bold'>email: </span>" . $user['email']."<br>"  ;
       echo "<span  style='color:blue;font-weight:bold'>role:  </span>"  . $user['user_type'] ."<br>" ;
       echo "<span  style='color:blue;font-weight:bold'>status: </span>" . $user['status'] ."<br>" ;
       echo "<br>";
    }
}
else{
    echo "No user found";
}

?>