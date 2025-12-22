<?php 
require "../connection/db.php";
$students = [];

try {
    $stmt = $pdo->query("SELECT * FROM students");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo "Done";
} catch(PDOException $e) {
	echo "PDO exception occured: ". $e->getMessage();
    // echo "Not done";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <?php require "../require/links.php";?>
</head>
<body>
    <h2>Existing Students</h2>
    <?php if (empty($students)): ?>
        <p>No students found in the database.</p>
    <?php else: ?>
        <ul>
            <?php foreach($students as $student): ?>
                <li>
                    <strong>ID:</strong> <?= htmlspecialchars($student['id'] ?? '') ?><br>
                    <strong>Name:</strong> <?= htmlspecialchars($student['name'] ?? '') ?><br>
                    <strong>Email:</strong> <?= htmlspecialchars($student['email'] ?? '') ?><br>
                    <strong>Course:</strong> <?= htmlspecialchars($student['course'] ?? '') ?><br><br>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>