<?php
require "../config/db.php";
require "../config/session.php";
adminOnly();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = trim($_POST['name']);
    $age   = intval($_POST['age']);
    $score = intval($_POST['score']);

    $stmt = $pdo->prepare("INSERT INTO students (name, age, score) VALUES (?, ?, ?)");
    $stmt->execute([$name, $age, $score]);

    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../assets/script.js"></script>
</head>
<body>

<h2>Add Student</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="number" name="age" placeholder="Age" required>

    <label>Score: <span id="scoreValue">50</span></label>
    <input type="range" name="score" min="0" max="100" value="50" oninput="updateSlider(this.value)">

    <button type="submit">Save</button>
</form>

</body>
</html>