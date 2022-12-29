<?php
include '../includes/db.php';
$db = new Db;
session_start();
$course_coordinator = $_SESSION['name'];
if(isset($_POST['create'])){
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
    
    $training_code = intval(explode('T',$getLastCourseNumber)[1]) + 1;
    if($training_code < 10){
        $training_code ='T000'. strval($training_code);
    } else {
        $training_code ='T00'. strval($training_code);
   
    }
} else {
    $training_code = 'T0001';
}
$db->createTraining($course_coordinator,$training_title,$training_code,$training_loc,$training_dur,$training_time,$training_day,$training_startdate,$training_enddate,$no_of_class,$training_schedule);

// for ($i=1; $i <= $no_of_class ; $i++) { 
//     $attendance_code = $training_code. '_0'. $i;
//   $db->createAttendanceTable($attendance_code);
// }

}
