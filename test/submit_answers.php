<?php
session_start();
include '../conn.php';

// Get the JSON data from the request
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

// Extract data from the JSON
$percentage = floatval($data['percentage']); // Convert to a float
$quizType = $data['quizType'];
$rollno = $data['rollno'];
$reloaded = $data['reloaded'];
// $newTab = $data['newTab'];
$timetaken = $data['timetaken'];

$score = intval($data['score']); // Convert to an integer

// Add the 'reloaded' data to the database
$sql = "INSERT INTO $quizType (percentage, score, rollno,timetaken, finished, reloaded) VALUES ($percentage, $score, '$rollno','$timetaken', 'done',  '$reloaded')";

if ($conn->query($sql) === TRUE) {
    $response = array('success' => true, 'quizType' => $quizType);
    $_SESSION[$quizType] = 'done';
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'Error: ' . $sql . "<br>" . $conn->error);
    echo json_encode($response);
}

$conn->close();
?>
