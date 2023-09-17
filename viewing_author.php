<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Authors</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body class="vblg">
    <header class="abhead" id="abhead">
        <a href="index.php"><i class="bx bxs-home-smile"></i><span class="abcap">Home</span></a>
        <a href="blog.php"><i class="bx bxl-blogger"></i><span class="abcap">Blog</span></a>
        <a href="services.html"><i class="bx bxs-hard-hat"></i><span class="abcap">Services</span></a>
        <a href="aboutUs.html"><i class="bx bxs-message-square-add"></i><span class="abcap">About Us</span></a>
    </header>

    <a href="viewBlog.php"><i class='bx bx-chevron-left'></i></a>
    <div class="article-table">
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publication Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'configs/DbConn.php';

                // Retrieve the latest 4 published articles
                $sql = "SELECT articles.title, authors.full_name, articles.publication_date FROM articles JOIN authors ON articles.author_id = authors.author_id ORDER BY articles.publication_date DESC LIMIT 4";
                $result = $DbConn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['publication_date'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No articles found</td></tr>";
                }

                $DbConn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>