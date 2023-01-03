<?php
include '../includes/db.php';
$db = new Db;
session_start();
if (isset($_POST['present']) ) {
    $name = $_POST['fullname'];
    $oracle_no = $_POST['oracle_no'];
    $course = $_POST['course'];
    $classesTaken = $db->getNoOfClassesTaken($course);
    print_r($classesTaken);
    $table = $course. '_0'.strval(intval($classesTaken) + 1);
    $db->markAttendantPresentOrAbsent($_SESSION['name'],$name,$oracle_no, 'present',$table);
}

if (isset($_POST['absent'])) {
    $name = $_POST['name'];
$oracle_no = $_POST['oracle_no'];
$course = $_POST['course'];
$classesTaken = $db->getNoOfClassesTaken($course);
print_r($classesTaken);

 $db->markAttendantPresentOrAbsent($_SESSION['name'],$name,$oracle_no,'absent',$table);
   
}
?>