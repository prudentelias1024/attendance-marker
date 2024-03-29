
<body class="overflow-x-hidden">
    <div class="navs bg-[#512bd4] text-white flex flex-col  w-1/6 flex-none pb-64">
    <img src="../<?php echo $_SESSION['image'] ?>" alt=" <?php echo  $_SESSION['name']; ?> " class="rounded-full w-24 h-24 object-cover mt-44 relative mx-auto ">
    <a  href="./profile.php" class="font-[Mulish] mt-6 mx-auto lg:ml-20 font-extrabold justify-center text-xl mb-3  text-white no-underline">
  <?php echo  $_SESSION['name']; ?></a>
  <p class="font-[Mulish] -mt-2 mb-6 mx-auto  font-extrabold justify-center text-sm ">
<?php echo  $_SESSION['oracle_no']; ?></p>
    <p class="font-[Mulish] -mt-3 mb-6 mx-auto  font-extrabold justify-center text-xs">
  <?php echo  $_SESSION['designation']; ?></p>
  

  <ul class="gap-8 flex flex-col  -ml-24">
    <a href="meetings.php" class="font-[Mulish]  font-extrabold text-xl text-white no-underline text-center place-self-center ml-12">
            <li class="m-auto first-letter:mt-4 block hover:bg-[#623cec] py-4 px-24">
          <i class="fa-solid fa-book-open"></i> Meetings 
        </li>
       </a>
       <a href="./statistics.php" class="font-[Mulish] font-extrabold text-xl text-white no-underline text-center place-self-center ml-12">
            <li class="m-auto block hover:bg-[#623cec] py-4 px-28">
          <i class="fa-solid fa-chart-simple"></i> Statistics 
        </li>
        </a>

        <a href="reports.php" class="font-[Mulish] font-extrabold text-xl text-white no-underline text-center place-self-center ml-12">
            <li class="m-auto block hover:bg-[#623cec] py-4 px-28">
          <i class="fa-solid fa-note-sticky"></i> Reports    
        </li>
        </a>
        
        <?php
          if ($_SESSION['role'] != 'Member') {

                echo '        <a href="meeting_management.php" class="font-[Mulish] font-extrabold text-xl text-white no-underline text-center place-self-center ml-12">
                <li class="m-auto block hover:bg-[#623cec] py-4 px-28">
              <i class="fa-solid fa-people-roof"></i> Meeting Management    
            </li>
            </a>';
          }
        ?>
        <?php
          if ($_SESSION['admin'] !== false) {

                echo '        <a href="admin.php" class="font-[Mulish] font-extrabold text-xl text-white no-underline text-center place-self-center ml-12">
                <li class="m-auto block hover:bg-[#623cec] py-4 px-28">
                <i class="fa-solid fa-people-group"></i> Manage Coordinators    
            </li>
            </a>';
          }
        ?>
        <a href="../logout.php" class="font-[Mulish] font-extrabold text-xl text-white no-underline text-center place-self-center ml-12">
            <li class="mb-0 m-auto block hover:bg-[#623cec] py-4 px-28">
          <i class="fa-solid fa-right-from-bracket"></i>Logout 
        </li>
        </a>
    </ul>
    
</div>
</body>
