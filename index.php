<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OPIUM</title>
  <link rel="stylesheet" href="styles.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <header class="header">
    <a href="#" class="logo">
      <p id="username">
        <?php
        if (isset($_SESSION['username'])) {
          echo $_SESSION['username'];
          echo '<a id="logout" href="logout.php"><i class="bx bx-log-out-circle"></i></a>';
        } else {
          echo "Guest";
          echo '<a id="signin1" href="sign_in.php"><i class="bx bx-log-in-circle"></i></a>';
        }

        ?>
      </p>
    </a>
    <nav class="links">
      <a href="blog.php"><i class="bx bxl-blogger"></i><span class="abcap">Blog</span></a>
      <a href="services.html"><i class="bx bxs-hard-hat"></i><span class="abcap">Services</span></a>
      <a href="aboutUs.html"><i class="bx bxs-message-square-add"></i><span class="abcap">About Us</span></a>
      <a href="admin.php"><i class='bx bx-command'></i><span class="abcap">Administrator</span></a>
      <a href="contactUs.html"><i class="bx bxs-hard-hat"></i><span class="abcap">Contact Us</span></a>
      <a href="author_authentication.html"><i class='bx bx-log-in'></i><span class="abcap">Author Login</span></a>
    </nav>
  </header>


  <section class="intro" id="intro">
    <h1>Eutpoia Tech</h1>
    <p>Eutopia Tech is a dynamic and innovative company specializing in web design and development solutions. With a team of skilled professionals, Opium Web Designers aims to provide cutting-edge websites that are not only visually appealing but also highly functional and user-friendly.</p>
  </section>

  <section class="mid" id="mid">
    <h1>More</h1>
    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam nemo distinctio labore reprehenderit ullam asperiores est aperiam assumenda illum a eaque recusandae dolore, reiciendis voluptate doloribus magni earum enim odit!</h2>
    <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque aliquam laboriosam in nam praesentium eius deserunt nemo! Enim, consequuntur fuga esse atque asperiores sit mollitia nobis quos amet assumenda sint.</h3>
  </section>

  <section class="bottom" id="bottom">
    <h1>Insight</h1>
    <h2>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur quia, dignissimos quisquam temporibus neque tempore, quae nemo pariatur ipsam eaque velit labore ratione earum cum suscipit repellat quaerat, exercitationem ut?</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iste voluptates, consequuntur tenetur est veritatis nihil maxime magnam autem cumque culpa, voluptas reprehenderit possimus, quae excepturi voluptatem quaerat. Culpa, accusantium.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, sunt. Eius laboriosam ipsa ipsam? Quibusdam molestiae beatae accusamus voluptatibus fugiat, harum, non animi quis aperiam ullam vero culpa. Soluta, labore?</p>
  </section>


  <script class="logo" src="script.js"></script>
  <footer>

  </footer>
</body>

</html>