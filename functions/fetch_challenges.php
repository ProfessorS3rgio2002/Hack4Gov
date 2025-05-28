<?php
include "db.php"; // Database connection

session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit();
}

$user_id = $_SESSION['user_id'];

// Check global status for challenges
$query_status = "SELECT value FROM settings WHERE name = 'challenges_status'";
$result_status = $conn->query($query_status);
$status_row = $result_status->fetch_assoc();

if ($status_row['value'] === 'disabled') {
    echo json_encode(["error" => "Challenges are currently disabled."]);
    exit();
}

// Check if filtering by today's date is enabled
$query_filter = "SELECT value FROM settings WHERE name = 'filter_by_date'";
$result_filter = $conn->query($query_filter);
$filter_row = $result_filter->fetch_assoc();
$filter_by_date = $filter_row['value'] === 'enabled';

// Add a condition to filter challenges by today's date if the setting is enabled
$date_condition = $filter_by_date ? "AND DATE(c.created_at) = CURDATE()" : "";

// Fetch all challenges with difficulty and the number of users who solved each challenge
$query = "SELECT c.challenge_id, c.category_id, c.title, c.description, c.file, c.points, c.difficulty, c.hint, 
                 cat.name AS category_name, 
                 COUNT(s.solved_id) AS solved_count
          FROM challenges c
          INNER JOIN category cat ON c.category_id = cat.category_id
          LEFT JOIN solved s ON c.challenge_id = s.challenge_id
          WHERE 1=1 $date_condition -- Add date condition if filtering by date
          GROUP BY c.challenge_id
          ORDER BY c.points ASC"; // Order challenges from lowest to highest points

$result = $conn->query($query);

$challenges = [];
while ($row = $result->fetch_assoc()) {
    $challenges[] = $row;
}

// Fetch solved challenges for the logged-in user
$query_solved = "SELECT challenge_id FROM solved WHERE user_id = ?";
$stmt_solved = $conn->prepare($query_solved);
$stmt_solved->bind_param("i", $user_id);
$stmt_solved->execute();
$result_solved = $stmt_solved->get_result();

$solved_challenges = [];
while ($row = $result_solved->fetch_assoc()) {
    $solved_challenges[] = $row['challenge_id'];
}

// Return JSON response with challenges and solved challenge IDs
echo json_encode([
    "challenges" => $challenges,
    "solved_challenges" => $solved_challenges
]);
exit();
?>