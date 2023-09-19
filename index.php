<?php

require_once('controllers/HomeController.php');

if (!isset($_GET['action'])) {
   $controller = new HomeController();
   $controller->index();   
} else {
   switch ($_GET['action']) {
      case 'login':
         require_once('controllers/LoginController.php');
         $loginController = new LoginController();
         $loginController->index();
         break;
      case 'register':
         require_once('controllers/RegisterController.php');
         $registerController = new RegisterController();
         $registerController->index();
         break;
      case 'logout':
         require_once('controllers/LogoutController.php');
         $logoutController = new LogoutController();
         $logoutController->logout();
         break;
      default:
         echo '404 error';
   }
}


?>