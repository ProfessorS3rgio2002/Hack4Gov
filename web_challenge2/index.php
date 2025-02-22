<?php
session_start();

// Default credentials
$valid_user = "guest";
$valid_pass = "guest123";

// Handle login
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] === $valid_user && $_POST['password'] === $valid_pass) {
        // Set cookie as "guest"
        setcookie("user", "guest", time() + (86400 * 30), "/", "", false, false);
        $_SESSION['logged_in'] = true;
        header("Location: dashboard.php"); // Redirect to fake dashboard
        exit;
    } else {
        echo "<p style='color: red;'>Invalid credentials. Try again.</p>";
    }
}

// Default cookie if not logged in
if (!isset($_COOKIE['user'])) {
    setcookie("user", "guest", time() + (86400 * 30), "/", "", false, false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0a0a0a;
            color: #fff;
            text-align: center;
            margin-top: 100px;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 0px 15px rgba(0, 212, 255, 0.5);
            display: inline-block;
        }
        input {
            margin: 10px;
            padding: 8px;
            width: 80%;
            background: #222;
            color: white;
            border: none;
            text-align: center;
        }
        button {
            background: #00d4ff;
            padding: 8px 15px;
            border: none;
            color: black;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login to Secure Area</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <!-- user = "guest"; -->
            <!-- pass = "guest123"; -->
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
