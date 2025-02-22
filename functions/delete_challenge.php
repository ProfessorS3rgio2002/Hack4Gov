<?php
require_once "db.php"; // Ensure this correctly connects to your database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $challenge_id = isset($_POST['challenge_id']) ? intval($_POST['challenge_id']) : 0;

    if ($challenge_id <= 0) {
        echo json_encode(["status" => "error", "message" => "Invalid challenge ID."]);
        exit;
    }

    try {
        $query = "DELETE FROM challenges WHERE challenge_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $challenge_id);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Challenge deleted successfully."]);
        } else {
            throw new Exception("Failed to delete challenge.");
        }

        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
