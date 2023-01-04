<?php
include '../includes/db.php';
$db = new Db;
session_start();
if (isset($_POST['fullname']) && $_POST['status'] == 'Present') {
    $name = $_POST['fullname'];
    $oracle_no = $_POST['oracle_no'];
    $course = $_POST['course'];
    $classesTaken = $db->getNoOfClassesTaken($course);
    $status= $_POST['status'];
    $table = $course. '_0'.strval(intval($classesTaken) + 1);

    echo $db->markAttendantPresentOrAbsent($_SESSION['name'],$name,$oracle_no, $status,$table);
     // header('Location: ./students_assessments.php?course='.$course.'');  
    
}

if (isset($_POST['fullname']) && $_POST['status'] == 'Absent') {
    $name = $_POST['fullname'];
$oracle_no = $_POST['oracle_no'];
$course = $_POST['course'];
$classesTaken = $db->getNoOfClassesTaken($course);
    $status= $_POST['status'];
    $table = $course. '_0'.strval(intval($classesTaken) + 1);
    echo $db->markAttendantPresentOrAbsent($_SESSION['name'],$name,$oracle_no, $status,$table);
 
}
?>