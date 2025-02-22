<?php
require 'db.php'; // Ensure database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $category_id = intval($_POST['category']);
    $difficulty = trim($_POST['difficulty']);
    $points = intval($_POST['points']);
    $flag = trim($_POST['flag']);
    $hint = trim($_POST['hint']);
    $file = trim($_POST['file']); 

    // Validate input fields
    if (empty($title) || empty($description) || empty($category_id) || empty($difficulty) || empty($points) || empty($flag) || empty($file)) {
        echo json_encode(["status" => "error", "message" => "All fields except hint are required."]);
        exit;
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO challenges (category_id, title, description, points, difficulty, flag, hint, file) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ississss", $category_id, $title, $description, $points, $difficulty, $flag, $hint, $file);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Challenge added successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to add challenge."]);
    }

    $stmt->close();
    $conn->close();
}
?>
