<?php
require "config/db.php";
require "config/session.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $email    = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$username, $email, $password]);
        header("Location: login.php");
    } catch (PDOException $e) {
        $error = "Username already exists";
    }
}
?>

<form method="POST">
    <h2>📝 Register</h2>

    <?php if(isset($error)) echo "<p>$error</p>"; ?>

    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button>Sign Up</button>
    <p><a href="login.php">Already have an account?</a></p>
</form>