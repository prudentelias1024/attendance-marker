<?php
session_start();
if (isset($_POST['m_code'])) {
    $meeting_to_enrol = $_POST['m_code'];
    $oracle_no =  $_SESSION["oracle_no"];
    $name = $_SESSION['name'];
    $coordinator = $_POST['m_coordinator'];
    $title = $_POST['m_title'];
    

    include '../includes/db.php';
    $db = new Db;
    
     echo  $db->enrol($oracle_no,$name,$title,$meeting_to_enrol,$coordinator);
     header('Location: ./meetings.php');
}



?>