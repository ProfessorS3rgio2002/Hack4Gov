<?php
require_once 'db.php';

header('Content-Type: application/json');

// Fetch leaderboard data with user ranks
$query = "
    SELECT u.username, u.rank, COUNT(s.challenge_id) AS challenges_solved, COALESCE(SUM(s.points), 0) AS total_points
    FROM users u
    LEFT JOIN solved s ON u.id = s.user_id
    GROUP BY u.id, u.rank
    ORDER BY total_points DESC, challenges_solved DESC
    LIMIT 10
";

$result = $conn->query($query);

$leaderboard = [];
while ($row = $result->fetch_assoc()) {
    $leaderboard[] = $row;
}

// Return JSON response
echo json_encode($leaderboard);
?>



<?php
require_once 'db.php';

header('Content-Type: application/json');

// Fetch leaderboard data with user ranks, filtering by the current date (28th)
$query = "
    SELECT u.username, u.rank, COUNT(s.challenge_id) AS challenges_solved, COALESCE(SUM(s.points), 0) AS total_points
    FROM users u
    LEFT JOIN solved s ON u.id = s.user_id
    WHERE DATE(s.created_at) = CURDATE()  -- Filter by today's date
    GROUP BY u.id, u.rank
    ORDER BY total_points DESC, challenges_solved DESC
    LIMIT 10
";

$result = $conn->query($query);

$leaderboard = [];
while ($row = $result->fetch_assoc()) {
    $leaderboard[] = $row;
}

// Return JSON response
echo json_encode($leaderboard);
?>