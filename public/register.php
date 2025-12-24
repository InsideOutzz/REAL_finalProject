<?php
require "../config/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $email    = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')");
        $stmt->execute([$username, $email, $password]);

        header("Location: login.php");
        exit;
    } catch (PDOException $e) {
        $error = "Username already exists.";
    }
}
?>

<form method="POST">
    <h2>Register</h2>

    <?php if($error): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button>Sign Up</button>
    <p><a href="login.php">Already have an account?</a></p>
</form>