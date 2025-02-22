<?php
include "db.php"; // Database connection

session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(["error" => "Unauthorized access"]);
    exit();
}

// Fetch all challenges, including flags (only for admin)
$query = "SELECT c.challenge_id, c.category_id, c.title, c.description, c.file, c.points, 
                 c.difficulty, TRIM(BOTH '\"' FROM COALESCE(c.hint, '')) AS hint, c.flag, 
                 cat.name AS category_name, 
                 COUNT(s.solved_id) AS solved_count
          FROM challenges c
          INNER JOIN category cat ON c.category_id = cat.category_id
          LEFT JOIN solved s ON c.challenge_id = s.challenge_id
          GROUP BY c.challenge_id
          ORDER BY c.points ASC";


$result = $conn->query($query);

$challenges = [];
while ($row = $result->fetch_assoc()) {
    $challenges[] = $row;
}

// Return JSON response with challenges (including flags)
echo json_encode(["challenges" => $challenges]);
exit();
?>
