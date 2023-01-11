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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    .jq-toast-wrap{
    position: fixed;
    left: 50%;
    bottom: 90%;
    
    }
    .jq-toast-single{
      border-radius: 1em;
    padding: 3em;
    width: fit-content;

    }
    </style>
  <title> Marker </title>
  
</head>
  <body>
    <div class="reports  flex flex-row gap-16 ">

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
      
      <input readonly class="fullname" class="font-[Mulish] text-2xl" value="'.$registrant['Name'].'" name="fullname" />
      <input readonly class="oracle_no"  class="font-[Mulish] text-2xl" value="'.$registrant['Oracle_no'].'" name="oracle_no" />
      <input readonly class="course" class="font-[Mulish] text-2xl" value="'.$course.'" name="course" />
      <button  class="absent"  type="button" name="absent"> <i class="fa-solid fa-circle-xmark text-3xl bg-white-500 text-red-500 p-2"></i></button>
      <button class="present" type="button" name="present" > <i class="fa-solid fa-circle-check text-3xl bg-white-500 text-green-500 p-2"></i></button>

      <p style="display:none; " class="showAbsent" class="text-xl text-red-600">Absent</p>
      <p style="display:none;" class="showPresent" class="text-xl text-green-600">Present</p>
    
      
      </div>
      
      
      ';
    }
  } else {
    echo 'No Registered Student Yet';
  }
  
  ?>

 
    <button type="submit" id="save"  name="save" class=" bg-blue-400 mt-14 text-white py-3 rounded-md -mb-12 w-1/6 ">Save </button>
  </form>

  </div>
  <script>
    let req = null
    let jobs = []
    $(document).ready(()=>{

      $(".present").click(function(event) {
        event.preventDefault()
       let parent = event.target.parentElement.parentElement
         let fullname = parent.getElementsByTagName("input")[0].value
        let oracle = parent.getElementsByTagName("input")[1].value
        let course = parent.getElementsByTagName("input")[2].value
       
       
       let job ={
        fullname: fullname,
        oracle_no: oracle,
        course:   course,
        status: "Present"
      } 
      jobs.push(job)
      parent.getElementsByTagName("button")[0].style.display = "none"
      parent.getElementsByTagName("button")[1].style.display = "none"
     parent.getElementsByTagName("p")[1].style.display = "inline-block"
     parent.getElementsByTagName("p")[1].style.marginLeft = "-3em"
      parent.getElementsByTagName("p")[1].style.fontWeight = 700
     parent.getElementsByTagName("p")[1].classList.add("text-xl","text-green-600")
     
    });
    
    $(".absent").click(function(event) {
      event.preventDefault()  
      let parent = event.target.parentElement.parentElement
      let fullname = parent.getElementsByTagName("input")[0].value
      let oracle = parent.getElementsByTagName("input")[1].value
      let course = parent.getElementsByTagName("input")[2].value
      
      parent.getElementsByTagName("button")[0].style.display = "none"
      parent.getElementsByTagName("button")[1].style.display = "none"
       parent.getElementsByTagName("p")[0].style.display = "inline-block"
      parent.getElementsByTagName("p")[0].style.marginLeft = "-3em"
      parent.getElementsByTagName("p")[0].style.fontWeight = 700
        parent.getElementsByTagName("p")[0].classList.add("text-xl","text-red-600")
       
        let job ={
        fullname: fullname,
        oracle_no: oracle,
        course:   course,
        status: "Present"
       } 
      jobs.push(job)

    })

    $("#save").click(function(event){
       event.preventDefault()
        $.ajax({
        type: "POST",
        url: 'marker.php',
        data: {jobs: JSON.stringify(jobs)},
        complete: (data) => {
          console.log(data.responseText)
          if (data.response!== undefined) {
            
            $.toast({
            heading: 'Success',
            text: 'Attendance Successfully Marked',
            showHideTransition: 'slide',
            hideAfter: 500,
            allowToastClose: false,
            position: 'bottom-center',
           bgColor: '#00800099',
         textColor: 'white',
          
      
      })
    } else {

      $.toast({
          heading: 'No Job  ',
          text: 'No Student Marked',
          showHideTransition: 'slide',
          hideAfter: 1500,
          allowToastClose: false,
          position: 'bottom-center',
         bgColor: '	#ffc107',
       textColor: 'white',
    })
    }
     
        },
    }) 
    
     
  });

      })

 
  </script>



</body>
</html>