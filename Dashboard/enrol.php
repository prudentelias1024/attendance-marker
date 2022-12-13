<?php
if (isset($_POST['t_code'])) {
    $course_to_enrol = $_POST['t_code'];
    $oracle_no =  $_SESSION["oracle_no"];
    $name = $_SESSION['name'];
    $coordinator = $_POST['t_coordinator'];

    include '../includes/db.php';
    $db = new Db;
     $courses = $db->enrol($oracle_no,$name,$course_to_enrol,$coordinator);
}



?>