<?php
include "../includes/admin_auth.php";
include "../includes/db.php";

$users = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
        <div class="admin-header"><h1>Registered Users</h1></div>

        <div class="glass panel">
            <div class="table-wrap">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                    <?php while($row = mysqli_fetch_assoc($users)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['phone']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    </main>
</div>

</body>
</html>