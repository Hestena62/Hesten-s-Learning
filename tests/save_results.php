<?php
$servername = "localhost";
$username = "root"; // Change if different
$password = ""; // Change if different
$dbname = "math_test_db";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed"]));
}

// Get POST data
$data = json_decode(file_get_contents("php://input"), true);
$firstName = $conn->real_escape_string($data['firstName']);
$lastName = $conn->real_escape_string($data['lastName']);
$email = $conn->real_escape_string($data['email']);
$score = intval($data['score']);

// Insert into database
$sql = "INSERT INTO results (first_name, last_name, email, score) VALUES ('$firstName', '$lastName', '$email', $score)";
if ($conn->query($sql) === TRUE) {
    // Send Email
    $to = $email;
    $subject = "Your Math Test Score";
    $message = "Hello $firstName $lastName,\n\nYou completed the math test!\nScore: $score/10.\n\nRegards,\nHesten's Learning";
    $headers = "From: no-reply@hestenslearning.com";

    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(["success" => true, "message" => "Results saved and email sent!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Results saved but email failed"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Failed to save results"]);
}

$conn->close();
?>
