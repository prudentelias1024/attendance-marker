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
     echo "<div style='height: 15em; padding-top: 2em; padding-left: 2.5em; margin-right: 1em;' class='reports grid grid-cols-2  gap-12 '>";
    include '../includes/db.php';
    $db = new Db;
    $meetings = $db->getMeetings();
    foreach ($meetings as $meeting) {
     echo "<div  style='padding-left: 1em; padding-right: 1em;'  class='meetings px-[1em] flex flex-col gap-10 border rounded-md pt-24 pl-1 h-fit mt-[1em]'>
     <p class='title font-[Mulish] text-2xl font-extrabold ml-2 '>".$meeting['Meeting_title']."</p>
     <p class='title font-[Mulish] text-[#f8f8f8] text-lg font-extrabold ml-2 '>".$meeting['Meeting_Code']."</p>
     <form action='reportMaker.php' method='POST'>
       <input name='meeting' readonly value='".$meeting['Meeting_Code']."' style='opacity: 0;'>
       <button type='submit' name='generate' style='margin-bottom: 1em;' class=' bg-[#512bd4] mt-[-3.5em]  text-white w-full h-max py-3 px-2 '>Generate Report</button>  
      
       
     </form>
   </div>";
    }
    
   
echo '</div>';
    ?>
    
<body>
</body>
</html>