<?php
session_start();
require_once 'db_config.php';

if (isset($_POST['login'])) {
    $usernameOrFirstName = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user is an admin
    $sql_admin = "SELECT * FROM admins WHERE username = ?";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param('s', $usernameOrFirstName);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows == 1) {
        $row_admin = $result_admin->fetch_assoc();
        $admin_password = $row_admin['password'];

        if ($password == $admin_password) {
            $_SESSION['user_id'] = 'admin';
            header('Location: admin_dashboard.php');
            exit(); // Ensure the script stops here to avoid any further execution
        }
    }

    // If not admin, check in the 'users' table using firstname
    $sql_user = "SELECT * FROM users WHERE firstname = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param('s', $usernameOrFirstName);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($result_user->num_rows == 1) {
        $row_user = $result_user->fetch_assoc();
        $stored_password = $row_user['password'];

        if ($password == $stored_password) {
            $_SESSION['user_id'] = $row_user['user_id']; // Assuming 'user_id' is the user's unique identifier
            header('Location: dashboard.php');
            exit(); // Ensure the script stops here to avoid any further execution
        }
    }

    // If neither admin nor user credentials are valid, show error message and redirect to login page
    header('Location: login.php?error=invalid_credentials');
    exit(); // Ensure the script stops here to avoid any further execution
} else {
    // Redirect back to the login page if the form was not submitted
    header('Location: login.php');
    exit(); // Ensure the script stops here to avoid any further execution
}
?>
