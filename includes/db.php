<?php
class DB
{


    public function connectToDB(){
    $conn = new mysqli('localhost','root','','attendance_marker');
    if ($conn->connect_error) {
        die("Connection Failed:". $conn->connect_error);
    } else {
     
    }
    return $conn;
    }
   
    public function createStudent($oracle_no, $full_name,$image,$email,$password,$designation,$location,$grade){
        $this->connectToDB();

    
        $sql = "INSERT INTO employee(Oracle_no, Name, Image, Email, Password, Designation,Location, grade) VALUES('$oracle_no','$full_name','$image', '$email', '$password', '$designation', '$location','$grade')";
        if ($this->connectToDB()->query($sql)) {
            echo 'New Employee  Created';
        } else {
            echo "Error:".$sql.' <BR>  '.$this->connectToDB()->error;
        }
    }
    public function enrol($oracle_no, $name, $t_code, $t_cord){
        $this->connectToDB();

    
        $sql = "INSERT INTO enrolled(Oracle_no, Name, Training_Code, Training_Coordinator) VALUES('$oracle_no','$name','$t_code', $t_cord)";
        if ($this->connectToDB()->query($sql)) {
            echo 'User Successfully Enrolled';
        } else {
            echo "Error:".$sql.' <BR>  '.$this->connectToDB()->error;
        }
    }



    public function getUserPassword($email){
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
    
    public function getUser($email){
        $this->connectToDB();
        $sql = "SELECT * FROM employee WHERE email ='$email' ";
        $result =  $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
                return array($rows["Oracle_no"],$rows["Name"],$rows["Image"],$rows["Email"], $rows["Designation"],$rows["Location"], $rows["Grade"], $rows["Role"]);
            }
        } else {
            return 'User Not Found';
        }

    }
    public function getCourses(){
        $this->connectToDB();
        $sql = "SELECT * FROM trainings ORDER BY Training_Code";
        $result =  $this->connectToDB()->query($sql);
        $courses = array();
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
               $courses[] = $rows;
            }
              
                return $courses;
        } else {
            return 'No Training';
        }

    }
    public function getCoordinatingCourses($name){
        $this->connectToDB();
        $sql = "SELECT * FROM trainings WHERE Course_Coordinator ='$name'";
        $result =  $this->connectToDB()->query($sql);
        $courses = array();
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
               $courses[] = $rows;
            }
              
                return $courses;
        } else {
            return 'You are coordinating 0 Training';
        }

    }
}
?>