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
  <title> Reports </title>
</head>
  <body>
    <div class="reports flex flex-row ">

  <?php
  
  session_start();
    include '../includes/links.php';
    if (empty($_SESSION['name'])) {
     header('Location: ../login.php');
    }
   include 'dashboardNav.php';
    
    ?>
    <?php
    include '../includes/db.php';
    $db = new Db;
    $courses = $db->getCourses();
    foreach ($courses as $course) {
     echo '<div class="courses flex flex-row gap-12 pt-24 pl-32 ">
     <p class="title font-[Mulish] text-2xl font-extrabold ml-2 ">'.$course['Training_title'].'</p>
     <p class="title font-[Mulish] text-xl font-extrabold mt-2 ">'.$course['Training_Code'].'</p>
     <form action="reportMaker.php" method="POST">
       <input name="course" readonly value="'.$course["Training_Code"].'" style="opacity: 0;">
       <button type="submit" name="generate"  class=" bg-[#512bd4] mt-[-0.5em] ml-[-11em]  text-white w-fit h-max py-3 px-2 rounded-xl -mb-12">Generate Report</button>  
      
       
     </form>
   </div>';
    }

    ?>
    
<body>
</body>
</html>