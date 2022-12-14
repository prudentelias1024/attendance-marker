<?php
session_start();
if (isset($_POST['t_code'])) {
    $course_to_enrol = $_POST['t_code'];
    $oracle_no =  $_SESSION["oracle_no"];
    $name = $_SESSION['name'];
    $coordinator = $_POST['t_coordinator'];
    $title = $_POST['t_title'];
    

    include '../includes/db.php';
    $db = new Db;
    
     echo  $db->enrol($oracle_no,$name,$title,$course_to_enrol,$coordinator);
     header('Location: ./courses.php');
}



?>