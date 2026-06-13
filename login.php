






<?php

include "includes/db.php";
session_start();

$message = "";

if (isset($_POST['login'])) {
    $email =  trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email == "" || $password == "") {
        $message = "<div class='alert error'>Please fill all fields.</div>";
    } else {
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header("Location: index.php");
                exit();
            }
        }

        $message = "<div class='alert error'>Invalid email or password.</div>";
    }
}

include "includes/header.php";
?>

<section class="auth-wrap">
    <div class="auth-card glass">
        <h1>User Login</h1>
        <?= $message ?>

        <form method="POST" class="form-grid">
            <input type="email" name="email" placeholder="Email Address">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="login" class="btn btn-primary w-full">Login</button>
        </form>

        <p class="muted">No account? <a href="register.php">Register</a></p>
        <div class="admin-tip">Admin login: <a href="admin/login.php">Open Admin Panel</a></div>
    </div>
</section>

<?php include "includes/footer.php"; ?>