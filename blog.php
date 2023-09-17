<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Blog</title>
    <link rel="stylesheet" href="styles.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="vblg">

    <header class="abhead" id="abhead">
        <a href="index.php"><i class="bx bxs-home-smile"></i><span class="abcap">Home</span></a>
        <a href="services.html"> <i class="bx bxs-hard-hat"></i><span class="abcap">Services</span></a>
        <a href="aboutUs.html"><i class="bx bxs-message-square-add"></i><span class="abcap">About Us</span></a>
        <a href="author_authentication.html"><i class='bx bxs-message-edit'></i><span class="abcap">Editors Page</span></a>

    </header>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="timeline timeline-left">
                            <?php
                            require_once 'configs/DbConn.php';

                            // Retrieve all blogs from the database
                            $sql = "SELECT articles.title, articles.full_text, articles.publication_date, authors.full_name
                                    FROM articles
                                    INNER JOIN authors ON articles.author_id = authors.author_id
                                    ORDER BY articles.publication_date DESC";

                            $result = $DbConn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $article_title = $row['title'];
                                    $article_text = $row['full_text'];
                                    $author_name = $row['full_name'];
                                    $publication_date = $row['publication_date'];
                            ?>
                                    <li class="timeline-inverted timeline-item">
                                        <div class="timeline-badge success"></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h4><?php echo $article_title; ?></h4>
                                                <p>Author: <?php echo $author_name; ?></p>
                                                <p>Publication Date: <?php echo $publication_date; ?></p>
                                            </div>
                                            <div class="timeline-body">
                                                <p><?php echo $article_text; ?></p>
                                            </div>
                                        </div>
                                    </li>
                            <?php
                                }
                            } else {
                                echo '<p>No blogs available.</p>';
                            }

                            $DbConn->close();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>