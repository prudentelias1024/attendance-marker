<?php
  include '../includes/db.php';
  $db = new Db;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);
    $name = json_decode(stripslashes($_POST["name"]),true);
   if ($name['action'] == 'add') {
    print_r($db->addCoordinator($name['oracle']));
   }
   
   if ($name['action'] == 'remove') {
    $db->removeCoordinator($name['oracle']);
    print_r('Coordinator Remove');
   }
   
   
}    




?>