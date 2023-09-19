<?php
include '../conn.php';
// Assuming you have a session started
session_start();


// Update the 'accept' column for the logged-in user's rollno
if (isset($_SESSION['user_rollno'])) {
    $rollno = $_SESSION['user_rollno'];
    
    // Prepare and execute the query
    $updateQuery = "UPDATE `register` SET `accept` = 'done' WHERE `rollno` = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("s", $rollno);
    $stmt->execute();
    $stmt->close();
    
    // Return a response
    $response = array('status'=> 'success','message' => 'Accept status updated for user', 'rollno' => $rollno);
    $_SESSION['accept'] = 'done';
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Return an error response if user_rollno is not set in session
    $errorResponse = array('error' => 'User not logged in');
    header('Content-Type: application/json');
    http_response_code(401); // Unauthorized status code
    echo json_encode($errorResponse);
}

$conn->close();
?>
