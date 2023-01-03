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
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
  <script>
    let cc = 
    $("#present").click(()=> {

      $.ajax({
        type: POST,
        url: 'marker.php',
        data: data
      })
    })
  </script>
  <title> Marker </title>
  
</head>
  <body>
    <div class="reports flex flex-row gap-16 ">

  <?php
  session_start();
  $course = htmlspecialchars($_GET['course']);
  
    include '../includes/links.php';
    include '../includes/db.php';
    $db = new Db;
    $registrants = $db->getCourseRegistrants($course);
     if (empty($_SESSION['name'])) {
     header('Location: ../login.php');
    }
   include 'dashboardNav.php';
    ?>
  <div class="attendants pt-12">
    <p class="text-4xl">Registered Students</p>
    <?php
  if (!empty($registrants)) {
    foreach ($registrants as  $registrant) {
      echo '
      <div class="registrant flex-col gap-32">
      <form action="marker.php" method="POST">
      
      <input readonly  class="font-[Mulish] text-2xl" value="'.$registrant['Name'].'" name="fullname" />
      <input readonly  class="font-[Mulish] text-2xl" value="'.$registrant['Oracle_no'].'" name="oracle_no" />
      <input readonly  class="font-[Mulish] text-2xl" value="'.$course.'" name="course" />
      <button  id="absent"  type="submit" name="absent"> <i class="fa-solid fa-circle-xmark text-3xl bg-white-500 text-red-500 p-2"></i></button>
      <button id="present" type="submit" name="present" > <i class="fa-solid fa-circle-check text-3xl bg-white-500 text-green-500 p-2"></i></button>

      <p style="display:none;" id="showAbsent" class="text-xl text-red-600">Absent</p>
      <p style="display:none;" id="showPresent" class="text-xl text-green-600">Present</p>
      </form>
      
      </div>
      
      
      ';
    }
  } else {
    echo 'No Registered Student Yet';
  }
    
?>

  </div>
<body>
</body>
</html>