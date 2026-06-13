<?php
include "../includes/admin_auth.php";
include "../includes/db.php";

$bookings = mysqli_query($conn, "
    SELECT bookings.*, users.name, movies.title, theaters.theater_name, shows.show_date, shows.show_time
    FROM bookings
    JOIN users ON users.id = bookings.user_id
    JOIN shows ON shows.id = bookings.show_id
    JOIN movies ON movies.id = shows.movie_id
    JOIN theaters ON theaters.id = shows.theater_id
    ORDER BY bookings.id DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bookings</title>
    <link rel="stylesheet" href="/TRY/assets/style.css">
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
        <div class="admin-header"><h1>All Bookings</h1></div>

        <div class="glass panel">
            <div class="table-wrap">
                <table>
                    <tr>
                        <th>User</th>
                        <th>Movie</th>
                        <th>Theater</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Class</th>
                        <th>Total</th>
                    </tr>
                    <?php while($row = mysqli_fetch_assoc($bookings)): ?>
                        <tr>
                            <td><?= ($row['name']) ?></td>
                            <td><?= ($row['title']) ?></td>
                            <td><?= ($row['theater_name']) ?></td>
                            <td><?= ($row['show_date']) ?></td>
                            <td><?= ($row['show_time']) ?></td>
                            <td><?= ($row['seat_class']) ?></td>
                            <td>Rs.<?= ($row['total_amount']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </main>
</div>

</body>
</html>