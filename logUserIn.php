<?php
if (isset($_POST['login'])) {
    $error_messages = array();
    $email = $_POST['email'];
    $password = $_POST['password'];
    include './includes/db.php';
    $db = new DB;
   $result = $db->getUser(($email));
  
  
   if ($result == "User Not Found") {
   array_push($error_messages, "User Not Found");
   include './login.php';
} 
if ($result !=="User Not Found"  && password_verify($password,$result)) {
    header("Location: dashboard.php");
    
}
if ($result !=="User Not Found"  && !password_verify($password,$result)) {
       array_push($error_messages, "Password is not correct");
         include './login.php';
     
   }
}
?>