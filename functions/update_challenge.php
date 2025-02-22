<?php
require_once "db.php"; // Ensure this correctly connects to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $challenge_id = isset($_POST['challenge_id']) ? intval($_POST['challenge_id']) : 0;
    $title = isset($_POST['title']) ? trim($_POST['title']) : "";
    $description = isset($_POST['description']) ? trim($_POST['description']) : "";
    $points = isset($_POST['points']) ? intval($_POST['points']) : 0;
    $file = isset($_POST['file']) ? trim($_POST['file']) : "";
    $flag = isset($_POST['flag']) ? trim($_POST['flag']) : "";
    $hint = isset($_POST['hint']) ? trim($_POST['hint']) : "";
    $difficulty = isset($_POST['difficulty']) ? trim($_POST['difficulty']) : "";
    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;

    // Validate required fields
    if ($challenge_id <= 0 || empty($title) || empty($description) || $points <= 0 || empty($difficulty) || $category_id <= 0) {
        echo json_encode(["status" => "error", "message" => "Invalid input data."]);
        exit;
    }

    try {
        $query = "UPDATE challenges 
                  SET title = ?, description = ?, points = ?, file = ?, flag = ?, hint = ?, difficulty = ?, category_id = ? 
                  WHERE challenge_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssissssii", $title, $description, $points, $file, $flag, $hint, $difficulty, $category_id, $challenge_id);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Challenge updated successfully."]);
        } else {
            throw new Exception("Failed to update challenge.");
        }

        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
