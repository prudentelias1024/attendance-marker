
<body class="overflow-hidden">
    <div class="navs bg-[#512bd4] text-white flex flex-col  w-1/6 flex-none pb-64">
    <img src="../<?php echo $_SESSION['image'] ?>" alt=" <?php echo  $_SESSION['name']; ?> " class="rounded-full w-24 h-24 object-cover mt-44 relative ml-24 ">
    <a  href="./profile.php" class="font-[Mulish] mt-6 ml-20 font-extrabold justify-center text-xl mb-3  text-white no-underline">
  <?php echo  $_SESSION['name']; ?></a>
    <p class="font-[Mulish] -mt-1 mb-6  ml-24 font-extrabold justify-center text-sm">
  <?php echo  $_SESSION['designation']; ?></p>

  <ul class="gap-8 flex flex-col">
      <li class="-ml-5 first-letter:mt-4 block hover:bg-[#623cec] py-4 px-6">
          <a href="courses.php" class="font-[Mulish] font-extrabold text-xl text-white no-underline text-center place-self-center ml-12">
          <i class="fa-solid fa-book-open"></i> Courses 
        </a>
        </li>
      <li class="-ml-5 block hover:bg-[#623cec] py-4 px-6">
          <a href="./statistics.php" class="font-[Mulish] font-extrabold text-xl text-white no-underline text-center place-self-center ml-12">
          <i class="fa-solid fa-chart-simple"></i> Statistics 
        </a>
        </li>
      <li class="-ml-5 block hover:bg-[#623cec] py-4 px-6">
          <a href="reports.php" class="font-[Mulish] font-extrabold text-xl text-white no-underline text-center place-self-center ml-12">
          <i class="fa-solid fa-note-sticky"></i> Reports    
        </a>
        </li>
      <li class="mb-0 -ml-5 block hover:bg-[#623cec] py-4 px-6">
          <a href="statistics.php" class="font-[Mulish] font-extrabold text-xl text-white no-underline text-center place-self-center ml-12">
          <i class="fa-solid fa-right-from-bracket"></i>Logout 
        </a>
        </li>
    </ul>
    
</div>
</body>
