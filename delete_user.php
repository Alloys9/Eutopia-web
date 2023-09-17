<?php
// Database connection parameters
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "responsive_web";

$DbConn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($DbConn->connect_error) {
    die("Connection failed: " . $DbConn->connect_error);
}

// Get the username to delete from the URL
if (isset($_GET['username'])) {
    $usernameToDelete = $_GET['username'];

    // SQL query to delete the user
    $sql = "DELETE FROM signup WHERE username = '$usernameToDelete'";
    
    if ($DbConn->query($sql) === TRUE) {
        echo "User '$usernameToDelete' has been deleted successfully.";
        header("Location: admin_panel.php");
    } else {
        echo "Error deleting user: " . $DbConn->error;
     
    }

    // Close the database connection
    $DbConn->close();
}
