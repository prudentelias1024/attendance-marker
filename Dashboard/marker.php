<?php
include '../includes/db.php';
$db = new Db;
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$jobs = json_decode(stripslashes($_POST["jobs"]),true);
   foreach ($jobs as  $job) {       
   
       $name = $job['fullname'];
       $oracle_no = $job['oracle_no'];
       $course = $job['course'];
       $classesTaken = $db->getNoOfClassesTaken($course);
       $status= $job['status'];
       $table = $course. '_0'.strval(intval($classesTaken) + 1);
       
    print_r(explode('.', $db->markAttendantPresentOrAbsent($_SESSION['name'],$name,$oracle_no, $status,$table))[0]);;
     $db->incrementClassTaken($course,intval($classesTaken) + 1);
}       
        header('Location: ./course_management.php');  
}

?>