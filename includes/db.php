<?php
class DB
{


    public function connectToDB(){
    $conn = new mysqli('localhost','root','','attendance_marker');
    if ($conn->connect_error) {
        echo 'Connection Successful';
    } else {
        die("Connection Failed:". $conn->connect_error);
    }
    return $conn;
    }
   
    public function createStudent($full_name,$photo,$email,$password,$registered_date){
        $this->connectToDB();
        $password = md5($password);
        $registered_date = date("F d, Y  h:i:s");
        $sql = "INSERT INTO students(fullname, email, photo, pass, registered_date) VALUES('$full_name', '$email', '$photo', '$password', '$registered_date')";
        if ($this->connectToDB()->query($sql)) {
            echo 'New Student Created';
        } else {
            echo "Error:".$sql.$this->connectToDB()->error;
        }
    }


}

?>