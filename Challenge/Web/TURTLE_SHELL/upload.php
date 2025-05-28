<?php
// filepath: c:\xampp\htdocs\testing\Hack4Gov\Challenge\Web\TURTLE_SHELL\upload.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['file']['name']);

    // Allowed image file extensions
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

    // Check if the uploaded file is an image
    if (in_array($fileExtension, $allowedExtensions)) {
        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            echo "
            <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
                <h1 style='color: green;'>File uploaded successfully!</h1>
                <p>Access your file here: <a href='uploads/" . htmlspecialchars($_FILES['file']['name']) . "' target='_blank'>uploads/" . htmlspecialchars($_FILES['file']['name']) . "</a></p>
            </div>";
        } else {
            echo "
            <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
                <h1 style='color: red;'>File upload failed!</h1>
                <p>Please try again.</p>
            </div>";
        }
    } else {
        // Reject non-image files
        echo "
        <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
            <h1 style='color: red;'>Invalid file type!</h1>
            <p>Only image files (JPG, PNG, GIF) are allowed.</p>
        </div>";
    }
} else {
    echo "
    <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
        <h1>Upload Your File</h1>
        <form action='' method='POST' enctype='multipart/form-data'>
            <input type='file' name='file' required>
            <button type='submit' style='margin-top: 10px;'>Upload</button>
        </form>
    </div>";
}
?>