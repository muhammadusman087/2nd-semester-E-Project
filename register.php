<?php
include "includes/db.php";
session_start();

$message = "";

if (isset($_POST['register'])) {
    $name =  trim($_POST['name']);
    $email =  trim($_POST['email']);
    $phone =  trim($_POST['phone']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($name == "" || $email == "" || $phone == "" || $password == "" || $confirm_password == "") {
        $message = "<div class='alert error'>Please fill all fields.</div>";
    } elseif ($password != $confirm_password) {
        $message = "<div class='alert error'>Passwords do not match.</div>";
    } else {
        $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $message = "<div class='alert error'>Email already exists.</div>";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "INSERT INTO users(name,email,phone,password) VALUES('$name','$email','$phone','$hash')");
            $message = "<div class='alert success'>Registration successful. <a href='login.php'>Login now</a></div>";
        }
    }
}

include "includes/header.php";
?>

<section class="auth-wrap">
    <div class="auth-card glass">
        <h1>Create Account</h1>
        <?= $message ?>

        <form method="POST" class="form-grid">
            <input type="text" name="name" placeholder="Full Name">
            <input type="email" name="email" placeholder="Email Address">
            <input type="text" name="phone" placeholder="Mobile Number">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirm_password" placeholder="Confirm Password">
            <button type="submit" name="register" class="btn btn-primary w-full">Register</button>
        </form>

        <p class="muted">Already have an account? <a href="login.php">Login</a></p>
    </div>
</section>

<?php include "includes/footer.php"; ?>