<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "attendance_marker";

 $error_messages = array();
if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_2 = $_POST['password_repeat'];
    $course = $_POST['course'];
    if (is_null($fullname)) {
    array_push($error_messages,'Please enter your fullname');
    } else if(is_null($email)){
      array_push($error_messages, 'Please enter your e-mail');
    } else if(is_null($password)){
  array_push($error_messages, 'Please enter a password');
    }else if($password !== $password_2){
      array_push($error_messages, 'Passwords don\'t match');
    } 
    if(count($error_messages) > 1){
      header('Location: register.php');
    } else {

      header('Location: login.php');
      
    }
   
}
?>