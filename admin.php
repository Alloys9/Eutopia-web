<?php
require_once 'configs/DbConn.php';

$admin_username = "admin";
$admin_password = "root";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Invalid username or password";
        header("Refresh: 3; URL=admin.html");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css" />
    </head>
<body class="adminauth">
    <h1>Administrator</h1>
    <form action="admin.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
