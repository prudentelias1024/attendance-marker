<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>
<div class="dashboard flex flex-row gap-10 ">

<?php

session_start();
  include '../includes/links.php';
  if (empty($_SESSION['name'])) {
   header('Location: ../login.php');
  }
 include 'dashboardNav.php';
  
  ?>
  <div class="info p-56">

    <div class="absolute left-1/2 -mt-32" >
    <img src="../<?php echo $_SESSION['image'] ?>" alt=" <?php echo  $_SESSION['name']; ?> " class="rounded-full  w-48  h-48 object-cover mt-3 relative -left-8">       
     <p class="font-[Mulish] mt-8  font-extrabold text-2xl">
 <?php echo  $_SESSION['name']; ?></p>
    <div class="grid grid-cols-3 gap-24 -ml-44 mt-20">
    <div class="flex flex-col gap-4">
      <i class="fa-solid fa-user text-7xl text-[#512bd4]"></i>
      <p class="font-[Mulish] capitalize text-[#512bd4] font-extrabold -indent-2 text-xl -mt-3">
         <?php echo  $_SESSION['oracle_no']; ?></p>
         <p class="font-[Mulish] font-semibold text-lg text-gray-500 -indent-3 -mt-7 ">Oracle No</p>
      </div>
    <div class="flex flex-col gap-4">
    <i class="fa-solid fa-briefcase text-7xl text-[#512bd4]"></i>
      <p class="font-[Mulish] capitalize text-[#512bd4] font-extrabold -indent-8 text-xl -mt-3">
         <?php echo  $_SESSION['designation']; ?></p>
         <p class="font-[Mulish] font-semibold text-lg text-gray-500 -indent-5 -mt-7 ">Designation</p>
      </div>
    <div class="flex flex-col gap-4">
    <i class="fa-solid fa-location-dot text-7xl text-[#512bd4]"></i>
      <p class="font-[Mulish] capitalize text-[#512bd4] font-extrabold -indent-2 text-xl -mt-3">
         <?php echo  $_SESSION['location']; ?></p>
         <p class="font-[Mulish] font-semibold text-lg text-gray-500 -indent-2 -mt-7 ">Location</p>
      </div>
    <div class="flex flex-col gap-4">
    <i class="fa-solid fa-envelope text-7xl text-[#512bd4]"></i>
      <p class="font-[Mulish]  text-[#512bd4] font-extrabold -indent-12 text-xl -mt-3">
         <?php echo  $_SESSION['username']; ?></p>
         <p class="font-[Mulish] font-semibold text-lg text-gray-500 -indent-5 -mt-7 ">Username </p>
      </div>
    <div class="flex flex-col gap-4">
    <i class="fa-solid fa-stairs text-7xl text-[#512bd4]"></i>
      <p class="font-[Mulish] capitalize text-[#512bd4] font-extrabold indent-4 text-xl -mt-3">
         <?php echo  $_SESSION['grade']; ?></p>
         <p class="font-[Mulish] font-semibold text-lg text-gray-500 -indent-1 -mt-7 ">Grade </p>
      </div>
    
   
    <div class="flex flex-col gap-4">
    <i class="fa-solid fa-book-bookmark  text-7xl text-[#512bd4]"></i>
      <p class="font-[Mulish] capitalize text-[#512bd4] font-extrabold  indent-5     text-xl -mt-3">
         0</p>
         <p class="font-[Mulish] font-semibold text-lg text-gray-500 -indent-5 -mt-7 ">Courses Offered </p>
      </div>
      
    </div>
    </div>

    </div>
  </div>
  </div>
</body>
</html>