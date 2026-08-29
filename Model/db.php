
<?php
class db{
    function connection()
    {
        $db_host="localhost";
        $db_user="root";
        $db_password="";
        $db_name="job_recruitment_portal";
        $connection= new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_error)
            {
                die("Please connect the Database");
            }
    return $connection;
    }

    function signup($connection,$tablename,$username,$useremail,$password,$usertype)
    {
        echo $tablename;
        $sql="INSERT INTO ".$tablename."(full_name, email, password, user_type ) VALUES ('".$username."', '".$useremail."','".$password."', '".$usertype."')";
        $result=$connection->query($sql);

         if (!$result) {
            die("SQL Error: " . $connection->error);
        }

        echo "Data inserted successfully!";

        return $result;
    }

}

?>

