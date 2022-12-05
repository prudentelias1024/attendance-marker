<?php
class DB
{


    public function connectToDB(){
    $conn = new mysqli('localhost','root','','attendance_marker');
    if ($conn->connect_error) {
        die("Connection Failed:". $conn->connect_error);
    } else {
        echo 'Connection Successful';
    }
    return $conn;
    }
   
    public function createStudent($oracle_no, $full_name,$image,$email,$password,$designation,$location,$grade){
        $this->connectToDB();
        $password = md5($password);
    
        $sql = "INSERT INTO employee(Oracle_no, Name, Image, Email, Password, Designation,Location, grade) VALUES('$oracle_no','$full_name','$image', '$email', '$password', '$designation', '$location','$grade')";
        if ($this->connectToDB()->query($sql)) {
            echo 'New Employee  Created';
        } else {
            echo "Error:".$sql.' <BR>  '.$this->connectToDB()->error;
        }
    }



    public function getUser($email){
        $this->connectToDB();
        $sql = "SELECT password FROM employee WHERE email ='$email' ";
        $result =  $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
                return $rows['password'];
            }
        } else {
            return 'User Not Found';
        }

    }

}
?>