<?php
// Start a new or resume the existing session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "responsive_web";

// Create connection
$DbConn = new mysqli($servername, $username, $password, $database_name);

// Check connection
if ($DbConn->connect_error) {
  die("Connection failed: " . $DbConn->connect_error);
}

// Signin form submission
if (isset($_POST['submit']) && isset($_POST['identifier']) && isset($_POST['password'])) {
  $identifier = $_POST['identifier']; // Can be either email or username
  $password = $_POST['password'];

  // Check if user exists in the signup table
  $sql_query = "SELECT * FROM signup WHERE (email = '$identifier' OR username = '$identifier') AND password = '$password'";
  $result = $DbConn->query($sql_query);

  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];

    // Store the username in the session
    $_SESSION['username'] = $username;

    // Redirect to index.html
    header("Location: index.php");
    exit();
  } else {
    // User not found or incorrect password, redirect to signIn.html
    echo "Invalid username or password";
    header("Refresh: 3; URL=sign_in.php");
    exit();
  }
}

$DbConn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <main class="signinbody">
    <form action="sign_in.php" method="POST" class="form" id="signinForm">
      <div class="backgroundin"></div>
      <a href="sign_in.php"><h1 class="form-title" id="signin">Sign In</h1></a>

      <label for="identifier">Email or Username:</label>
      <input type="text" id="identifier" name="identifier" placeholder="Email or Username" required />

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Password" required />

      <button type="submit" name="submit">Sign In</button>

      <p>Don't have an account? <a href="sign_up.php">Sign Up</a></p>

    </form>
  </main>
  <script src="script.js"></script>
</body>

</html>