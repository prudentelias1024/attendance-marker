<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php
     include './includes/links.php';
    session_start();
   
   ?>
</head>
<body>
<form  action="logUserIn.php" method="post" class="w-1/2 justify-center border rounded-lg ml-[30em] mt-32 px-12 py-6 flex flex-col gap-6">
  <div >
      <img class="ml-80" src="npa1.png"/>
    </div>
 
<?php
     include './includes/errorsDisplay.php';
     
    
    ?>
   

     <div class="email">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-" for="Email">Email</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm"  placeholder="qwerty@gmail.com" type="text" name="email" > <br>
      
     </div>
   
     <div class="password">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-" for="password">Password</label> <br>
         <input class="w-full h-8 border font-Mulish p-3 rounded-sm" type="password" name="password"  placeholder="**********"> <br>
     </div>

  

   <br>
     <br>
     <button class="bg-[#512bd4] text-white font-Mulish p-2 rounded-lg" name="login" type="submit">Login</button>
  </form>
</body>
</html>