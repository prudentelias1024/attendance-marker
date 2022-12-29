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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../circular_progress.css" />
  <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
  rel="stylesheet"
/>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script defer src="./modal.js"></script>
  <title> Attendance Marker </title>
</head>  <body>
   
    <div class="courses flex flex-row ">

  <?php
  
  session_start();
    include '../includes/links.php';
    if (empty($_SESSION['name'])) {
     header('Location: ../login.php');
    }
   include 'dashboardNav.php';
    
    ?>
  <div class="course_list grid grid-cols-3 gap-10 ml-10 mt-16 mr-8">
  <a href="./training_form.php"><button class="course text-[#512bd4]   w-fit flex flex-col  px-44 h-fit   py-52 " type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">

  <i class="fa-solid fa-plus text-4xl"></i>
  <p class="font-extrabold font-[Mulish] text-2xl -indent-10 mt-3  ">Add Training</p>
  </button>
  </a>

<!-- Modal -->
<?php
 
  include '../includes/db.php';
  $db = new Db;
   $courses = $db->getCoordinatingCourses($_SESSION['name']);
    if ($courses !== 'You are coordinating 0 Training') {
     
    
  foreach ($courses as  $course) {
    echo '<form action="./students_assessments.php" method="GET">
    <button type="submit">
    <div class="course border w-fit flex flex-col   px-20 h-fit   py-16 rounded-md ">
     
    <div class="flex flex-row mt-6 -ml-12">

       
        <p class="title font-[Mulish] text-4xl font-extrabold ml-2 text-[#939ca5]">'.$course['Training_title'].'</p>
    </div>

    <div class="flex flex-row mt-6 -ml-12 text-2xl">   
    <input readonly name="course" class=" font-[Montserrat]  font-extrabold ml-2 text-[#939ca5]" value='.$course['Training_Code'].'>
    </div>
   <div class="flex flex-row gap-48">

    <div class="flex flex-col mt-6 -ml-12">

     <p class="font-[Mulish] font-semibold text-[#b8b8b8]">Participants</p> <br> 

     <div class="participants flex flex-row -mt-8">
      <img src="../mock.jpg" alt="" class="rounded-full  w-10  h-10 object-cover ">
      <img src="../mock.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6">
      <img src="../mock.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
      <img src="../mock.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
     </div>
    </div>    


    
<div class="container flex-col relative left-16 top-4 ">

  <p class="font-[Mulish] font-semibold mb-2 text-[#b8b8b8] ">Progress</p>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="prog blue">
                <span class="prog-left">
                  <span class="prog-bar"></span>
                </span>
                <span class="prog-right">
                    <span class="prog-bar"></span>
                </span>
                <div class="prog-value font-bold">90%</div>
            </div>
        </div>
</div>

</div>
      </div>
      
<div class="flex flex-row mt-12 justify-between -ml-20 -mb-12">
  <div class="flex flex-row gap-2 ml-6">
    <i class="fa-solid fa-user text-[#b8b8b8] mt-1"></i>
  <p class="font-[Mulish] text-[#adadad] font-bold"> You</p>
</div>
<div class="flex flex-row relative left-16 gap-1">
  <i class="fa-solid fa-list text-[#adadad] mt-1 "></i>
  <p class="font-[Mulish] text-[#adadad] font-bold">'.$course['No_Of_Classes'].' Classes</p>

  </div>
</div>

</div>
</button>
,</form>
';
  }
} else {
  echo '<p class="text-3xl>You are coordinating 0 Training </p>';
}
?>



</div>

    </div>

</body>
</html>