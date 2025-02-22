<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include($page . ".php"); // ❌ Vulnerable to LFI
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Portal</title>
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
        .container {
            text-align: center;
            max-width: 500px;
        }
        .card {
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-top: 4px solid #f59c00; /* phpMyAdmin Orange */
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
            font-size: 60px;
            color: #f59c00; /* phpMyAdmin Orange */
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <i class="fas fa-lock icon"></i>
            <h3 class="mt-3">Welcome to the Secure Portal</h3>
            <p class="text-muted">Access restricted pages by specifying a valid parameter.</p>
            
            <form method="GET">
                <input type="text" name="page" class="form-control mb-3" placeholder="Enter page name (e.g., admin)">
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-sign-in-alt"></i> Access Page</button>
            </form>
        </div>
    </div>

</body>
</html>
