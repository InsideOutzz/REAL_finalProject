<?php
require "../config/db.php";
require "../config/session.php";
require "../functions/helpers.php";

protect();

$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<p>Welcome, <?= htmlspecialchars($_SESSION['username']) ?></p>
<a href="../auth/logout.php" class="btn">Logout</a>

<h1>Student Dashboard</h1>

<?php if (isAdmin()): ?>
    <a href="create.php" class="btn">Add Student</a>
<?php endif; ?>

<table>
<tr>
    <th>Name</th>
    <th>Age</th>
    <th>Score</th>
    <th>Grade</th>
    <th>Actions</th>
</tr>

<?php foreach ($students as $s): ?>
<tr>
    <td><?= htmlspecialchars($s['name']) ?></td>
    <td><?= $s['age'] ?></td>
    <td><?= $s['score'] ?></td>
    <td><?= grade($s['score']) ?></td>
    <td>
        <?php if (isAdmin()): ?>
            <a href="edit.php?id=<?= $s['id'] ?>">✏️</a>
            <a href="delete.php?id=<?= $s['id'] ?>" onclick="return confirm('Delete?')">🗑️</a>
        <?php else: ?>
            View only
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

</body>