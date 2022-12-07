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
  <title> Attendance Marker </title>
</head>
  <body>
    <div class="dashboard flex flex-col ">

  <?php
  
  session_start();
    include '../includes/links.php';
    if (empty($_SESSION['name'])) {
     header('Location: ../login.php');
    } else {
      header('Location: ./statistics.php');
    }
   include 'dashboardNav.php';
    
    ?>
    </div>
<body>
</body>
</html>