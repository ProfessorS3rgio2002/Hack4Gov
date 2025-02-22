<?php
include 'db.php';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the token and new password from the form
    $token = $_POST['token'];
    $new_password = $_POST['password'];

    // Initialize the response array
    $response = array('success' => false, 'message' => '');

    // Validate new password (at least 8 characters, contains at least one number)
    if (strlen($new_password) < 8 || !preg_match("/\d/", $new_password)) {
        $response['message'] = "Password must be at least 8 characters long and contain at least one number.";
        echo json_encode($response);
        exit;
    }

    // Check if the token exists and is not expired
    $sql = "SELECT * FROM password_recover WHERE token = ? AND expires_at > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Token is valid, proceed with updating the password
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];

        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the user's password in the users table
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $hashed_password, $user_id);
        $stmt->execute();

        // Optionally, delete the token after it's used
        $stmt = $conn->prepare("DELETE FROM password_recover WHERE token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();

        // Set the success response message
        $response['success'] = true;
        $response['message'] = "Password successfully updated. Please log in.";

    } else {
        // Invalid or expired token
        $response['message'] = "Invalid or expired token.";
    }

    // Return the response as a JSON object
    echo json_encode($response);
}

$conn->close();
?>
