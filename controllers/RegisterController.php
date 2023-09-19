<?php

class RegisterController {
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Fetch user input
            $username = $_POST['username'];
            $rollno = $_POST['rollno'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $password = $_POST['password'];

            // Perform user registration in the database
            include_once(__DIR__ . '/../models/UserModel.php'); // Include the UserModel
            $model = new UserModel();

            if ($model->registerUser($username, $rollno, $email,$gender, $password)) {
                // Registration successful, set a success message
                $successMessage = "Registration successful. You can now login.";
            } else {
                // Registration failed, set an error message
                $errorMessage = "Registration failed. Please try again.";
            }
        }

        // Load the registration view with optional success or error message
        include_once(__DIR__ . '/../views/home.php');
    }
}


?>