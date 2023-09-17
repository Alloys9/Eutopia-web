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

// Signup form submission
if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql_query = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$password')";

  if ($DbConn->query($sql_query) === TRUE) {
    // Store the username in the session
    $_SESSION['username'] = $username;

    // Redirect to index.html
    header("Location: index.php");
    exit();
  } else {
    echo "Error: " . $sql_query . "<br>" . $DbConn->error;
    header("Refresh: 3; URL=sign_up.php");
  }
}

$DbConn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <main class="signupbody">
    <form action="sign_up.php" method="POST" class="form" id="signupForm">
      <div class="backgroundup"></div>
      <h1 class="form-title" id="signup">Sign Up</h1>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required />

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Email" required />

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Password" required />

      <button type="submit" name="submit">Sign Up</button>

      <p>Have an account? <a href="sign_in.php">Sign In</a></p>
    </form>
  </main>
  <script src="script.js"></script>
</body>
</html>