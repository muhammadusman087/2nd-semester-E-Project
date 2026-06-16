<?php
include "../includes/admin_auth.php";
include "../includes/db.php";

$message = "";

if (isset($_POST['add_theater'])) {
    $theater_name =  $_POST['theater_name'];
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    mysqli_query($conn, "INSERT INTO theaters(theater_name,location) VALUES('$theater_name','$location')");
    $message = "<div class='alert success'>Theater added successfully.</div>";
}

if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    mysqli_query($conn, "DELETE FROM theaters WHERE id=$id");
    header("Location: theaters.php");
    exit();
}

$theaters = mysqli_query($conn, "SELECT * FROM theaters ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Theaters</title>
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
        <div class="admin-header"><h1>Manage Theaters</h1></div>
        <?= $message ?>

        <div class="admin-grid-2">
            <div class="glass panel">
                <h3>Add Theater</h3>
                <form method="POST" class="form-grid">
                    <input type="text" name="theater_name" placeholder="Theater Name" required>
                    <input type="text" name="location" placeholder="Location" required>
                    <button class="btn btn-primary" type="submit" name="add_theater">Add Theater</button>
                </form>
            </div>

            <div class="glass panel">
                <h3>Theater List</h3>
                <div class="table-wrap">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                        <?php while($row = mysqli_fetch_assoc($theaters)): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= ($row['theater_name']) ?></td>
                                <td><?= ($row['location']) ?></td>
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