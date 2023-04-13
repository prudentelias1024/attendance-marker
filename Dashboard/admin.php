<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Coordinators</title>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <div class="employee_list flex flex-col -ml-44 py-32 gap-12">
    <p class="name text-2xl font-[Mulish] ml-80 font-semibold ">Manage Meeting Coordinators</p>
    <?php 
      include '../includes/db.php';
      $db = new Db;
      $employees = $db->getAllEmployee();
    foreach ($employees as $employee) {
    echo  '
    <div class="employee flex flex-row gap-6">
    <img name="image" src="../'.$employee["Image"].'" alt="" id="profile_image" class="rounded-full ml-80 w-16 -mt-4  h-16 object-cover">
    <p class="name text-2xl font-[Mulish] font-semibold ">'.$employee["Name"].'</p>
    <form class="flex flex-row" method="POST" action="coordinatorManager.php">
    <input  value="'.$employee['Oracle_no'].'" readonly class="absolute opacity-0 oracle_no text-2xl font-[Mulish] font-semibold" />
    <p class=" text-2xl font-[Mulish]  font-semibold mr-8 ">'.$employee['Oracle_no'].'</p>';
    if ($employee['Role'] == 'Member') {
    echo ' <button  type="button" style="width: inherit;" class="addCoordinator bg-green-500 text-white rounded-md h-10 px-4 py-2 text-sm font-[Mulish] -mt-1">Add  </button>
    </div>';
    } else {
    echo '
    <button  type="button" style="width: inherit;" class="removeCoordinator bg-red-500 text-white rounded-md h-10 w-10 px-3 py-2 text-sm font-[Mulish] -mt-1">Remove </button>
    </form>
    </div>';
    
    }
   


    }




?>
    </div>

</div>
<script>
$(document).ready(()=> {
 $('.addCoordinator').click(function (event) {
   
    let parent = event.target.parentElement
    console.log(parent.getElementsByTagName("button"))
     let oracle = parent.getElementsByTagName("input")[0].value
    
      let data = {
        oracle:oracle,
        action: 'add'
     }
       $.ajax({
        method: "POST",
        url: 'coordinatorManager.php',
        data: {name: JSON.stringify(data)},    
        complete: (data) => {
         console.log(data.responseText) 
         parent.getElementsByTagName("button")[0].classList.replace("bg-green-500","bg-red-500")
         parent.getElementsByTagName("button")[0].classList.replace("addCoordinator","removeCoordinator")
         parent.getElementsByTagName("button")[0].innerText = "Remove"
        }
    })
    event.preventDefault()
 })
 $('.removeCoordinator').click(function(event) {
    let parent = event.target.parentElement
     let oracle = parent.getElementsByTagName("input")[0].value

     let data = {
        oracle:oracle,
        action: 'remove'
     }
     $.ajax({
        method: "POST",
        url: 'coordinatorManager.php',
        data: {name: JSON.stringify(data)},
        complete: (data) => {
            console.log(data.responseText) 
         parent.getElementsByTagName("button")[0].classList.replace("bg-red-500","bg-green-500")
         parent.getElementsByTagName("button")[0].classList.replace("removeCoordinator","addCoordinator")
         parent.getElementsByTagName("button")[0].innerText = "Add"
        }     
     })
 })
})
</script>
</body>
</html> 