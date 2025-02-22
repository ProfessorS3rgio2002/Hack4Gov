<?php
session_start();

$valid_user = "dbadmin";
$valid_pass = "SuperSecretPass123"; // Stored in config.php.bak

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] === $valid_user && $_POST['password'] === $valid_pass) {
        setcookie("auth", "admin_secret_token", time() + 86400, "/");
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid credentials. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpMyAdmin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            border-top: 4px solid #f59c00; /* phpMyAdmin Orange */
        }
        .form-control {
            background: #ffffff;
            color: black;
            border: 1px solid #ccc;
        }
        .form-control:focus {
            border-color: #f59c00;
            box-shadow: 0 0 5px rgba(245, 156, 0, 0.5);
        }
        .btn-primary {
            background: #f59c00;
            border: none;
            font-weight: bold;
        }
        .btn-primary:hover {
            background: #e68a00;
        }
        .icon {
            font-size: 50px;
            color: #f59c00; /* phpMyAdmin Orange */
        }
    </style>
       <!-- <p>For security reasons, please do not access sensitive backups in <code>/backup/</code>.</p> -->
</head>
<body>
    <div class="login-container">
        <i class="fas fa-database icon"></i>
        <h3 class="mt-3">phpMyAdmin</h3>
        <p class="text-muted">Enter your credentials to access the database.</p>
        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="post">
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-sign-in-alt"></i> Login</button>
        </form>
        <!-- <p>For security reasons, please do not access sensitive backups in <code>/backup/</code>.</p> -->

    </div>
</body>
</html>
