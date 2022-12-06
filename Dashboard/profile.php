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
   header('Location: login.php');
  }
 include 'dashboardNav.php';
  
  ?>
  <div class="info p-56">

    <div >
    <img src="../<?php echo $_SESSION['image'] ?>" alt=" <?php echo  $_SESSION['name']; ?> " class="rounded-full  w-48  h-48 object-cover mt-3 relative -left-8">
     <p class="font-[Mulish] mt-8  font-extrabold text-2xl">
 <?php echo  $_SESSION['name']; ?></p>

    </div>
  </div>
  </div>
</body>
</html>