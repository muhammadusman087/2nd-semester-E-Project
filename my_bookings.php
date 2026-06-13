<?php
include "includes/auth.php";
include "includes/db.php";
include "includes/header.php";

$user_id = $_SESSION['user_id'];

$bookings = mysqli_query($conn, "
    SELECT bookings.*, movies.title, movies.poster, theaters.theater_name, shows.show_date, shows.show_time
    FROM bookings
    JOIN shows ON shows.id = bookings.show_id
    JOIN movies ON movies.id = shows.movie_id
    JOIN theaters ON theaters.id = shows.theater_id
    WHERE bookings.user_id = $user_id
    ORDER BY bookings.id DESC
");
?>

<section class="page-banner">



<!-- <section class="movies-banner">

<img src="assets/5 - Copy.jpg" alt="Movie Booking Banner">

<div class="banner-content">
    <h1>Book Your Favorite Movies</h1>
    <p>Discover the latest movies and reserve your seats online.</p>
</div>

</section> -->




    <div class="container">
        <span class="eyebrow" style="margin-top: 20px;">User Area</span>
        <h1>My Bookings</h1>
    </div>
</section>

<section class="section">
    <div class="container booking-list">
        <?php while($row = mysqli_fetch_assoc($bookings)): ?>
            <div class="show-row glass">
                <img class="thumb" src="<?= ($row['poster']) ?>" alt="">
                <div>
                    <h3><?= ($row['title']) ?></h3>
                    <p><?= ($row['theater_name']) ?></p>
                    <p><?= ($row['show_date']) ?> · <?= ($row['show_time']) ?></p>
                </div>

                <div class="prices">
                    <span><?= ($row['seat_class']) ?></span>
                    <span>Adult: <?= $row['tickets'] ?></span>
                    <span>Kids: <?= $row['kids_tickets'] ?></span>
                    <span>Total: Rs.<?= $row['total_amount'] ?></span>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php include "includes/footer.php"; ?>