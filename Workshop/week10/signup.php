<?php
require 'db.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if (!$email || empty($password) || strlen($password) < 6) {
        $error = "Invalid email or password";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare(
            "INSERT INTO users (email, password) VALUES (:email, :password)"
        );

        try {
            $stmt->execute([
                ':email' => $email,
                ':password' => $hashedPassword
            ]);
            header("Location: login.php");
            exit;
        } catch (PDOException $e) {
            $error = "Signup failed";
        }
    }
}
?>

<h2>Signup</h2>
<form method="post">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Sign Up</button>
</form>

<p><?= htmlspecialchars($error) ?></p>
