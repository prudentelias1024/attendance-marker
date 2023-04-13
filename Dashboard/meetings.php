<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../circular_progress.css" />
  <title> Attendance Marker </title>
  <script src="action_updater.js"></script>
  <style>
    .jq-toast-wrap{
    position: fixed;
    left: 50%;
    bottom: 90%;
    
    }
    .jq-toast-single{
      border-radius: 1em;
    padding: 3em;
    width: fit-content;

    }
    </style>  
</head>

  <body>
    
    <div class="meetings flex flex-row gap-16">

  <?php
  
  session_start();
    include '../includes/links.php';
    if (empty($_SESSION['name'])) {
     header('Location: ../login.php');
    }
   include 'dashboardNav.php';
    
    ?>
    
<div style="gap: 2em;" class="meeting_list grid h-fit grid-cols-2 xl:grid-cols-3  ml-10 mt-16 ">
 <?php
  include '../includes/db.php';
  $db = new Db;
   $meetings = $db->getmeetings();
   $joinedmeetings = $db->getJoinedmeeting($_SESSION['oracle_no']);
   if($meetings !== 'No Meeting'){
   foreach ($meetings as $key => $meeting) {
    $status =  $db->hasJoined($meeting['Meeting_Code']);
     echo '<div class="meeting border  w-full flex flex-col   px-20 h-fit   py-16 rounded-md ">
    
    <div class="flex flex-row mt-6 -ml-12">

      
        <p class="title font-[Mulish] text-3xl  font-extrabold ml-2 text-[#939ca5]">'.$meeting['Meeting_title']. '</p>
    </div>

  <div class="flex flex-row mt-6 -ml-12 text-2xl">   
    <p class="code font-[Montserrat] font-extrabold ml-2 text-[#939ca5]">'.$meeting['Meeting_Code'].'</p>
   </div>
 <div class="flex flex-row gap-0">

  <div class="flex flex-col mt-6 -ml-12">

   <p class="font-[Mulish] font-semibold text-[#b8b8b8]">Participants</p> <br> 

   
   <div  class="participants flex flex-row -mt-8 ">';
      $images =  $db->getMeetingParticipants($meeting['Meeting_Code']);
      
      if ($images !== 'No Participants') {
        foreach ($images as $image) {
        

      echo  '<img style="width: 2.5em; height: 2.5em;" src=".'.$image["Image"].'" alt="" class="rounded-full -ml-4 mt-4 object-cover ">
   


  

  
  
  ';    

   }
  
   
  } else {
    echo '<p style="margin-top: 1em; color: #b8b8b8; font-weight: 800;"> No participants </p>';
  }
  echo   ' </div>
  </div>';
  
  echo '
<div style="position: relative; left: 6em; top: 1.7em" class="container flex-col flex  ">

  <p class="font-[Mulish] font-semibold mb-2 text-[#b8b8b8]" style="margin-left: 1em">Progress</p>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="prog blue">
                <span class="prog-left">
                  <span class="prog-bar"></span>
                </span>
                <span class="prog-right">
                    <span class="prog-bar"></span>
                </span>
                <div style="
                margin-left: 0.7em;" class="prog-value font-bold">'.($meeting["Meeting_Taken"]/$meeting["No_Of_Meetings"] * 100).'%
                </div>
            </div>
        </div>
  </div>


  
</div>

</div>
   
    
<div class="flex flex-row mt-12 justify-between -ml-20 -mb-12">
  <div style="margin-left: 1em;" class="flex flex-row gap-2 ml-6">
      <i class="fa-solid fa-user text-[#b8b8b8] mt-1"></i>
    <p class="font-[Mulish] text-[#adadad] font-bold">'.$meeting['Meeting_Coordinator'].'</p>
  </div>
  <div class="flex flex-row relative left-16 gap-1">
    <i class="fa-solid fa-list text-[#adadad] mt-1 "></i>
    <p class="font-[Mulish] text-[#adadad] font-bold">'.$meeting['No_Of_Meetings'].' Meetings</p>

  </div>

</div>

';

if ($status) {
  
 
    echo  '<form action="./enrol.php" method="post" class="w-full">
    <button type="submit" id="enrol"style="width: inherit;" onclick="removemeeting(event)" class=" bg-[#512bd4] mt-14 text-white py-3 rounded-md -mb-12">Joined</button>
    <input type="hidden" name="m_code" value="'.$meeting['Meeting_Code'].'"/>
    <input type="hidden" name="m_coordinator" value="'.$meeting['Meeting_Coordinator'].'"/>
    <input type="hidden" name="m_title" value="'.$meeting['Meeting_title'].'"/>
    </form>
    </div>
    
    ';

} else {
  echo '<form action="./enrol.php" method="post" class="w-full">
    
  <button type="submit" id="enrol" style="width: 100%;" onclick="removemeeting(event)" class="w-fit bg-[#512bd4] mt-32 text-white py-3 rounded-md ">Join</button>
  <input type="hidden" name="m_code" value="'.$meeting['Meeting_Code'].'"/>
  <input type="hidden" name="m_coordinator" value="'.$meeting['Meeting_Coordinator'].'"/>
  <input type="hidden" name="m_title" value="'.$meeting['Meeting_title'].'"/>
  </form>
  </div>
  ';
  
}


}
   

} else {
  echo '<p class="text-3xl">No meetings To Display </p>';
 }

?>


</div>
</div>


  </body>

  </html>