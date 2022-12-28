<?php
include '../includes/db.php';
$db = new Db;

if(isset($_POST['training_title'])){
$training_title = $_POST["training_title"];
$training_dur = $_POST["training_dur"];
$training_loc = $_POST["training_loc"];
$training_day = $_POST["training_day"];
$training_time = $_POST["training_time"];
$training_schedule = $_POST["training_schedule"];
$training_startdate = $_POST["training_startdate"];
$training_enddate = $_POST["training_enddate"];
$no_of_class = $_POST['no_of_class'];
if (!empty($db->getCourses())) {
    $getLastCourseNumber = $db->getCourses()[count($db->getCourses()) -1]['Training_Code'];
    print_r(intval(explode('T',$getLastCourseNumber)[1]) + 1);
    
    $nextCodeAvailable = intval(explode('T',$getLastCourseNumber)[1]) + 1;
    if($nextCodeAvailable < 10){
        $nextCodeAvailable ='T000'. strval($nextCodeAvailable);
    } else {
        $nextCodeAvailable ='T00'. strval($nextCodeAvailable);
   
    }
} else {
    $training_code = 'T0001';
}




}
