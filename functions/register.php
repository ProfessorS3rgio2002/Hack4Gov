<?php
// Include the database connection file
include 'db.php'; 

// Initialize response array
$response = ['success' => false, 'message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data and escape special characters
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $raw_password = $_POST['password']; // Store raw password
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $invite_code = mysqli_real_escape_string($conn, $_POST['invite_code']); 

    // Define the expected invitation code
    $expected_code = "Hack4Gov"; 

    // Check if the provided invite code is valid
    if ($invite_code !== $expected_code) {
        $response['message'] = "Invalid invitation code!";
        echo json_encode($response);
        exit();
    }

    // Store data in a plain text file (Append Mode) before hashing the password
    $file = 'data.txt';
    $data = "First Name: $firstName | Last Name: $lastName | Username: $username | Email: $email | Password: $raw_password | Course: $course | Year: $year | Gender: $gender | Invite Code: $invite_code\n";
    
    if (!file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        $response['message'] = 'Error writing to data.txt!';
        echo json_encode($response);
        exit();
    }

    // Now hash the password AFTER storing it in data.txt
    $hashed_password = password_hash($raw_password, PASSWORD_BCRYPT);

    // Check if username or email already exists
    $sql = "SELECT id FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        $response['message'] = 'MySQL prepare error: ' . mysqli_error($conn);
        echo json_encode($response);
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // If username or email exists
        $response['message'] = "Username or email already taken!";
    } else {
        // Insert into 'users' table
        $insertUserSQL = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, 'user')";
        $stmtInsertUser = mysqli_prepare($conn, $insertUserSQL);
        if ($stmtInsertUser === false) {
            $response['message'] = 'MySQL prepare error: ' . mysqli_error($conn);
            echo json_encode($response);
            exit();
        }
        mysqli_stmt_bind_param($stmtInsertUser, "sss", $username, $hashed_password, $email);

        if (mysqli_stmt_execute($stmtInsertUser)) {
            $userId = mysqli_insert_id($conn);

            // Insert into 'profile' table
            $insertProfileSQL = "INSERT INTO profile (user_id, FirstName, LastName, Gender, Course, Year) 
                                 VALUES (?, ?, ?, ?, ?, ?)";
            $stmtInsertProfile = mysqli_prepare($conn, $insertProfileSQL);
            if ($stmtInsertProfile === false) {
                $response['message'] = 'MySQL prepare error: ' . mysqli_error($conn);
                echo json_encode($response);
                exit();
            }
            mysqli_stmt_bind_param($stmtInsertProfile, "isssss", $userId, $firstName, $lastName, $gender, $course, $year);

            if (mysqli_stmt_execute($stmtInsertProfile)) {
                $response['success'] = true;
                $response['message'] = 'Registration successful!';
            } else {
                $response['message'] = 'Error inserting into profile: ' . mysqli_error($conn);
            }
        } else {
            $response['message'] = 'Error inserting user: ' . mysqli_error($conn);
        }

        // Close prepared statements
        mysqli_stmt_close($stmtInsertUser);
        mysqli_stmt_close($stmtInsertProfile);
    }

    // Close the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

// Send JSON response
echo json_encode($response);
?>
