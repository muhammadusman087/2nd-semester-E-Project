<?php
include "includes/db.php";
include "includes/header.php";

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$sql = "SELECT * FROM movies";
if ($search !== '') {
    $sql .= " WHERE title LIKE '%$search%' OR genre LIKE '%$search%' OR language LIKE '%$search%'";
}
$sql .= " ORDER BY id DESC";

$movies = mysqli_query($conn, $sql);
?>

<!-- <section class="page-banner">


    <div class="banner-slider">

        <section class="movies-banner">

            <img src="assets/home 1.jpg" alt="Movies Banner">

            <div class="movies-banner-text">
                <h1>Now Showing Movies</h1>
                <p>Explore the latest movies and book your seats easily.</p>
            </div>

        </section> -->


        <div class="container">
            <span class="eyebrow" style="margin-top: 30px;">Browse</span>
            <h1>All Movies</h1>

            <form class="search-bar" method="GET">
                <input type="text" name="search" placeholder="Search movie..." value="<?= ($search) ?>">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
</section>

<section class="section">
    <div class="container movie-grid">
        <?php while ($movie = mysqli_fetch_assoc($movies)): ?>
            <div class="movie-card">
                <img src="<?= ($movie['poster']) ?>" alt="<?= ($movie['title']) ?>">
                <div class="movie-body">
                    <div class="chip-row">
                        <span class="chip"><?= ($movie['genre']) ?></span>
                        <span class="chip"> <?= ($movie['rating']) ?></span>
                    </div>
                    <h3><?= ($movie['title']) ?></h3>
                    <p><?= ($movie['duration']) ?> · <?= ($movie['language']) ?></p>
                    <a class="btn btn-primary btn-sm" href="movie_details.php?id=<?= $movie['id'] ?>">View Details</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php include "includes/footer.php"; ?>