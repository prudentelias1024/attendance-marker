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
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.min.js"></script>
<script defer src="../chart.js"></script>
</head>
<body>
<?php 

include '../includes/links.php';
session_start();
  if (empty($_SESSION['name'])) {
   header('Location: ../login.php');
  }
?>
 <div class="statistics flex flex-row gap-16">
<?php

 include 'dashboardNav.php';
  
  ?>
  <div class="p-12 grid grid-cols-4 gap-4 pl-36">
    <div class="flex flex-row gap-3 h-fit text-white bg-purple-600 rounded-lg border px-4 py-4">
      <i class="bi bi-card-list text-5xl"></i>
      <div class="flex flex-col">
          <p class="font-[Mulish] text-md mt-2 -mb-1 indent-3">Enrolled Courses</p>
          <p class="font-[Montserrat] text-white font-bold text-2xl indent-28 mt-2 -mb-1">7</p>
      </div>
      </div>

    <div class="flex flex-row h-fit text-white bg-teal-500 rounded-lg border px-4 py-4">
        <i class="bi bi-patch-check-fill text-5xl"></i>
     <div class="flex flex-col">
        <p class="font-[Mulish] text-md mt-2 -mb-1 ml-3 indent-2">Completed Courses</p>
        <p class="font-[Montserrat] text-white font-semibold text-2xl indent-32 mt-2 -mb-1">7</p>
    </div>
    </div>


    <div class="flex flex-row h-fit text-white bg-yellow-500 rounded-lg border px-4 py-4">
    <i class="fa-solid fa-bars-progress  text-5xl"></i>
    
    <div class="flex flex-col">
        <p class="font-[Mulish] text-md mt-2 -mb-1 ml-3 indent-2"> Courses In Progress</p>
        <p class="font-[Montserrat] text-white font-semibold text-2xl indent-32 mt-2 -mb-1">7</p>
    </div>
    </div>

    <div class="flex flex-row h-fit text-white bg-red-500 rounded-lg border px-4 py-4">
    <i class="bi bi-x-circle-fill  text-5xl"></i>
    
    <div class="flex flex-col">
        <p class="font-[Mulish] text-md mt-2 -mb-1 ml-3 indent-8">Course Failed</p>
        <p class="font-[Montserrat]  text-white font-semibold text-2xl indent-32 mt-2 -mb-1">7</p>
    </div>
    </div>


<chart id="course" style="height: 100%; width: 100%"> </chart>

</div>

 </div>

</body>
</html>