<?php
include "db.php";

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['setting']) || !isset($data['status'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit();
}

$setting = $data['setting'];
$status = $data['status'];

// Update the specified setting
$query = "UPDATE settings SET value = ? WHERE name = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $status, $setting);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update setting']);
}
?>