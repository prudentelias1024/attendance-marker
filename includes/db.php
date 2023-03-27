<?php
class DB
{
    public function getCoursePercentageCompletion($course,$name){
        $no_of_classes_attended = 0;
           $no_of_training_sessions = $this->getNoOfClasses($course);
           for ($i=1; $i < $no_of_training_sessions + 1; $i++) { 
            $table = $course. '_0'. $i;
            
           $sql = "SELECT Attendance_Status FROM $table WHERE Name='$name'";
           $result = $this->connectToDB()->query($sql);
           while($row = $result->fetch_assoc()){
          $status = $row["Attendance_Status"];
         
           if ($status == 'Present') {
           $no_of_classes_attended++;
           
           }

       }
    }
     return(($no_of_classes_attended/$no_of_training_sessions)*100);
}
    public function getUserOngoingTraining($course, $name)
    {
       
     $no_of_training_taken =   $this->getNoOfClassesTaken($course);
     $no_of_training_sessions = $this->getNoOfClasses($course);
       if($no_of_training_sessions > $no_of_training_taken){
            return 1;
     } else  if ($no_of_training_sessions == $no_of_training_taken) {
      return 0;
     }
   
}


    public function getNoOfClasses($course)
    {
        $sql = "SELECT No_Of_Classes FROM trainings WHERE  Training_Code='$course'";
        $result = $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                return $row['No_Of_Classes'];
            }
           } else {
               return  0;
           }
    }
    public function getUserTrainingCompletionStatus($course, $name)
    {
        $no_of_classes_attended = 0;
     $no_of_training_sessions =   $this->getNoOfClassesTaken($course);
    //  print_r($no_of_training_sessions);
     for ($i=1; $i < $no_of_training_sessions + 1; $i++) { 
        $table = $course. '_0'. $i;
        
       $sql = "SELECT Attendance_Status FROM $table WHERE Name='$name'";
       $result = $this->connectToDB()->query($sql);
       while($row = $result->fetch_assoc()){
      $status = $row["Attendance_Status"];
     
       if ($status == 'Present') {
       $no_of_classes_attended++;
       
       }
   }
}
     if ($no_of_classes_attended == $no_of_training_sessions) {
        return 1;
     }  else {
        return 0;
     }    
     
       
     
    
}
    

  public function getAllPresentStudent($table){
    $this->connectToDB();
    $enrolled_courses = array();
   
    $sql = "SELECT * FROM $table WHERE Attendance_Status='Present'";
    $result = $this->connectToDB()->query($sql);
     if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
             $attendant[] = $row;
        }
        return $attendant;
   
        
    } else {
        return  null;
    }
  }
  public function getAllAbsentStudent($table){
    $this->connectToDB();
    $enrolled_courses = array();
   
    $sql = "SELECT * FROM $table WHERE Attendance_Status='Absent'";
    $result = $this->connectToDB()->query($sql);
     if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
             $attendant[] = $row;
        }
        return $attendant;
   
        
    } else {
        return  null;
    }
  }
  public function incrementClassTaken($course,$no_of_class){
    $this->connectToDB();
       $sql = " UPDATE TRAININGS SET Class_Taken='$no_of_class' WHERE Training_Code='$course'";
    $this->connectToDB()->query($sql);
  
}
  public function addCoordinator($oracle_no){
    $this->connectToDB();
       $sql = " UPDATE EMPLOYEE SET Role='Coordinator' WHERE Oracle_no='$oracle_no'";
    if($this->connectToDB()->query($sql) == TRUE){
     return 'Coordinator Added';
    } else {
       echo "Error ".$this->connectToDB()->error;
    }
  
}
  public function removeCoordinator($oracle_no){
    $this->connectToDB();
       $sql = " UPDATE EMPLOYEE SET Role='Member' WHERE Oracle_no='$oracle_no'";
    $this->connectToDB()->query($sql);
  
}

    public function getNoOfClassesTaken($course){
        $this->connectToDB();
           $sql = "SELECT Class_Taken FROM trainings WHERE  Training_Code='$course'";
        $result = $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){

                return $row['Class_Taken'];
            }
       
            
        } else {
            return  0;
        }
    }
    public function getAdminStatus($oracle){
        $this->connectToDB();
           $sql = "SELECT * FROM ADMIN WHERE  Oracle_no='$oracle'";
        $result = $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            return true;
            }else {
            return  false;
        }
    }

    public function markAttendantPresentOrAbsent($training_coordinator,$name,$oracle_no,$status,$table){
        $this->connectToDB();

        $sql = "INSERT INTO `$table`(Course_Coordinator, Name, Oracle_no, Attendance_Status) VALUES('$training_coordinator', '$name', '$oracle_no', '$status')";
        if ($this->connectToDB()->query($sql)) {
            return ''.$name.' is Marked '.$status.'.';
        } else {
            echo "Error:".$sql.' <BR>  '.$this->connectToDB()->error;
        }
        }
    

    public function connectToDB(){
    $conn = new mysqli('localhost','root','','attendance_marker');
    if ($conn->connect_error) {
        die("Connection Failed:". $conn->connect_error);
    } else {
    //   echo "Connection Successful";
    }
    return $conn;
    }

    public function createAttendanceTable($name){
        $this->connectToDB();

        $sql = "CREATE TABLE `$name` (`Course_Coordinator` VARCHAR(60) NOT NULL , `Name` VARCHAR(75) NOT NULL , `Oracle_No` VARCHAR(6) NOT NULL , `Attendance_Status` VARCHAR(8) NOT NULL , PRIMARY KEY (`Oracle_No`))";
        if ($this->connectToDB()->query($sql)) {
            echo ''.$name.'  Created';
        } else {
            echo "Error:".$sql.' <BR>  '.$this->connectToDB()->error;
        }
    }
    public function createStudent($oracle_no, $full_name,$image,$email,$PN,$designation,$location,$grade){
        $this->connectToDB();

    
        $sql = "INSERT INTO employee(Oracle_no, Name, Image, Email, PN, Designation,Location, grade) VALUES('$oracle_no','$full_name','$image', '$email', '$PN', '$designation', '$location','$grade')";
        if ($this->connectToDB()->query($sql)) {
            echo 'New Employee  Created';
        } else {
            echo "Error:".$sql.' <BR>  '.$this->connectToDB()->error;
        }
    }
    public function createTraining($training_coordinator,$training_title, $training_code,$training_loc,$training_dur,$training_time,$training_day,$training_startdate,$training_enddate, $no_of_classes,$training_endtime,$training_schedule){
        $this->connectToDB();
    
        $sql = "INSERT INTO trainings(Training_Coordinator, Training_title, Training_Code, Training_Location, Training_Duration,Training_Endtime. Training_Time, Training_Day,Training_Startdate,Training_Enddate, No_Of_Classes,Schedule) VALUES('$training_coordinator','$training_title','$training_code','$training_loc', '$training_dur', '$training_endtime','$training_time', '$training_day', '$training_startdate','$training_enddate', $no_of_classes,'$training_schedule')";
        if ($this->connectToDB()->query($sql)) {
            echo 'New Course Created';
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
            return  [];
        }
    }
   
    public function getCourseRegistrants($code){
        $this->connectToDB();
        $registrant = array();
        $sql = "SELECT * FROM enrolled WHERE Training_Code='$code'";
        $result = $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
            
                $registrant[] = $row;
            }
            return $registrant;
       
            
        } else {
            return  null;
        }
    }
   


    public function getUserPassword($email){
        $this->connectToDB();
        $sql = "SELECT PN FROM employee WHERE email ='$email' ";
        $result =  $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
                return $rows['PN'];
            }
        } else {
            return 'User Not Found';
        }

    }
    public function getAllEmployee(){
        $this->connectToDB();
        $sql = "SELECT * FROM employee  ";
        $result =  $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
              $employees[] = $rows;
            }

            return $employees;
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
    
    public function getACourse($course_code){
        $this->connectToDB();
        $sql = "SELECT * FROM trainings WHERE Training_Code='$course_code'";
        $result =  $this->connectToDB()->query($sql);
        $courses = array();
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
                $courses[] = $rows;
            }
              
                return $courses[0];
        } else {
            return 'No Training';
        }

    }
    
    public function getEnrolledCoursesStartTime($t_code){
      
        $this->connectToDB();
        $sql = "SELECT * FROM trainings WHERE Training_Code ='$t_code' ORDER BY Training_Time, Training_Time";
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
        $sql = "SELECT * FROM trainings WHERE Training_Coordinator ='$name'";
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