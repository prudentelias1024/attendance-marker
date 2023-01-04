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
  <script>
    let req = null
    $(document).ready(()=>{

      $("#present").click(function(event) {
       let data ={present: {
        fullname: $("#fullname").val(),
        oracle_no: $("#oracle_no").val(),
        course: $("#course").val(),
        status: "Present"
      
      } }
      console.log(data.present)
      event.preventDefault()
     req =  $.ajax({
        type: "POST",
        url: 'marker.php',
       
        data: data.present,
        complete: (data) => {
          console.log(data)
          $('#present').hide();
            $('#absent').hide();
            $('#showPresent').show();
            $('#showPresent').css({'display':'inline-block', 'margin-left':'-3em',"font-weight": 700});
             $.toast({
          heading: 'Success',
          text: data.responseText,
          showHideTransition: 'slide',
          hideAfter: 30000,
          allowToastClose: false,
          position: 'bottom-center',
         bgColor: '#00800099',
       textColor: 'white',
      
      })
                  data.abort()

     },
      
        
     

        }) 
      
          
      });

      $("#absent").click(function(event) {
       let data ={absent: {
        fullname: $("#fullname").val(),
        oracle_no: $("#oracle_no").val(),
        course: $("#course").val(),
        status: "Absent",
      
      } }
      
      event.preventDefault()
      $.ajax({
        type: "POST",
        url: 'marker.php',
        data: data.absent,
        
        complete: (data) => {
          console.log(data)
          $('#present').hide();
            $('#absent').hide();
            $('#showAbsent').show();
            $('#showAbsent').css({'display':'inline-block', 'margin-left':'-3em',"font-weight": 700});
      
             $.toast({
          heading: 'Success',
          text: data,
          showHideTransition: 'slide',
          hideAfter: 30000,
          allowToastClose: false,
          position: 'bottom-center',
         bgColor: '#00800099',
       textColor: 'white',
      
      })
      $("#present").unbind("click") 
        },
     

        }) 
      
          
      });
      
    
          })
   
   
      // $("#absent").click(()=> {
        //   let data ={absent: {
    //     fullname: $("#fullname").val(),
    //     oracle_no: $("#oracle_no").val(),
    //     course: $("#course").val()
    //   } }
      
    //   $.ajax({
    //     type: POST,
    //     url: 'marker.php',
    //     data: data,
    //     success: () => {
    //       $('#present').hide();
    //       $('#absent').hide();
    //       $('#showAbsent').show();
    //     }
    //   })
    // })
  </script>
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
      
      <input readonly id="fullname" class="font-[Mulish] text-2xl" value="'.$registrant['Name'].'" name="fullname" />
      <input readonly id="oracle_no"  class="font-[Mulish] text-2xl" value="'.$registrant['Oracle_no'].'" name="oracle_no" />
      <input readonly id="course" class="font-[Mulish] text-2xl" value="'.$course.'" name="course" />
      <button  id="absent"  type="submit" name="absent"> <i class="fa-solid fa-circle-xmark text-3xl bg-white-500 text-red-500 p-2"></i></button>
      <button id="present" type="submit" name="present" > <i class="fa-solid fa-circle-check text-3xl bg-white-500 text-green-500 p-2"></i></button>

      <p style="display:none; " id="showAbsent" class="text-xl text-red-600">Absent</p>
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