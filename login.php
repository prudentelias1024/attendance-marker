<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php
     include './includes/links.php'
   ?>
</head>
<body>
<form  action="" method="post" class="w-1/2 justify-center border rounded-lg ml-[30em] mt-32 px-12 py-6 flex flex-col gap-6">
  <div >
      <img class="ml-80" src="npa1.png"/>
    </div>

   

     <div class="email">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-" for="Email">Email</label> <br>
         <input class="w-full h-8 border font-Mulish" type="text" name="email" > <br>
      
     </div>
   
     <div class="password">
         <label style="font-family: Satisfy; font-size: 1.5em" class="font-" for="password">Password</label> <br>
         <input class="w-full h-8 border font-Mulish" type="password" name="password" > <br>
     </div>

     <div class="course">

<label style="font-family: Satisfy; font-size: 1.5em" for="Course">Course</label> <br>
<select class="w-full h-8 border ">
    <option value="dbms">DBMS</option>
    <option value="dbms">Software Engineering</option>
    <option value="dbms">Networking</option>
    <option value="dbms">Artificial Intelligence</option>
   </select>
</div>

   <br>
     <br>
     <button class="bg-[#512bd4] text-white font-Mulish p-2 rounded-lg" name="login" type="submit">Login</button>
  </form>
</body>
</html>