<?php
include "db.php";

header('Content-Type: application/json');

// Get the setting name from the request (default to 'challenges_status')
$setting = isset($_GET['setting']) ? $_GET['setting'] : 'challenges_status';

// Fetch the status of the specified setting
$query = "SELECT value FROM settings WHERE name = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $setting);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    echo json_encode(['success' => true, 'status' => $row['value']]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to fetch status for setting: ' . $setting]);
}
?>