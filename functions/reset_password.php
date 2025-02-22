<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include 'db.php';

// Set the timezone to Philippines (UTC+8)
date_default_timezone_set('Asia/Manila');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle forgot password AJAX request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if the email exists in the users table
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Get the user_id
        $row = $result->fetch_assoc();
        $user_id = $row['id'];

        // Generate a unique token for password recovery
        $token = bin2hex(random_bytes(50));

        // Set token expiration time (expires in 1 hour)
        $expires_at = date("Y-m-d H:i:s", strtotime("+1 hour")); // Uses PHP's timezone set to Asia/Manila

        // Store the token and user_id in the password_recover table
        $stmt = $conn->prepare("INSERT INTO password_recover (user_id, token, expires_at) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $token, $expires_at);
        $stmt->execute();

        // Send the reset email with the link
        $reset_link = "http://localhost/Hack4Gov/reset_password.php?token=" . $token;

        // Use PHPMailer to send the email (with SMTP setup for Gmail)
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'lorem.ipsum.sample.email@gmail.com'; // Your email
            $mail->Password = 'novtycchbrhfyddx'; // Your email app password or password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('lorem.ipsum.sample.email@gmail.com', 'Hack4Gov Team');
            $mail->addAddress($email); // The user's email

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';

            // The HTML content of the email with inline CSS for styling
            $mail->Body    = "
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            margin: 0;
                            padding: 0;
                        }
                        .container {
                            width: 100%;
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #ffffff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                        h1 {
                            color: #2c3e50;
                        }
                        p {
                            font-size: 16px;
                            color: #555555;
                        }
                        .button {
                            background-color: #3498db;
                            color: #ffffff;
                            text-decoration: none;
                            padding: 12px 20px;
                            border-radius: 5px;
                            font-size: 16px;
                            display: inline-block;
                            margin-top: 20px;
                        }
                        .footer {
                            font-size: 12px;
                            color: #aaa;
                            text-align: center;
                            margin-top: 40px;
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <h1>Password Reset Request</h1>
                        <p>Hello,</p>
                        <p>We received a request to reset your password. If you did not make this request, you can ignore this email.</p>
                        <p>To reset your password, click the button below:</p>
                        <a href='$reset_link' class='button'>Reset My Password</a>
                        <p>If you have any issues or didn't request this reset, please contact support immediately.</p>
                        <p>Best regards,</p>
                        <p><strong>The Hack4Gov Team</strong></p>
                        <div class='footer'>
                            <p>&copy; 2025 Hack4Gov. All rights reserved.</p>
                        </div>
                    </div>
                </body>
                </html>
            ";

            // Send the email
            $mail->send();
            echo "A reset link has been sent to your email.";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    } else {
        echo "Email not found in our system.";
    }
}

$conn->close();
?>
