<?php
require "../connection/db.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM students WHERE id=?");
$stmt->execute([$id]);
$student = $stmt->fetch();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE students SET name=?, email=?, course=? WHERE id=?");
    $stmt->execute([$_POST['name'], $_POST['email'], $_POST['course'], $id]);
    header("Location: view.php");
    exit;
}
?>

<h2>Edit Student</h2>
<form method="post">
    Name: <input name="name" value="<?= $student['name'] ?>"><br>
    Email: <input name="email" value="<?= $student['email'] ?>"><br>
    Course: <input name="course" value="<?= $student['course'] ?>"><br>
    <input type="submit" value="Save">
</form>
<a href="view.php">Back</a>