<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
   
    <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="../circular_progress.css" >
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script defer src="../chart.js"></script>
<script defer src="./timeUpdater.js"></script>

</head>
<body >
<?php 

include '../includes/links.php';
session_start();
  if (empty($_SESSION['name'])) {
   header('Location: ../login.php');
  }
?>
 <div class="statistics flex flex-row gap-16 ">
<?php

 include 'dashboardNav.php';
  
  ?>
  <div class="flex flex-col -ml-28">

  
  <div class="p-12 grid grid-cols-4 gap-4 pl-36">
    <div class="flex flex-row gap-8 h-fit  text-white bg-purple-600 rounded-lg border px-8 py-4 ">
      <i class="bi bi-card-list text-5xl"></i>
      <div class="flex flex-col ">
          <p class="font-[Mulish] text-lg mt-2 -mb-1 indent-3">Enrolled Courses</p>
          <p class="font-[Montserrat] text-white font-bold text-2xl indent-32 mt-2 -mb-1"><?php

          include '../includes/db.php';
          $db = new Db;
          $enrolledCourse  = $db->getEnrolledCourse($_SESSION['oracle_no']);
          if (!empty($enrolledCourse)) {
            
            $no_of_courses_enrolled = count($enrolledCourse);
             echo $no_of_courses_enrolled;
          } else {
            echo 0;
          }?></p>
          
      </div>
      </div>

    <div class="flex flex-row h-fit text-white bg-teal-500 rounded-lg border px-4 py-4">
        <i class="bi bi-patch-check-fill text-5xl"></i>
     <div class="flex flex-col">
        <p class="font-[Mulish] text-lg mt-2 -mb-1 ml-3 indent-2">Completed Courses</p>
        <p class="font-[Montserrat] text-white font-semibold text-2xl indent-40 mt-2 -mb-1">0</p>
    </div>
    </div>


    <div class="flex flex-row h-fit text-white bg-yellow-500 rounded-lg border px-4 py-4">
    <i class="fa-solid fa-bars-progress  text-5xl"></i>
    
    <div class="flex flex-col">
        <p class="font-[Mulish] text-lg mt-2 -mb-1 ml-3 indent-2"> Courses In Progress</p>
        <p class="font-[Montserrat] text-white font-semibold text-2xl indent-40 mt-2 -mb-1">0</p>
    </div>
    </div>

    <div class="flex flex-row h-fit text-white bg-red-500 rounded-lg border px-4 py-4">
    <i class="bi bi-x-circle-fill  text-5xl"></i>
    
    <div class="flex flex-col">
        <p class="font-[Mulish] text-lg mt-2 -mb-1 ml-3 indent-8">Course Failed</p>
        <p class="font-[Montserrat]  text-white font-semibold text-2xl indent-32 mt-2 -mb-1">0</p>
    </div>
    </div>

</div>
<?php
$enrolledCourse  = $db->getEnrolledCourse($_SESSION['oracle_no']);
if (!empty($enrolledCourse)) {
 
  $time = $db->getEnrolledCoursesStartTime($enrolledCourse[0]["Training_Code"]);
  // $timeToStart = $time[0]['Training_Time'];
  $t_day = new DateTime($time[0]['Training_Day'].' '.$time[0]['Training_Time']);
  $today = new DateTime(date("l jS  F Y h:i:s A"));
   
   $diff=  date_diff($today,$t_day);
   
  
  
  // print_r($today);  
  $currentTime = date("l jS  F Y h:i:s A");
  echo '<p id="date" style="opacity: 0;" >'. date_format($t_day,"Y/m/d H:i:s").'</p>
  <p  id="countdown_title" class="font-[Mulish] font-semibold text-3xl mt-8 text-[#747474] text-center">Countdown To '.$enrolledCourse[0]["Training_Title"] .'('. $enrolledCourse[0]["Training_Code"].')</p>
  
    <div  id="countdown" class="countdown flex flex-row gap-56 ml-[12em] shadow-md border-1 p-4 
  bg-gradient-to-r from-violet-500 to-fuchsia-500 rounded-lg w-fit  ">
     <div class="days flex-col ml-24 -mr-4">
      <p id="days" class="font-[Montserrat] text-8xl text-white font-extrabold">'. sprintf("%02d", $diff->d).'</p>
      <p  class="font-[Montserrat] uppercase font-bold text-2xl text-white">Days</p>
     </div>
     <div class="hours flex-col">
      <p id="hours" class="font-[Montserrat] text-8xl text-white font-extrabold">'. sprintf("%02d", $diff->h).'</p>
      <p class="font-[Montserrat] uppercase font-bold text-2xl text-white">Hours</p>
     </div>
     <div class="minutes flex-col">
      <p  id="minutes" class="font-[Montserrat] text-8xl text-white font-extrabold">'. sprintf("%02d", $diff->i).'</p>
      <p class="font-[Montserrat] uppercase font-bold text-2xl text-white">Minutes</p>
     </div>
     <div class="seconds flex-col mr-10">
      <p id="seconds" class="font-[Montserrat] text-8xl text-white font-extrabold">'. sprintf("%02d", $diff->s).'</p>
      <p class="font-[Montserrat] uppercase font-bold text-2xl text-white">Seconds</p>
     </div>
  
    </div>
  ';
}
// print_r($currentTime);
?>
<div class="flex flex-col mt-10">
   <p class="font-[Mulish] font-semibold text-3xl mt-8 ml-36">Courses</p>
   <div class="courses grid grid-cols-3 ml-36 gap-12">
 <?php
    $enrolled_courses = $db->getEnrolledCourse($_SESSION['oracle_no']);
    
   if($enrolled_courses !== null){
    foreach ($enrolled_courses as $key => $course) {
      echo '   <div class="course border w-fit  px-24    py-12 rounded-md ">
      <div class="progress border w-[130%] -ml-12" style="height: 10px;">
       <div class="progress-bar bg-info " role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
       </div>
     <div class="flex flex-row mt-6 -ml-12">
  

         <p class="title font-[Montserrat] font-extrabold ml-2 text-2xl">'.$course['Training_Title'].'</p>
     </div>
  
     <div class="flex flex-row mt-6 -ml-12">   
     <p class="font-[Mulish]">Training Code:</p> <p class="code font-[Montserrat] font-extrabold ml-2">'.$course['Training_Code'].'</p>
     </div>
     <div class="flex flex-row mt-6 -ml-12">
  
      <p class="font-[Mulish]">Training Coordinator:</p> <p class="code font-[Montserrat] font-extrabold ml-2">'.$course['Training_Cordinator'].'</p>
     </div> 
     </div>   ';
    }
   } else {
    echo '<p class="font-[Mulish] text-xl text-gray-600 mt-8 ml-3">You haven\'t enrolled for any training yet </p>  ';
   }
   
?>
   
   
   
       </div>
   
     
   
 
   </div> 
</div>
  
  
 </div>
 </div>
</body>
</html>