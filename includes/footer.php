<footer class="footer">

<style>
.footer{
    background: linear-gradient(180deg, #0b0d14, #05060a);
    color: #fff;
    margin-top: 70px;
    width: 100%;
}

.footer-container{
    max-width: 1200px;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
    padding: 60px 20px;
}

.footer-box h2{
    font-size: 32px;
    margin-bottom: 15px;
}

.footer-box h2 span{
    color: #ff3b3b;
}

.footer-box h3{
    margin-bottom: 15px;
    font-size: 22px;
}

.footer-box p{
    color: #b6bed3;
    line-height: 1.8;
    font-size: 15px;
}

.footer-box ul{
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-box ul li{
    margin-bottom: 10px;
}

.footer-box ul li a{
    color: #b6bed3;
    text-decoration: none;
    transition: 0.3s;
}

.footer-box ul li a:hover{
    color: #ff3b3b;
    padding-left: 5px;
}

.social{
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 15px;
}

.social a{
    display: inline-block;
    padding: 10px 14px;
    background: #1a1d28;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    transition: 0.3s;
}

.social a:hover{
    background: #ff3b3b;
    transform: translateY(-3px);
}

.footer-bottom{
    border-top: 1px solid rgba(255,255,255,0.08);
    text-align: center;
    padding: 18px 10px;
}

.footer-bottom p{
    color: #9ea7bd;
    font-size: 14px;
    margin: 0;
}

@media (max-width: 992px){
    .footer-container{
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 576px){
    .footer-container{
        grid-template-columns: 1fr;
    }
}
</style>

<div class="footer-container">

    <div class="footer-box">
        <h2>Movie<span>Verse</span></h2>
        <p>
            Book your favourite movies online with a modern cinema experience.
            Watch trailers, explore movies and reserve your seats easily.
        </p>
    </div>

    <div class="footer-box">
        <h3>Quick Links</h3>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="movies.php">Movies</a></li>
            <li><a href="my_bookings.php">My Bookings</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="contact.php">contact</a></li>
        </ul>
    </div>

    <div class="footer-box">
        <h3>Contact</h3>
        <p>Karachi, Pakistan</p>
        <p>+92 300 1234567</p>
        <p>info@movieverse.com</p>
    </div>

    <div class="footer-box">
        <h3>Follow Us</h3>
        <div class="social">
            <a href="https://www.facebook.com/">Facebook</a>
            <a href="https://www.instagram.com/">Instagram</a>
            <a href="https://www.youtube.com/">YouTube</a>
            <a href="https://twitter.com/">Twitter</a>
        </div>
    </div>

</div>

<div class="footer-bottom">
    <p> 2026 MovieVerse | Online Movie Booking System</p>
</div>

</footer>

<script src="assets/main.js"></script>
</body>
</html>