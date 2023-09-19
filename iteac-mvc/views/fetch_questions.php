<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'iteacmvc';

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Fetch questions from quiz_questions table
$quizQuestions = fetchQuestions($connection, 'quiz_questions');

// Fetch questions from aptitude_questions table
$aptitudeQuestions = fetchQuestions($connection, 'aptitude_questions');

// Fetch questions from reasoning_questions table
$reasoningQuestions = fetchQuestions($connection, 'reasoning_questions');

// Function to fetch questions from a table
function fetchQuestions($connection, $tableName) {
    $query = "SELECT * FROM $tableName";
    $result = mysqli_query($connection, $query);

    $questions = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row;
    }

    return $questions;
}

// Close the database connection
mysqli_close($connection);

// Combine the fetched questions into a single associative array
$questionsData = array(
    'quizQuestions' => $quizQuestions,
    'aptitudeQuestions' => $aptitudeQuestions,
    'reasoningQuestions' => $reasoningQuestions
);

// Encode the data as JSON and send it to the client
header('Content-Type: application/json');
echo json_encode($questionsData);
?>
