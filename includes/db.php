<?php
class DB
{


    public function connectToDB(){
    $conn = new mysqli('localhost','root','','attendance_marker');
    if (!$conn->connect_error) {
        echo 'Connection Successful';
    } else {
        die("Connection Failed:". $conn->connect_error);
    }
    return $conn;
    }
   
    public function createEmployee($oracle_no,$full_name,$photo,$email,$password,$designation, $location, $grade){
        $this->connectToDB();
        $password = md5($password);;
        $sql = "INSERT INTO employee(Oracle_no, name, Image, Email, Password, Designation, Location, Grade) VALUES('$oracle_no','$full_name',  '$photo', '$email', '$password', '$designation', '$location', '$grade')";
        if ($this->connectToDB()->query($sql)) {
            echo 'New Student Created';
            return true;
        } else {
            echo "Error:".$sql.$this->connectToDB()->error;
            return false;
        }
    }

    public function selectUser($email){
        $this->connectToDB();
        $sql = "SELECT email, password FROM employee WHERE email='$email'";
        $result = $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while ($row  = $result->fetch_assoc()) {
               return $row['password'];
            }
        }
        
    }

}

?>