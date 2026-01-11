<?php
require "../config/db.php";
require "../config/session.php";

adminOnly();

$id = intval($_GET['id']);

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if (!$student) {
    die("Student not found.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = trim($_POST['name']);
    $age   = intval($_POST['age']);
    $score = intval($_POST['score']);

    $update = $pdo->prepare("UPDATE students SET name=?, age=?, score=? WHERE id=?");
    $update->execute([$name, $age, $score, $id]);

    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
    <input type="number" name="age" value="<?= $student['age'] ?>" required>
    <input type="number" name="score" value="<?= $student['score'] ?>" required>

    <button type="submit">Update</button>
</form>

</body>
</html>