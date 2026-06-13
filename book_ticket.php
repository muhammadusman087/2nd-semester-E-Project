<?php
include "includes/db.php";
session_start();

if (!isset($_GET['show_id'])) {
    header("Location: movies.php");
    exit();
}

$show_id = (int) $_GET['show_id'];

$showResult = mysqli_query($conn, "
    SELECT shows.*, movies.title, movies.poster, theaters.theater_name
    FROM shows
    JOIN movies ON movies.id = shows.movie_id
    JOIN theaters ON theaters.id = shows.theater_id
    WHERE shows.id = $show_id
");

if (mysqli_num_rows($showResult) == 0) {
    header("Location: movies.php");
    exit();
}

$show = mysqli_fetch_assoc($showResult);
$message = "";

if (isset($_POST['book'])) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $show_time    = $_POST['show_time'];
    $seat_class   = $_POST['seat_class'];
    $seat_numbers = isset($_POST['seat_numbers']) ? $_POST['seat_numbers'] : "";
    $tickets      = max(1, (int) $_POST['tickets']);
    $kids_tickets = max(0, (int) $_POST['kids_tickets']);

    if ($seat_numbers == "") {
        $message = "<div class='alert error'>Please select at least one seat.</div>";
    } else {
        $price = 0;

        if ($seat_class == "Gold") {
            $price = $show['gold_price'];
        } elseif ($seat_class == "Platinum") {
            $price = $show['platinum_price'];
        } elseif ($seat_class == "Box") {
            $price = $show['box_price'];
        }

        $adult_total = $tickets * $price;
        $kids_total  = $kids_tickets * ($price * 0.5);
        $total       = $adult_total + $kids_total;

        $user_id = $_SESSION['user_id'];

        mysqli_query($conn, "
            INSERT INTO bookings(user_id, show_id, seat_class, show_time, seat_numbers, tickets, kids_tickets, total_amount)
            VALUES($user_id, $show_id, '$seat_class', '$show_time', '$seat_numbers', $tickets, $kids_tickets, $total)
        ");

        $message = "<div class='alert success'>Booking confirmed successfully.</div>";
    }
}

include "includes/header.php";
?>

<style>
.booking-banner{
    position:relative;
    width:100%;
    height:320px;
    overflow:hidden;
    margin-bottom:30px;
}

.booking-banner img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.booking-banner-text{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    text-align:center;
    color:#fff;
}

.booking-banner-text h1{
    font-family:'Bebas Neue',sans-serif;
    font-size:60px;
    letter-spacing:2px;
}

.booking-banner-text p{
    color:#ddd;
    font-size:18px;
}

.booking-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:24px;
    align-items:start;
}

.booking-card{
    padding:24px;
}

.booking-poster{
    width:100%;
    height:320px;
    object-fit:cover;
    border-radius:16px;
    margin-bottom:15px;
}

.booking-card h2{
    margin-top:15px;
    margin-bottom:10px;
}

.booking-card p{
    margin-bottom:8px;
}

.seat-area{
    margin:20px 0;
}

.seat-title{
    margin-bottom:10px;
    font-weight:600;
    font-size:18px;
}

.screen-box{
    text-align:center;
    background:#fff;
    color:#111;
    padding:10px;
    border-radius:10px;
    margin-bottom:20px;
    font-weight:700;
}

.seat-grid{
    display:grid;
    grid-template-columns:repeat(5, 1fr);
    gap:12px;
}

.seat-btn{
    padding:12px;
    border:none;
    border-radius:10px;
    background:#1f2430;
    color:#fff;
    cursor:pointer;
    transition:0.3s;
    font-weight:600;
}

.seat-btn:hover{
    background:#ff3b3b;
}

.selected-seat{
    background:#28a745 !important;
    color:#fff;
}

@media (max-width: 768px){
    .booking-grid{
        grid-template-columns:1fr;
    }

    .seat-grid{
        grid-template-columns:repeat(3, 1fr);
    }

    .booking-banner-text h1{
        font-size:42px;
    }
}
.booking-grid{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    align-items: stretch; /* 🔥 IMPORTANT */
}

.booking-card{
    padding: 24px;
    display: flex;
    flex-direction: column;
    height: 100%; /* 🔥 IMPORTANT */
}
</style>

<!-- <section class="booking-banner">
    <img src="assets/5 - Copy.jpg" alt="Movie Booking">
    <div class="booking-banner-text">
        <h1>Reserve Your Seats</h1>
        <p>Select your seats and enjoy the movie experience.</p>
    </div>
</section> -->

<section class="section">
    <div class="container booking-grid">

        <div class="booking-card glass">
            <img class="booking-poster" src="<?= $show['poster'] ?>" alt="">
            <h2><?= $show['title'] ?></h2>
            <p><strong>Theater:</strong> <?= $show['theater_name'] ?></p>
            <p><strong>Date:</strong> <?= $show['show_date'] ?></p>

            <div class="price-box">
                <span>Gold: Rs.<?= $show['gold_price'] ?></span>
                <span>Platinum: Rs.<?= $show['platinum_price'] ?></span>
                <span>Box: Rs.<?= $show['box_price'] ?></span>
            </div>
        </div>

        <div class="booking-card glass">
            <h1>Book Ticket</h1>

            <?= $message ?>

            <form method="POST" class="form-grid">

                <select name="show_time" required>
                    <option value="">Select Time</option>
                    <option value="03:00 PM">03:00 to 06:00 pm</option>
                    <option value="06:00 PM">06:00 to 08:00 pm</option>
                    <option value="09:00 PM">09:00 to 11:00 pm</option>
                </select>

                <select name="seat_class" required>
                    <option value="">Select Class</option>
                    <option value="Gold">Gold</option>
                    <option value="Platinum">Platinum</option>
                    <option value="Box">Box</option>
                </select>

                <input type="number" name="tickets" min="1" value="1" placeholder="Adult Tickets" required>
                <input type="number" name="kids_tickets" min="0" value="0" placeholder="Kids Tickets" required>

                <div class="seat-area">
                    <div class="seat-title">Select Seats</div>

                    <div class="screen-box">SCREEN</div>

                    <div class="seat-grid">
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'A1')">A1</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'A2')">A2</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'A3')">A3</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'A4')">A4</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'A5')">A5</button>

                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'B1')">B1</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'B2')">B2</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'B3')">B3</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'B4')">B4</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'B5')">B5</button>

                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'C1')">C1</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'C2')">C2</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'C3')">C3</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'C4')">C4</button>
                        <button type="button" class="seat-btn" onclick="toggleSeat(this,'C5')">C5</button>
                    </div>

                    <input type="hidden" name="seat_numbers" id="seat_numbers">

                    <p class="muted" style="margin-top:10px;">
                        Selected Seats: <span id="selectedSeatsText">None</span>
                    </p>
                </div>

                <button type="submit" name="book" class="btn btn-primary w-full">Confirm Booking</button>
            </form>

            <p class="muted">Kids concession is applied at 50% rate.</p>
        </div>

    </div>
</section>

<script>
let selectedSeats = [];

function toggleSeat(button, seat) {
    if (selectedSeats.includes(seat)) {
        selectedSeats = selectedSeats.filter(s => s !== seat);
        button.classList.remove('selected-seat');
    } else {
        selectedSeats.push(seat);
        button.classList.add('selected-seat');
    }

    document.getElementById('seat_numbers').value = selectedSeats.join(',');
    document.getElementById('selectedSeatsText').innerText = selectedSeats.length ? selectedSeats.join(', ') : 'None';
}
</script>

<?php include "includes/footer.php"; ?>
