<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php
     include './includes/links.php';
     session_start();
   
   ?>
</head>
<body>


  <form action="registerUser.php" enctype="multipart/form-data" method="post" class="w-1/2 justify-center border rounded-lg ml-[30em] mt-32 px-12 py-6 flex flex-col gap-6">
  <div >
      <img class="ml-80" src="npa1.png"/>
    </div>

    <div class="errors">

  
     <?php 
    
    include './includes/errorsDisplay.php';
   

   
    
    ?>

    
  </div>
    </div>
    <div  class="profile_image">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-Satisfy" id="profile_image_label">Profile Image</label> <br>
         <input id="image_input" class="w-full h-8 border font-Mulish p-5 rounded-sm" type="file" name="profile_image" onchange="showImage(event)" placeholder="Dikko Chinedu Oladapo" required > <br>     
         <img name="image" src="" alt="" id="profile_image" class="rounded-full ml-80 w-52  h-52 object-cover hidden ">
     </div>

    <div  class="oracle">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-Satisfy">Oracle No</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="text" name="oracle_no" 
         value="<?php if (!empty($_SESSION['oracle_no'])) {
            echo $_SESSION['oracle_no'];
         } ?>" 
         placeholder="A0000" required > <br>     
     </div>

     <div  class="fullname">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-Satisfy">Full Name</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="text" name="fullname" 
         value="<?php if (!empty($_SESSION['fullname'])) {
            echo $_SESSION['fullname'];
         } ?>" 
         placeholder="Dikko Chinedu Oladapo" required > <br>     
     </div>

     <div class="email">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-" for="Email">Email</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="text" name="email" 
         value="<?php if (!empty($_SESSION['email'])) {
            echo $_SESSION['email'];
         } ?>" 
         placeholder="qwerty@gmail.com" required > <br>
      
     </div>
     <div class="designation">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-" for="designation">Designation</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="text" 
         value="<?php if (!empty($_SESSION['designation'])) {
            echo $_SESSION['designation'];
         } ?>" 
         name="designation" placeholder="System Analyst" required > <br>
      
     </div>
     <div class="Location">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-" for="Location">Location</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="text" name="location" 
         value="<?php if (!empty($_SESSION['location'])) {
            echo $_SESSION['location'];
         } ?>" 
         placeholder="Marina" required > <br>
      
     </div>
     <div class="grade">

<label style="font-family: Satisfy; font-size: 1.5em" for="grade">Grade</label> <br>
<select name="grade" class="w-full h-8 border ">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
   </select>
</div>
     <div class="password">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-" for="password">Password (8 Character Minimum)</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="password" name="password" 
         value="<?php if (!empty($_SESSION['password'])) {
            echo $_SESSION['password'];
         } ?>" 
         placeholder="**********" minlength="8" required > 
         <br>
     </div>



     <div class="confirm__password">

         <label style="font-family: Satisfy; font-size: 1.5em " class="font-" for="Password">Confirm Password (8 Character Minimum)</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="password" name="password_repeat"
         value="<?php if (!empty($_SESSION['password2'])) {
            echo $_SESSION['password2'];
         } ?>"
         placeholder="**********" minlength="8" required > <br>
         
     </div>

    

            <br>
            <button class="bg-[#512bd4] text-white font-Mulish p-2 rounded-lg" name="register" type="submit">Register</button>
  </form>
 
  <script src="./add_profile_image.js"></script>
</body>
</html>