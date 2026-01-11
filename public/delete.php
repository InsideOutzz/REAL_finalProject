<?php
require "../config/db.php";
require "../config/session.php";

adminOnly();

$id = intval($_GET['id']);

$stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
$stmt->execute([$id]);

header("Location: dashboard.php");
exit;
?>