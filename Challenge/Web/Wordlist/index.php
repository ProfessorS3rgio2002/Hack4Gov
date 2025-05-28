<?php
// filepath: c:\xampp\htdocs\testing\Hack4Gov\Challenge\Web\Wordlist\index.php

session_start();

$message = ''; // Initialize message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded credentials
    $correct_username = 'admin';
    $correct_password = 'tweetybird2338'; // This password exists in rockyou.txt

    if ($username === $correct_username && $password === $correct_password) {
        // Successful login
        $message = "
        <div class='message success'>
            <h1>Login Successful!</h1>
            <p>Flag: <strong>H4G{BRUT3F0RC3_SUCC3SS}</strong></p>
        </div>";
    } else {
        // Failed login
        $message = "
        <div class='message error'>
            <h1>Login Failed!</h1>
            <p>Invalid username or password.</p>
        </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .container {
            text-align: center;
        }
        .login-box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 350px;
            margin: 20px auto;
        }
        .login-box h1 {
            margin-bottom: 20px;
            color: #333;
        }
        .login-box input[type="text"], .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-box button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .login-box button:hover {
            background-color: #0056b3;
        }
        .message {
            width: 350px;
            margin: 10px auto;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 16px;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php echo $message; ?>
        <div class="login-box">
            <h1>Login</h1>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>