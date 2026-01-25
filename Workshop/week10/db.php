<?php
$host = 'localhost';
$database = 'week10';
$username = 'root';
$password = '';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$database",
        $username,
        $password,
        $options
    );
} catch (PDOException $e) {
    die('Database connection failed.');
}
?>