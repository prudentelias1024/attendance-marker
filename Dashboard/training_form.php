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
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script defer src="../chart.js"></script>

</head>
<body >
<?php 

include '../includes/links.php';
session_start();
  if (empty($_SESSION['name'])) {
   header('Location: ../login.php');
  }
?>
 <div class=" flex flex-row gap-16 ">
<?php

 include 'dashboardNav.php';
  
  ?>
      <form method="POST" action="./trainingCreator.php" class="w-2/4 mt-8 gap-8 flex flex-col ml-[15em]">


  <div class="form-group">
    <label for="trainingTitle">Training Title</label>
    <input type="text" name="training_title" class="form-control" id="trainingTitle" aria-describedby="emailHelp" placeholder="Enter Training Title">
  </div>
  
  <div class="form-group">
    <label for="trainingDuration">Training Duration</label>
   <select id="duration" name="training_dur" class="form-control form-control-lg">
     <option value="1 day" > 1 Day</option>
     <option value="7 days" > 7 Days</option>
     <option value="2 weeks" > 2 Weeks</option>
     <option value="3 weeks" > 3 Weeks</option>
     <option value="1 Month" > 1 Month</option>
     <option value="2 Months" > 2 Months</option>
     <option value="3 Months" > 3 Months</option>
     <option value="6 Months" > 6 Months</option>
     <option value="9 Months" > 9 Months</option>
     <option value="12 Months" > 12 Months</option>
     </select>
  </div>

  <div class="form-group">
    <label for="trainingLocation">Training Location</label>
    <input name="training_loc" type="text" class="form-control" id="trainingLocation" aria-describedby="emailHelp" placeholder="Enter Training Location">
  </div>
  
  <div class="form-group">
    <label for="trainingDay">Training Day</label>
    <select name="training_day" class="form-control form-control-lg">
     <option value="Monday" > Monday</option>
     <option value="Tuesday" >Tuesday</option>
     <option value="Wednesday" > Wednesday</option>
     <option value="Thursday" > Thursday</option>
     <option value="Friday" > Friday</option>
     <option value="Saturday" > Saturday</option>
     <option value="Sunday" > Sunday </option>
    </select>
   
  </div>
  <div class="form-group">
    <label for="trainingDay">Training Time</label>
    <select name="training_time" class="form-control form-control-lg">
     <option value="09:00:00" > 09:00 AM</option>
     <option value="10:00:00" >10:00 AM</option>
     <option value="11:00:00" >11:00 AM</option>
     <option value="12:00:00" >12:00 PM</option>
     <option value="13:00:00" >13:00 PM</option>
     <option value="14:00:00" >14:00 PM</option>
     <option value="15:00:00" >15:00 PM</option>
     <option value="16:00:00" >16:00 PM</option>
     <option value="17:00:00" >17:00 PM</option>
    </select>
   
  </div>
  <div class="form-group">
    <label for="trainingDay">Training Schedule</label>
    <select name="training_schedule" class="form-control form-control-lg">
      <option value="Once" > Once</option>
      <option value="Daily" > Daily</option>
      <option value="Weekly" >Weekly</option>
      <option value="Monthly" > Monthly</option>
      <option value="Yearly" > Yearly</option>
    </select>
    
  </div>
  <div class="form-group">
    <label for="startdate">Training Start Date  </label>
    <input class="form-control form-control-lg" id="startdate" type="date" name="training_startdate" >
  </div> 
  
  <div class="form-group">
    <label for="startdate">Training End Date  </label>
    <input class="form-control form-control-lg" type="date" id="enddate" name="training_enddate">
  </div>

  <div class="form-group" style="opacity: 1 !important;">
    <label for="startdate">No of Classes  </label>
    <input readonly class="form-control form-control-lg" id="no_of_classes" type="text" name="no_of_class"  required >
  </div> 
  

  <button type="submit" id="create" name="create" class="btn btn-primary">Create Training</button>

</form>
   
<script>
    document.getElementById("startdate").addEventListener('input',calEnddate)
 function calEnddate(){
 
let duration = document.getElementById('duration').value.trim();
let startdate = document.getElementById("startdate").toString();    
if (duration.endsWith('days') || duration.endsWith('day')) {
   let enddate = moment().add(parseInt(duration.split(" ")[0]), 'days')
  enddate = enddate.format('YYYY-MM-DD')
  document.getElementById('enddate').value = enddate;
  startdate = startdate.format('YYYY-MM-DD')
   startdate = moment(new Date(startdate).toISOString())
   enddate = moment(new Date(enddate).toISOString())   
   
   alert(startdate.diff(enddate, 'days'))
   document.getElementById('no_of_class').value = enddate.diff(startdate, 'days')
}
}

    

</script>
</body>
</html>