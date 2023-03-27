<?php
if (isset($_POST['login'])) {
    $error_messages = array();
    $email = $_POST['email'];
    $password = $_POST['password'];
    include './includes/db.php';
    $db = new DB;
   $result = $db->getUserPassword(($email));
  
  
   if ($result == "User Not Found") {
   array_push($error_messages, "User Not Found");
   include './login.php';
} 
if ($result !=="User Not Found"  && $password == $result ) {
    $user = $db->getUser($email);
    $admin = $db->getAdminStatus($user[0]);
    session_start();
    $_SESSION['admin'] = $admin;
    $_SESSION["oracle_no"] = $user[0];
    $_SESSION["name"] = $user[1];
    $_SESSION["image"] = $user[2];
    $_SESSION["email"] = $user[3];
    $_SESSION["designation"] = $user[4];
    $_SESSION["location"] = $user[5];
    $_SESSION["grade"] = $user[6];
    $_SESSION["role"] = $user[7];
       
     
    header("Location: Dashboard/dashboard.php");
    
    
}
if ($result !=="User Not Found"  && $password !== $result) {
       array_push($error_messages, "Password is not correct");
         include './login.php';
     
   }
}
?>