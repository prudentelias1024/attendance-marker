<?php
if (isset($_POST['login'])) {
    $error_messages = array();
    $email = $_POST['email'];
    $password = $_POST['password'];
    include './includes/db.php';
    $db = new DB;
   $result = $db->getUser(($email));
   echo $result;
   if ($result == "User Not Found") {
   array_push($error_messages, "Email Is Not Correct");
    include './login.php';
   }
}
?>