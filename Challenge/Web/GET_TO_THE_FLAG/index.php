<?php
// filepath: c:\xampp\htdocs\testing\Hack4Gov\Challenge\Web\GET_TO_THE_FLAG\index.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POST request: Display a misleading message with a hidden hint in the headers
    header("X-Hint: The answer lies in GET, but not as you know it...");
    echo "
    <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
        <h1 style='color: red;'>Access Denied!</h1>
        <p style='color: gray;'>You are not authorized to view this page.</p>
        <p style='color: gray; font-size: 12px;'>Error Code: 403</p>
    </div>";
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // GET request: Check for the 'key' parameter and redirect if correct
    if (isset($_GET['key']) && $_GET['key'] === 'get_this_flag') {
        header("Location: super_secret_flag.php");
        exit;
    }

    echo "
<div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
    <h1>Welcome to the challenge!</h1>
    <p>Nothing to see here...</p>
    <p style='color: gray; font-size: 12px;'>Error Code: 0x4765745F746869735F666C6167</p> <!-- ?key= -->
</div>";
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // PUT request: Add another layer of confusion
    echo "
    <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
        <h1 style='color: orange;'>Invalid Request Method</h1>
        <p>PUT is not allowed here. Try something else.</p>
    </div>";
} else {
    // Other methods: Deny access
    echo "
    <div style='font-family: Arial, sans-serif; text-align: center; margin-top: 50px;'>
        <h1 style='color: orange;'>Invalid Request Method</h1>
        <p>Please use GET or POST to proceed.</p>
    </div>";
}
?>