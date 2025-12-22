<?php
require __DIR__ . "/../config/db.php";
require __DIR__ . "/../functions/helpers.php";
require __DIR__ . "/../config/session.php";

protect();


$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<p>Welcome, <?= $_SESSION['username'] ?> 👋</p>
<a href="logout.php" class="btn">🚪 Logout</a>

<h1>📊 Student Dashboard</h1>

<?php if (isAdmin()): ?>
    <a href="create.php" class="btn">➕ Add Student</a>
<?php endif; ?>

<table>
<tr>
    <th>Name</th>
    <th>Age</th>
    <th>Score</th>
    <th>Grade</th>
    <th>Actions</th>
</tr>

<?php foreach ($students as $student): ?>
<tr>
    <td><?= htmlspecialchars($student['name']) ?></td>
    <td><?= $student['age'] ?></td>
    <td><?= $student['score'] ?></td>
    <td><?= grade($student['score']) ?></td>
    <td>
        <?php if (isAdmin()): ?>
            <a href="edit.php?id=<?= $student['id'] ?>">✏️</a>
            <a href="delete.php?id=<?= $student['id'] ?>"
               onclick="return confirm('Delete?')">🗑️</a>
        <?php else: ?>
            🔍 View only
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>