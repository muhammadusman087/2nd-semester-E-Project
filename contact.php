<?php include "includes/header.php"; ?>
<!-- <section class="contact-banner">

<img src="assets/home 2.jpg" alt="Contact Banner">

<div class="contact-banner-text">
    <h1>Contact Us</h1>
    <p>We are here to help you with your movie booking.</p>
</div>

</section> -->

<style>
/* 
.contact-banner{
    position:relative;
    width:100%;
    height:500px;
    overflow:hidden;
}

.contact-banner img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.contact-banner-text{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    text-align:center;
    color:#fff;
}

.contact-banner-text h1{
    font-family:'Bebas Neue',sans-serif;
    font-size:60px;
}

.contact-banner-text p{
    color:#ddd;
    font-size:18px;
} */


.contact-page-wrap{
    padding: 70px 0;
}

/* .contact-grid{
    display:grid;
    grid-template-columns: 1fr 1fr;
    gap:30px;
    align-items:start;
}

.contact-card{
    padding:30px;
    border-radius:24px;
} */
    .contact-grid{
    display:grid;
    grid-template-columns: 1fr 1fr;
    gap:30px;
    align-items:stretch;
}

.contact-card{
    padding:30px;
    border-radius:24px;
    height:100%;
}

.contact-card h2{
    font-family:'Bebas Neue',sans-serif;
    font-size:42px;
    letter-spacing:1px;
    margin-bottom:10px;
}

.contact-card h3{
    margin-bottom:12px;
    font-size:22px;
}

.contact-card p{
    color:var(--muted);
    line-height:1.8;
    margin-bottom:10px;
}

.contact-info-box{
    background:rgba(255,255,255,.04);
    border:1px solid rgba(255,255,255,.08);
    padding:18px;
    border-radius:18px;
    margin-bottom:16px;
}

.contact-info-box strong{
    display:block;
    margin-bottom:6px;
    color:#fff;
}

.contact-form{
    display:grid;
    gap:14px;
    margin-top:20px;
}

.contact-form input,
.contact-form textarea{
    width:100%;
    padding:14px 16px;
    border-radius:16px;
    border:1px solid rgba(255,255,255,.08);
    background:#111521;
    color:#fff;
    outline:none;
    font:inherit;
}

.contact-form textarea{
    resize:none;
}

.contact-social{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
    margin-top:12px;
}

.contact-social a{
    width:42px;
    height:42px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:rgba(255,255,255,.08);
    color:#fff;
    transition:.3s;
}

.contact-social a:hover{
    background:linear-gradient(90deg,var(--primary),var(--primary2));
    transform:translateY(-4px);
}

.map-box{
    overflow:hidden;
    border-radius:24px;
    border:1px solid rgba(255,255,255,.08);
    min-height:420px;
}

.map-box iframe{
    width:100%;
    height:420px;
    border:0;
    display:block;
}

.contact-top-text{
    margin-bottom:25px;
}

@media (max-width: 900px){
    .contact-grid{
        grid-template-columns:1fr;
    }

    .contact-card h2{
        font-size:34px;
    }
}
</style>

<section class="page-banner">
    <div class="container">
        <span class="eyebrow" style="margin-top: 20px;">Get In Touch</span>
        <h1>Contact Us</h1>
        <p class="muted">Questions about bookings, shows or support? Reach out to us anytime.</p>
    </div>
</section>

<section class="contact-page-wrap">
    <div class="container">
        <div class="contact-grid">

            <div class="glass contact-card">
                <div class="contact-top-text">
                    <h2>Let’s Talk</h2>
                    <p>
                        Have any issue with your movie booking or want more information about movies,
                        shows and theaters? Send us a message and we will get back to you.
                    </p>
                </div>

                <div class="contact-info-box">
                    <strong>Address</strong>
                    <p>Shahrah-e-Faisal, Karachi, Pakistan</p>
                </div>

                <div class="contact-info-box">
                    <strong>Phone</strong>
                    <p>+92 300 1234567</p>
                </div>

                <div class="contact-info-box">
                    <strong>Email</strong>
                    <p>info@movieverse.com</p>
                </div>

                <div class="contact-info-box">
                    <strong>Working Hours</strong>
                    <p>Monday - Sunday | 10:00 AM - 11:00 PM</p>
                </div>

                <div class="contact-social">
                    <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="glass contact-card">
                <h2>Send Message</h2>

                <form class="contact-form">
                    <input type="text" placeholder="Your Name" required>
                    <input type="email" placeholder="Your Email" required>
                    <input type="text" placeholder="Subject" required>
                    <textarea rows="6" placeholder="Write your message here..." required></textarea>
                    <button type="submit" class="btn btn-primary w-full">Send Message</button>
                </form>
            </div>

        </div>

        <div style="margin-top:30px;" class="map-box">
            <iframe
                src="https://www.google.com/maps?q=Karachi%20Pakistan&output=embed"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>