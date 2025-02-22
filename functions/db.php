<?php
// Database configuration
$servername = "localhost";  // your server name (e.g., "localhost")
$username = "root";         // your MySQL username (default is usually "root")
$password = "";             // your MySQL password (default is usually empty)
$dbname = "ctf";            // the name of your database (change this if needed)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
