<?php
require_once 'configs/DbConn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["author_id"])) {
    $author_id = $_GET["author_id"];

    // Delete author's articles first
    $sql = "DELETE FROM articles WHERE author_id='$author_id'";

    if ($DbConn->query($sql) === TRUE) {
        // Proceed to delete the author
        $sql = "DELETE FROM authors WHERE author_id='$author_id'";

        if ($DbConn->query($sql) === TRUE) {
            echo "Author deleted successfully";
            header("Location: admin_panel.php");
        } else {
            echo "Error deleting author: " . $DbConn->error;
            
        }
    } else {
        echo "Error deleting author's articles: " . $DbConn->error;
    }
}
$DbConn->close();
