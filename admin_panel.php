<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="styles.css">
</head>


<body class="ap">
    <header class="abhead" id="abhead">
        <a href="index.php"><i class="bx bxs-home-smile"></i><span class="abcap">Home</span></a>
        <a href="blog.php"><i class="bx bxl-blogger"></i><span class="abcap">Blog</span></a>
        <a href="services.html">
            <i class="bx bxs-hard-hat"></i><span class="abcap">Services</span></a>
        <a href="aboutUs.html"><i class="bx bxs-message-square-add"></i><span class="abcap">About Us</span></a>

    </header>

    <div class="container">
        <h1>Admin Panel</h1>
        <h2>Manage Authors</h2>
        <!-- PHP code to fetch and display authors' data from the database -->
        <?php
        require_once 'configs/DbConn.php';

        $sql = "SELECT * FROM authors";
        $result = $DbConn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Author ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["author_id"] . "</td>";
                echo "<td>" . $row["full_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo "<td>";
                echo "<a href='delete_author.php?author_id=" . $row["author_id"] . "' onclick='return confirm(\"Are you sure you want to delete this author?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No authors found</p>";
        }

        $result->close();
        ?>
    </div>


    <div class="container">
        <h2>Manage Articles</h2>
        <!-- PHP code to fetch and display articles' data from the database -->
        <?php
        $sql = "SELECT * FROM articles";
        $result = $DbConn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Article ID</th>
                            <th>Author ID</th>
                            <th>Title</th>
                            <th>Full Text</th>
                            <th>Publication Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["article_id"] . "</td>";
                echo "<td>" . $row["author_id"] . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["full_text"] . "</td>";
                echo "<td>" . $row["publication_date"] . "</td>";
                echo "<td>";
                echo "<a href='delete_article.php?article_id=" . $row["article_id"] . "' onclick='return confirm(\"Are you sure you want to delete this article?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No articles found</p>";
        }

        $result->close();

        ?>
    </div>
    <div class="usignedin">
    <h2>Users Signed In</h2>
    <table>
        <thead>
            <tr>
                <th>Number</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
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

            $sql = "SELECT username, email FROM signup ORDER BY username ASC";

            $result = $DbConn->query($sql);
            if ($result) {
                if ($result->num_rows > 0) {
                    $number = 1; // Initialize a counter
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $number++ . "</td>"; // Display the number
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td><a href='delete_user.php?username=" . $row["username"] . "' onclick='return confirm(\"Are you sure you want to delete this article?\")'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No signed-up users found</td></tr>";
                }
                $result->close();
            } else {
                echo "Error executing query: " . $DbConn->error;
            }

            $DbConn->close();
            ?>
        </tbody>
    </table>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>