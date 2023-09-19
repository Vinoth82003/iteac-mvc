<?php

class LoginController {
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Fetch user input
            $rollno = $_POST['rollno'];
            $password = $_POST['password'];

            // Perform user authentication against the database
            include_once(__DIR__ . '/../models/UserModel.php'); // Include the UserModel
            $model = new UserModel();

            if ($model->authenticateUser($rollno, $password)) {
                // Login successful, store user information in a session
                session_start();
                $_SESSION['rollno'] = $rollno;

                // Redirect to test.php or any other page
                header("Location: views/test.php");
                exit();
            } else {
                // Login failed, set an error message
                $errorMessage = "Incorrect username or password.";
            }
        }

        // Load the login view with optional error message
        include(__DIR__ . '/../views/home.php');
    }
}


?>