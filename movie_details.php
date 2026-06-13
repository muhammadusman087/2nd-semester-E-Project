<?php
include "includes/db.php";
include "includes/header.php";

if (!isset($_GET['id'])) {
    header("Location: movies.php");
    exit();
}

$id = (int) $_GET['id'];
$movieResult = mysqli_query($conn, "SELECT * FROM movies WHERE id = $id");

if (mysqli_num_rows($movieResult) == 0) {
    header("Location: movies.php");
    exit();
}

$movie = mysqli_fetch_assoc($movieResult);

$shows = mysqli_query($conn, "
    SELECT shows.*, theaters.theater_name
    FROM shows
    JOIN theaters ON theaters.id = shows.theater_id
    WHERE movie_id = $id
    ORDER BY show_date ASC, show_time ASC
");
?>

<section class="section">
    <div class="container details-grid">
        <div class="poster-panel">
            <img class="detail-poster" src="<?= ($movie['poster']) ?>" alt="<?= ($movie['title']) ?>">
        </div>

        <div class="detail-panel">
            <span class="eyebrow">Movie Details</span>
            <h1><?= ($movie['title']) ?></h1>

            <div class="chip-row">
                <span class="chip"><?= ($movie['genre']) ?></span>
                <span class="chip"><?= ($movie['duration']) ?></span>
                <span class="chip"><?= ($movie['language']) ?></span>
                <span class="chip"> <?= ($movie['rating']) ?></span>
            </div>

            <p class="lead"><?= ($movie['description']) ?></p>

            <?php if (!empty($movie['trailer_link'])): ?>
                <a class="btn btn-outline" href="<?= ($movie['trailer_link']) ?>" target="_blank">Watch Trailer</a>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section alt">
    <div class="container">
        <div class="section-head">
            <div>
                <span class="eyebrow">Booking</span>
                <h2>Available Shows</h2>
            </div>
        </div>

        <div class="show-list">
            <?php while($show = mysqli_fetch_assoc($shows)): ?>
                <div class="show-row glass">
                    <div>
                        <h3><?= ($show['theater_name']) ?></h3>
                        <p><?= ($show['show_date']) ?> · <?= ($show['show_time']) ?></p>
                    </div>

                    <div class="prices">
                        <span>Gold Rs.<?= $show['gold_price'] ?></span>
                        <span>Platinum Rs.<?= $show['platinum_price'] ?></span>
                        <span>Box Rs.<?= $show['box_price'] ?></span>
                    </div>

                    <a class="btn btn-primary btn-sm" href="book_ticket.php?show_id=<?= $show['id'] ?>">Book Now</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>