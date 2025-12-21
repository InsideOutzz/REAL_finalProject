<?php
require "../config/db.php";
require "../functions/helpers.php";

require "config/session.php";
protect();

$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
<?php if(isAdmin()): ?>
    <a href="add.php" class="btn">➕ Add Student</a>
<?php endif; ?>

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<h1>📊 Student Dashboard</h1>
<a href="create.php">➕ Add Student</a>

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
    <td><?= $student['name'] ?></td>
    <td><?= $student['age'] ?></td>
    <td><?= $student['score'] ?></td>
    <td><?= grade($student['score']) ?></td>
    <td>
        <a href="edit.php?id=<?= $student['id'] ?>">✏️</a>
        <a href="delete.php?id=<?= $student['id'] ?>">🗑️</a>
    </td>

    <td>
    <?php if(isAdmin()): ?>
        <a href="edit.php?id=<?= $student['id'] ?>">✏️</a>
        <a href="delete.php?id=<?= $student['id'] ?>" onclick="return confirm('Delete?')">🗑️</a>
    <?php else: ?>
        🔍 View only
    <?php endif; ?>
</td>
</tr>

<p>Welcome, <?= $_SESSION['username'] ?> 👋</p>
<a href="logout.php" class="btn">🚪 Logout</a>

<?php endforeach; ?>

</table>

</body>
</html>