<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'java';

$conn = mysqli_connect($servername, $username, $password,);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE DATABASE IF NOT EXISTS java";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// Connect to the newly created database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if ($conn===false) {
    die("Connection failed: " .mysqli_connect_error());
}

// Create the table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
   id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    number VARCHAR(10) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

?>