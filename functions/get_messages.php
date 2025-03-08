<?php
include 'db.php'; // Include your database connection

$query = "SELECT messages.*, users.username, users.role, users.rank 
          FROM messages 
          JOIN users ON messages.user_id = users.id 
          ORDER BY messages.timestamp ASC";

$result = mysqli_query($conn, $query);

$messages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
}

echo json_encode($messages);
?>
