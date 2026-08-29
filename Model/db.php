
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

    // insert user in database 
    function signup($connection,$tablename,$username,$useremail,$password,$usertype)
    {
        $sql="INSERT INTO ".$tablename."(full_name, email, password, user_type ) VALUES ('".$username."', '".$useremail."','".$password."', '".$usertype."')";
        $result=$connection->query($sql);

         if (!$result) {
            die("SQL Error: " . $connection->error);
        }

        echo "Data inserted successfully!";

        return $result;
    }

    // login check user account exist 
    function CheckUser($connection, $tablename, $email, $password)
    {
        $sql="SELECT * FROM ".$tablename." WHERE email='".$email."' AND password='".$password."'";
        $result=$connection->query($sql);
        return $result;
    }

     // insert jobs in database 
    function jobPost($connection, $tablename, $employer_id, $title, $description, $requirements, $location, $jobType, $salary, $deadline) {
        $sql = "INSERT INTO ". $tablename ."(employer_id, title, description, requirements, location, job_type, salary, application_deadline, status) VALUES ('" . $employer_id . "', '" . $title . "', '" . $description . "', '" . $requirements . "', '" . $location . "', '" . $jobType . "', '" . $salary . "', '" . $deadline . "', 'open')";
        $result = $connection->query($sql);
        if (!$result) {
            die("SQL Error: " . $connection->error);
        }
        return $result;
    }


    function searchJobs($connection, $tablename, $keyword, $location, $jobType) {
        $sql = "SELECT j.*, u.company_name, u.full_name as employer_name FROM " . $tablename . " j LEFT JOIN users u ON j.employer_id = u.id WHERE j.status = 'open' AND (j.title LIKE '%" . $keyword . "%' OR j.description LIKE '%" . $keyword . "%' OR '" . $keyword . "' = '') AND (j.location LIKE '%" . $location . "%' OR '" . $location . "' = '') AND (j.job_type = '" . $jobType . "' OR '" . $jobType . "' = '') ORDER BY j.created_at DESC";
        
        $result = $connection->query($sql);
        if (!$result) {
            die("SQL Error: " . $connection->error);
        }
        return $result;
    }

      // apply
    function applyJob($connection, $tablename, $job_id, $job_seeker_id) {

        $check_sql = "SELECT * FROM " . $tablename . " WHERE job_id = '" . $job_id . "' AND job_seeker_id = '" . $job_seeker_id . "'";
        $check_result = $connection->query($check_sql);
        
        if ($check_result->num_rows > 0) {
            echo "You have already applied for this job.";
            return false;
        }
      
        $sql = "INSERT INTO " . $tablename . " (job_id, job_seeker_id, status) VALUES ('" . $job_id . "', '" . $job_seeker_id . "', 'pending')";
        
        $result = $connection->query($sql);
        if (!$result) {
            die("SQL Error: " . $connection->error);
        }
        echo "Application submitted successfully!";
        return $result;
    }


     // update job seeker profile
     function updateJobSeekerProfile($connection, $tablename, $id, $name, $email, $phone, $education, $skills, $experience, $cv_path) {
        $sql = "UPDATE " . $tablename . " SET full_name = '" . $name . "', email = '" . $email . "', phone = '" . $phone . "', education = '" . $education . "', skills = '" . $skills . "', experience = '" . $experience . "', cv_file = '" . $cv_path . "' WHERE id = '" . $id . "' AND user_type = 'job_seeker'";
    
        $result = $connection->query($sql);
        if (!$result) {
            die("SQL Error: " . $connection->error);
        }
        return $result;
    }

    // update employer profile
     function updateEmployerProfile($connection, $tablename, $id, $companyName, $email, $phone, $website, $industry, $description) {
        $sql = "UPDATE " . $tablename . " SET company_name = '" . $companyName . "', email = '" . $email . "', phone = '" . $phone . "', company_website = '" . $website . "', industry = '" . $industry . "', company_description = '" . $description . "' WHERE id = '" . $id . "' AND user_type = 'employer'";
        $result = $connection->query($sql);
        if (!$result) {
            die("SQL Error: " . $connection->error);
        }
        return $result;
    }

     function updateAdminProfile($connection, $tablename, $id, $name, $email, $phone, $password) {

        $sql = "UPDATE " . $tablename . " SET full_name = '" . $name . "', email = '" . $email . "', phone = '" . $phone . "', password = '" . $password . "' WHERE id = '" . $id . "' AND user_type = 'admin'";
        
        $result = $connection->query($sql);
        if (!$result) {
            die("SQL Error: " . $connection->error);
        }
        return $result;
    }

}

?>

