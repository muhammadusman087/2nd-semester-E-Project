<?php
include "includes/db.php";
include "includes/header.php";

$featured = mysqli_query($conn, "SELECT * FROM movies ORDER BY id DESC LIMIT 6");

$upcoming = mysqli_query($conn, "
    SELECT shows.id AS show_id, movies.title, movies.poster, theaters.theater_name, shows.show_date, shows.show_time
    FROM shows
    JOIN movies ON shows.movie_id = movies.id
    JOIN theaters ON shows.theater_id = theaters.id
    ORDER BY shows.show_date ASC, shows.show_time ASC
    LIMIT 6
");
?>

<section class="hero">



<!-- <div class="full-banner">
    <div class="banner-slider">
        <div class="slide">
            <img src="assets/movie booking system.png" alt="Banner">
        </div>
    </div>
</div> -->
<!-- <div class="banner-slider">

    <div class="slide">
        <img src="assets/movie booking system.png">
    </div>

  

</div> -->




    <div class="container hero-grid">
        <div class="hero-text">
            <span class="eyebrow" style=" margin-top: 30px;">Premium Cinema Experience</span>
            <h1>Book movie tickets online with a modern cinema feel.</h1>
            <p>Browse movies, watch details, check shows, choose class and book instantly.</p>

            <div class="hero-actions">
                <a href="movies.php" class="btn btn-primary">Explore Movies</a>
                <a href="login.php" class="btn btn-dark">Login Now</a>
            </div>

            <div class="stats">
                <div><strong>50+</strong><span>Movies</span></div>
                <div><strong>10+</strong><span>Theaters</span></div>
                <div><strong>24/7</strong><span>Booking</span></div>
            </div>
        </div>

        <div class="hero-card glass">
            <div class="mini-badge">Now Showing</div>
            <h3>Easy booking in 3 steps</h3>
            <ol class="steps">
                <li>Choose your movie</li>
                <li>Select theater and show</li>
                <li>Pick class and confirm</li>
            </ol>
            <a href="movies.php" class="btn btn-primary w-full">Book Your Seat</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container section-head">
        <div>
            <span class="eyebrow">Featured</span>
            <h2>Now Showing</h2>
        </div>
        <a href="movies.php" class="text-link">View all movies</a>
    </div>

    <div class="movie-grid">
        <?php while($movie = mysqli_fetch_assoc($featured)): ?>
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

<section class="section alt">
    <div class="container section-head">
        <div>
            <span class="eyebrow">Schedule</span>
            <h2>Upcoming Shows</h2>
        </div>
    </div>

    <div class="show-grid">
        <?php while($show = mysqli_fetch_assoc($upcoming)): ?>
            <div class="show-card glass">
                <img src="<?= ($show['poster']) ?>" alt="">
                <div>
                    <h3><?= ($show['title']) ?></h3>
                    <p><?= ($show['theater_name']) ?></p>
                    <p><?= ($show['show_date']) ?> · <?= ($show['show_time']) ?></p>
                    <a href="book_ticket.php?show_id=<?= $show['show_id'] ?>" class="btn btn-outline btn-sm">Book Now</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="section">
    <div class="container feature-grid">
        <div class="feature glass">
            <i class="fa-solid fa-film"></i>
            <h3>Latest Movies</h3>
            <p>Stylish movie cards with ratings, language and genre.</p>
        </div>

        <div class="feature glass">
            <i class="fa-solid fa-ticket"></i>
            <h3>Easy Booking</h3>
            <p>Choose Gold, Platinum or Box class with ticket quantity.</p>
        </div>

        <div class="feature glass">
            <i class="fa-solid fa-gauge"></i>
            <h3>Admin Dashboard</h3>
            <p>Manage movies, shows, theaters, users and bookings.</p>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>



<!-- <script>

let slides = document.querySelectorAll(".slide");
let index = 0;

function showSlide(){
    slides.forEach((s)=>s.classList.remove("active"));
    slides[index].classList.add("active");

    index++;

    if(index >= slides.length){
        index = 0;
    }
}

setInterval(showSlide,4000);

</script> -->