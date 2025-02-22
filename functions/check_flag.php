<?php
include 'db.php'; // Use existing DB connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $challenge_id = $_POST['challenge_id'];
    $user_flag = $_POST['flag'];

    $stmt = $conn->prepare("SELECT flag FROM challenges WHERE challenge_id = ?");
    $stmt->bind_param("i", $challenge_id);
    $stmt->execute();
    $stmt->bind_result($correct_flag);
    $stmt->fetch();
    $stmt->close();

    if ($user_flag === $correct_flag) {
        echo json_encode(["status" => "success", "message" => "Correct flag! 🎉"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Wrong flag. Try again!"]);
    }
}
?>
