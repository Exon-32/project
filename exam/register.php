<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <style>
        /* Add your CSS styling here */
        /* Example: */
        body {
            font-family: Arial, sans-serif;
        }
        .registration-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="registration-form">
        <h2>Register</h2>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] === 'username_taken') {
                echo '<div class="error-message">Email is already registered. Please choose a different email.</div>';
            } elseif ($_GET['error'] === 'invalid_email') {
                echo '<div class="error-message">Invalid email. Please try again.</div>';
            }elseif ($_GET['error'] === 'password_mismatch') {
                echo '<div class="error-message">Passwords do not match. Please try again.</div>';
            }
        }
        ?>
        <form action="register_process.php" method="post">
            
        <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="tel" name="number" id="number" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
            <a href="index.php" id="index" value="index">Login</a>
        </form>
    </div>
</body>
</html>
