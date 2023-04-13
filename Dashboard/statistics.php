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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="
        index.css">
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script defer src="../chart.js"></script>
<script defer src="timeUpdater.js"></script>
<script defer src="moment.min.js"></script>

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
          <p class="font-[Mulish] text-lg mt-2 -mb-1 indent-3">Joined Meeting</p>
          <p class="font-[Montserrat] text-white font-bold text-2xl indent-28  mt-2 -mb-1"><?php

          include '../includes/db.php';
          $db = new Db;
          $no_of_joined_Meeting = 0;
          $joinedMeetings  = $db->getJoinedMeeting($_SESSION['oracle_no']);
          if (!empty($joinedMeetings)) {
            
            $no_of_joined_Meeting = count($joinedMeetings);
           
            echo  $no_of_joined_Meeting;
          } else {
            echo  $no_of_joined_Meeting;
          }?></p>
          
      </div>
      </div>

    <div class="flex flex-row h-fit text-white bg-teal-500 rounded-lg border px-4 py-4">
        <i class="bi bi-patch-check-fill text-5xl"></i>
     <div class="flex flex-col">
        <p class="font-[Mulish] text-lg mt-2 -mb-1 ml-3 indent-2">Completed Meeting</p>
        <p class="font-[Montserrat] text-white font-semibold text-2xl indent-32 lg:indent-40 mt-2 -mb-1">
   <?php
      $no_of_completed_Meeting = 0;
      if (!empty($joinedMeetings)) {
  
      
       foreach ($joinedMeetings as $joinedMeeting) {
        $status=  $db->getUserMeetingCompletionStatus($joinedMeeting['Meeting_Code'],$_SESSION['name']);
        $no_of_completed_Meeting += $status;
      }
       echo $no_of_completed_Meeting;
    } else {
      echo $no_of_completed_Meeting;
    }
   ?>

        </p>
    </div>
    </div>


    <div class="flex flex-row h-fit text-white bg-yellow-500 rounded-lg border px-4 py-4">
    <i class="fa-solid fa-bars-progress  text-5xl"></i>
    
    <div class="flex flex-col">
        <p class="font-[Mulish] text-lg mt-2 -mb-1 ml-3 indent-2"> Meeting In Progress</p>
        <p class="font-[Montserrat] text-white font-semibold text-2xl indent-32 lg:indent-40 mt-2 -mb-1">
        <?php
      $no_of_ongoing_Meeting = 0;
      if (!empty($joinedMeetings)) {
       foreach ($joinedMeetings as $joinedMeeting) {
        $status =  $db->getUserOngoingMeeting($joinedMeeting['Meeting_Code'],$_SESSION['name']);
           $no_of_ongoing_Meeting += $status;
      }
       echo $no_of_ongoing_Meeting;
    } else {
     
      echo  '<p class="font-[Montserrat]  text-white font-semibold text-2xl indent-32 mt-2 -mb-1">'.$no_of_ongoing_Meeting.'</p>';
    }
   ?>

        </p>
    </div>
    </div>

    <div class="flex flex-row h-fit text-white bg-red-500 rounded-lg border px-4 py-4">
    <i class="bi bi-x-circle-fill  text-5xl"></i>
    
    <div class="flex flex-col">
        <p class="font-[Mulish] text-lg mt-2 -mb-1 ml-3 indent-8">Meeting Failed</p>
        <p class="font-[Montserrat]  text-white font-semibold text-2xl indent-32 mt-2 -mb-1">0</p>
    </div>
    </div>

</div>
<?php
$joinedMeeting  = $db->getJoinedMeeting($_SESSION['oracle_no']);

if (!empty($joinedMeeting)) {
 
  $time = $db->getJoinedMeetingsStartTime($joinedMeeting[0]["Meeting_Code"]);
  // $timeToStart = $time[0]['Meeting_Time'];
  $m_day = new DateTime($time[0]['Meeting_Day'].' '.$time[0]['Meeting_Time']);
  $m_endtime = new DateTime($time[0]['Meeting_Day'].' '.$time[0]['Meeting_Endtime']);
  $m_enddatetime = new DateTime($time[0]['Meeting_Enddate'].' '.$time[0]['Meeting_Endtime']);
  $today = new DateTime(date("l jS  F Y h:i:s A"));
   
   $diff=  date_diff($today,$m_day);
   
  
  
  // prinm_r($today);  
  $currentTime = date("l jS  F Y h:i:s A");
  echo '<p id="date" style="opacity: 0;" >'. date_format($m_day,"Y/m/d H:i:s").'</p>;
  <p id="enddate" style="opacity: 0;" >'. date_format($m_day,"Y/m/d H:i:s").'</p>
  <p id="endtime" style="opacity: 0;" >'. date_format($m_endtime,"Y/m/d H:i:s").'</p>
  <p id="enddatetime" style="opacity: 0;" >'. date_format($m_enddatetime,"Y/m/d H:i:s").'</p>
  
  <p  style="opacity: 0;" id="countdown__end__title" class="font-[Mulish] font-semibold text-3xl mt-8 text-[#747474] text-center"></p>
  <p  id="countdown_title" class="font-[Mulish] font-semibold text-3xl  text-[#747474] text-center">Countdown To '.$joinedMeeting[0]["Meeting_Title"] .'('. $joinedMeeting[0]["Meeting_Code"].')</p>
  
    <div  id="countdown" class="countdown flex flex-row gap-32 m-auto   shadow-md border-1 p-4 
  bg-gradient-to-r from-violet-500 to-fuchsia-500 rounded-lg lg:w-fit  ">
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
// prinm_r($currentTime);
?>
<div class="flex flex-col mt-10">
   <p class="font-[Mulish] font-semibold text-3xl mt-8 ml-36">Joined Meetings</p>
   <div class="Meetings grid grid-cols-2  ml-36 gap-12">
 <?php
    $joined_Meetings = $db->getJoinedMeeting($_SESSION['oracle_no']);
    
   if($joined_Meetings !== null){
    foreach ($joined_Meetings as $key => $Meeting) {
      echo '   <div class="Meeting border w-full  px-24 mt-12    py-12 rounded-md ">';
      if ($db->getMeetingPercentageCompletion($Meeting["Meeting_Code"], $_SESSION['name']) == 100) {
        echo ' <p style="top: -2em;
        left: 15em;" class="bg-teal-500 w-fit rounded-md px-3 py-1 relative  text-white">Completed</p>';
      } else if($db->getMeetingPercentageCompletion($Meeting["Meeting_Code"], $_SESSION['name']) == 0) {
        echo '<p style="top: -2em;
          left: 15em;" class="bg-red-500 w-fit rounded-md px-3 py-1 relative  text-white">Not Started</p>';
        } else {
      echo '<p style="top: -2em;
        left: 15em;" class="bg-yellow-500 w-fit rounded-md px-3 py-1 relative  text-white">Not Completed</p>';
      }
     if($db->getMeetingPercentageCompletion($Meeting["Meeting_Code"], $_SESSION['name']) == 0){
       echo '';
     }else {
 echo '
      <div class="progress border w-[130%] -ml-12" style="height: 10px;">
       <div class="progress-bar bg-info " role="progressbar" style="width: '.$db->getMeetingPercentageCompletion($Meeting["Meeting_Code"], $_SESSION['name']).'%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">'.$db->getMeetingPercentageCompletion($Meeting["Meeting_Code"], $_SESSION['name']).'%</div>
       </div>
     ';}
     echo 
     '
     <div class="flex flex-row mt-6 -ml-12">
  

         <p class="title font-[Montserrat] font-extrabold ml-2 text-2xl">'.$Meeting['Meeting_Title'].'</p>
     </div>
  
     <div class="flex flex-row mt-6 -ml-12">   
     <p class="font-[Mulish]">Meeting Code:</p> <p class="code font-[Montserrat] font-extrabold ml-2">'.$Meeting['Meeting_Code'].'</p>
     </div>
     <div class="flex flex-row mt-6 -ml-12">
  
      <p class="font-[Mulish]">Meeting Coordinator:</p> <p class="code font-[Montserrat] font-extrabold ml-2">'.$Meeting['Meeting_Cordinator'].'</p>
     </div> 
     </div>   ';
    
  }
   } else {
    echo '<p class="font-[Mulish] text-xl text-gray-600 mt-8 ml-3">You haven\'t meetings for any Meeting yet </p>  ';
   }
   
?>
   
   
   
       </div>
   
     
   
 
   </div> 
</div>
  
  
 </div>
 </div>
</body>
</html>