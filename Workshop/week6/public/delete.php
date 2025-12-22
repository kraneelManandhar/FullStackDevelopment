<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Invalid student ID");
}

$stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");

$stmt->execute([$id]);

header("Location: index.php");

?>