<?php
include "../includes/admin_auth.php";
include "../includes/db.php";

$movieCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM movies"))['total'];
$theaterCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM theaters"))['total'];
$bookingCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM bookings"))['total'];
$userCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"))['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/TRY/assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        <div class="admin-header">
            <h1>Dashboard</h1>
            <p>Welcome, <?= ($_SESSION['admin_name']) ?></p>
        </div>

        <div class="admin-cards">
            <div class="dashboard-card glass">
                <h3><?= $movieCount ?></h3>
                <p>Total Movies</p>
            </div>

            <div class="dashboard-card glass">
                <h3><?= $theaterCount ?></h3>
                <p>Total Theaters</p>
            </div>

            <div class="dashboard-card glass">
                <h3><?= $bookingCount ?></h3>
                <p>Total Bookings</p>
            </div>

            <div class="dashboard-card glass">
                <h3><?= $userCount ?></h3>
                <p>Total Users</p>
            </div>
        </div>
    </main>
</div>

</body>
</html>