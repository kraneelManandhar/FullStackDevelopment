<?php
require 'session.php';
require 'db.php';

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['user_id'])) {
    echo '<a href="login.php">Login</a>';
    exit;
}

$stmt = $pdo->prepare("SELECT email FROM users WHERE id = :id");
$stmt->execute([':id' => $_SESSION['user_id']]);
$user = $stmt->fetch();
?>

<h2>Welcome, <?= htmlspecialchars($user['email']) ?></h2>

<form method="post">
    <button type="submit" name="logout">Logout</button>
</form>