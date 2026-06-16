<?php
include "../includes/db.php";
session_start();

$message = "";

if (isset($_POST['login'])) {

    $username =  trim($_POST['username']);
    $password = trim($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM admins WHERE username='$username'");

    if (mysqli_num_rows($result) > 0) {

        $admin = mysqli_fetch_assoc($result);

        if ($password == $admin['password']) {

            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['username'];

            header("Location: dashboard.php");
            exit();

        } else {

            $message = "<div class='alert error'>Invalid password.</div>";

        }

    } else {

        $message = "<div class='alert error'>Invalid username.</div>";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

<link rel="stylesheet" href="../assets/style.css">

<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

<section class="auth-wrap">

<div class="auth-card glass">

<h1>Admin Login</h1>

<?= $message ?>

<form method="POST" class="form-grid">

<input type="text" name="username" placeholder="Admin Username" required>

<input type="password" name="password" placeholder="Admin Password" required>

<button type="submit" name="login" class="btn btn-primary w-full">
Login
</button>

</form>

<p class="muted">
<a href="../index.php">Back to website</a>
</p>

</div>

</section>

</body>
</html>