<?php
session_start();
include "db.php"; // Database connection

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user data including role and points
$query = "SELECT u.username, u.points, u.rank, u.role, p.solved_count 
          FROM users u 
          LEFT JOIN profile p ON u.id = p.user_id
          WHERE u.id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $points, $rank, $role, $solved_count);
$stmt->fetch();
$stmt->close();

$points = $points ?: 0; // Default to 0 if no points exist
$solved_count = $solved_count ?: 0; // Default to 0 if no solved challenges exist
$rank = $rank ?: "Newbie"; // Default to "Newbie" if rank is null
$role = $role ?: "user"; // Default to "user" if role is null

// Update rank based on points thresholds
$new_rank = $rank;
if ($points >= 1000) {
    $new_rank = "Anonymous";
} elseif ($points >= 500) {
    $new_rank = "Wannabe Hacker";
} elseif ($points >= 200) {
    $new_rank = "Script Kiddie";
}

if ($new_rank !== $rank) {
    // Update rank in the database if it has changed
    $update_rank_query = "UPDATE users SET rank = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_rank_query);
    $update_stmt->bind_param("si", $new_rank, $user_id);
    $update_stmt->execute();
    $update_stmt->close();
}

// Return JSON response including updated rank
echo json_encode([
    "username" => $username,
    "points" => $points,
    "rank" => $new_rank,
    "role" => $role,
    "solved_count" => $solved_count
]);
exit();
?>
