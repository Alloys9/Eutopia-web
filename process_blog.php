<?php
session_start(); // Start the session (if not already started)

require_once 'configs/DbConn.php';

// Check if the user is logged in
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $article_title = $_POST['title'];
    $article_text = $_POST['full_text'];
    $publication_date = $_POST['publication_date'];

    // Get the full name of the current user from the database
    $username = $_SESSION['username']; // Assuming you have a session variable for the current user's username
    $sql = "SELECT full_name FROM authors WHERE username='$username'";
    $result = $DbConn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $author_name = $row['full_name'];
    } else {
        // Handle the case where the user is not found
        // You may want to add error handling here
        $author_name = ""; // Set a default value or handle the error as needed
    }
    
    // Insert author data into 'authors' table
    $sql = "INSERT INTO authors (full_name) VALUES ('$author_name')";
    if ($DbConn->query($sql) === TRUE) {
        $author_id = $DbConn->insert_id;

        // Insert blog data into 'articles' table
        $sql = "INSERT INTO articles (author_id, title, full_text, publication_date)
                VALUES ('$author_id', '$article_title', '$article_text', '$publication_date')";

        if ($DbConn->query($sql) === TRUE) {
            // Redirect back to blog.php after adding a new blog
            header("Location: blog.php");
            exit;
        } else {
            echo '<div class="error">Error: ' . $sql . '<br>' . $DbConn->error . '</div>';
            header("Refresh: 3; URL=viewBlog.php");
        }
    } else {
        echo '<div class="error">Error: ' . $sql . '<br>' . $DbConn->error . '</div>';
        header("Refresh: 3; URL=viewBlog.php");
    }
}

$DbConn->close();
?>
