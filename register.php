<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php
     include './includes/links.php';
   
   ?>
</head>
<body>


  <form action="registerUser.php"  method="post" class="w-1/2 justify-center border rounded-lg ml-[30em] mt-32 px-12 py-6 flex flex-col gap-6">
  <div >
      <img class="ml-80" src="npa1.png"/>
    </div>

    <div class="errors">

  
       <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
       <strong>Password Doesn't Match</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button> -->
    
    
  </div>
    </div>
     <div  class="fullname">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-Satisfy">Full Name</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="text" name="fullname" placeholder="Dikko Chinedu Oladapo" required > <br>     
     </div>

     <div class="email">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-" for="Email">Email</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="text" name="email" placeholder="qwerty@gmail.com" required > <br>
      
     </div>
   
     <div class="password">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-" for="password">Password (8 Character Minimum)</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="password" name="password" placeholder="**********" minlength="8" required > 
         <br>
     </div>

     <div class="confirm__password">

         <label style="font-family: Satisfy; font-size: 1.5em " class="font-" for="Password">Confirm Password (8 Character Minimum)</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="password" name="password_repeat"placeholder="**********" minlength="8" required > <br>
         
     </div>

     <div class="course">

         <label style="font-family: Satisfy; font-size: 1.5em" for="Course">Course</label> <br>
         <select name="course" class="w-full h-8 border ">
             <option value="dbms">DBMS</option>
             <option value="software engineering">Software Engineering</option>
             <option value="networking">Networking</option>
             <option value="artificial intelligence">Artificial Intelligence</option>
            </select>
        </div>

            <br>
            <button class="bg-[#512bd4] text-white font-Mulish p-2 rounded-lg" name="register" type="submit">Register</button>
  </form>
  <?php
include './registerUser.php'
  ?>
</body>
</html>