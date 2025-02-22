<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: index.php");
    exit;
}

$isAdmin = (isset($_COOKIE['user']) && $_COOKIE['user'] === "admin");

// Handle logout
if (isset($_GET['logout'])) {
    setcookie("user", "", time() - 3600, "/"); // Expire the cookie
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #0a0a0a;
            color: #00ffcc;
            text-align: center;
            padding: 50px;
            overflow: hidden;
        }

        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 12px;
            border: 2px solid #00ffcc;
            box-shadow: 0px 0px 20px #00ffcc;
            display: inline-block;
            width: 80%;
            max-width: 600px;
        }

        h1 {
            font-size: 1.5em;
            color: #00ffcc;
        }

        p {
            font-size: 1em;
        }

        .limited {
            color: #ff6666;
        }

        .admin {
            color: #00ffcc;
            font-weight: bold;
        }

        .flag {
            margin-top: 20px;
            padding: 15px;
            border: 2px dashed #ffcc00;
            background: rgba(255, 204, 0, 0.1);
            color: #ffcc00;
            font-size: 1.2em;
        }

        .logout-btn {
            margin-top: 20px;
            background: #ff4444;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(255, 68, 68, 0.7);
        }

        .logout-btn:hover {
            background: #ff2222;
        }

        .scanlines {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                rgba(0, 0, 0, 0.3) 0px,
                rgba(0, 0, 0, 0.3) 1px,
                transparent 2px,
                transparent 4px
            );
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, Guest!</h1>
        <p>Access Level: <span class="limited">Limited</span></p>

        <?php if ($isAdmin): ?>
            <h2 class="admin">Congratulations! Here is your flag:</h2>
            <div class="flag">Hack4Gov{C00ki3_M4st3r}</div>
        <?php else: ?>
            <p style="color: #ff6666;">Unauthorized Access to Secure Files.</p>
        <?php endif; ?>

        <form method="GET">
            <button class="logout-btn" type="submit" name="logout">Logout</button>
        </form>
    </div>

    <div class="scanlines"></div>
</body>
</html>
