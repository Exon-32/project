<?php
session_start();
require_once 'db_config.php';

// Check if the user is logged in as admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Fetch all user data from the 'users' table
$sql_users = "SELECT * FROM users";
$result_users = $conn->query($sql_users);

// Fetch all user data (except for the password) to populate the dropdown
$sql_user_dropdown = "SELECT id, email, firstname, number FROM users";
$result_user_dropdown = $conn->query($sql_user_dropdown);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <!-- CSS styles -->
</head>
<body>
    <h1>Welcome, Admin!</h1>

    <!-- Display all user data -->
    <h2>All Users</h2>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Email</th>
                <th>firstname</th>
                <th>Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row_user = $result_users->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_user['id'] . "</td>";
                echo "<td>" . $row_user['email'] . "</td>";
                echo "<td>" . $row_user['firstname'] . "</td>";
                echo "<td>" . $row_user['number'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Dropdown to display individual user data -->
    <h2>Select User</h2>
    <select id="user-dropdown" onchange="displayUserData(this.value)">
        <option value="">Select a user</option>
        <?php
        while ($row_dropdown = $result_user_dropdown->fetch_assoc()) {
            echo "<option value='" . $row_dropdown['id'] . "'>" . $row_dropdown['firstname'] . "</option>";
        }
        ?>
    </select>

    <!-- Placeholder to display individual user data -->
    <div id="user-data-container">
        <h2>User Details</h2>
        <p>Select a user from the dropdown to view details.</p>
    </div>
    <a href="logout.php">Logout</a>

    <script>
        // Function to fetch and display individual user data
        function displayUserData(userId) {
            if (userId !== "") {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("user-data-container").innerHTML = this.responseText;
                    }
                };
                xhr.open("GET", "get_user_data.php?id=" + userId, true);
                xhr.send();
            } else {
                document.getElementById("user-data-container").innerHTML = "<h2>User Details</h2><p>Select a user from the dropdown to view details.</p>";
            }
        }
    </script>
</body>
</html>
