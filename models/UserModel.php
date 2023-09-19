<?php
class UserModel {
    private $pdo;

    public function __construct() {
        // Include your database configuration here
        $dbHost = 'localhost'; // Change to your database host
        $dbName = 'iteacmvc';
        $dbUser = 'root';
        $dbPassword = '';

        try {
            $this->pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function authenticateUser($rollno, $password) {
        // Query the database to check if the user exists and the password is correct
        $sql = "SELECT * FROM users WHERE rollno = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$rollno]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            // User authenticated successfully
    
            // Store user details in a session
            session_start();
            $_SESSION['user_id'] = $user['id']; // Store user's unique identifier
            $_SESSION['username'] = $user['username']; // Store username
            $_SESSION['email'] = $user['email']; // Store email or any other user details
            $_SESSION['gender'] = $user['gender']; // Store email or any other user details
    
            return true;
        }
    
        // Authentication failed
        return false;
    }
    

    public function registerUser($username, $rollno, $email,$gender, $password) {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert user data into the database
        $sql = "INSERT INTO users (username, rollno, email,gender, password) VALUES (?, ?, ?,?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute([$username, $rollno, $email,$gender, $hashedPassword]);

        return $result;
    }
}
?>
