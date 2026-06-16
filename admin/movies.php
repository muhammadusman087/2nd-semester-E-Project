<?php
include "../includes/admin_auth.php";
include "../includes/db.php";

$message = "";

if (isset($_POST['add_movie'])) {
    $title =  $_POST['title'];
    $genre =  $_POST['genre'];
    $duration =  $_POST['duration'];
    $language =  $_POST['language'];
    $rating =  $_POST['rating'];
    $description =  $_POST['description'];
    $poster =  $_POST['poster'];
    $trailer_link =  $_POST['trailer_link'];

    mysqli_query($conn, "
        INSERT INTO movies(title,genre,duration,language,rating,description,poster,trailer_link)
        VALUES('$title','$genre','$duration','$language','$rating','$description','$poster','$trailer_link')
    ");

    $message = "<div class='alert success'>Movie added successfully.</div>";
}

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    mysqli_query($conn, "DELETE FROM movies WHERE id=$id");
    header("Location: movies.php");
    exit();
}

$movies = mysqli_query($conn, "SELECT * FROM movies ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Movies</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="admin-shell">
    <aside class="sidebar">
        <a href="dashboard.php" class="logo">Movie<span>Verse</span></a>
        <nav class="side-nav">
            <a href="dashboard.php">Dashboard</a>
            <a href="movies.php">Movies</a>
            <a href="theaters.php">Theaters</a>
            <a href="shows.php">Shows</a>
            <a href="booking.php">Bookings</a>
            <a href="users.php">Users</a>
            <a href="logout.php">Logout</a>
        </nav>
    </aside>

    <main class="admin-main">
        <div class="admin-header"><h1>Manage Movies</h1></div>
        <?= $message ?>

        <div class="admin-grid-2">
            <div class="glass panel">
                <h3>Add New Movie</h3>
                <form method="POST" class="form-grid">
                    <input type="text" name="title" placeholder="Movie Title" required>
                    <input type="text" name="genre" placeholder="Genre" required>
                    <input type="text" name="duration" placeholder="Duration" required>
                    <input type="text" name="language" placeholder="Language" required>
                    <input type="text" name="rating" placeholder="Rating" required>
                    <input type="text" name="poster" placeholder="Poster URL" required>
                    <input type="text" name="trailer_link" placeholder="Trailer Link">
                    <textarea name="description" placeholder="Description" rows="5" required></textarea>
                    <button class="btn btn-primary" type="submit" name="add_movie">Add Movie</button>
                </form>
            </div>

            <div class="glass panel">
                <h3>Movie List</h3>
                <div class="table-wrap">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Genre</th>
                            <th>Action</th>
                        </tr>
                        <?php while($row = mysqli_fetch_assoc($movies)): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= ($row['title']) ?></td>
                                <td><?= ($row['genre']) ?></td>
                                <td><a class="danger-link" href="?delete=<?= $row['id'] ?>">Delete</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>