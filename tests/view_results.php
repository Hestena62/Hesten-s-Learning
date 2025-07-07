<?php
// Database connection details
$servername = "192.168.0.100"; // Replace with your database server name
$username = "hestena3_student_worksheet_db";     // Replace with your database username
$password = "OHXUer95";     // Replace with your database password
$dbname = "hestena3_student_worksheet_db";         // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID from the URL
$id = $_GET['id'];

// Fetch the results from the database
$sql = "SELECT first_name, last_name, email, score, time, answers FROM test_results WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the data
    $row = $result->fetch_assoc();
    $firstName = $row["first_name"];
    $lastName = $row["last_name"];
    $email = $row["email"];
    $score = $row["score"];
    $time = $row["time"];
    $answers = json_decode($row["answers"], true); // Decode the JSON string

    echo "<h1>Test Results</h1>";
    echo "<p><strong>Name:</strong> " . $firstName . " " . $lastName . "</p>";
    echo "<p><strong>Email:</strong> " . $email . "</p>";
    echo "<p><strong>Score:</strong> " . $score . "/10</p>";
    echo "<p><strong>Time Taken:</strong> " . $time . " seconds</p>";

    echo "<h2>Answers:</h2>";
    foreach ($answers as $answer) {
        echo "<p><strong>Question:</strong> " . $answer['question'] . "</p>";
        echo "<p><strong>Your Answer:</strong> " . $answer['userAnswer'] . "</p>";
        echo "<p><strong>Correct Answer:</strong> " . $answer['correctAnswer'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "Results not found.";
}

$conn->close();
?>