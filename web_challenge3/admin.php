<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpMyAdmin - Database</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #ffffff;
        }
        .navbar {
            background-color: #f59c00;
        }
        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }
        .container {
            margin-top: 30px;
        }
        .card {
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f8f9fa;
        }
        .flag {
            color: #28a745;
            font-weight: bold;
        }
        .denied-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .denied-box {
            text-align: center;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            background: #fff;
        }
    </style>
</head>
<body>

<?php
if (isset($_COOKIE['auth']) && $_COOKIE['auth'] === "admin_secret_token") {
?>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand"><i class="fas fa-database"></i> phpMyAdmin</a>
        </div>
    </nav>
    <div class="container">
        <h3>Database: <code>ctf_challenges</code></h3>
        <div class="card">
            <div class="card-header">Table: <code>admin_data</code></div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>admin</td>
                            <td class="flag">Hack4Gov{D1rect0ry_Tr4v3rsal}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <div class="denied-container">
        <div class="denied-box">
            <i class="fas fa-exclamation-triangle fa-3x text-danger"></i>
            <h3 class="mt-3">Access Denied!</h3>
            <p>You are not authorized to access this page.</p>
        </div>
    </div>
<?php
}
?>
</body>
</html>
