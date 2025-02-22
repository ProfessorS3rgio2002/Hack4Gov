<?php
session_start(); // Start session at the beginning

// Include the database connection file
include_once('db.php');

// Check if POST request is made
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect input data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if the user exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $user = mysqli_fetch_assoc($result);

        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Send success response
            echo json_encode([
                'success' => true,
                'message' => 'Login successful. Redirecting to your dashboard...',
                'redirect' => 'home.html'
            ]);
        } else {
            // Incorrect password
            echo json_encode([
                'success' => false,
                'message' => 'Invalid password. Please try again.'
            ]);
        }
    } else {
        // User not found
        echo json_encode([
            'success' => false,
            'message' => 'Username not found. Please check your credentials.'
        ]);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
