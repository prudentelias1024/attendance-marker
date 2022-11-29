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
  <?php
    include './includes/links.php'

    ?>
</head>
<body>
 
    <div class="nav flex-row">
        
        <div>
            <img src="npa1.png"/>
        </div>
        <ul class="nav nav-pills mt-6 mr-12 ml-auto gap-5">
            <li class="nav-item">
                <a style="font-family: Montserrat" class="text-xl" href="dashboard.php">Dashboard</a>
            </li>
            
            <li class="nav-item">
                <a style="font-family: Montserrat" class="text-xl"  href="profile.php">Profile</a>
  </li>
  
  <li class="nav-item">
      <a style="font-family: Montserrat" class="text-xl"  href="./statistics.php">Statistics</a>
    </li>
  <li class="nav-item">
      <a style="font-family: Montserrat" class="text-xl"  href="./logout.php">Logout</a>
    </li>
</ul>

</div>
</body>
</html>