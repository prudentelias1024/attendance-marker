<?php
include '../includes/db.php';
$db = new Db;
session_start();
$meeting_coordinator = $_SESSION['name'];
if(isset($_POST['create'])){
$meeting_title = $_POST["meeting_title"];
$meeting_dur = $_POST["meeting_dur"];
$meeting_loc = $_POST["meeting_loc"];
$meeting_day = $_POST["meeting_day"];
$meeting_time = $_POST["meeting_time"];
$meeting_schedule = $_POST["meeting_schedule"];
$meeting_startdate = $_POST["meeting_startdate"];
$meeting_enddate = $_POST["meeting_enddate"];
$meeting_endtime = $_POST["meeting_endtime"];
$no_of_class = $_POST['no_of_class'];
if (!empty($db->getCourses())) {
    $getLastCourseNumber = $db->getCourses()[count($db->getCourses()) -1]['meeting_Code'];
    print_r(intval(explode('T',$getLastCourseNumber)[1]) + 1);
    
    $meeting_code = intval(explode('T',$getLastCourseNumber)[1]) + 1;
    if($meeting_code < 10){
        $meeting_code ='M000'. strval($meeting_code);
    } else {
        $meeting_code ='M00'. strval($meeting_code);
   
    }
} else {
    $meeting_code = 'M0001';
}
$db->createmeeting($meeting_coordinator,$meeting_title,$meeting_code,$meeting_loc,$meeting_dur,$meeting_time,$meeting_day,$meeting_startdate,$meeting_enddate,$no_of_class,$meeting_endtime,$meeting_schedule);

for ($i=1; $i <= $no_of_class ; $i++) { 
    $attendance_code = $meeting_code. '_0'. $i;
  $db->createAttendanceTable($attendance_code);
}

}
