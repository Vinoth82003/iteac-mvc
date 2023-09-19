<?php

class HomeController {
   public function index() {
    //    include_once(__DIR__ . '/../models/HomeModel.php'); // Use __DIR__ to get the current directory
    //    $model = new HomeModel();
    //    $data = $model->getData();
       include(__DIR__ . '/../views/home.php');
   }
}

?>
