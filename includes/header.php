<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieVerse</title>
    <link rel="stylesheet" href="assets/style.css">
     <link rel="stylesheet" href="/TRY/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="site-header">
    <div class="container nav-wrap">
        <a href="index.php" class="logo">Movie<span>Verse</span></a>

        <nav class="nav">
            <a class="<?= $current == 'index.php' ? 'active' : '' ?>" href="index.php">Home</a>
            <a class="<?= ($current == 'movies.php' || $current == 'movie_details.php') ? 'active' : '' ?>" href="movies.php">Movies</a>
            <a class="<?= $current == 'my_bookings.php' ? 'active' : '' ?>" href="my_bookings.php">My Bookings</a>
           <a class="<?= $current == 'contact.php' ? 'active' : '' ?>" href="contact.php">Contact</a>

            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a class="<?= $current == 'login.php' ? 'active' : '' ?>" href="login.php">Login</a>
                <a class="pill" href="register.php">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>