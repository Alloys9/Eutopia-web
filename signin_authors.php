<?php
require_once 'configs/DbConn.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Retrieve user data from 'authors' table
$sql = "SELECT * FROM authors WHERE username='$username' AND password='$password'";
$result = $DbConn->query($sql);

if ($result->num_rows == 1) {
    // User credentials are correct
    header("Location: viewBlog.php");
    exit();
} else {
    // User credentials are incorrect
    echo "Invalid username or password";
    header("Refresh: 3; URL=author_authentication.html");
}
$DbConn->close();
?>
