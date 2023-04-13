<nav class="flex flex-row justify-between">
<p class="font-[Mulish] mt-8 ml-8 font-extrabold text-2xl">
 Hi,  <?php echo  $_SESSION['name']; ?></p>
 <img src="<?php echo $_SESSION['image'] ?>" alt=" <?php echo  $_SESSION['name']; ?> " class="rounded-full  w-16  h-16 object-cover mt-3 relative -left-8">
</nav>

<p class="font-[Mulish] capitalize text-gray-500 font-extrabold text-md -mt-3">
 <?php echo  $_SESSION['username']; ?></p>
     <p class="font-[Mulish] indent-4 text-gray-500 -mt-3  font-extrabold text-sm">
 <?php echo  $_SESSION['designation']; ?></p>