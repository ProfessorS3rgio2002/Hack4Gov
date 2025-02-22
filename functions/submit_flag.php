<?php
require_once 'db.php';
session_start();

header('Content-Type: application/json'); // Ensure JSON response

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "Unauthorized access."]);
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $challenge_id = $_POST['challenge_id'] ?? null;
    $submitted_flag = trim($_POST['flag'] ?? '');

    if (!$challenge_id || !$submitted_flag) {
        echo json_encode(["success" => false, "message" => "Invalid request."]);
        exit;
    }

    // Fetch correct flag and points
    $stmt = $conn->prepare("SELECT flag, points FROM challenges WHERE challenge_id = ?");
    $stmt->bind_param("i", $challenge_id);
    $stmt->execute();
    $stmt->bind_result($correct_flag, $points);
    $stmt->fetch();
    $stmt->close();

    if (!$correct_flag) {
        echo json_encode(["success" => false, "message" => "Challenge not found."]);
        exit;
    }

    if ($submitted_flag === $correct_flag) {
        // Check if already solved
        $check_stmt = $conn->prepare("SELECT 1 FROM solved WHERE user_id = ? AND challenge_id = ?");
        $check_stmt->bind_param("ii", $user_id, $challenge_id);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            echo json_encode(["success" => false, "message" => "You have already solved this challenge!"]);
            $check_stmt->close();
            exit;
        }

        $check_stmt->close();

        // Count total failed attempts for this challenge
        $count_attempts_stmt = $conn->prepare("SELECT COUNT(*) FROM attempts WHERE user_id = ? AND challenge_id = ?");
        $count_attempts_stmt->bind_param("ii", $user_id, $challenge_id);
        $count_attempts_stmt->execute();
        $count_attempts_stmt->bind_result($failed_attempts);
        $count_attempts_stmt->fetch();
        $count_attempts_stmt->close();

        $entries = $failed_attempts; // Store the number of incorrect attempts before solving

        // Insert into solved table with total failed attempts counted
        $insert_stmt = $conn->prepare("INSERT INTO solved (user_id, challenge_id, flag, points, entries, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $insert_stmt->bind_param("iisii", $user_id, $challenge_id, $submitted_flag, $points, $entries);
        $insert_stmt->execute();
        $insert_stmt->close();

        // Update user points
        $update_stmt = $conn->prepare("UPDATE users SET points = points + ? WHERE id = ?");
        $update_stmt->bind_param("ii", $points, $user_id);
        $update_stmt->execute();
        $update_stmt->close();

        // Update solved count in profile
        $update_solved_stmt = $conn->prepare("UPDATE profile SET solved_count = solved_count + 1 WHERE user_id = ?");
        $update_solved_stmt->bind_param("i", $user_id);
        $update_solved_stmt->execute();
        $update_solved_stmt->close();

        echo json_encode(["success" => true, "message" => "🎉 Correct flag! Challenge solved.", "attempts" => $entries]);
    } else {
        // Insert failed attempt into `attempts`
        $insert_attempt_stmt = $conn->prepare("INSERT INTO attempts (user_id, challenge_id, flag_attempt) VALUES (?, ?, ?)");
        $insert_attempt_stmt->bind_param("iis", $user_id, $challenge_id, $submitted_flag);
        $insert_attempt_stmt->execute();
        $insert_attempt_stmt->close();

        echo json_encode(["success" => false, "message" => "❌ Incorrect flag. Try again."]);
    }
}
?>
