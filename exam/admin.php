<?php
// admin.php
require_once 'db_config.php';



// Check if the 'admins' table exists, if not, create it
$sql_admins = "CREATE TABLE IF NOT EXISTS admins (
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn,$sql_admins)) {
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Check if the 'admins' table is empty, if so, insert the admin data
$sql_check_admin = "SELECT username FROM admins LIMIT 1";
$result = $conn->query($sql_check_admin);

if ($result->num_rows === 0) {
    // Insert admin data into the 'admins' table
    $sql_insert_admin = "INSERT INTO admins (username, password) VALUES ('admin', '" . password_hash('p@ssword', PASSWORD_DEFAULT) . "')";

    if ($conn->query($sql_insert_admin) === TRUE) {
    } else {
        echo "Error inserting admin data: " .mysqli_error($conn);
    }
}
?>
