<?php

if (!empty($error_messages)) {
    foreach ($error_messages as  $error_message) {
        echo 
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong>'.$error_message.'</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>';
       
    }
}

?>