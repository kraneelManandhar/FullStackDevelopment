<?php
$server = "localhost";
$database = "tech_store";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$server;dbname=$database;",
        $username,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Done";
} catch (PDOException $e) {
    die("Unable to connect: " . $e->getMessage());
}
?>
