<?php
// filepath: c:\xampp\htdocs\testing\Hack4Gov\Challenge\Web\TURTLE_SHELL\index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TURTLE SHELL - File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 100px;
            text-align: center;
        }
        .upload-box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .upload-box h1 {
            color: #007bff;
        }
        .upload-box p {
            color: #555;
        }
        .upload-box input[type="file"] {
            margin: 20px 0;
        }
        footer {
            margin-top: 50px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="upload-box">
            <h1>TURTLE SHELL</h1>
            <p>Upload your file and see what happens!</p>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file" class="form-control" required>
                <button type="submit" class="btn btn-primary mt-3">Upload</button>
            </form>
        </div>
        <footer>
            <p>&copy; 2025 TURTLE SHELL Challenge</p>
        </footer>
    </div>
</body>
</html>