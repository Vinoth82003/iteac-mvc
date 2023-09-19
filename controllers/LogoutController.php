<?php

// LogoutController.php

class LogoutController {
    public function logout() {
       // For example, you can unset or destroy the user's session
       session_start();
       session_destroy();
       
       // Redirect the user to the homepage or any other appropriate page
       header('Location: index.php');
       exit;
    }
 }
 

?>