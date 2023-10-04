<?php
session_start();
require_once 'db_config.php';
require_once 'admin.php';

// if (isset($_POST['login'])) {
//     $username = $_REQUEST['username'];
//     $password = $_REQUEST['password'];

//     $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
//     $result = $conn->query($sql);

//     if ($result->num_rows == 1) {
//         $_SESSION['username'] = $username;
//         header("Location: dashboard.php");
//         exit;
//     } else {
//         $error_msg = "Invalid username or password!";
//     }
// }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <?php
       
         if (isset($_GET['error'])) {
            if ($_GET['error'] === 'invalid_username') {
                echo '<script>alert("Invalid username. Please try again.")</script>';
            } elseif ($_GET['error'] === 'invalid_password') {
                echo '<script>alert("Invalid password. Please try again.")</script>';
            }
        }
        // if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') {
        //     echo '<script>alert("Invalid username or password. Please try again.")</script>';
        // }
        ?>
        <form method="POST" action="login_proc.php">
            <input type="text" name="username" id="username" placeholder="username" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
        
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
