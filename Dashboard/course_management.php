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
  <link rel="stylesheet" href="../circular_progress.css" />
  <title> Attendance Marker </title>
</head>
  <body>
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
  <button class="course text-[#512bd4]   w-fit flex flex-col  px-44 h-fit   py-52 ">
  <i class="fa-solid fa-plus text-4xl"></i>
  <p class="font-extrabold font-[Mulish] text-2xl -indent-10 mt-3  ">Add Training</p>
  </button>
  <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
 <?php
  include '../includes/db.php';
  $db = new Db;
   $courses = $db->getCoordinatingCourses($_SESSION['name']);
  foreach ($courses as  $course) {
    echo '<div class="course border w-fit flex flex-col   px-20 h-fit   py-16 rounded-md ">
     
    <div class="flex flex-row mt-6 -ml-12">

       
        <p class="title font-[Mulish] text-4xl font-extrabold ml-2 text-[#939ca5]">'.$course['Training_title'].'</p>
    </div>

    <div class="flex flex-row mt-6 -ml-12 text-2xl">   
    <p class="code font-[Montserrat] font-extrabold ml-2 text-[#939ca5]">'.$course['Training_Code'].'</p>
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
';
  } 
?>



</div>

    </div>
<body>
</body>
</html>