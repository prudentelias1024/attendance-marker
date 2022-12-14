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
    public function enrol($oracle_no, $name, $t_title,$t_code,$t_cord){
        $this->connectToDB();

    
        $sql = "INSERT INTO enrolled(Oracle_no, Name, Training_Title,Training_Code, Training_Cordinator) VALUES('$oracle_no','$name','$t_title','$t_code', '$t_cord')";
        if ($this->connectToDB()->query($sql)) {
            return 'User Successfully Enrolled';
        } else {
            return "Error:".$sql.' <BR>  '.$this->connectToDB()->error;
        }
    }
    public function getEnrolledCourse($oracle_no){
        $this->connectToDB();
        $enrolled_courses = array();
        $sql = "SELECT * FROM enrolled WHERE Oracle_no='$oracle_no'";
        $result = $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
            
                $enrolled_courses[] = $row;
            }
            return $enrolled_courses;
       
            
        } else {
            return  null;
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
    public function getTrainingParticipants($training_code){
        $participants = array();
        $this->connectToDB();
        $sql = "SELECT Oracle_no FROM enrolled WHERE Training_Code ='$training_code' ";
        $result =  $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
                
                $oracle_nos = array();
                $oracle_nos[] = $rows['Oracle_no'];
                foreach ($oracle_nos as  $oracle) {
                    $sql = "SELECT Image FROM Employee WHERE Oracle_no='$oracle'";
                    $result =  $this->connectToDB()->query($sql);
                    if ($result->num_rows > 0) {
                        $participants[] = $result->fetch_assoc();

                    }
                    
             }
                
            }
            return $participants;
        } else {
            return 'No Participants';
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