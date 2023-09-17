<?php
session_start();

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $full_name = $username;
} else {
  $full_name = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Blog</title>
  <link rel="stylesheet" href="styles.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body class="vblg">
  <header class="abhead" id="abhead">
    <a href="index.php"><i class="bx bxs-home-smile"></i><span class="abcap">Home</span></a>
    <a href="contactUs.html"><i class="bx bx-envelope"></i><span class="abcap">Contact Us</span></a>
    <a href="services.html"><i class="bx bxs-hard-hat"></i><span class="abcap">Services</span></a>
    <a href="aboutUs.html"><i class="bx bxs-message-square-add"></i><span class="abcap">About Us</span></a>
    <a href="blog.php"><i class="bx bxl-blogger"></i><span class="abcap">Blog</span></a>
    <a href="viewing_author.php"><i class='bx bx-message-dots'></i><span class="abcap">View Authors</span></a>
  </header>


  <form action="process_blog.php" method="POST" class="blogauth">
  <div class="input-group">
        <label for="full_name">Author's Full Name:</label>
        <span class="input-value">
        <?php echo htmlspecialchars($full_name); ?>
        </span>
    </div>

    <label for="title">Article Title:</label>
    <input type="text" name="title" required><br>

    <label for="full_text">Article Full Text:</label><br>
    <textarea name="full_text" rows="5" cols="40" required></textarea><br>

    <label for="publication_date">Publication Date:</label>
    <input type="date" name="publication_date" required><br>

    <button type="submit">Submit</button>
  </form>



</body>

</html>