<?php
// Set content type to JSON for output
header('Content-Type: application/json');

// Ensure it's a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

// Sanitize input
$name = htmlspecialchars(trim($_POST['name']));
$parentEmail = filter_var(trim($_POST['parentEmail']), FILTER_SANITIZE_EMAIL);
$grade = htmlspecialchars(trim($_POST['grade']));
$skills = isset($_POST['skills']) ? $_POST['skills'] : [];
$profilePic = htmlspecialchars(trim($_POST['profilePic']));

// Validate required fields
if (empty($name) || empty($parentEmail) || empty($grade)) {
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields.']);
    exit;
}

// Build data array
$profile = [
    'name' => $name,
    'parentEmail' => $parentEmail,
    'grade' => $grade,
    'skills' => $skills,
    'profilePic' => $profilePic,
    'timestamp' => date('Y-m-d H:i:s')
];

// Save profile to a JSON file (append style)
$file = 'profiles.json';
$existingData = [];

if (file_exists($file)) {
    $json = file_get_contents($file);
    $existingData = json_decode($json, true) ?? [];
}

// Add new profile
$existingData[] = $profile;

// Save it back
file_put_contents($file, json_encode($existingData, JSON_PRETTY_PRINT));

echo json_encode(['status' => 'success', 'message' => 'Profile saved successfully.']);
?>
