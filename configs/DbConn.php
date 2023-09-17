
<?php
require_once 'constants.php';

$DbConn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($DbConn->connect_error) {
  die("Connection failed: " . $DbConn->connect_error);
}
?>
