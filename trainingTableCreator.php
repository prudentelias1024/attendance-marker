<?php
    include './includes/db.php';
    $db = new Db;
    $courses = $db->getCourses();
    
    $training_code;
    $class_no;
    $t_day = new DateTime($courses[0]["Training_Startdate"]);
    $t_done = $courses[0]["Class_Taken"];
    $t_time = $courses[0]["Training_Time"];

    // print_r($t_day);
    $date = date_create(date("l j F Y h:i:s A"));
    $d_diff = date_diff($t_day, $date)->format("%d");
    // if($diff == 0 && )
    print_r($diff);
    $sql = "CREATE TABLE `attendance_marker`.`` (`Oracle_no` VARCHAR(6) NOT NULL , `Name` VARCHAR(100) NOT NULL , `Email` VARCHAR(75) NOT NULL , `Department` VARCHAR(50) NOT NULL , `Location` VARCHAR(20) NOT NULL ) ENGINE = InnoDB;"

?>