<?php
require_once 'configs/DbConn.php';

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Insert user data into 'authors' table
$sql = "INSERT INTO authors (full_name, email, username, password)
        VALUES ('$full_name', '$email', '$username', '$password')";

if ($DbConn->query($sql) === TRUE) {
    // Sign up successful
    header("Location: viewBlog.php");
    exit();
} else {
    // Sign up failed
    echo "Error: " . $sql . "<br>" . $DbConn->error;
    header("Refresh: 3; URL=author_authentication.html");
}
?>
