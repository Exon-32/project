<?php
// Connect to the database (Replace these variables with your actual database credentials)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'java';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn=== false) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the submitted username and password from the registration form

$firstname = $_POST['firstname'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Invalid email format, redirect back to the registration page with an error message
    header('Location: register.php?error=invalid_email');
    exit();
}

// Check if the username already exists in the database
$sql = "SELECT id FROM users WHERE firstname = '$firstname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Email (username) already exists, redirect back to the registration page with an error message
    header('Location: register.php?error=username_taken');
    exit();
}

// Check if the password and confirm password match
if ($password !== $confirm_password) {
    // Passwords do not match, redirect back to the registration page with an error message
    header('Location: register.php?error=password_mismatch');
    exit();
}

// Hash the password before storing it in the database
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the new user into the database
$sql = "INSERT INTO users ( firstname, email, number, password) VALUES ( '$firstname', '$email', '$number', '$password')";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php?success=registration_completed');
    exit(); 
} else {
    header('Location: register.php?error=registration_failed');
    exit();
}
?>