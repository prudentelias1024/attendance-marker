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
  <link rel="stylesheet" href="../circular_progress.css" >
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

<div class="course border w-fit flex flex-col   px-20 h-fit   py-16 rounded-md ">
     
      <div class="flex flex-row mt-6 -ml-12">

         
          <p class="title font-[Mulish] text-4xl font-extrabold ml-2 text-[#939ca5]">Artificial Intelligence For Data Analyst I</p>
      </div>

      <div class="flex flex-row mt-6 -ml-12 text-2xl">   
      <p class="code font-[Montserrat] font-extrabold ml-2 text-[#939ca5]">T0001</p>
      </div>
     <div class="flex flex-row gap-48">

      <div class="flex flex-col mt-6 -ml-12">

       <p class="font-[Mulish] font-semibold text-[#b8b8b8]">Participants</p> <br> 
       

       <div class="participants flex flex-row -mt-8">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
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
    <p class="font-[Mulish] text-[#adadad] font-bold">Dr. Wusu</p>
  </div>
  <div class="flex flex-row relative left-16 gap-1">
    <i class="fa-solid fa-list text-[#adadad] mt-1 "></i>
    <p class="font-[Mulish] text-[#adadad] font-bold">25 Classes</p>

    </div>
  </div>
</div>
<div class="course border w-fit flex flex-col   px-20 h-fit   py-12 rounded-md ">
     
      <div class="flex flex-row mt-6 -ml-12">

         
          <p class="title font-[Mulish] text-4xl font-extrabold ml-2 text-[#939ca5]">Artificial Intelligence For Data Analyst I</p>
      </div>

      <div class="flex flex-row mt-6 -ml-12 text-2xl">   
      <p class="code font-[Montserrat] font-extrabold ml-2 text-[#939ca5]">T0001</p>
      </div>
     <div class="flex flex-row gap-48">

      <div class="flex flex-col mt-6 -ml-12">

       <p class="font-[Mulish] font-semibold text-[#b8b8b8]">Participants</p> <br> 
       

       <div class="participants flex flex-row -mt-8">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
       </div>
      </div>    


      
  <div class="container flex-col relative left-16 top-4">

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
    <p class="font-[Mulish] text-[#adadad] font-bold">Dr. Wusu</p>
  </div>
  <div class="flex flex-row relative left-16 gap-1">
    <i class="fa-solid fa-list text-[#adadad] mt-1 "></i>
    <p class="font-[Mulish] text-[#adadad] font-bold">25 Classes</p>

    </div>
  </div>
</div>
<div class="course border w-fit flex flex-col   px-20 h-fit   py-12 rounded-md ">
     
      <div class="flex flex-row mt-6 -ml-12">

         
          <p class="title font-[Mulish] text-4xl font-extrabold ml-2 text-[#939ca5]">Artificial Intelligence For Data Analyst I</p>
      </div>

      <div class="flex flex-row mt-6 -ml-12 text-2xl">   
      <p class="code font-[Montserrat] font-extrabold ml-2 text-[#939ca5]">T0001</p>
      </div>
     <div class="flex flex-row gap-48">

      <div class="flex flex-col mt-6 -ml-12">

       <p class="font-[Mulish] font-semibold text-[#b8b8b8]">Participants</p> <br> 
       

       <div class="participants flex flex-row -mt-8">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
       </div>
      </div>    


      
  <div class="container flex-col relative left-16 top-4">

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
    <p class="font-[Mulish] text-[#adadad] font-bold">Dr. Wusu</p>
  </div>
  <div class="flex flex-row relative left-16 gap-1">
    <i class="fa-solid fa-list text-[#adadad] mt-1 "></i>
    <p class="font-[Mulish] text-[#adadad] font-bold">25 Classes</p>

    </div>
  </div>
</div>
<div class="course border w-fit flex flex-col   px-20 h-fit   py-12 rounded-md ">
     
      <div class="flex flex-row mt-6 -ml-12">

         
          <p class="title font-[Mulish] text-4xl font-extrabold ml-2 text-[#939ca5]">Artificial Intelligence For Data Analyst I</p>
      </div>

      <div class="flex flex-row mt-6 -ml-12 text-2xl">   
      <p class="code font-[Montserrat] font-extrabold ml-2 text-[#939ca5]">T0001</p>
      </div>
     <div class="flex flex-row gap-48">

      <div class="flex flex-col mt-6 -ml-12">

       <p class="font-[Mulish] font-semibold text-[#b8b8b8]">Participants</p> <br> 
       

       <div class="participants flex flex-row -mt-8">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
       </div>
      </div>    


      
  <div class="container flex-col relative left-16 top-4">

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
    <p class="font-[Mulish] text-[#adadad] font-bold">Dr. Wusu</p>
  </div>
  <div class="flex flex-row relative left-16 gap-1">
    <i class="fa-solid fa-list text-[#adadad] mt-1 "></i>
    <p class="font-[Mulish] text-[#adadad] font-bold">25 Classes</p>

    </div>
  </div>
</div>
<div class="course border w-fit flex flex-col   px-20 h-fit   py-12 rounded-md ">
     
      <div class="flex flex-row mt-6 -ml-12">

         
          <p class="title font-[Mulish] text-4xl font-extrabold ml-2 text-[#939ca5]">Artificial Intelligence For Data Analyst I</p>
      </div>

      <div class="flex flex-row mt-6 -ml-12 text-2xl">   
      <p class="code font-[Montserrat] font-extrabold ml-2 text-[#939ca5]">T0001</p>
      </div>
     <div class="flex flex-row gap-48">

      <div class="flex flex-col mt-6 -ml-12">

       <p class="font-[Mulish] font-semibold text-[#b8b8b8]">Participants</p> <br> 
       

       <div class="participants flex flex-row -mt-8">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
       </div>
      </div>    


      
  <div class="container flex-col relative left-16 top-4">

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
    <p class="font-[Mulish] text-[#adadad] font-bold">Dr. Wusu</p>
  </div>
  <div class="flex flex-row relative left-16 gap-1">
    <i class="fa-solid fa-list text-[#adadad] mt-1 "></i>
    <p class="font-[Mulish] text-[#adadad] font-bold">25 Classes</p>

    </div>
  </div>
</div>
<div class="course border w-fit flex flex-col   px-20 h-fit   py-12 rounded-md ">
     
      <div class="flex flex-row mt-6 -ml-12">

         
          <p class="title font-[Mulish] text-4xl font-extrabold ml-2 text-[#939ca5]">Artificial Intelligence For Data Analyst I</p>
      </div>

      <div class="flex flex-row mt-6 -ml-12 text-2xl">   
      <p class="code font-[Montserrat] font-extrabold ml-2 text-[#939ca5]">T0001</p>
      </div>
     <div class="flex flex-row gap-48">

      <div class="flex flex-col mt-6 -ml-12">

       <p class="font-[Mulish] font-semibold text-[#b8b8b8]">Participants</p> <br> 
       

       <div class="participants flex flex-row -mt-8">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
        <img src="../uploads/Alaba Bukola.jpg" alt="" class="rounded-full  w-10  h-10 object-cover -ml-6 ">
       </div>
      </div>    


      
  <div class="container flex-col relative left-6 top-4">

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
    <p class="font-[Mulish] text-[#adadad] font-bold">Dr. Wusu</p>
  </div>
  <div class="flex flex-row relative left-6 gap-1">
    <i class="fa-solid fa-list text-[#adadad] mt-1 "></i>
    <p class="font-[Mulish] text-[#adadad] font-bold">25 Classes</p>

    </div>
  </div>
</div>
    </div>
<body>
</body>
</html>