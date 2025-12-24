<?php

$host = "localhost";
$dbname = "real_finalproject"; // <-- your actual database name
$user = "root";                // <-- NOT empty
$pass = "";                    // <-- empty by default in XAMPP

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}