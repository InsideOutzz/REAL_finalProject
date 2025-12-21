<?php
require "config/db.php";
require "config/session.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        header("Location: dashboard.php");
    } else {
        $error = "Invalid login credentials";
    }
}

$_SESSION["user_id"] = $user["id"];
$_SESSION["username"] = $user["username"];
$_SESSION["role"] = $user["role"];
?>

<form method="POST">
    <h2>🔐 Login</h2>

    <?php if(isset($error)) echo "<p>$error</p>"; ?>

    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>

    <button>Login</button>
    <p><a href="register.php">Create account</a></p>
</form>