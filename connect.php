<?php
// Database connection settings
$servername = "localhost";  // Hostname
$username = "root";         // MySQL Username (default is root for local servers)
$password = "";             // MySQL Password (default is empty for local servers)
$dbname = "spotlight";       // Database name (use the name of your database)

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form fields
    $full_name = mysqli_real_escape_string($conn, $_POST['full-name-signup']);
    $email = mysqli_real_escape_string($conn, $_POST['email-signup']);
    $password = mysqli_real_escape_string($conn, $_POST['password-signup']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password-signup']);
    $username = mysqli_real_escape_string($conn, $_POST['username-signup']);
    $referral_code = mysqli_real_escape_string($conn, $_POST['referral-code-signup']);

    // Validate passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the data into the database
    $sql = "INSERT INTO users (full_name, email, password, username, referral_code) 
            VALUES ('$full_name', '$email', '$hashed_password', '$username', '$referral_code')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
