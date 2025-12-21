<?php
require "../config/db.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare(
        "UPDATE students SET name=?, age=?, score=? WHERE id=?"
    );
    $stmt->execute([
        $_POST['name'],
        $_POST['age'],
        $_POST['score'],
        $id
    ]);

    header("Location: dashboard.php");
}

require "config/session.php";
adminOnly();
?>