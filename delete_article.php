<?php
require_once 'configs/DbConn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["article_id"])) {
    $article_id = $_GET["article_id"];

    // Delete article from the database
    $sql = "DELETE FROM articles WHERE article_id='$article_id'";

    if ($DbConn->query($sql) === TRUE) {
        echo "Article deleted successfully";
        header("Location: admin_panel.php");
    } else {
        echo "Error deleting article: " . $DbConn->error;
        
    }
} else {
    echo "Invalid request";
    
    exit();
}

$DbConn->close();
