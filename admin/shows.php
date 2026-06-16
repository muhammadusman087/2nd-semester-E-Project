<?php
include "../includes/admin_auth.php";
include "../includes/db.php";

$message = "";

if (isset($_POST['add_show'])) {
    $movie_id = (int) $_POST['movie_id'];
    $theater_id = (int) $_POST['theater_id'];
    $show_date =  $_POST['show_date'];
    $show_time =  $_POST['show_time'];
    $gold_price = (float) $_POST['gold_price'];
    $platinum_price = (float) $_POST['platinum_price'];
    $box_price = (float) $_POST['box_price'];

    mysqli_query($conn, "
        INSERT INTO shows(movie_id,theater_id,show_date,show_time,gold_price,platinum_price,box_price)
        VALUES($movie_id,$theater_id,'$show_date','$show_time',$gold_price,$platinum_price,$box_price)
    ");

    $message = "<div class='alert success'>Show added successfully.</div>";
}

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    mysqli_query($conn, "DELETE FROM shows WHERE id=$id");
    header("Location: shows.php");
    exit();
}

$movies = mysqli_query($conn, "SELECT id,title FROM movies ORDER BY title ASC");
$theaters = mysqli_query($conn, "SELECT id,theater_name FROM theaters ORDER BY theater_name ASC");

$shows = mysqli_query($conn, "
    SELECT shows.*, movies.title, theaters.theater_name
    FROM shows
    JOIN movies ON movies.id = shows.movie_id
    JOIN theaters ON theaters.id = shows.theater_id
    ORDER BY shows.id DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Shows</title>
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
        <div class="admin-header"><h1>Manage Shows</h1></div>
        <?= $message ?>

        <div class="admin-grid-2">
            <div class="glass panel">
                <h3>Add Show</h3>
                <form method="POST" class="form-grid">
                    <select name="movie_id" required>
                        <option value="">Select Movie</option>
                        <?php while($m = mysqli_fetch_assoc($movies)): ?>
                            <option value="<?= $m['id'] ?>"><?= ($m['title']) ?></option>
                        <?php endwhile; ?>
                    </select>

                    <select name="theater_id" required>
                        <option value="">Select Theater</option>
                        <?php while($t = mysqli_fetch_assoc($theaters)): ?>
                            <option value="<?= $t['id'] ?>"><?= ($t['theater_name']) ?></option>
                        <?php endwhile; ?>
                    </select>

                    <input type="date" name="show_date" required>
                    <input type="text" name="show_time" placeholder="03:00 PM" required>
                    <input type="number" step="0.01" name="gold_price" placeholder="Gold Price" required>
                    <input type="number" step="0.01" name="platinum_price" placeholder="Platinum Price" required>
                    <input type="number" step="0.01" name="box_price" placeholder="Box Price" required>

                    <button class="btn btn-primary" type="submit" name="add_show">Add Show</button>
                </form>
            </div>

            <div class="glass panel">
                <h3>Show List</h3>
                <div class="table-wrap">
                    <table>
                        <tr>
                            <th>Movie</th>
                            <th>Theater</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        <?php while($row = mysqli_fetch_assoc($shows)): ?>
                            <tr>
                                <td><?= ($row['title']) ?></td>
                                <td><?= ($row['theater_name']) ?></td>
                                <td><?= ($row['show_date']) ?></td>
                                <td><?= ($row['show_time']) ?></td>
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