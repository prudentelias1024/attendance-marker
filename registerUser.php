<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "attendance_marker";

 $error_messages = array();
if (isset($_POST['register'])) {
    $oracle_no = $_POST['oracle_no'];
    $_SESSION['oracle_no'] = $oracle_no;
    $fullname = $_POST['fullname'];
    $_SESSION['fullname'] = $fullname;
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    $designation = $_POST['designation'];
    $_SESSION['designation'] = $designation;
    $location = $_POST['location'];
    $_SESSION['location'] = $location;
    $grade = $_POST['grade'];
    $_SESSION['grade'] = $grade;
    $password = $_POST['password'];
    $_SESSION['password'] = $oracle_no;
    $password_2 = $_POST['password_repeat'];
    $_SESSION['password2'] = $password_2;
    echo $_SESSION['password2'];
    $image_to_upload = $_FILES['profile_image']['tmp_name'];
    $_SESSION['image'] = $image_to_upload;
    $image = $_FILES['profile_image']["name"];
    $_SESSION['image_blob'] = $image_to_upload;
  
    $target_dir = './uploads/';
    $image_type = strtolower(pathinfo($image,PATHINFO_EXTENSION));
    $new_name = $target_dir. $fullname.'.'.$image_type;
    echo $new_name;
    echo $image_to_upload;
    echo $image_type;
     if (empty($fullname)) {
      array_push($error_messages, 'Enter Your Full Name');
     }
     if (empty($oracle_no)) {
      array_push($error_messages, 'Enter Your Oracle Number');
     }
     if (empty($email)) {
      array_push($error_messages, 'Enter Your E-mail');
     }
     if (empty($designation)) {
      array_push($error_messages, 'Enter A Designation');
     }
     if (empty($location)) {
      array_push($error_messages, 'Enter Your Work Location');
     }
     if (empty($grade)) {
      array_push($error_messages, 'Enter Your Work Grade');
     }
     if (empty($grade)) {
      array_push($error_messages, 'Enter Your Work Grade');
     }
     if (empty($password)) {
      array_push($error_messages, 'Enter Your Password');
     }
     if (empty($password_2)) {
      array_push($error_messages, 'Confirm Your Password');
     }
     if ($password !== $password_2) {
      array_push($error_messages, 'Passwords doesn\'t match');
    }
    if (empty($image)) {
      array_push($error_messages, 'Upload An Image');
    }
    
      if ($image_type == 'jpg' || $image_type == 'png' || $image_type == 'jpeg') {
        move_uploaded_file($image_to_upload,$new_name);
      } else {
           array_push($error_messages, 'Upload An Image In Jpg,Png and Jpeg Formats');
          
     }

      if (!empty($error_messages)) {
        include './register.php';
         header("Location: register.php");  
      } else {
        include './includes/db.php';
        $db = new DB;
        $h_password = password_hash($password,PASSWORD_DEFAULT);
       echo $h_password;
        $db->createStudent($oracle_no,$fullname,$new_name,$email,$h_password,$designation,$location,$grade);
        echo $h_password;
        header("Location: login.php");
         session_destroy();
      }

    }

?>