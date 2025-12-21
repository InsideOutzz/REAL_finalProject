<?php
require "../config/db.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
$stmt->execute([$id]);

header("Location: dashboard.php");

require "config/session.php";
adminOnly();