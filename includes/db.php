<?php
class DB
{
    public function getMeetingPercentageCompletion($meeting,$name){
        $no_of_meetings_attended = 0;
           $no_of_meeting_sessions = $this->getNoOfMeetingsTaken($meeting);
           for ($i=1; $i < $no_of_meeting_sessions + 1; $i++) { 
            $table = $meeting. '_0'. $i;
            
           $sql = "SELECT Attendance_Status FROM $table WHERE Name='$name'";
           $result = $this->connectToDB()->query($sql);
           while($row = $result->fetch_assoc()){
          $status = $row["Attendance_Status"];
         
           if ($status == 'Present') {
           $no_of_meetings_attended++;
           
           }

       }
    }
    if ($no_of_meeting_sessions == 0) {
        return 0;
    }else{
     return(($no_of_meetings_attended/$no_of_meeting_sessions)*100);}
}
    public function getUserOngoingMeeting($meeting, $name)
    {
       
     $no_of_meeting_taken =   $this->getNoOfMeetingsTaken($meeting);
     $no_of_meeting_sessions = $this->getNoOfMeetings($meeting);
       if($no_of_meeting_sessions > $no_of_meeting_taken){
            return 1;
     } else  if ($no_of_meeting_sessions == $no_of_meeting_taken) {
      return 0;
     }
   
}


    public function getNoOfMeetings($meeting)
    {
        $sql = "SELECT No_Of_Meetings FROM meetings WHERE  Meeting_Code='$meeting'";
        $result = $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                return $row['No_Of_Meetings'];
            }
           } else {
               return  0;
           }
    }
    public function getUserMeetingCompletionStatus($meeting, $name)
    {
        $no_of_meetings_attended = 0;
     $no_of_meeting_sessions =   $this->getNoOfMeetingsTaken($meeting);
    //  prinm_r($no_of_meeting_sessions);
     for ($i=1; $i < $no_of_meeting_sessions + 1; $i++) { 
        $table = $meeting. '_0'. $i;
        
       $sql = "SELECT Attendance_Status FROM $table WHERE Name='$name'";
       $result = $this->connectToDB()->query($sql);
       while($row = $result->fetch_assoc()){
      $status = $row["Attendance_Status"];
     
       if ($status == 'Present') {
       $no_of_meetings_attended++;
       
       }
   }
}
     if ($no_of_meetings_attended == $no_of_meeting_sessions) {
        return 1;
     }  else {
        return 0;
     }    
     
       
     
    
}
    

  public function getAllPresentStudent($table){
    $this->connectToDB();
    $joined_meetings = array();
   
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
    $joined_meetings = array();
   
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
  public function incrementMeetingTaken($meeting,$no_of_meeting){
    $this->connectToDB();
       $sql = " UPDATE MEETINGS SET Meeting_Taken='$no_of_meeting' WHERE Meeting_Code='$meeting'";
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

    public function getNoOfMeetingsTaken($meeting){
        $this->connectToDB();
           $sql = "SELECT Meeting_Taken FROM Meetings WHERE  Meeting_Code='$meeting'";
        $result = $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){

                return $row['Meeting_Taken'];
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

    public function markAttendantPresentOrAbsent($meeting_coordinator,$name,$oracle_no,$status,$table){
        $this->connectToDB();

        $sql = "INSERT INTO `$table`(Meeting_Coordinator, Name, Oracle_no, Attendance_Status) VALUES('$meeting_coordinator', '$name', '$oracle_no', '$status')";
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

        $sql = "CREATE TABLE `$name` (`Meeting_Coordinator` VARCHAR(60) NOT NULL , `Name` VARCHAR(75) NOT NULL , `Oracle_No` VARCHAR(6) NOT NULL , `Attendance_Status` VARCHAR(8) NOT NULL , PRIMARY KEY (`Oracle_No`))";
        if ($this->connectToDB()->query($sql)) {
            echo ''.$name.'  Created';
        } else {
            echo "Error:".$sql.' <BR>  '.$this->connectToDB()->error;
        }
    }
    public function createStudent($oracle_no, $full_name,$image,$username,$PN,$designation,$location,$grade){
        $this->connectToDB();

    
        $sql = "INSERT INTO employee(Oracle_no, Name, Image, Username, PN, Designation,Location, grade) VALUES('$oracle_no','$full_name','$image', '$username', '$PN', '$designation', '$location','$grade')";
        if ($this->connectToDB()->query($sql)) {
            echo 'New Employee  Created';
        } else {
            echo "Error:".$sql.' <BR>  '.$this->connectToDB()->error;
        }
    }
    public function createMeeting($meeting_coordinator,$meeting_title, $meeting_code,$meeting_loc,$meeting_dur,$meeting_time,$meeting_day,$meeting_startdate,$meeting_enddate, $no_of_meetings,$meeting_endtime,$meeting_schedule){
        $this->connectToDB();
    
        $sql = "INSERT INTO meetings(Meeting_Coordinator, Meeting_title, Meeting_Code, Meeting_Location, Meeting_Duration,Meeting_Endtime. Meeting_Time, Meeting_Day,Meeting_Startdate,Meeting_Enddate, No_Of_Meetings,Schedule) VALUES('$meeting_coordinator','$meeting_title','$meeting_code','$meeting_loc', '$meeting_dur', '$meeting_endtime','$meeting_time', '$meeting_day', '$meeting_startdate','$meeting_enddate', $no_of_meetings,'$meeting_schedule')";
        if ($this->connectToDB()->query($sql)) {
            echo 'New Meeting Created';
        } else {
            echo "Error:".$sql.' <BR>  '.$this->connectToDB()->error;
        }
    }
    public function enrol($oracle_no, $name, $m_title,$m_code,$m_cord){
        $this->connectToDB();

    
        $sql = "INSERT INTO joined(Oracle_no, Name, Meeting_Title,Meeting_Code, Meeting_Cordinator) VALUES('$oracle_no','$name','$m_title','$m_code', '$m_cord')";
        if ($this->connectToDB()->query($sql)) {
            return 'User Successfully Joined Meeting List';
        } else {
            return "Error:".$sql.' <BR>  '.$this->connectToDB()->error;
        }
    }
    public function getJoinedMeeting($oracle_no){
        $this->connectToDB();
        $joined_meetings = array();
        $sql = "SELECT * FROM joined WHERE Oracle_no='$oracle_no'";
        $result = $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
            
                $joined_meetings[] = $row;
            }
            return $joined_meetings;
       
            
        } else {
            return  [];
        }
    }
   
    public function getMeetingRegistrants($code){
        $this->connectToDB();
        $registrant = array();
        $sql = "SELECT * FROM joined WHERE Meeting_Code='$code'";
        $result = $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
            
                $registrant[] = $row;
            }
            return $registrant;
       
            
        } else {
            return  [];
        }
    }
   


    public function getUserPassword($username){
        $this->connectToDB();
        $sql = "SELECT PN FROM employee WHERE username ='$username' ";
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
    
    public function getUser($username){
        $this->connectToDB();
        $sql = "SELECT * FROM employee WHERE username ='$username' ";
        $result =  $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
                return array($rows["Oracle_no"],$rows["Name"],$rows["Image"],$rows["Username"], $rows["Designation"],$rows["Location"], $rows["Grade"], $rows["Role"]);
            }
        } else {
            return 'User Not Found';
        }

    }
    public function getMeetingParticipants($meeting_code){
        $participants = array();
        $this->connectToDB();
        $sql = "SELECT Oracle_no FROM joined WHERE Meeting_Code ='$meeting_code' ";
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

    public function hasJoined($joined_meeting_code){
        $this->connectToDB();
        $sql = "SELECT Meeting_Code FROM joined WHERE Meeting_Code='$joined_meeting_code'";
        $result = $this->connectToDB()->query($sql);
        if ($result->num_rows > 0) {
           return true;
        }else {
            return false;
        }

    }
    public function getMeetings(){
        $this->connectToDB();
        $sql = "SELECT * FROM meetings ORDER BY Meeting_Code";
        $result =  $this->connectToDB()->query($sql);
        $meetings = array();
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
               $meetings[] = $rows;
            }
              
                return $meetings;
        } else {
            return 'No Meeting';
        }

    }
    
    public function getAMeeting($meeting_code){
        $this->connectToDB();
        $sql = "SELECT * FROM Meetings WHERE Meeting_Code='$meeting_code'";
        $result =  $this->connectToDB()->query($sql);
        $meetings = array();
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
                $meetings[] = $rows;
            }
              
                return $meetings[0];
        } else {
            return 'No Meeting';
        }

    }
    
    public function getJoinedMeetingsStartTime($m_code){
      
        $this->connectToDB();
        $sql = "SELECT * FROM Meetings WHERE Meeting_Code ='$m_code' ORDER BY Meeting_Time, Meeting_Time";
        $result =  $this->connectToDB()->query($sql);
        $meetings = array();
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
                $meetings[] = $rows;
              
            }
              
                return $meetings;
        } else {
            return 'No Meeting';
        }

    }
    public function getCoordinatingMeetings($name){
        $this->connectToDB();
        $sql = "SELECT * FROM Meetings WHERE Meeting_Coordinator ='$name'";
        $result =  $this->connectToDB()->query($sql);
        $meetings = array();
        
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
               $meetings[] = $rows;
            }
              
                return $meetings;
        } else {
            return 'You are coordinating 0 Meeting';
        

    } 
}
}
?>